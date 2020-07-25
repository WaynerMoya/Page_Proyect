<?php

namespace App\Http\Controllers;

use App\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use stdClass;

class UserController extends Controller
{
    public function createSuperUser()
    {
        $user = new User();
        $created = $user->where('email', 'efren@gmail.com')->count();
        if ($created == 0) {
            $user->name = "Efren";
            $user->email = "efren@gmail.com";
            $user->password = Hash::make("prueba123");
            $user->save();
        }
    }

    public function loginAdmin()
    {
        return view('admin/login');
    }
    public function index()
    {
        $imagenes = new Image();
        $imagenes = $imagenes->get();
        return view('main/main', compact('imagenes'));
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
            return redirect('admin/home');
        } else {
            return "No";
        }
    }
    public function uploadedImage(Request $request)
    {
        if ($request->hasFile('image')) {
            //  Let's do everything here
            $file = $request->file('image');
            $path = public_path() . '/images/bg';
            $name = uniqid().$file->getClientOriginalName();
            $file->move($path, $name);
            $image = new Image();
            $image->name = $name;
            $image->sizeText = $request->size;
            $image->text = $request->text;
            $image->font = $request->font;
            $image->bold = $request->weight == "bold" ? 1 : 0;
            $image->cursive = $request->weight == "italic" ? 1 : 0;
            $image->orientation = $request->orientation;
            $image->animation = $request->animation;
            $image->save();
            return redirect('admin/home');
        } else {
            return redirect()->back();
        }
    }

    public function adminHome()
    {
        if (Auth::check()) {
            $imagenes = new Image();
            $imagenes = $imagenes->get();
            return view('admin/main', compact('imagenes'));
        } else {
            return redirect('/');
        }
    }
    public function adminAddImage()
    {
        if (Auth::check()) {
            return view('admin/addImage');
        } else {
            return redirect('/');
        }
    }
}
