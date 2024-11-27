<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #3a3a3a;
        }

        header {
            background-color: #3a3a3a;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        a {
            color: white;
            margin-left: 1rem;
            text-decoration: none;
        }

        .nav-bar {
            background-color: rgb(25, 25, 25);
            width: 100%;
            height: 4rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            position: fixed;
            top: 0;
            padding-right: 1rem;
            z-index: 100;
            transition: ease 0.3s;
        }

        .logo-icon {
            display: inline-block;
            height: auto;
            margin-left: 2rem;
            font-size: 1.3rem;
            transition: 0.3s ease-in-out;
        }

        .profile-container {
            position: relative;
            display: inline-block;
        }

        .profile-icon {
            cursor: pointer;
            color: white;
            margin-right: 30px;
        }

        .service-container {
            background-color: transparent;
            padding: 40px;
            min-height: calc(100vh - 84px);
            position: relative;
            margin-top: 84px;
            color: white;
        }

        .service-type {
            font-size: 48px;
            font-weight: 900;
            margin-bottom: 30px;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            color: white;
        }

        .price-box {
            background-color: #444;
            padding: 15px;
            font-size: 24px;
            font-weight: bold;
            color: white;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        .price-box:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .jobs-box {
            font-size: 24px;
            background-color: #444;
            width: 50vw;
            padding: 15px;
            min-height: 60px;
            border-radius: 5px;
            color: white;
        }

        .description-box {
            background-color: #444;
            padding: 20px;
            color: white;
            font-size: 18px;
            line-height: 1.5;
            border-radius: 5px;
            margin-bottom: 30px;
        }

        .request-form {
            background-color: #444;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 30px;
        }

        .input-field {
            width: 100%;
            font-size: 16px;
            padding: 12px;
            margin: 10px 0;
            background-color: #2a2a2a;
            border: 1px solid white;
            color: white;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .input-field:focus {
            outline: none;
            border-color: white;
            box-shadow: 0 0 5px white;
        }

        .input-field::placeholder {
            color: #888;
        }

        .price-input {
            width: 200px;
        }
        .profile-circle {
            width: 200px;
            height: 200px;
            background-color: #444;
            border: 3px solid white;
            border-radius: 50%;
            position: relative;
            top: 50px;
            left: 40px;
            transition: transform 0.3s ease;
            cursor: pointer;
            overflow: hidden;
        }

        .profile-circle:hover {
            transform: scale(1.05);
        }

        .button {
            background-color: #ef5350;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        .button:hover {
            background-color: #d32f2f;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .view-profile-btn {
            position: relative;
            left: 65px;
            top: 80px;
        }

        .submit-request-btn {
            margin-top: 20px;
        }

        .sub-menu-wrap {
            position: absolute;
            top: 180%;
            right: 0;
            width: 320px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s;
            background-color: #2a2a2a;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .sub-menu-wrap.open {
            max-height: 400px;
        }

        .sub-menu {
            padding: 20px;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .user-menu img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        .sub-menu hr {
            border: none;
            border-top: 1px solid #444;
            margin: 15px 0;
        }

        .sub-menu-link {
            display: flex;
            align-items: center;
            color: white;
            padding: 10px;
            transition: background-color 0.3s ease;
            border-radius: 4px;
        }

        .sub-menu-link:hover {
            background-color: #444;
        }

        .sub-menu-link img {
            width: 40px;
            height: 40px;
            margin-right: 15px;
            border-radius: 50%;
        }

        .sub-menu-link span {
            margin-left: auto;
            transition: transform 0.3s ease;
        }

        .sub-menu-link:hover span {
            transform: translateX(5px);
        }
    </style>
</head>
<body>
    <header>
        <div class="nav-bar">
            <a href="/main">
                <b class="logo-icon">FREEW</b>
            </a>
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
    </header>
    <div class="profile-circle"></div>
    <button class="button view-profile-btn" onclick="window.location.href='/profile/<?=$request['Buying_ID']?>'">VIEW PROFILE</button>

    <div class="service-container">
        <h1 class="service-type"><?=$request['Title']?></h1>
        
        <div class="info-grid">
            <div class="price-section">
                <h2 class="section-title">Budget</h2>
                <div class="price-box">RP. <?= number_format($request['Min_budget'], 0, ',', '.') ?>,00 - <?= number_format($request['Max_budget'], 0, ',', '.') ?>,00</div>
            </div>

            <div class="price-section">
                <h2 class="section-title">Jobs Requirement</h2>
                <div class="price-box"><?=$request['Job_requirement']?></h1></div>
            </div>
        </div>

        <div class="description-section">
            <h2 class="section-title">DESCRIPTION</h2>
            <div class="description-box">
                <?=$request['description_request']?>
            </div>
        </div>

        <div class="request-section">
            <h2 class="section-title">OFFERS YOUR SERVICE</h2>
            <form class="request-form" action="/request/<?=$request['Request_ID']?>" method="POST">
                <textarea 
                    class="input-field" 
                    name="requestoffer"
                    rows="4" 
                    placeholder="Type your request here..."
                    required></textarea><br><br>
                
                <h2 class="section-title">OFFERS PRICE</h2>
                <input 
                    type="number" 
                    name="offerprice"
                    class="input-field price-input" 
                    placeholder="RP. 0,00"
                    required></input>
                <br>
                <button type="submit" class="button submit-request-btn">OFFER PRICE</button>
            </form>
        </div>
    </div>

    <script>        
        let lastScrollTop = 0;
        const navBar = document.querySelector('.nav-bar');
        const navHeight = navBar.offsetHeight;
        let currentOffset = 0; 

        navBar.style.position = 'fixed';

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

            if (currentScroll > lastScrollTop) {
                currentOffset = Math.min(currentOffset + (currentScroll - lastScrollTop), navHeight);
            } else if (currentScroll < lastScrollTop) {
                currentOffset = Math.max(currentOffset - (lastScrollTop - currentScroll), 0);
            }

            navBar.style.top = `-${currentOffset}px`;
            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; 
        });

        const subMenu = document.getElementById("subMenu");
        const profileIcon = document.querySelector(".profile-icon");

        function toggleMenu(event) {
            subMenu.classList.toggle("open");
            event.stopPropagation();
        }

        document.addEventListener("click", function(event) {
            if (!profileIcon.contains(event.target) && !subMenu.contains(event.target)) {
                subMenu.classList.remove("open");
            }
        });
    </script>
</body>
</html>