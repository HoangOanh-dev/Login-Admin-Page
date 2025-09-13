<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to right, #dbeafe, #e0f2fe);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      width: 350px;
      box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
    }

    .container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .container input, .container select {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .container button {
      width: 100%;
      padding: 10px;
      background: #3b82f6;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    .container button:hover {
      background: #2563eb;
    }

    .container p {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }

    .container p a {
      text-decoration: none;
      color: #3b82f6;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Register</h2>
    <form action="register.php" method="POST">
      <input type="text" name="fullname" placeholder="John Doe" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <select name="role" required>
        <option value="">-- Select Role --</option>
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>
      <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
  </div>
</body>
</html>