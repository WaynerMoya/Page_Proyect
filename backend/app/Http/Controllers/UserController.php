<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use stdClass;
use File;
use DB;

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
            $name = uniqid() . $file->getClientOriginalName();
            $file->move($path, $name);
            $image = new Image();
            if ($request->id != 0) {
                $image = $image->find($request->id);
                unlink(public_path() . "/images/bg/" . $image->name);
            }
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
        } else if ($request->id != 0) {
            $image = new Image();
            if ($request->id != 0) {
                $image = $image->find($request->id);
            }
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
    public function uploadedImageArticle(Request $request)
    {
        $articulo = new Articulo();
        if ($request->id != 0) {
            $articulo = $articulo->find($request->id);
        } else {

            $articulo->code = $request->code;
        }
        $articulo->name = $request->name;
        $articulo->price = $request->price;
        $articulo->description = $request->description;
        $articulo->save();
        $path = public_path() . "/images/articles/";
        if($request->hasFile("file")){
            $files = $request->file('file');
            foreach ($files as $file) {
                $fileName = uniqid() . $file->getClientOriginalName();
                $image = DB::table('imagearticle')
                    ->insert([
                        'code_article' => $request->code,
                        'name' => $fileName
                    ]);
                $file->move($path, $fileName);
            }
        }

        return redirect('admin/articulo');
    }

    public function deleteImage($id)
    {

        $item = new Image();
        $item = $item->find($id);
        unlink(public_path() . "/images/bg/" . $item->name);
        $item->delete();
        return redirect('admin/articulo');
    }

    public function deleteArticulo($id)
    {
        $item = new Articulo();
        $item = $item->find($id);
        $images = DB::table('imagearticle')->where('code_article', $item->code)->get();
        foreach($images as $image){
            unlink(public_path() . "/images/articles/" . $image->name);
        }
        DB::table('imagearticle')->where('code_article', $item->code)->delete();
        $item->delete();
        return redirect('admin/articulo');
    }
    public function deleteImageArticulo($id)
    {

        $item = DB::table('imagearticle')->where('id', $id)->first();
        $articulo = new Articulo();
        $articulo = $articulo->where('code', $item->code_article)->first();
        unlink(public_path() . "/images/articles/" . $item->name);
        DB::table('imagearticle')->where('id', $id)->delete();
        return redirect('/admin/addArticulo/' . $articulo->id);
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
    public function adminArticulo()
    {
        if (Auth::check()) {
            $articulos = new Articulo();
            $articulos = $articulos
                ->get();
            foreach ($articulos as $articulo) {
                $img = DB::table("imagearticle")->where('code_article', $articulo->code)->first();
                $articulo->img = $img->name;
            }
            return view('admin/articulos', compact('articulos'));
        } else {
            return redirect('/');
        }
    }
    public function adminAddImage()
    {
        if (Auth::check()) {
            $item = new Image();
            return view('admin/addImage', compact('item'));
        } else {
            return redirect('/');
        }
    }
    public function adminAddArticulo()
    {
        if (Auth::check()) {
            $item = new Articulo();
            $item->code = uniqid();
            $imagenes = array();
            return view('admin/addArticulo', compact('item', 'imagenes'));
        } else {
            return redirect('/');
        }
    }
    public function adminEditArticulo($id)
    {
        if (Auth::check()) {
            $item = new Articulo();
            $item = $item->find($id);
            $imagenes =  DB::table("imagearticle")->where('code_article', $item->code)->get();
            return view('admin/addArticulo', compact('item', 'imagenes'));
        } else {
            return redirect('/');
        }
    }
    public function adminEditImage($id)
    {
        if (Auth::check()) {
            $item = new Image();
            $item = $item->find($id);
            return view('admin/addImage', compact('item'));
        } else {
            return redirect('/');
        }
    }
}
