<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 120vh;
      margin: 0;
      transition: background-color 0.3s;
    }
    .signup-container {
      background-color: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
      animation: fadeIn 0.5s ease;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .signup-container h2 {
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
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 12px;
      width: 100%;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .btn-custom:hover {
      background-color: #218838;
    }
    .form-footer {
      text-align: center;
      margin-top: 15px;
    }
    .form-footer a {
      color: #28a745;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    .form-footer a:hover {
      color: #218838;
    }
    .dark-mode {
      background-color: #333;
      color: #fff;
    }
    .dark-mode .signup-container {
      background-color: #444;
    }
    .dark-mode .message {
      color: white;
    }
    .message {
      color: black;
    }
  </style>
</head>
<body id="body" class="<?php echo (isset($_COOKIE['theme']) && $_COOKIE['theme'] == 'dark') ? 'dark-mode' : ''; ?>">
<?php
$fnamerror="";
$lnameerror="";
$gendererror="";
$doberror="";
$emailerror="";
$passworderror="";
$passwordderror="";
if(isset($fname)){
  $fnamerror=$fname;
}
if(isset($lname)){
  $lnameerror=$lname;
}
if(isset($gender)){
  $gendererror=$gender;
}
if(isset($email)){
  $emailerror=$email;
}
if(isset($dob)){
  $doberror=$dob;
}
if(isset($password)){
  $passworderror=$password;
}
if(isset($password1)){
  $passwordderror=$password1;
}
?>
  <div class="signup-container">
    <h2>Sign Up</h2>
    <form method="post" action="add">
      <span style="color:red;"><?php echo $fnamerror; ?></span>
      <input type="text" class="form-control" name="fname" placeholder="First Name">
      <span style="color:red;"><?php echo $lnameerror; ?></span>
      <input type="text" class="form-control" name="lname" placeholder="Last Name">
      <span style="color:red;"><?php echo $doberror; ?></span>
      <input type="date" class="form-control" name="dob" placeholder="Date of Birth">
      <span style="color:red;"><?php echo $emailerror; ?></span>
      <input type="text" class="form-control" name="email" placeholder="Email">
      <span style="color:red;"><?php echo $passworderror; ?></span>
      <input type="text" class="form-control" name="password" placeholder="Password">
      <span style="color:red;"><?php echo $passwordderror; ?></span>
      <input type="text" class="form-control" name="password2" placeholder="Confirm Password">
      <span style="color:red;"><?php echo $gendererror; ?></span>
      <select class="form-control" name="gender">
        <option value="" disabled selected>Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>
      <button type="submit" class="btn btn-custom">Sign Up</button>
    </form>
    <div class="form-footer">
      <p>Already have an account? <a href="login">Login</a></p>
    </div>
    <div>
      <span class="message"><?php if(isset($message)){ echo esc($message); } ?></span>
    </div>
  </div>
  <script>
    const currentTheme = localStorage.getItem('theme') || 'light';
    const body = document.getElementById('body');
    if (currentTheme === 'dark') {
      body.classList.add('dark-mode');
    }
  </script>
</body>
</html>
