<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Auth\Events\Verified;
use App\Models\User;
use App\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * Register a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $verificationCode = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);


        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'verification_code' => $verificationCode, // Do not hash the verification code here
        ]);

        $user->notify(new VerifyEmail($verificationCode));

        return response()->json([
            'message' => 'Registration successful. Check your email for verification code.',
            'email' => $user->email,
            'verification_code' => $verificationCode,
        ]);
    }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $user = Auth::user();

    //         // Check if the user's email is verified
    //         if ($user->email_verified_at) {
    //             $token = JWTAuth::fromUser($user);

    //             return response()->json(['token' => $token]);
    //         } else {
    //             // If the email is not verified, log the user out
    //             Auth::logout();

    //             return response()->json(['error' => 'Account not verified'], 401);
    //         }
    //     }

    //     return response()->json(['error' => 'Invalid credentials'], 401);
    // }

    public function login(Request $request)
    {
        try {
            if (!Auth::attempt($request->only('email', 'password'))) {
                return response([
                    'message' => 'Invalid credentials!'
                ], Response::HTTP_UNAUTHORIZED);
            }

            $user = Auth::user();

            // Check if the user's email is verified
            if (!$user->email_verified_at) {
                // If the email is not verified, log the user out
                Auth::logout();

                return response()->json(['error' => 'Account not verified'], 401);
            }

            // If the user's email is verified, generate and return a token
            $token = $user->createToken('token')->plainTextToken;

            return response([
                'user' => $user,
                'token' => $token,
            ]);
        } catch (\Exception $e) {
            return response(['error' => 'Something went wrong. Please try again.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Log the user out and revoke the access token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        return response()->json(['message' => 'Logout successful']);
    }

    /**
     * Verify the user's email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'verification_code' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        if (!$user->email_verified_at == '') {
            return response()->json(['message' => 'User already verified!'], 404);
        }

        if ($user->verification_code !== $request->verification_code) {
            return response()->json(['message' => 'Invalid verification code'], 422);
        }

        $user->email_verified_at = now();
        $user->verification_code = null;
        $user->save();

        $token = auth()->login($user);

        return response()->json(['token' => $token, 'message' => 'User verified successfully']);
    }


    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
