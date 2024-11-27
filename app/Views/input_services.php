<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <style>
        body {
            background-image: url('/image/imgServiceInput/img1.png');
            margin: 0;
            padding: 0;
            overflow: hidden;
            position: relative;
            height: 100vh;
        }
        
        @keyframes moveBackground {
            0% { background-position: 0% 0%;}  
            50% { background-position: 100% 0%;}
            100% { background-position: 0% 0%;}
        }
        
        @keyframes zoomIn {
            0% {
                background-size: 110%;
            }
            100% {
                background-size: 130%;
            }
        }
        
        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            animation: zoomIn 100s linear infinite, moveBackground 30s linear infinite;
            z-index: -1;
            transition: opacity 1s ease-in-out;
        }
        
        .background.fade-out {
            opacity: 0;
        }
        
        .logo-icon {
            display: inline-block;
            height: auto;
            margin-left: 2rem;
            font-size: 1.5rem;
            transition: transform 0.3s ease-in-out;
            text-decoration: none;
        }
        
        .logo-icon:hover {
            transform: scale(1.1);
        }
        
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 90vh;
            opacity: 100%;
        }
        
        .form-container {
            background-color: rgb(15, 15, 15);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            width: 450px;
            opacity: 80%;
            position: relative;
            transition: ease 0.5s;
        }
        
        .form-container:hover {
            background-color: rgb(15, 15, 15);
            opacity: 95%;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #555;
            color: white;
            transition: background-color 0.3s ease;
        }
        
        .form-group input:focus {
            background-color: #666;
            outline: none;
            transform: scale(1.02);
        }
        
        .form-group textarea {
            resize: none;
        }
        
        .submit-btn {
            background-color: white;
            color: black;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        
        .submit-btn:hover {
            background-color: grey; 
        }
        
        .back-btn {
            position: absolute;
            margin-left: 2rem;
            margin-top: 30px;
            background-color: transparent;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.5s ease;
        }
        
        .back-btn:hover {
            background-color: #dcdbdb;
            transform: scale(1.02);
        }

        .popup-notification {
            visibility: hidden;
            position: fixed;
            top: 80px;
            right: 20px;
            background-color: #ffffff;
            border-left: 4px solid #4CAF50;
            padding: 16px 24px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            display: flex;
            align-items: center;
            gap: 12px;
            transform: translateX(100%);
            transition: all 0.3s ease-in-out;
        }

        .popup-notification.show {
            visibility: visible;
            transform: translateX(0);
        }

        .popup-notification i {
            color: #55a858;
            font-size: 20px;
        }

        .popup-notification span {
            color: #333;
            font-weight: 500;
        }
    </style>
</head>
<body>

<div class="background" id="background"></div>

<header>
    <div class="nav-bar">
        <a href="/main">
            <b class="logo-icon">FREEW</b>
        </a>
        <div class="menu" style="width:100%; display: flex; justify-content:right; align-items:center;">
            <div class="menu">
                <a href="/services" class="line-animation" style="margin-right: 4rem;">SERVICES</a>
                <?php if (isset($_COOKIE['username'])): ?>   
                    <div class="profile-container">
                        <i class="fa-solid fa-user profile-icon" onclick="toggleMenu(event)"></i>
                        <div class="sub-menu-wrap" id="subMenu">
                            <div class="sub-menu" >
                                <div class="user-menu">
                                    <img src="<?= base_url('image/Profile/user.png'); ?>" alt="Profile Image">
                                    <a href="#profile" style="font-size: 30px"><?= $_COOKIE['username'] ?></a>
                                </div>
                                <hr>
                                <a href="/profile/edit/<?= $_COOKIE['userid'] ?>" class="sub-menu-link">
                                    <img src="<?= base_url('image/Profile/profile.png'); ?>">
                                    <p>Edit Profile</p>
                                    <span> > </span>   
                                </a>
                                <a href="/logout" class="sub-menu-link">
                                    <img src="<?= base_url('image/Profile/logout.png'); ?>">
                                    <p>Logout</p>
                                    <span> > </span>  
                                </a>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="/login" style="color: black; background-color: #fefefe; border-radius: 10px; padding: 10px;" class="line-animation">SIGN IN</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
<button type="button" class="back-btn" onclick="javascript:history.back()"><i class="fa-solid fa-share fa-flip-horizontal fa-2xl" style="color: #ffffff;"></i></button>

<div class="container">
    <div class="form-container">
        <form action="/services/input" method="POST">
            <div class="form-group">
                <label for="serviceType">Service Type:</label>
                <input type="text" id="serviceType" name="serviceType" required onfocus="animateInput(this)" onblur="resetInput(this)">
            </div><br>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required>
            </div><br>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required></textarea>
            </div><br>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
</div>

<script src="/js/script_main.js"></script>
<script>
    const images = [
        '/image/imgServiceInput/img1.png',
        '/image/imgServiceInput/img4.png',
        '/image/imgServiceInput/img2.png',
        '/image/imgServiceInput/img3.png',
    ];

    let currentIndex = 0;

    function changeBackground() {
        const background = document.getElementById('background');
        background.classList.add('fade-out');
        setTimeout(() => {
            currentIndex = (currentIndex + 1) % images.length;
            background.style.backgroundImage = `url(${images[currentIndex]})`;
            background.classList.remove('fade-out');
        }, 800);
    }

    setInterval(changeBackground, 15000);
    changeBackground();

    function animateInput(input) {
        input.style.transition = "transform 0.3s ease";
        input.style.transform = "scale(1.02)";
    }

    function resetInput(input) {
        input.style.transform = "scale(1)";
    }
</script>

</body>
</html>