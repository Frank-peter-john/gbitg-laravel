<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\UserRating;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the products with their average ratings, user's rating, time passed, and active time.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProducts()
    {
        // Retrieve the currently authenticated user
        $user = Auth::user();
        
        // Retrieve all products with their average ratings, user's rating, and time passed
        $products = Product::select('id', 'name', 'description', 'price')
            ->withCount('ratings')
            ->withAvg('ratings', 'rating')
            ->with(['ratings' => function ($query) use ($user) {
                // If user is authenticated, fetch the user's rating and time passed for each product
                if ($user) {
                    $query->select('product_id', DB::raw('avg(rating) as user_rating'), 'rating_datetime')
                        ->where('user_id', $user->id)
                        ->groupBy('product_id');
                }
            }])
            ->get();

        // Calculate the time passed and active time for each product rating
        $products->each(function ($product) {
            if ($product->ratings->isNotEmpty()) {
                $product->ratings->each(function ($rating) {
                    $rating->time_passed = Carbon::parse($rating->rating_datetime)->diffForHumans();
                    $rating->active_time = Carbon::parse($rating->rating_datetime)->diffInMinutes() > 30 ? 'active' : 'inactive';
                });
            }
        });

        return response()->json(['data' => $products], 200);
    }
}