<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function uploadAvatar(Request $request) 
    {
        if ($request->hasFile('image')) {
            User::uploadAvatar($request->image);
            return redirect()->back()->with('message', 'Image was uploaded'); // success message
        }
        return redirect()->back()->with('error', 'Image not uploaded'); // error message
    }

    

    public function index() {

        // User::where('id', 6)->delete();
        $data = [
            'name' => 'Melon',
            'email' => 'Melon@email.com',
            'password' => bcrypt('pass'),
        ];

        // User::create($data);

        $user = User::all();
        return $user;

            /* another syntax */
        // $user = new User();
        // $user->name = 'sarthak';
        // $user->email = 'sarthak@mail';
        // $user->password = bcrypt('password');
        // $user->save();

        
        return view('home');
    }
}
