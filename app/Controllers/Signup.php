<?php
namespace App\Controllers;
use App\Controllers\BaseController;
class Signup extends BaseController{
    protected $session;
    public function __construct(){
        $this->session = \Config\Services::session();
    }
    public function signup(){
        $fname=$this->request->getPost('fname') ?? null;
        $lname=$this->request->getPost('lname') ?? null;
        $dob=$this->request->getPost('dob') ?? null;
        $email=$this->request->getPost('email') ?? null;
        $password=$this->request->getPost('password') ?? null;
        $password1=$this->request->getPost('password2') ?? null;
        $gender=$this->request->getPost('gender') ?? null;
        $data=[];
        $db=\Config\Database::connect();
        $checkemail="SELECT * FROM users WHERE email = '$email'";
        if($checkemail && $email != ''){
            $data['message']="Email already exists.";
            return view("Login",$data);
        }
        $query="INSERT INTO users(fname,lname,dob,email,gender,password) VALUES('$fname','$lname','$dob','$email','$gender','$password')";
        $validate=new Valid($fname,$lname,$dob,$email,$gender,$password,$password1);
        $check=$validate->valid();
        if(empty($check)){
            if($password==$password1){
                $result=$db->query($query);
                if($result){
                    $data['message']="Registration successfull";
                    return view("Login",$data);
                }
                else{
                    $data['message']="Registration failed";
                    return view("Signup",$data);
                }
            }
            else{
                $data['message']="Passwords do not match";
                return view("Signup",$data);
            }
        }
        else{
            return view("Signup",$check);
        }
    }
}