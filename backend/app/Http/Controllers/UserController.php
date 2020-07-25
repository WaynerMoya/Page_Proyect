<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function contacto()
    {
        return view('contacto/contacto');
    }

    public function nosotros()
    {
        return view('nosotros/nosotros');
    }

    public function index()
    {
        $imagenes = [];
        $img = (object) [
            'imagen' => 'bg1.jpg'
        ];
        $img2 = (object) [
            'imagen' => 'bg2.jpg'
        ];
        array_push($imagenes, $img, $img2);
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

    public function adminHome()
    {
        if (Auth::check()) {
            $imagenes = [];
            $img = (object) [
                'imagen' => 'bg1.jpg'
            ];
            $img2 = (object) [
                'imagen' => 'bg2.jpg'
            ];
            array_push($imagenes, $img, $img2);
            return view('admin/main', compact('imagenes'));
        } else {
            return redirect('/');
        }
    }
}
