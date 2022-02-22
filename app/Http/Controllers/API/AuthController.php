<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
         ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['message' => 'Hi '.$user->name.', welcome to home','data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    // method for user logout and delete token
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out'
        ];
    }
    public function me(Request $request)
    {
        return $request->user();
    }
    public function user(Request $request)
    {
        $user = $request->user();
        if($user->role==9){
            $data = User::where('role','!=', 9)->get();
            return response()
            ->json(['message' => 'Successfuly Showing Data','data' => $data]);
        }else if($user->role==10){
            $data = User::where('member_of', $user->id)->get();
            return response()
            ->json(['message' => 'Successfuly Showing Data','data' => $data]);
        }else{
            return response()
                ->json(['message' => 'Unauthorized this Data'], 401);
        }
    }
}