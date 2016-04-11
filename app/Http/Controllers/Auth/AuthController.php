<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Socialite;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Registration & Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users, as well as the
      | authentication of existing users. By default, this controller uses
      | a simple trait to add these behaviors. Why don't you explore it?
      |
     */

use AuthenticatesAndRegistersUsers,
    ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
        return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
        ]);
    }

//Facebook Login
    public function redirectToProviderFB() {
        return \Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallbackFB() {
        $user = \Socialite::driver('facebook')->user();
        $check = User::where('email', $user->user['email'])->get();
        if (count($check) < 1) {
            $create_user = User::create([
                        'first_name' => $user->user['first_name'],
                        'last_name' => $user->user['last_name'],
                        'email' => $user->user['email']
            ]);
            if ($create_user) {
                \App\Social_profile::create([
                    'user_id' => $create_user->id,
                    'profile_id' => $user->id,
                    'media_type' => 'facebook',
                    'profile' => json_encode($user->user)
                ]);
            } else {
                return redirect('/login')
                                ->with('global', '<div class="alert alert-warning" align="center">User creation failed, please try again.</div>');
            }
            //Ligin user and redirect
            \Auth::loginUsingId($create_user->id);
            return redirect('/home')
                            ->with('global', '<div class="alert alert-success" align="center">Welcome to Supa Dere, you have created a new profile</div>');
        } else {
            //Check if social media profile exists
            $check_profile = \App\Social_profile::where('media_type', 'facebook')
                    ->where('user_id', $check[0]->id)
                    ->get();
            if (count($check_profile) > 0) {
                //Update social media profile
                \App\Social_profile::where('user_id', $check[0]->id)
                        ->where('media_type', 'facebook')
                        ->update([
                            'profile_id' => $user->id,
                            'profile' => json_encode($user->user)
                                ]
                );
            } else {
                //Create social media profile
                \App\Social_profile::create([
                    'user_id' => $check[0]->id,
                    'profile_id' => $user->id,
                    'media_type' => 'facebook',
                    'profile' => json_encode($user->user)
                ]);
            }
            //Login the user and redirect
            \Auth::loginUsingId($check[0]->id);
            return redirect('/home')
                            ->with('global', '<div class="alert alert-success" align="center">Welcome to Supa Dere.</div>');
        }
        // $user->token;
    }

//Google Login
    public function redirectToProviderGoogle() {
        return \Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallbackGoogle() {
        $user = \Socialite::driver('google')->user();
        dd($user);

        // $user->token;
    }

//Gihub Login
    public function redirectToProviderGH() {
        return \Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallbackGH() {
        $user = \Socialite::driver('github')->user();
        $check = User::where('email', $user->user['email'])->get();
        if (count($check) < 1) {
            $name = explode(" ", $user->name);
            $create_user = User::create([
                        'first_name' => $name[0],
                        'last_name' => $name[1],
                        'email' => $user->user['email']
            ]);
            if ($create_user) {
                \App\Social_profile::create([
                    'user_id' => $create_user->id,
                    'profile_id' => $user->id,
                    'media_type' => 'github',
                    'profile' => json_encode($user->user)
                ]);
            } else {
                return redirect('/login')
                                ->with('global', '<div class="alert alert-warning" align="center">User creation failed, please try again.</div>');
            }
            //Ligin user and redirect
            \Auth::loginUsingId($create_user->id);
            return redirect('/home')
                            ->with('global', '<div class="alert alert-success" align="center">Welcome to Supa Dere, you have created a new profile</div>');
        } else {
            //Check if social media profile exists
            $check_profile = \App\Social_profile::where('media_type', 'github')
                    ->where('user_id', $check[0]->id)
                    ->get();
            if (count($check_profile) > 0) {
                //Update social media profile
                \App\Social_profile::where('user_id', $check[0]->id)
                        ->where('media_type', 'github')
                        ->update([
                            'profile_id' => $user->id,
                            'profile' => json_encode($user->user)
                                ]
                );
            } else {
                //Create social media profile
                \App\Social_profile::create([
                    'user_id' => $check[0]->id,
                    'profile_id' => $user->id,
                    'media_type' => 'github',
                    'profile' => json_encode($user->user)
                ]);
            }
            //Login the user and redirect
            \Auth::loginUsingId($check[0]->id);
            return redirect('/home')
                            ->with('global', '<div class="alert alert-success" align="center">Welcome to Supa Dere.</div>');
        }
        // $user->token;
    }

//linkedin Login
    public function redirectToProviderL() {
        return \Socialite::driver('linkedin')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallbackL() {
        $user = \Socialite::driver('linkedin')->user();
        $check = User::where('email', $user->user['emailAddress'])->get();
        if (count($check) < 1) {
            $create_user = User::create([
                        'first_name' => $user->user['firstName'],
                        'last_name' => $user->user['lastName'],
                        'email' => $user->user['emailAddress']
            ]);
            if ($create_user) {
                \App\Social_profile::create([
                    'user_id' => $create_user->id,
                    'profile_id' => $user->id,
                    'media_type' => 'linkedin',
                    'profile' => json_encode($user->user)
                ]);
            } else {
                return redirect('/login')
                                ->with('global', '<div class="alert alert-warning" align="center">User creation failed, please try again.</div>');
            }
            //Ligin user and redirect
            \Auth::loginUsingId($create_user->id);
            return redirect('/home')
                            ->with('global', '<div class="alert alert-success" align="center">Welcome to Supa Dere, you have created a new profile</div>');
        } else {
            //Check if social media profile exists
            $check_profile = \App\Social_profile::where('media_type', 'linkedin')
                    ->where('user_id', $check[0]->id)
                    ->get();
            if (count($check_profile) > 0) {
                //Update social media profile
                \App\Social_profile::where('user_id', $check[0]->id)
                        ->where('media_type', 'linkedin')
                        ->update([
                            'profile_id' => $user->id,
                            'profile' => json_encode($user->user)
                                ]
                );
            } else {
                //Create social media profile
                \App\Social_profile::create([
                    'user_id' => $check[0]->id,
                    'profile_id' => $user->id,
                    'media_type' => 'linkedin',
                    'profile' => json_encode($user->user)
                ]);
            }
            //Login the user and redirect
            \Auth::loginUsingId($check[0]->id);
            return redirect('/home')
                            ->with('global', '<div class="alert alert-success" align="center">Welcome to Supa Dere.</div>');
        }
    }

}
