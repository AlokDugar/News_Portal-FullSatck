<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AdminResetPasswordMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Support\Facades\Password;


class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::createToken($user = $this->getUser($request->email));

        if ($status) {
            $resetUrl = url(route('password.reset', ['token' => $status, 'email' => $user->email], false));

            Mail::to($user->email)->send(new AdminResetPasswordMail($resetUrl));

            return redirect()->route('login')->with('status', __('Password reset link has been sent.'))->with('token', $status);
        }

        return back()->withInput($request->only('email'))
                    ->withErrors(['email' => __('Unable to send reset link at this time.')]);
    }


    /**
     * Retrieve the user by their email address.
     *
     * @param string $email
     * @return \App\Models\User
     */
    protected function getUser(string $email)
    {
        return \App\Models\User::where('email', $email)->firstOrFail();
    }
}
