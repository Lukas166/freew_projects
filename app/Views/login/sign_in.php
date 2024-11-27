<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="css/sign_in.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="nav-bar">
        <a href="/main">
            <b class="logo-icon">FREEW</b>
        </a>
        <div class="menu">
            <a href="/services" style="color: white;" class="create-account">SERVICES</a>
            <a href="/main#expandGallery" style="color: white;" class="create-account">ABOUT US</a>
        </div>
    </div>
    <div class="container-signIn">
        <img src="image/bg-sign_in.jpg" alt="Background" loading="lazy" class="background-image">
        <div class="container-small">
            <h1 class="welcome-text">FREEW</h1>
            <p>Welcome back!</p><br>
            <i>Sign In</i>
            <form action="/login" method="POST" >
                <div class="password-container">
                    <input type="text" placeholder="Username" name="username" id="username" required>
                </div>
                <span id="inputError" class="error-message"></span>
                <div class="password-container">
                    <input type="password" placeholder="Password" name="password" id="password" required>
                    <i class="fa fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                </div>
                <span id="passError" class="error-message"></span>
                <button type="submit" class="login-button" disabled>Login</button>
            </form>
            <p>Or</p>
            <a href="/register" class="create-account">Create an account</a>
        </div>
    </div>

    <script src="js/script_signIn.js"></script>
</body>
</html>
