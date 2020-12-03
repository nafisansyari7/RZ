<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Dosen;
use App\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use RealRashid\SweetAlert\Facades\Alert;

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
    protected $redirectTo = '/home';

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
            'username' => ['required', 'string' , 'max:255' , 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string'],
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
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
    }
public function update(Request $request, $id)
{
    $user = User::find($id);
    $user = User::where('id',$id)->first();
    $user->name = $request->input('name');
    if($user->save())
    {
        $profile = Profile::find($id);
        $profile = Profile::where('id',$id)->first();
        $profile->user_id = $request->input('user_id');
        $profile->about = $request->input('about');
        $profile->website = $request->input('website');
        $profile->phone = $request->input('phone');
        $profile->state = $request->input('state');
        $profile->city = $request->input('city');

    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        $filename = 'photo' . '-' . time() . '.' . $photo->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($photo)->resize(1300, 362)->save($location);
        $profile->photo = $filename;

        $oldFilename = $profile->photo;
        $profile->photo = $filename;
        Storage::delete($oldFilename);
    }

    $profile->save();
    return redirect()->route('profile', $user->id)->with('success', 'Your info are updated');
}
    return redirect()->back()->with('error','Something went wrong');
}
}
