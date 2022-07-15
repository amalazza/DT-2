<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

// use Illuminate\Support\Facades\Auth;

// use App\Models\User;

class AuthController extends Controller
{

    public function register(Request $request){

        $post_data = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users',
            'role_id'=>'required|string',
            'password'=>'required|min:8'
        ]);

        // $this->authorize('create-delete-users');

        $user = User::create([
        'name' => $post_data['name'],
        'email' => $post_data['email'],
        'role_id' => $post_data['role_id'],
        'password' => Hash::make($post_data['password']),
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
        ]);

        // $request->validate([
        //     'name' => ['required', 'max:255'],
        //     'email' => ['required', 'email', 'max:255', 'unique:users'],
        //     'role_id' => ['required'],
        //     'password' => ['required', 'max:255'],
        //     'password_confirmed' => ['required', 'same:password']
        // ]);

        // $usercreate = User::create($request->only('name','email','role_id','password','password_confirmed'));

        // return response($usercreate);

    }

    public function login(Request $request){
        if (!\Auth::attempt($request->only('email', 'password'))) {
               return response()->json([
                'message' => 'Login information is invalid.'
              ], 401);
        }
 
        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('authToken')->plainTextToken;
 
        // return response()->json([
        //     'access_token' => $token,
        //     'token_type' => 'Bearer',
        // ]);
        return response()
            ->json(['message' => 'Hi '.$user->name.', welcome to home','access_token' => $token, 'token_type' => 'Bearer', ]);
    }
    
    // public function login(Request $request)
    // {

    //     // $request->validate([
    //     //     'email' => 'required|string|email|max:255',
    //     //     'password' => 'required|string|min:8',
    //     // ]);
    //     // if (!Auth::attempt($request->only('email', 'password'))) {
    //     //     return $this->errorResponse('Invalid login details', 401);
    //     // }
    //     if (!Auth::attempt($request->only('email','password'))) {
    //         return response([
    //             'errors'=>'Invalid credentials'
    //         ], Response::HTTP_UNAUTHORIZED);
    //     }

    //     $user = User::where('email', $request['email'])->firstOrFail();

    //     // $user = Auth::user();

    //     $token = $user->createToken('auth_token')->plainTextToken;

    //     return response()->json([
    //         'access_token' => $token,
    //         'token_type' => 'Bearer'
    //     ]);
    // }

    public function logout()
    {
        $user = Auth::user();
        $user->tokens()->delete();
        $this->guard()->logout();
        return response()->json([
            'success' => true,
            'message' => 'Logout'
        ]);

    }

    public function guard($guard = 'web')
    {
        return Auth::guard($guard);
    }
}
