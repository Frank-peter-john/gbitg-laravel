<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Models\UserRating;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;

class RatingController extends Controller
{
    public function rateProduct(Request $request)
{
    // Validate request data
    $request->validate([
        'user_id' => [
            'required',
            'exists:users,id',
            Rule::unique('user_ratings')->where(function ($query) use ($request) {
                return $query->where('user_id', $request->user_id)
                             ->where('product_id', $request->product_id);
            })
        ],
        'product_id' => 'required|exists:products,id',
        'rating' => 'required|integer|between:1,5',
    ]);

    // Create or update the rating
    $rating = UserRating::updateOrCreate(
        [
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
        ],
        [
            'rating' => $request->rating,
            'rating_dateTime' => Carbon::now(), // Set the rating_dateTime to the current date and time
        ]
    );

    return response()->json(['message' => 'Product rated successfully', 'data' => $rating], 200);
}


    public function removeRating($id)
    {
        $rating = UserRating::find($id);
        if (!$rating) {
            return response()->json(['message' => 'Rating not found'], 404);
        }

        $rating->delete();

        return response()->json(['message' => 'Rating removed successfully'], 204);
    }

    public function updateRating(Request $request, $id)
{
    // Validate request data
    $request->validate([
        'rating' => 'required|integer|between:1,5',
    ]);

    $rating = UserRating::find($id);
    if (!$rating) {
        return response()->json(['message' => 'Rating not found'], 404);
    }

    $rating->rating = $request->rating;
    $rating->rating_dateTime = Carbon::now(); // Update the rating_dateTime to the current date and time
    $rating->save();

    return response()->json(['message' => 'Rating updated successfully', 'data' => $rating], 200);
}
}