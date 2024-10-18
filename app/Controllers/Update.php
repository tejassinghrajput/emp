<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Update extends BaseController{
    public function view(){
        if(!session()->get('id')){
             return redirect()->to('/login');
        }
        $id=session()->get('id');
        $db=\Config\Database::connect();
        $sql="SELECT * FROM users WHERE id='$id'";
        $query=$db->query($sql);
        $result=$query->getRowArray();
        if($result){
        return view("Update",$result);
        }
        else{
            $data['message']="Unable to fetch data";
            return view("Update",$data);
        }
    }
    public function update(){
        if(!session()->get('id')){
            return redirect()->to('/login');
       }
        $id=session()->get('id');
        $db=\Config\Database::connect();
        $fname=$this->request->getPost('fname');
        $lname=$this->request->getPost('lname');
        $email=$this->request->getPost('email');
        $gender=$this->request->getPost('gender');
        $dob=$this->request->getPost('dob');
        $obj=new Validupdate($fname,$lname,$email,$gender,$dob);
        $validate=$obj->valid();
        if (!empty($validate)) {
            $validate['id'] = $id;
            $validate['message'] = "Please enter correct information.";
            $validate['fname'] = $fname;
            $validate['lname'] = $lname;
            $validate['email'] = $email;
            $validate['gender'] = $gender;
            $validate['dob'] = $dob;
            return view("Update", $validate);
        }
        $checkemail = $db->query("SELECT * FROM users WHERE email = ? AND id != ?", [$email, $id]);
        if($checkemail->getRowArray()){
            $result=$checkemail->getRowArray();
            $result['message']="Email already exists.";
            return view("Update",$result);
        }
        $sql="UPDATE users SET fname='$fname',lname='$lname',email='$email',dob='$dob',gender='$gender' WHERE id='$id'";
        $query=$db->query($sql);
        if($query){
            $sql1="SELECT* FROM users WHERE id='$id'";
            $query1=$db->query($sql1);
            $result=$query1->getRowArray();
            $result['message']="Data updated Successfully.";
            return view("Update",$result);
        }
        else{
            $data['message']="Unable to update data";
            return view("Update",$data);
        }
    }
    public function dashboard(){
        if(!session()->get('id')){
            return redirect()->to('/login');
        }
        $id=session()->get('id');
        $db= \Config\Database::connect();
        $query=$db->query("SELECT * FROM users WHERE id = ?",[$id]);
        $result=$query->getRowArray();
        return view("dashboard",['result'=>$result]);
    }
    public function logout(){
        session()->destroy();
        return redirect()->to('/login');
    }
    public function photo() {
        if(!session()->get('id')){
            return redirect()->to('/login');
        }
        $id=session()->get('id');
        $db = \Config\Database::connect();
        $file = $this->request->getFile('profile_photo');
        $uploadPath = FCPATH . 'uploads/';
    
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $extension = $file->getExtension();  
            if (in_array($extension, ['jpeg', 'jpg'])) {
                $newname = $file->getRandomName();
                if ($file->move($uploadPath, $newname)) {
                    $sql = "UPDATE users SET profile_photo = ? WHERE id = ?";
                    $db->query($sql, [$newname, $id]);
                }
            }
        }
        return redirect()->to("/dashboard");
    }    
    public function changepass(){
        if(!session()->get('id')){
            return redirect()->to('/login');
        }
        return view("changepass");
    }
    public function pass() {
        if(!session()->get('id')){
            return redirect()->to('/login');
        }
        $id = session()->get('id');
        $oldpass = $this->request->getPost('old_password');
        $newpass = $this->request->getPost('new_password');
        $newpass1 = $this->request->getPost('confirm_password');
        
        if ($newpass == $newpass1) {
            $db = \Config\Database::connect();
            $query = $db->query("SELECT * FROM users WHERE id = ?", [$id]);
            $result = $query->getRowArray();
            
            if ($oldpass == $result['password']) {
                $previousPasswords = json_decode($result['previous_passwords'], true) ?: [];
                if (in_array($newpass, $previousPasswords)) {
                    $result['message'] = "Cannot use recent passwords.";
                    return view("/changepass", $result);
                }
                if (count($previousPasswords) >= 3) {
                    array_shift($previousPasswords);
                }
                $previousPasswords[] = $newpass;
                $updatequery = $db->query("UPDATE users SET password = ?, previous_passwords = ? WHERE id = ?", [
                    $newpass,
                    json_encode($previousPasswords),
                    $id
                ]);
                if ($updatequery) {
                    $result['message'] = "Password changed successfully.";
                } else {
                    $result['message'] = "Unable to change password.";
                }
            } else {
                $result['message'] = "Invalid old password.";
            }
        } else {
            $result['message'] = "New password and confirm password do not match.";
        }
        return view("/changepass", $result);
    }    
}