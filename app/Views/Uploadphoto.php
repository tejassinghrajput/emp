<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Profile Photo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f0f2f5;
      font-family: Arial, sans-serif;
      transition: background-color 0.3s;
    }
    .upload-container {
      max-width: 500px;
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
    .btn-custom {
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 12px 20px;
      font-weight: bold;
      transition: all 0.3s ease;
    }
    .btn-custom:hover {
      background-color: #0056b3;
    }
    .file-input {
      margin: 20px 0;
    }
    .btn-back {
      background-color: #6c757d;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      margin-top: 20px;
      font-weight: bold;
      transition: all 0.3s ease;
    }
    .btn-back:hover {
      background-color: #5a6268;
    }
    .dark-mode {
      background-color: #333;
      color: #fff;
    }
    .dark-mode .upload-container {
      background-color: #444;
    }
    .dark-mode .btn-custom {
      background-color: #28a745;
    }
    .dark-mode .btn-back {
      background-color: #5a6268;
    }
  </style>
</head>
<?php
$x = "";
if (isset($message)) {
  $x = $message;
}
?>
<body id="body" class="<?php echo (isset($_COOKIE['theme']) && $_COOKIE['theme'] == 'dark') ? 'dark-mode' : ''; ?>">
  <div class="upload-container">
    <h1>Upload Profile Photo</h1>
    <p>Please upload a JPEG image for your profile picture.</p>
    <form action="/upload_photo" method="post" enctype="multipart/form-data">
      <input type="file" name="profile_photo" class="form-control file-input" accept=".jpeg, .jpg" required>
      <button type="submit" class="btn btn-custom">Upload Photo</button>
    </form>
    <?php if (isset($error)) { ?>
      <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
    <a href="/dashboard/user" class="btn btn-back">Go Back</a>
    <span><?php if(isset($result)){ echo $result; } ?></span>
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
