<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        return User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'profile' => $data['profile'],
            'tel' => $data['tel'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
/*<?php

 namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Request;

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

   /*
    protected $redirectTo = RouteServiceProvider::HOME;

    /*
    public function __construct()
    {
        $this->middleware('guest');
    }

    /*
    protected function validator(Request $request)
    {
        return Validator::make($request, [
            $request->validate([
                'nom' => 'required|string|max:50',
                'prenom' => 'string|max:50',
                'email' => 'required|string|email|max:255|unique:users',
                'tel' => 'required|string|min:9|max:20',
                'password' => 'min:6|required_with:password-confirm|same:password-confirm',
                'password-confirm' => 'min:6',
                'profile' => 'required|image'
            ])
        ]);
    }

    /*
    protected function create(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'tel' => 'required|string|min:9|max:20',
            'password' => 'min:6|required_with:password-confirm|same:password-confirm',
            'password-confirm' => 'min:6',
            'profile' => 'required|image'
        ]);
        if($request->hasFile('profile')){
            $nom=$request->file('profile')->getClientOriginalName();
            $path='user'.date("H-i-s").'_'.$nom;
            $request->file('profile')->move(public_path().'/Profiles', $path);
            $data['profile']='/Profiles'.'/'.$path;
        }
        $User=user::create($data);
        return back()->with('message_success','Added Successfuly');
    }
}*/
