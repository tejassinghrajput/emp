<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f0f2f5;
    }
    .dashboard-container {
      margin: 40px;
      animation: fadeIn 0.5s ease;
    }
    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .card-body {
      padding: 30px;
    }
    .card-title {
      font-weight: bold;
    }
    .table-container {
      margin-top: 40px;
    }
    table {
      width: 100%;
    }
    th, td {
      padding: 12px;
      text-align: center;
    }
    .btn-edit, .btn-delete {
      border: none;
      border-radius: 8px;
      padding: 5px 10px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .btn-edit {
      background-color: #ffc107;
      color: white;
    }
    .btn-edit:hover {
      background-color: #e0a800;
    }
    .btn-delete {
      background-color: #dc3545;
      color: white;
    }
    .btn-delete:hover {
      background-color: #c82333;
    }
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

  <div class="dashboard-container">
    <h1 class="text-center">Admin Panel</h1>
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Number of Users</h5>
            <p class="card-text">200 Users</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Number of Admins</h5>
            <p class="card-text">10 Admins</p>
          </div>
        </div>
      </div>
    </div>

    <div class="table-container">
      <h3 class="text-center">Users and Admins</h3>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>John Doe</td>
            <td>johndoe@example.com</td>
            <td>User</td>
            <td>
              <button class="btn-edit">Edit</button>
              <button class="btn-delete">Delete</button>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Jane Smith</td>
            <td>janesmith@example.com</td>
            <td>Admin</td>
            <td>
              <button class="btn-edit">Edit</button>
              <button class="btn-delete">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
