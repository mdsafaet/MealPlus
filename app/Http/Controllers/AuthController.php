<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Role;
use App\Models\User;

class AuthController extends Controller
{

// public function register(RegisterRequest $request)
// {
//     dd('here');
 
//     $validatedData = $request->validated();

//      $userData = User::create([
//         'name' => $validatedData['name'],
//         'email' => $validatedData['email'],
//         'password' => bcrypt($validatedData['password']),
//     ]);

//     $token = auth()->login($userData);

//    return response()->json([
//         'message' => 'User successfully registered',
//         'user' => $userData,
//         'token' => $token,
//     ], 201);

    // public function register(UserRegisterRequest $request)
    // {

    //     $data = $request->validated();



    //     $user = User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //         'role_id' => $data['role_id'],



    //     ]);

    //     $token = auth('api')->login($user);

    //     return $this->success($token);
    // }




// }

public function create(Request $request, Role $role){

  $data = $request->validate([
 'name' => 'required|string|max:100|unique:roles,name',
  ]);
    $role = Role::create(
        [
            'name' => $data['name'],
        ] );

        
    return response()->json([
        'message' => 'User successfully registered',
        'role' => $role,
       
    ], 201);



}















    public function register(RegisterRequest $request)
{
    
   $data = $request->validated();

    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'role_id' => $data['role_id'],
    ]);
     $token = auth('api')->login($user);

    return response()->json([
        'message' => 'User successfully registered',
        'user' => $user,
       
    ], 201);




    
}
    




    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');



        if ($token = $this->guard('api')->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }


    public function me()
    {
        return response()->json($this->guard('api')->user());
    }


    public function logout()
    {
        $this->guard('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


    public function refresh()
    {
        return $this->respondWithToken($this->guard('api')->refresh());
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard('api')->factory()->getTTL() * 60
        ]);
    }


public function guard($guard = 'api')
{
    return Auth::guard($guard);
}
}