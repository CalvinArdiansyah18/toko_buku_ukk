<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | BukaBuku</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="login-page">
  <div class="login-container">
    <div class="login-title text-center">
      <h2><span>Buka<strong> Buku</strong></span></h2>
    </div>
    <div class="login-content">
      <div class="login-header text-center">
        <h3><strong>Welcome Back!</strong></h3>
        <h5>Please log in to continue</h5>
      </div>
      <div class="login-body">
        <form role="form" action="login_process.php" method="post" class="login-form" onsubmit="return validateForm()">
          <div class="form-group">
            <div class="pos-r">
              <input id="form-username" type="text" name="username" placeholder="Username" class="form-control" required>
              <i class="fa fa-user"></i>
              <span></span>
            </div>
          </div>
          <div class="form-group">
            <div class="pos-r">
              <input id="form-password" type="password" name="password" placeholder="Password" class="form-control" required>
              <i class="fa fa-lock"></i>
              <span></span>
              <i class="fa fa-eye toggle-password" onclick="togglePasswordVisibility()"></i>
            </div>
          </div><br>
          <div class="form-group">
            <button type="submit" class="btn btn-primary form-control">Sign In</button>
          </div>
        </form>
        <div class="form-group text-center">
          <p>Don't have an account?</p>
          <a href="register.php" class="btn btn-secondary">Register</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Toggle password visibility
    function togglePasswordVisibility() {
      const passwordField = document.getElementById('form-password');
      const toggleIcon = document.querySelector('.toggle-password');
      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
      } else {
        passwordField.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
      }
    }

    // Validate form submission
    function validateForm() {
      const username = document.getElementById('form-username').value.trim();
      const password = document.getElementById('form-password').value.trim();

      if (!username || !password) {
        alert('Please fill in both username and password fields to log in.');
        return false; // Prevent form submission
      }
      return true; // Allow form submission
    }
  </script>
</body>

<style>
  body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(to bottom right, #6a11cb, #2575fc);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
  }

  .login-container {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    text-align: center;
    width: 100%;
    max-width: 400px;
  }

  .login-title span {
    font-size: 24px;
    font-weight: 600;
    text-transform: uppercase;
    color: #fff;
  }

  .login-title strong {
    color: #ffd700;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-control {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    border-radius: 10px;
    padding: 15px;
    font-size: 16px;
    color: #fff;
    width: 100%;
    box-sizing: border-box;
    outline: none;
    transition: background 0.3s ease, box-shadow 0.3s ease;
  }

  .form-control:focus {
    background: rgba(255, 255, 255, 0.3);
    box-shadow: 0 0 8px #ffd700;
  }

  .form-control+i {
    position: absolute;
    right: 15px;
    top: 18px;
    color: #ffd700;
    cursor: pointer;
  }

  .btn {
    background: linear-gradient(45deg, #ff6a00, #ee0979);
    border: none;
    border-radius: 10px;
    padding: 15px;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.3s ease;
  }

  .btn:hover {
    background: linear-gradient(45deg, #ee0979, #ff6a00);
    transform: scale(1.05);
  }

  .btn-secondary {
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid #ffd700;
    border-radius: 10px;
    padding: 10px;
    font-size: 14px;
    font-weight: bold;
    color: #ffd700;
    cursor: pointer;
    transition: background 0.3s ease, color 0.3s ease;
    display: inline-block;
    margin-top: 10px;
  }

  .btn-secondary:hover {
    background: #ffd700;
    color: #6a11cb;
  }

  .pos-r {
    position: relative;
  }

  .form-control~span {
    position: absolute;
    bottom: 0;
    left: 50%;
    height: 3px;
    width: 0;
    background: #ffd700;
    transition: width 0.4s ease, left 0.4s ease;
  }

  .form-control:focus~span {
    width: 100%;
    left: 0;
  }

  .login-header h3 {
    margin: 0 0 10px;
    font-size: 20px;
    font-weight: 600;
  }

  .login-header h5 {
    margin: 0;
    font-size: 14px;
    font-weight: 400;
  }

  .toggle-password {
    position: absolute;
    right: 45px;
    top: 18px;
    color: #ffd700;
    cursor: pointer;
  }
</style>

</html>