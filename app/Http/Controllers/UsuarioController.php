<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller{
    public function index(){
        return view('index');
    }
    public function adminView(){
        return view('adminView');
    }
    public function userView(){
        return view('userView');
    }
    public function registro(){
        return view('registro');
    }

    /*REGISTER LOGIN LOGOUT*/
    public function registerpost(Request $request){
        $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6'
        ]);
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => sha1($request->input('password')),
            'admin' => '0'
        ]);
        return view('index');
    }

    public function loginpost(Request $request){
        $usuario = $request->except('_token');
        $existe = DB::table('users')->where('email','=',$usuario['email'])->where('password', sha1($usuario['password']))->count();
        $admin = DB::table('users')->where('admin','=',1)->where('email','=',$usuario['email'])->count();

        if ($existe == 1){
            if($admin == 1){
                $request->session()->put(['email'=>$usuario['email'], 'admin' => '1']);
                return redirect('adminView');
            }else{
                $request->session()->put(['email'=>$usuario['email'],'admin' => '0']);
                return redirect('userView');
            }
        }else{
            //TE LLEVA AL INDEX
            return view('index');
        }
    }
    public function logout(Request $request) {
        if (!$request->session()->has('email')){
            return redirect('/');
        } else {
            $request->session()->forget('email');
            // $request->session()->flush();
            return redirect('/');
        }
    }



}
