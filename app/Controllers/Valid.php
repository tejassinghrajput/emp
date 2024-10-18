<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Valid extends BaseController{
    public function __construct($fname,$lname,$dob,$email,$gender,$password,$password1){
        $this->fname=$fname;
        $this->lname=$lname;
        $this->dob=$dob;
        $this->email=$email;
        $this->gender=$gender;
        $this->password=$password;
        $this->password1=$password1;
    }
    public function valid(){
        $error=[];
        if (empty($this->fname)) {
            $error['fname'] = "Please enter First Name.";
        } elseif (preg_match('/\d/', $this->fname)) {
            $error['fname'] = "First Name cannot contain digits.";
        }
        if (empty($this->lname)) {
            $error['lname'] = "Please enter Last Name.";
        } elseif (preg_match('/\d/', $this->lname)) {
            $error['lname'] = "Last Name cannot contain digits.";
        }        
        if(empty($this->dob)){
            $error['dob']="Please enter your Dob.";
        }
        if(empty($this->email)){
            $error['email']="Please enter your email.";
        }
        if(empty($this->gender)){
            $error['gender']="Please enter your gender.";
        }
        if(empty($this->password)){
            $error['password']="Please enter your password.";
        }
        if(empty($this->password1)){
            $error['password1']="Please enter your password.";
        }
        if($this->dob=='0000-00-00'){
            $error['dob']="Please enter your dob in correct form.";
        }
        if(strlen($this->password)<3){
            $error['password']="Your password must be more than 3 digits.";
        }
        $pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
        if (!preg_match($pattern, $this->email)) {
            $error['email']="Please enter valid email";
        }
        return $error;
    }
}