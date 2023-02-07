<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href= "Admin/Css/admin_login.css">
</head>
<body>

    <div class="container">
        <form action="">
            <h1>Login</h1>
        <div class="form-control">
            <input id="username" type="text" class="username" placeholder="Username">
            <small class="notShow">Username is required</small>
            <span></span>
        </div>
        <div class="form-control">
            <input id="password" type="password" class="password" placeholder="Password">
            <small class="notShow">Password is required</small>
            <span></span>
        </div>
        <button type="submit" class="btn-submit">Sign in</button>
        <div class="signup-link">
            Or Sign in as <a href="../Admin/admin_login.php"#>Admin</a>
        </div>
        <div class="signup-link">
            Not a member? <a href="user_register.php"#>Sign up</a> now!
        </div>
        </form>
    </div>
</body>
<script src= "Admin/Controller/login_control.js"></script>
</html>