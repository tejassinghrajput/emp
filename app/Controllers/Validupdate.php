<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Validupdate extends BaseController{
    public function __construct($fname,$lname,$email,$gender,$dob){
        $this->fname=$fname;
        $this->lname=$lname;
        $this->dob=$dob;
        $this->email=$email;
        $this->gender=$gender;
    }
    public function valid(){
        $error=[];
        if (empty($this->fname)) {
            $error['fnamex'] = "Please enter First Name.";
        } elseif (preg_match('/\d/', $this->fname)) {
            $error['fnamex'] = "First Name cannot contain digits.";
        }
        if (empty($this->lname)) {
            $error['lnamex'] = "Please enter Last Name.";
        } elseif (preg_match('/\d/', $this->lname)) {
            $error['lnamex'] = "Last Name cannot contain digits.";
        }        
        if(empty($this->dob)){
            $error['dobx']="Please enter your Dob.";
        }
        if(empty($this->email)){
            $error['emailx']="Please enter your email.";
        }
        if(empty($this->gender)){
            $error['genderx']="Please enter your gender.";
        }
        if($this->dob=='0000-00-00'){
            $error['dobx']="Please enter your dob in correct form.";
        }
        $pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
        if (!preg_match($pattern, $this->email)) {
            $error['emailx']="Please enter valid email";
        }
        return $error;
    }
}