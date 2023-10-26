<?php

namespace App\Http\Controllers;



use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
      public function dashboard()
    {
        return view('admin.home.index');
    }


      public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }


      public function profile()
    {
        $id = Auth::user()->id;
        $profileInfo = User::find($id);
        return view('admin.profile.index',['profileInfo' => $profileInfo,]);
    }


      public function editProfile()
    {
        $id = Auth::user()->id;
        $editProfile = User::find($id);
        return view('admin.settings.edit',['editProfile' => $editProfile,]);
    }

      public function updateProfile(Request $request)
    {
        $id     = Auth::user()->id;
        $data   = User::find($id);

    // Validation (adjust rules as needed)
        $request->validate([
        'name'      => 'required',
        'email'     => 'required|email',
        'image'     => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image rules
        ]);

        $data->name     = $request->name;
        $data->email    = $request->email;

        if ($request->file('image')) {
            $image          = $request->file('image');
            $imageName      = $image->getClientOriginalName();
            $directory      = 'uploads/admin-images/';
            $image->storeAs($directory, $imageName, 'public'); // Store the image

            $data->image = $directory . $imageName; // Save the image path
        }

        $data->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');
        }


      public function changePassword()
    {
        $id = Auth::user()->id;
        $profileInfo = User::find($id);
        return view('admin.settings.change-password',['profileInfo' => $profileInfo,]);
    }

      public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password'      =>'required',
            'password'              =>'required|confirmed'
        ],[
            'current_password|required'=>'Current Password Field is required',
            'password|required' => 'Password field is required',
        ]
    );

        if (!Hash::check($request->current_password ,Auth::user()->password)) {
            return back()->with('Password doesnt not match');
        }

        User::whereId(Auth::user()->id)->update([
            'password' =>bcrypt($request->password),
        ]);
        return redirect('/admin/change-password')->with('message','Password changed successfully');
    }
} 
