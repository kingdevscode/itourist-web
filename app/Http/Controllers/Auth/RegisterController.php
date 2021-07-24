<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => 'required|string|max:50',
            'prenom' => 'string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'tel' => 'required|string|min:9|max:20',
            'password' => 'min:6|required_with:password-confirm|same:password-confirm',
            'password-confirm' => 'min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $imageName = 'default.png';
        $imageName1 = 'default.jpeg';$bio = "";

        if (isset($data['profile'])) {

            $imageName = time() . '.' . $data['profile']->getClientOriginalExtension();

            $data['profile']->move(
            base_path() . '/public/assets/images/profiles', $imageName
            );
        }
        if (isset($data['couverture'])) {

            $imageName = time() . '.' . $data['couverture']->getClientOriginalExtension();

            $data['couverture']->move(
            base_path() . '/public/assets/images/couvertures', $imageName1
            );
        }

        return User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'tel' => $data['tel'],
            'password' => bcrypt($data['password']),
            'profile' => 'assets/images/profiles/'. $imageName,
            'couverture' => 'assets/images/couvertures/'. $imageName1,
        ]);
    }
}
