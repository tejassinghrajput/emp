<?php
namespace App\Controllers;
use App\Controllers\BaseController;
class VerifyLogin extends BaseController{
    public function checklogin(){
        if ($this->request->getMethod()==="POST"){
            $email=$this->request->getPost('email');
            $password=$this->request->getPost('password');
            $db= \Config\Database::connect();
            $query=$db->query("SELECT * FROM users WHERE email = ?",[$email]);
            $result=$query->getRowArray();
            $data=[];
            if($result){
                if($password==$result['password']){
                    session()->set('id',$result['id']);
                    return view("dashboard",['result'=>$result]);
                }
                else{
                    $data['message']="Invalid password";
                    return view("Login",$data);
                }
            }
            else{
                $data['message']="Invalid email";
                return view("Login",$data);
            }
        }
        if (!session()->get("id")){
            return redirect()->to("/login");
        }
        $id=session()->get('id');
        $db=\Config\Database::connect();
        $query=$db->query("SELECT * FROM users WHERE id = ?",[$id]);
        $result=$query->getRowArray();
        return view("dashboard",['result'=>$result]);
    }
}