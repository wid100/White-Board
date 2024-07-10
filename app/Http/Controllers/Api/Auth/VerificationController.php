<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class VerificationController extends Controller
{
    use VerifiesEmails;

    public function __construct()
    {
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    protected function verificationCode()
    {
        return str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    }

    public function verify(Request $request)
    {
        if ($request->route('id') != $request->user()->getKey()) {
            abort(403, 'Unauthorized');
        }

        if ($request->user()->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified.'], 200);
        }

        // Verify the code here
        $code = $request->input('code');

        // Retrieve the user by email
        $user = User::where('email', $request->user()->email)->first();

        if (!$user || $code != $user->verification_code) {
            return response()->json(['message' => 'Invalid verification code.'], 422);
        }

        // Verification code matches, generate a token and update email_verified_at
        $token = Str::random(60);
        $user->forceFill([
            'email_verified_at' => now(),
            'verification_code' => null, // Clear the verification code
            'api_token' => hash('sha256', $token),
        ])->save();

        event(new Verified($request->user()));

        return response()->json(['token' => $token, 'message' => 'Email successfully verified.'], 200);
    }

    public function resend(Request $request)
    {
        $user = $request->user();

        if (!$user || $user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Invalid user or email already verified.'], 422);
        }

        $user->sendEmailVerificationNotification();

        return response()->json(['message' => 'Email verification link resent.'], 200);
    }
}
