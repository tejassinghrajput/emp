<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: 'Arial', sans-serif;
      transition: background-color 0.3s;
    }
    .login-container {
      background: linear-gradient(135deg, #fff, #99ccff); /* More solid blue */
      color: #333;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
      animation: fadeIn 1s;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .form-control {
      padding: 12px 20px;
      border-radius: 10px;
      border: none;
      margin-bottom: 20px;
      transition: border-color 0.3s, box-shadow 0.3s;
      background-color: #f0f8ff;
      color: #333;
    }
    .form-control:focus {
      box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
      outline: none;
      border: 1px solid #007bff;
    }
    .btn-custom {
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 10px;
      padding: 12px;
      width: 100%;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.3s;
    }
    .btn-custom:hover {
      background-color: #0056b3;
      transform: scale(1.05);
    }
    .form-footer {
      text-align: center;
      margin-top: 20px;
    }
    .form-footer a {
      color: #007bff;
      text-decoration: none;
      transition: color 0.3s;
    }
    .form-footer a:hover {
      color: #0056b3;
    }
    .loading-spinner {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border: 8px solid rgba(0, 123, 255, 0.3);
      border-top: 8px solid #007bff;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      animation: spin 1s linear infinite;
    }
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    .error-message {
      color: #ffcccc;
      text-align: center;
      margin-top: 10px;
    }
    .dark-mode {
      background-color: #333;
    }
    .dark-mode .login-container {
      background: linear-gradient(135deg, #444, #222);
      color: #fff;
    }
    .dark-mode .form-control {
      background-color: #555;
      color: #fff;
      border: 1px solid #777;
    }
    .dark-mode .form-control:focus {
      border-color: #ffc107;
    }
    .dark-mode .btn-custom {
      background-color: #28a745;
    }
    .dark-mode .btn-custom:hover {
      background-color: #218838;
    }
  </style>
</head>
<?php
$x = "";
if (isset($message)) {
  $x = $message;
}
?>
<body id="body" class="dark-mode">
  <div class="login-container">
    <h2>Login</h2>
    <form id="loginForm" method="POST" action="dashboard">
      <input type="email" class="form-control" placeholder="Email" name="email" required>
      <input type="password" class="form-control" placeholder="Password" name="password" required>
      <button type="submit" class="btn btn-custom">Login</button>
    </form>
    <div class="form-footer">
      <p>Don't have an account? <a href="signup">Sign Up</a></p>
    </div>
    <div class="error-message">
      <span><?php echo $x; ?></span>
    </div>
  </div>
  <div class="loading-spinner" id="loadingSpinner"></div>
  <label class="switch" style="position: absolute; top: 20px; right: 20px;">
    <input type="checkbox" id="darkModeToggle" checked>
    <span class="slider round"></span>
    <i id="modeIcon" class="fas fa-moon" style="position: absolute; top: 5px; left: -40px; color: #ffc107;"></i>
  </label>
  <script>
    const currentTheme = localStorage.getItem('theme') || 'dark';
    const body = document.getElementById('body');
    const toggleSwitch = document.getElementById('darkModeToggle');
    const modeIcon = document.getElementById('modeIcon');
    if (currentTheme === 'light') {
      body.classList.remove('dark-mode');
      toggleSwitch.checked = false;
      modeIcon.classList.remove('fa-moon');
      modeIcon.classList.add('fa-sun');
      modeIcon.style.color = "#ffc107";
    }
    document.getElementById('loginForm').addEventListener('submit', function() {
      document.getElementById('loadingSpinner').style.display = 'block';
    });
    toggleSwitch.addEventListener('change', function() {
      if (this.checked) {
        body.classList.add('dark-mode');
        localStorage.setItem('theme', 'dark');
        modeIcon.classList.remove('fa-sun');
        modeIcon.classList.add('fa-moon');
        modeIcon.style.color = "#ffc107";
      } else {
        body.classList.remove('dark-mode');
        localStorage.setItem('theme', 'light');
        modeIcon.classList.remove('fa-moon');
        modeIcon.classList.add('fa-sun');
        modeIcon.style.color = "#ffc107";
      }
    });
  </script>
  <style>
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }
    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      transition: .4s;
      border-radius: 34px;
    }
    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      transition: .4s;
      border-radius: 50%;
    }
    input:checked + .slider {
      background-color: #007bff;
    }
    input:checked + .slider:before {
      transform: translateX(26px);
    }
  </style>
</body>
</html>
