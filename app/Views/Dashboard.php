<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      transition: background-color 0.3s;
    }
    .dashboard-container {
      max-width: 800px;
      margin: 40px auto;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 30px;
      text-align: center;
      animation: fadeIn 0.5s ease;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .profile-picture {
      width: 150px;
      height: 150px;
      margin-bottom: 20px;
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid #007bff;
      transition: transform 0.3s;
    }
    .profile-picture:hover {
      transform: scale(1.05);
    }
    .user-info {
      margin-bottom: 40px;
    }
    .user-info h1 {
      font-size: 28px;
      margin-bottom: 10px;
    }
    .user-info p {
      color: #777;
      font-size: 18px;
    }
    .btn-update, .btn-change, .btn-password, .btn-logout {
      border: none;
      border-radius: 50px;
      padding: 12px 30px;
      font-weight: bold;
      transition: all 0.3s ease;
      margin: 10px 0;
      box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
    }
    .btn-update {
      background-color: #007bff;
      color: white;
    }
    .btn-update:hover {
      background-color: #0056b3;
      box-shadow: 0 8px 16px rgba(0, 123, 255, 0.3);
      transform: translateY(-2px);
    }
    .btn-change {
      background-color: #28a745;
      color: white;
    }
    .btn-change:hover {
      background-color: #218838;
      box-shadow: 0 8px 16px rgba(40, 167, 69, 0.3);
      transform: translateY(-2px);
    }
    .btn-password {
      background-color: #ffc107;
      color: white;
    }
    .btn-password:hover {
      background-color: #e0a800;
      box-shadow: 0 8px 16px rgba(255, 193, 7, 0.3);
      transform: translateY(-2px);
    }
    .btn-logout {
      background-color: #dc3545;
      color: white;
    }
    .btn-logout:hover {
      background-color: #c82333;
      box-shadow: 0 8px 16px rgba(220, 53, 69, 0.3);
      transform: translateY(-2px);
    }
    .top-right {
      position: absolute;
      top: 20px;
      right: 20px;
    }
    .dark-mode {
      background-color: #333;
    }
    .dark-mode .dashboard-container {
      background-color: #444;
      color: #fff;
    }
    .dark-mode .user-info p {
      color: #ccc;
    }
    .dark-mode .btn-update {
      background-color: #28a745;
    }
    .dark-mode .btn-update:hover {
      background-color: #218838;
    }
    .dark-mode .btn-change {
      background-color: #007bff;
    }
    .dark-mode .btn-change:hover {
      background-color: #0056b3;
    }
    .dark-mode .btn-password {
      background-color: #ffc107;
    }
    .dark-mode .btn-password:hover {
      background-color: #e0a800;
    }
    .dark-mode .btn-logout {
      background-color: #dc3545;
    }
    .dark-mode .btn-logout:hover {
      background-color: #c82333;
    }
  </style>
</head>
<body>
  <div class="top-right">
    <a href="/update" class="btn btn-update">Update Profile</a>
  </div>
  <div class="dashboard-container">
    <div class="user-info">
      <img src="/uploads/<?php if(isset($result['profile_photo']) && $result['profile_photo'] != ''){ echo $result['profile_photo']; } else { echo 'default.jpg'; } ?>" alt="Profile Picture" class="profile-picture">
      <h1>Welcome, <?php if(isset($result['fname'])){ echo $result['fname']; } ?></h1>
      <p>We are glad to see you here.</p>
    </div>
    <div class="profile-actions">
      <a href="/uploadphoto" class="btn btn-change">Change Profile Photo</a>
      <a href="/changepass" class="btn btn-password">Change Password</a>
      <a href="/logout" class="btn btn-logout">Logout</a>
    </div>
  </div>
  <script>
    const currentTheme = localStorage.getItem('theme') || 'dark';
    const body = document.body;
    if (currentTheme === 'light') {
      body.classList.remove('dark-mode');
    } else {
      body.classList.add('dark-mode');
    }
    const toggleDarkMode = () => {
      if (body.classList.contains('dark-mode')) {
        body.classList.remove('dark-mode');
        localStorage.setItem('theme', 'light');
      } else {
        body.classList.add('dark-mode');
        localStorage.setItem('theme', 'dark');
      }
    };
  </script>
</body>
</html>
