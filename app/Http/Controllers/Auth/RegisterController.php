<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
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
    protected $redirectTo = '/dashboard/profile?newUser=true';

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
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'birthday_date'=> ['required', 'date', 'before:today'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['file', 'mimes:jpg,jpeg,png,gif', 'max:1024'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = User::make([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'birthday_date' => $data['birthday_date'],
            'password' => Hash::make($data['password']),
            'is_avaiable' => '0',
        ]);
        if (isset($data['avatar'])) {
            $path = Storage::putFile('uploads/avatars', $data['avatar']);
            $user->avatar = asset('storage/' . $path);
        }
        $slug = $this->getSlug($user->name . ' ' . $user->lastname);
        $user->slug = $slug;
        $user->save();
        return $user;

    }

    private function getSlug($fullname) {
        $slug = Str::slug($fullname, '-');
        $slugBase = $slug;
        $userWithSlug = User::where('slug', $slug)->first();
        $counter = 1;
        while($userWithSlug) {
            $slug = $slugBase . '-' . $counter;
            $counter++;
            $userWithSlug = User::where('slug', $slug)->first();
        }
        return $slug;
    }
}
