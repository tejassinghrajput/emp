<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class UserController extends BaseController{
    public function login(){
        if (session()->get('id')){
            return redirect()->to('/dashboard');
        }
        return view("Login");
    }
    public function signup(){
        if (session()->get('id')){
            return redirect()->to('/dashboard');
        }
        return view("Signup");
    }
    public function admin(){
        if (session()->get('id')){
            return redirect()->to('/dashboard');
        }
        return view("Admin");
    }
    public function dashboard(){
        return view("Dashboard");
    }
    public function upload(){
        $id=session()->get('id');
        return view("Uploadphoto");
    }
}