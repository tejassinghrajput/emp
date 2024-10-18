<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Update</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      transition: background-color 0.3s, color 0.3s;
    }
    .update-container {
      background-color: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
    }
    .update-container h2 {
      margin-bottom: 30px;
      color: #333;
      font-weight: bold;
      text-align: center;
    }
    .form-control {
      padding: 12px 20px;
      border-radius: 8px;
      border: 1px solid #ddd;
      margin-bottom: 20px;
    }
    .form-control:focus {
      border-color: #28a745;
      box-shadow: 0 0 8px rgba(40, 167, 69, 0.3);
    }
    .btn-custom {
      border-radius: 8px;
      padding: 12px;
      width: 100%;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 10px;
    }
    .btn-update {
      background-color: #28a745;
      color: white;
      border: none;
    }
    .btn-update:hover {
      background-color: #218838;
    }
    .btn-back {
      background-color: #dc3545;
      color: white;
      border: none;
    }
    .btn-back:hover {
      background-color: #c82333;
    }
    .dark-mode {
      background-color: #333;
      color: #fff;
    }
    .dark-mode .update-container {
      background-color: #444;
    }
    .dark-mode .form-control {
      background-color: #555;
      color: #fff;
      border: 1px solid #777;
    }
    .dark-mode .form-control:focus {
      border-color: #28a745;
    }
    .dark-mode .btn-update {
      background-color: #28a745;
    }
    .dark-mode .btn-update:hover {
      background-color: #218838;
    }
    .dark-mode .btn-back {
      background-color: #dc3545;
    }
    .dark-mode .btn-back:hover {
      background-color: #c82333;
    }
    .message {
      color: #dc3545;
      background-color: #f8d7da;
      padding: 10px;
      border: 1px solid #f5c6cb;
      border-radius: 5px;
      margin-top: 10px;
      text-align: center;
    }

  </style>
</head>
<?php
$fname1="";
$lname1="";
$gender1="";
$dob1="";
$email1="";
$info="";
if(isset($fname)){
    $fname1=$fname;
}
if(isset($lname)){
    $lname1=$lname;
}
if(isset($dob)){
    $dob1=$dob;
}
if(isset($email)){
    $email1=$email;
}
if(isset($gender)){
    $gender1=$gender;
}
$fnamerror="";
$lnameerror="";
$gendererror="";
$doberror="";
$emailerror="";
if(isset($fnamex)){
  $fnamerror=$fnamex;
}
if(isset($lnamex)){
  $lnameerror=$lnamex;
}
if(isset($genderx)){
  $gendererror=$genderx;
}
if(isset($emailx)){
  $emailerror=$emailx;
}
if(isset($dobx)){
  $doberror=$dobx;
}
?>
<body>
  <div class="update-container">
    <h2>Update Profile</h2>
    <form method="POST" action="/update/user">
      <span style="color:red;"><?php echo $fnamerror; ?></span>
      <input type="text" class="form-control" name="fname" value="<?php echo $fname1; ?>">
      <span style="color:red;"><?php echo $lnameerror; ?></span>
      <input type="text" class="form-control" name="lname" value="<?php echo $lname1; ?>">
      <span style="color:red;"><?php echo $emailerror; ?></span>
      <input type="email" class="form-control" name="email" value="<?php echo $email1; ?>">
      <span style="color:red;"><?php echo $doberror; ?></span>
      <input type="date" class="form-control" name="dob" value="<?php echo $dob1; ?>">
      <span style="color:red;"><?php echo $gendererror; ?></span>
      <select class="form-control" name="gender">
        <option value="" disabled <?php if(!isset($gender1) || $gender1 == "") echo "selected"; ?>>Select Gender</option>
        <option value="male" <?php if(isset($gender1) && $gender1 == "male") echo "selected"; ?>>Male</option>
        <option value="female" <?php if(isset($gender1) && $gender1 == "female") echo "selected"; ?>>Female</option>
        <option value="other" <?php if(isset($gender1) && $gender1 == "other") echo "selected"; ?>>Other</option>
      </select>
      <span style="message"><?php if(isset($message)){ echo $message; }; ?></span>
      <button type="submit" class="btn btn-update btn-custom">Update</button>
      <a href="/dashboard/user" class="btn btn-back btn-custom">Go Back</a>
      
    </form>
  </div>
  <script>
    const currentTheme = localStorage.getItem('theme') || 'light';
    document.body.classList.toggle('dark-mode', currentTheme === 'dark');
    const toggleTheme = () => {
      document.body.classList.toggle('dark-mode');
      localStorage.setItem('theme', document.body.classList.contains('dark-mode') ? 'dark' : 'light');
    };
  </script>
</body>
</html>