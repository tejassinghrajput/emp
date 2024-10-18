<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
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
    .password-container {
      background-color: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
    }
    .password-container h2 {
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
    .btn-change {
      background-color: #28a745;
      color: white;
      border: none;
    }
    .btn-change:hover {
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
    .message {
      color: #dc3545;
      background-color: #f8d7da;
      padding: 10px;
      border: 1px solid #f5c6cb;
      border-radius: 5px;
      margin-top: 10px;
      text-align: center;
    }
    .dark-mode {
      background-color: #333;
      color: #fff;
    }
    .dark-mode .password-container {
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
    .dark-mode .btn-change {
      background-color: #28a745;
    }
    .dark-mode .btn-change:hover {
      background-color: #218838;
    }
    .dark-mode .btn-back {
      background-color: #dc3545;
    }
    .dark-mode .btn-back:hover {
      background-color: #c82333;
    }
  </style>
</head>

<?php
$oldpasserror = "";
$newpasserror = "";
$confirmpasserror = "";

if (isset($oldpassx)) {
  $oldpasserror = $oldpassx;
}
if (isset($newpassx)) {
  $newpasserror = $newpassx;
}
if (isset($confirmpassx)) {
  $confirmpasserror = $confirmpassx;
}
?>

<body>
  <div class="password-container">
    <h2>Change Password</h2>
    <form method="POST" action="/change/password">
      <span style="color:red;"><?php echo $oldpasserror; ?></span>
      <input type="password" class="form-control" name="old_password" placeholder="Old Password">
      
      <span style="color:red;"><?php echo $newpasserror; ?></span>
      <input type="password" class="form-control" name="new_password" placeholder="New Password">
      
      <span style="color:red;"><?php echo $confirmpasserror; ?></span>
      <input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password">
      
      <span><?php if (isset($message)) { echo $message; } ?></span>
      <button type="submit" class="btn btn-change btn-custom">Change Password</button>
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
