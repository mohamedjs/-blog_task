<?php


namespace App\Http\Services;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthService
{
    /**
     * attempt
     * @param Request $request
     * @return  bool
     */
    public function attempt(Request $request)
    {
        $rememberMe = $request->filled('remember_me') ? true : false;
        $attempt =  Auth::attempt(
            [
                'email' => $request->request->get("identifier"),
                'password' => $request->request->get('password')
            ],
            $rememberMe
        ) ??
            Auth::attempt(
                [
                    'phone' => $request->request->get("identifier"),
                    'password' => $request->request->get('password')
                ],
                $rememberMe
            ) ;

        return $attempt;
    }

    public function generateApiToken(User $user) : User
    {
        $user->api_token = Str::random(80);
        $user->save();

        return $user;
    }
}
