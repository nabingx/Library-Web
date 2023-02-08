<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="Admin/Css/admin_login.css">
</head>
<body>

    <div class="container">
        <form action="">
            <h1>Sign up</h1>
        <div class="form-control">
            <input id="username" type="text" class="username" placeholder="Username">
            <small class="notShow">Username is required</small>
            <!-- <script>showSucceed(document.querySelector("#username"))</script> -->
            <span></span>
        </div>
        <div class="form-control">
            <input id="email" type="email" class="email" placeholder="Email">
            <small class="notShow">Email is required</small>
            <!-- <script>showSucceed(document.querySelector("#email"))</script> -->
            <span></span>
        </div>
        <div class="form-control">
            <input id="password" type="password" class="Password" placeholder="Password">
            <small class="notShow">Password is required</small>
            <!-- <script>showSucceed(document.querySelector("#password"))</script> -->
            <span></span>
        </div>
        <div class="form-control">
            <input id="confirm-password" type="password" class="confirm-password" placeholder="Confirm password">
            <small class="notShow">Confirm password is required</small>
            <!-- <script>showSucceed(document.querySelector("#confirm-password"))</script> -->
            <span></span>
        </div>
        <div class="form-control">
            <input id="tele" type="text" class="phoneNumber" placeholder="Telephone">
            <small class="notShow">Telephone is required</small>
            <!-- <script>showSucceed(document.querySelector("#phoneNumber"))</script> -->
            <span></span>
        </div>
        <div class="form-control">
            <input id="addr" type="text" class="addr" placeholder="Address">
            <small class="notShow">Address is required</small>
            <!-- <script>showSucceed(document.querySelector("#addr"))</script> -->
            <span></span>
        </div>
        <button type="submit" class="btn-submit">Register</button>
        <div class="signup-link">
            Already have an account? <a href="user_login.php"#>Sign in</a>
        </div>
        </form>
    </div>
</body>
<script src="Controller/register_controller.js"></script>
</html>