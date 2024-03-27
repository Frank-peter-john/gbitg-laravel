<?php
namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    

  
    
    
    
    public function userLogin(LoginRequest $request)
        {
            $credentials = $request->validated();

            if (!Auth::attempt($credentials)) {
                return response([
                    'message' => 'Provided email or password is incorrect'
                ], 422);
            }

            /** @var User $user */
            $user = Auth::user();
            $user_token = $user->createToken('user_token')->plainTextToken;

            return response(compact('user', 'user_token'));
        }

 
      public function userLogout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'User Successfully logged out'], 204);
    }

}