<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DeathConfirmation;
use App\Models\StaffMember;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginController extends Controller
{
    use AuthenticatesUsers, ThrottlesLogins;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Validate the user login request.
     *
     * @param Request $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|exists:users,email',
            'password' => 'required',
        ]);

        if (!$this->attemptLogin($request)) {
            $errors = ['password' => 'The password are invalid Please Enter The Valid Password.'];
            throw ValidationException::withMessages($errors);
        }
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param Request $request
     * @return
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return [
            $this->username() => $request->get($this->username()),
            'password' => $request->password,
        ];
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        // Regenerate the session
        $request->session()->regenerate();

        // Get the user by email with userInformation
        $check = User::query()
            ->where('email', $request->email)
            ->with('userInformation')
            ->first();
        $admins = StaffMember::query()->where('user_id', $check->id)->first();

        // Check if there is a death confirmation
        $deathConfirmation = DeathConfirmation::query()
            ->where('user_id', $check->id)
            ->where('is_alive', 0)
            ->where('confirmation_status', 1)
            ->first();

        if ($deathConfirmation) {
            // Redirect to the 'deathConfirmationShow' route
            return redirect()->route('deathConfirmationShow', ['id' => $deathConfirmation->id]);
        }

        if (isset($check->userInformation)) {
            if ($check->userInformation->date_of_birth === null || $check->userInformation->gender === null) {
                $this->clearLoginAttempts($request);
                $redirectTo = url('profile');
            } else {
                // Check if the user ID exists in staff_member
                if ($admins) {
                    return redirect()->route('app-profile');
                } else {
                    $redirectTo = url('home');
                }
            }
        } else {
            return redirect()->route('home');
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect()->intended($redirectTo);
    }


    /**
     * Get the failed login response instance.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ])->redirectTo(RouteServiceProvider::HOME);
    }

    /**
     * Get the maximum number of attempts to allow.
     *
     * @return int
     */
    public function maxAttempts()
    {
        return 5;
    }

    /**
     * Get the number of minutes to throttle for.
     *
     * @return int
     */
    public function decayMinutes()
    {
        return 60;
    }
}
