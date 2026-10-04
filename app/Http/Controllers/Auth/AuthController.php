<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\alert;
use function Laravel\Prompts\confirm;

class AuthController extends Controller
{
    public function register()  // go to register view
    {
        return view('website.auth.register');
    }

    public function handelRegister(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'image'    => 'nullable',
            'age'      => 'required|integer',
            'phone'    => 'nullable'
        ]);
    
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $img = $manager->read($image)->cover(300, 300)->toJpeg(85);
            Storage::disk('public')->put('images/' . $imageName,(string) $img);
        }
    
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'image'    => $imageName,
            'age'      => $request->age,
            'phone'    => $request->phone
        ]);
    
        Auth::login($user); 
    
        return redirect()->route('/')->with('success' ,  'Register Successfully');
    }



    public function login()  // go to login view
    {
        return view('website.auth.login');
    }

    public function handelLogin(Request $request) 
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);
    
        $isLogin = Auth::attempt([
            'email'    => $request->email,
            'password' => $request->password
        ]);
    
        if(!$isLogin) {
            return back()->withInput()->with('wrong' , 'Wrong Email or Password');
        }
    
        return redirect()->route('/')->with('success' ,  'Login Successfully');
    }



    public function profile()
    {
        $user = Auth::user();
        return view('website.auth.profile' , compact('user'));
    }   


    public function editProfile(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|max:20',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'phone'    => 'nullable|string|max:20',
        ]);
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        if ($request->hasFile('image')) 
            {
            if ($user->image && Storage::disk('public')->exists('images/' . $user->image)) {
                Storage::disk('public')->delete('images/' . $user->image);
            }
        
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $img = $manager->read($image)->cover(300, 300)->toJpeg(85);
        
            Storage::disk('public')->put('images/' . $imageName,(string) $img);
        
            $user->image = $imageName;
        }
    
        $user->save();
    
        return redirect()->back()->with('success', 'Profile updated successfully');
    }





    public function logout()
    {    
        Auth::logout();
        return redirect()->route('login');
    }


}
