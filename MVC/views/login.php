
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./public/css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

    <div class="container">
        <div class="title">
          <p>Sign In</p>
        </div>
<form class="form">
<div class="error-login"></div>
<div class="field">
   
    <input type="email" name="user"required placeholder="" class="email-login">
  
    <span></span>
    <label for="">UserName<i class="fa fa-user-o" aria-hidden="true"></i> </label>  
</div>
<div class="field">
    <input type="password" name="password" autocomplete="on" required class="pass-login">
    <span></span>
    <label for="">Password<i class="fa fa-lock" aria-hidden="true"></i> </label>
</div>
<div class="loginform">
    <input name="login" type="button" value="Login" class="Login">
</div>
<div class="Signup">
    Don't have account?<a class="signup-btn">Sign Up</a>
</div>
</form>
    </div>

    <div class="singupp">
<div class="signup-form">
<form>
    <div class="error-regis"></div>
<div class="title">
        Sign Up
    </div>
    <div class="enterhere">
        <div class="username add">
<span class="email-title">Email: </span><input type="email" name="email-title" id="email-title">
        </div>
        <div class="password add">
           <span class="pass-title">Password:</span> <input type="password" name="pass-title" id="pass-title" autocomplete="on">
        </div>
        <div class="FullName add">
<span class="fullname-title">FullName</span> <input name="fullname-title" type="text" id="fullname-title">
        </div>
        <div class="Address add">
<span class="Address-title">Address:</span> <input type="text" name="Address-title" id="Address-title">
        </div>
        <div class="Phonenumber add">
<span class="phonenumber-title">
PhoneNumber:
</span> <input type="text" id="phonenumber-title">
        </div>
        <div class="Image add">
           <span class="image-title"> Image:</span> <div class="border-img">
           <input type="file" name="file" id="image-title" onchange="loadFile(event)">
           <img id="preview" alt="">
           </div>
        </div>
    </div>
    <button class="singup-btn">Sign Up</button>
    <div class="already">
        Already account? <span class="Loginnow">Login now</span>
    </div>
</form>
</div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="./public/js/login.js"></script>

</body>
</html>     