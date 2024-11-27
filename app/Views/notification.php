<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
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
            background- color: #3a3a3a;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        a {
            color: white;
            margin-left: 1rem;
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

        .notification-container {
            margin-top: 80px;
            padding: 20px;
            max-width: 90%;
            margin-left: auto;
            margin-right: auto;
        }

        .notification-card {
            background-color: rgb(25, 25, 25);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: ease-in-out 0.1s;
            color : white;
        }

        .notification-card:hover {
            transform: translateY(-5px);
        }

        .notification-header {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
            color : white;
        }

        .notification-subheader {
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .notification-description {
            color: white;
            margin-bottom: 15px;
        }

        .notification-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .button-container {
            display: flex;
            gap: 10px;
        }

        .accept-btn, .decline-btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .accept-btn {
            background-color: #ff7043;
            color: white;
        }

        .decline-btn {
            background-color: #ff7043;
            color: white;
        }

        .confirm-btn {
            padding: 10px;
            margin-left: 10px;
            border-radius: 20px;
            background-color: green;
            color: white;
        }

        .accept-btn:hover, .decline-btn:hover {
            background-color: #f4511e;
        }

        .price {
            font-weight: bold;
            color: white;
        }

        .status {
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: bold;
        }

        .status-accepted {
            background-color: #b2ff59;
            color: #333;
        }

        .status-waiting {
            background-color: #bdbdbd;
            color: #333;
        }

        .status-declined {
            background-color: #ff5252;
            color: white;
        }

        .view-profile-btn {
            height: 40px;
            padding: 4px 8px;
            background-color: #ff5252;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .view-profile-btn:hover {
            background-color: #ff1744;
        }

        .sub-menu-wrap {
            margin-top: 40px;
            display: none;
            position: absolute;
            right: 0;
            background-color: #fff;
            border-radius: 8px;
            z-index: -1;
            width: 320px;
            max-height: 0px;
            overflow: hidden;
            transition: max-height 0.5s, transform 0.3s ease;
            transform: scaleY(0);
        }

        .sub-menu-wrap.open-menu {
            display: block;
            max-height: 400px;
            transform: scaleY(1);
        }

        .sub-menu {
            padding: 10px;
            margin-right: -20px;
        }

        .user-menu {
            display: flex;
            align-items: center;
            text-align: center;
            margin-bottom: 10px;
        }

        .user-menu img {
            margin-left: 10px;
            margin-top: 5px;
            margin-right: 0;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            margin-bottom: 5px;
        }

        .sub-menu hr {
            border: 0;
            height: 3px;
            width: 93%;
            background: #ccc;
            margin: 15px 0 10px;
        }

        .sub-menu a {
            display: block;
            padding: 8px;
            text-decoration: none;
            color: #333;
            border-top: 1px solid #f1f1f1;
            text-align: center;
        }

        .sub-menu a:hover {
            background-color: #ffff;
            color: #1d1e1f;
            transform: translateX(5px);
            font-weight: bold;
        }

        .sub-menu .sub-menu-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #525252;
            margin: 12px 0;
        }

        .sub-menu .sub-menu-link p {
            width: 65%;
            transition: color 0.3s ease;
        }

        .sub-menu .sub-menu-link img {
            width: 40px;
            background: #e5e5e5;
            border-radius: 50%;
            padding: 8px;
            margin-right: 15px;
        }

        .menu a {
            font-size: 1rem;
            margin-left: 1rem;
            margin-right: 3rem;
        }

        .rating-container {
            margin-top: 10px;
            display: flex;
            gap: 5px;
        }
        .star {
            font-size: 30px;
            cursor: pointer;
            color: #ccc;
        }
        .star.selected {
            color: gold;
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
                                <img src="image/profile/user.png" alt="Profile Image">
                                <a href="#profile" style="font-size: 30px"><?= $_COOKIE['username'] ?></a>
                            </div>
                            <hr>
                            <a href="/profile/edit/<?= $_COOKIE['userid'] ?>" class="sub-menu-link">
                                <img src="image/profile/profile.png">
                                <p>Edit Profile</p>
                                <span> > </span>   
                            </a>
                            <a href="/logout" class="sub-menu-link">
                                <img src="image/profile/logout.png">
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
    </header>

    <div class="notification-container">
        <?php if (!empty($notif)): ?>
            <?php foreach ($notif as $item): ?>
                <?php if ($item->Status == "pending_service" && $item->User_ID == $_COOKIE['userid']): ?>
                    <div class="notification-card">
                        <div class="notification-header">YOU HAVE ASK FOR A REQUEST</div>
                        <div class="notification-subheader"><?=$item->service_type?></div>
                        <div class="notification-description">
                            <?=$item->OfferDescription?>
                        </div>
                        <div class="notification-info">
                            <div class="status status-waiting">WAITING FOR ACCEPTION......</div>
                            <div class="contact">CONTACT: <?=$item->Phone_number?></div>
                            <div class="price">OFFERS PRICE: RP. <?= number_format($item->OfferPrice, 0, ',', '.') ?></div>
                            <button class="view-profile-btn" onclick="window.location.href='/profile/<?=$item->selling_id?>'">VIEW PROFILE</button>
                        </div>
                    </div>
                <?php elseif ($item->Status == "pending_service" && $item->selling_id == $_COOKIE['userid']): ?>
                    <div class="notification-card">
                        <div class="notification-header">YOU HAVE RECEIVED A REQUEST</div>
                        <div class="notification-subheader"><?=$item->service_type?></div>
                        <div class="notification-description">
                            <?=$item->OfferDescription?>
                        </div>
                        <div class="notification-info">
                            <div class="button-container">
                                <button class="accept-btn" data-id="<?= $item->Transaction_ID ?>" data-status="accepted_service">ACCEPT REQUEST</button>
                                <button class="decline-btn" data-id="<?= $item->Transaction_ID ?>" data-status="declined_service">DECLINE REQUEST</button>
                            </div>
                            <div class="price">OFFERS PRICE: RP. <?= number_format($item->OfferPrice, 0, ',', '.') ?></div>
                            <button class="view-profile-btn" onclick="window.location.href='/profile/<?=$item->user_id?>'">VIEW PROFILE</button>
                        </div>
                    </div>
                <?php elseif ($item->Status == "pending_request" && $item->User_ID == $_COOKIE['userid']): ?>
                    <div class="notification-card">
                        <div class="notification-header">YOU HAVE OFFER A SERVICE</div>
                        <div class="notification-subheader"><?=$item->Title?></div>
                        <div class="notification-description">
                            <?=$item->OfferDescription?>
                        </div>
                        <div class="notification-info">
                            <div class="status status-waiting">WAITING FOR ACCEPTION......</div>
                            <div class="contact">CONTACT: <?=$item->Phone_number?></div>
                            <div class="price">OFFERS PRICE: <?= number_format($item->OfferPrice, 0, ',', '.') ?></div>
                            <button class="view-profile-btn" onclick="window.location.href='/profile/<?=$item->Buying_ID?>'">VIEW PROFILE</button>
                        </div>
                    </div>
                <?php elseif ($item->Status == "pending_request" && $item->Buying_ID == $_COOKIE['userid']): ?>
                    <div class="notification-card">
                        <div class="notification-header">SOMEONE HAVE OFFERED YOU A SERVICE</div>
                        <div class="notification-subheader"><?=$item->Title?></div>
                        <div class="notification-description">
                            <?=$item->OfferDescription?>
                        </div>
                        <div class="notification-info">
                            <div class="button-container">
                                <button class="accept-btn" data-id="<?= $item->Transaction_ID ?>" data-status="accepted_request">ACCEPT REQUEST</button>
                                <button class="decline-btn" data-id="<?= $item->Transaction_ID ?>" data-status="declined_request">DECLINE REQUEST</button>
                            </div>
                            <div>JOBS: <?=$item->Job_requirement?></div>
                            <div class="contact">CONTACT: <?=$item->Phone_number?></div>
                            <div class="price">OFFERS PRICE: <?= number_format($item->OfferPrice, 0, ',', '.') ?></div>
                            <button class="view-profile-btn" onclick="window.location.href='/profile/<?=$item->user_id?>'">VIEW PROFILE</button>
                        </div>
                    </div>
                <?php elseif ($item->Status == "accepted_service" && $item->User_ID == $_COOKIE['userid']): ?>
                    <div class="notification-card">
                        <div class="notification-header">YOU HAVE ASK FOR A REQUEST</div>
                        <div class="notification-subheader"><?=$item->service_type?></div>
                        <div class="notification-description">
                            <?=$item->OfferDescription?>
                        </div>
                        <div class="notification-info">
                            <div class="status status-accepted">REQUEST ACCEPTED</div>
                            <div class="contact">CONTACT: <?=$item->Phone_number?></div>
                            <div class="price">OFFERS PRICE: <?= number_format($item->OfferPrice, 0, ',', '.') ?></div>
                            <button class="view-profile-btn">VIEW PROFILE</button>
                        </div>
                    </div>
                <?php elseif ($item->Status == "accepted_service" && $item->selling_id == $_COOKIE['userid']): ?>
                    <div class="notification-card">
                        <div class="notification-header">YOU HAVE RECEIVED A REQUEST</div>
                        <div class="notification-subheader"><?=$item->service_type?></div>
                        <div class="notification-description">
                            <?=$item->OfferDescription?>
                        </div>
                        <div class="notification-info">
                            <div class="button-container">
                                <button class="accept-btn" data-id="<?= $item->Transaction_ID ?>" data-status="finished_service">Have you Finished?</button>
                            </div>
                            <div class="contact">CONTACT: <?=$item->Phone_number?></div>
                            <div class="price">OFFERS PRICE: <?= number_format($item->OfferPrice, 0, ',', '.') ?></div>
                            <button class="view-profile-btn">VIEW PROFILE</button>
                        </div>
                    </div>
                <?php elseif ($item->Status == "accepted_request" && $item->User_ID == $_COOKIE['userid']): ?>
                    <div class="notification-card">
                        <div class="notification-header">YOU HAVE OFFER A SERVICE</div>
                        <div class="notification-subheader"><?=$item->Title?></div>
                        <div class="notification-description">
                            <?=$item->OfferDescription?>
                        </div>
                        <div class="notification-info">
                            <div class="status status-accepted">REQUEST ACCEPTED</div>
                            <div class="contact">CONTACT: <?=$item->Phone_number?></div>
                            <div class="price">OFFERS PRICE: <?= number_format($item->OfferPrice, 0, ',', '.') ?></div>
                            <button class="view-profile-btn">VIEW PROFILE</button>
                        </div>
                    </div>
                <?php elseif ($item->Status == "accepted_request" && $item->Buying_ID == $_COOKIE['userid']): ?>
                    <div class="notification-card">
                        <div class="notification-header">SOMEONE HAVE OFFERED YOU A SERVICE</div>
                        <div class="notification-subheader"><?=$item->Title?></div>
                        <div class="notification-description">
                            <?=$item->OfferDescription?>
                        </div>
                        <div class="notification-info">
                            <div class="button-container">
                                <button class="accept-btn" data-id="<?= $item->Transaction_ID ?>" data-status="finished_request">Have you Finished?</button>
                            </div>
                            <div class="contact">CONTACT: <?=$item->Phone_number?></div>
                            <div class="price">OFFERS PRICE: <?= number_format($item->OfferPrice, 0, ',', '.') ?></div>
                            <button class="view-profile-btn">VIEW PROFILE</button>
                        </div>
                    </div>
                <?php elseif ($item->Status == "declined_service" && $item->User_ID == $_COOKIE['userid']): ?>
                    <div class="notification-card">
                        <div class="notification-header">YOU HAVE ASK FOR A REQUEST</div>
                        <div class="notification-subheader"><?=$item->Title?></div>
                        <div class="notification-description">
                            <?=$item->OfferDescription?>
                        </div>
                        <div class="notification-info">
                            <div class="status status-declined">OFFERS DECLINED</div>
                            <div class="price">OFFERS PRICE: <?= number_format($item->OfferPrice, 0, ',', '.') ?></div>
                            <button class="view-profile-btn">VIEW PROFILE</button>
                        </div>
                    </div>
                <?php elseif ($item->Status == "declined_service" && $item->selling_id == $_COOKIE['userid']): ?>
                    <div class="notification-card">
                        <div class="notification-header">YOU HAVE RECEIVED A REQUEST</div>
                        <div class="notification-subheader"><?=$item->Title?></div>
                        <div class="notification-description">
                            <?=$item->OfferDescription?>
                        </div>
                        <div class="notification-info">
                            <div class="status status-declined">OFFERS DECLINED</div>
                            <div class="price">OFFERS PRICE: <?= number_format($item->OfferPrice, 0, ',', '.') ?></div>
                            <button class="view-profile-btn">VIEW PROFILE</button>
                        </div>
                    </div>
                <?php elseif ($item->Status == "declined_request" && $item->User_ID == $_COOKIE['userid']): ?>
                    <div class="notification-card">
                        <div class="notification-header">YOU HAVE OFFER A SERVICE</div>
                        <div class="notification-subheader"><?=$item->Title?></div>
                        <div class="notification-description">
                            <?=$item->OfferDescription?>
                        </div>
                        <div class="notification-info">
                            <div class="status status-declined">OFFERS DECLINED</div>
                            <div class="price">OFFERS PRICE: <?= number_format($item->OfferPrice, 0, ',', '.') ?></div>
                            <button class="view-profile-btn">VIEW PROFILE</button>
                        </div>
                    </div>
                <?php elseif ($item->Status == "declined_request" && $item->Buying_ID == $_COOKIE['userid']): ?>
                    <div class="notification-card">
                        <div class="notification-header">SOMEONE HAVE OFFERED YOU A SERVICE</div>
                        <div class="notification-subheader"><?=$item->Title?></div>
                        <div class="notification-description">
                            <?=$item->OfferDescription?>
                        </div>
                        <div class="notification-info">
                            <div class="status status-declined">OFFERS DECLINED</div>
                            <div class="price">OFFERS PRICE: <?= number_format($item->OfferPrice, 0, ',', '.') ?></div>
                            <button class="view-profile-btn">VIEW PROFILE</button>
                        </div>
                    </div>
                <?php elseif (($item->Status == "finished_service" || $item->Status == "finished_service_r") && $item->User_ID == $_COOKIE['userid']): ?>
                    <div class="notification-card">
                        <div class="notification-header">YOU HAVE ASK FOR A REQUEST</div>
                        <div class="notification-subheader"><?=$item->Title?></div>
                        <div class="notification-description">
                            <?=$item->OfferDescription?>
                        </div>
                        <div class="notification-info">
                            <?php if ($item->Status == "finished_service"): ?>
                                <div class="button-container">
                                    <span class="star" data-value="1">&#9734;</span>
                                    <span class="star" data-value="2">&#9734;</span>
                                    <span class="star" data-value="3">&#9734;</span>
                                    <span class="star" data-value="4">&#9734;</span>
                                    <span class="star" data-value="5">&#9734;</span>
                                    <button class="confirm-btn" id="rating-service" data-id-transaction="<?= $item->Transaction_ID ?>" data-id="<?= $item->selling_id ?>" data-rating="1">CONFIRM</button>
                                </div>
                            <?php endif; ?>
                            <div class="price">OFFERS PRICE: <?= number_format($item->OfferPrice, 0, ',', '.') ?></div>
                            <button class="view-profile-btn">VIEW PROFILE</button>
                        </div>
                    </div>
                <?php elseif (($item->Status == "finished_service" || $item->Status == "finished_service_r") && $item->selling_id == $_COOKIE['userid']): ?>
                    <div class="notification-card">
                        <div class="notification-header">YOU HAVE RECEIVED A REQUEST</div>
                        <div class="notification-subheader"><?=$item->Title?></div>
                        <div class="notification-description">
                            <?=$item->OfferDescription?>
                        </div>
                        <div class="notification-info">
                            <div class="status status-accepted">TRANSACTION FINISHED</div>
                            <div class="price">OFFERS PRICE: <?= number_format($item->OfferPrice, 0, ',', '.') ?></div>
                            <button class="view-profile-btn">VIEW PROFILE</button>
                        </div>
                    </div>
                <?php elseif (($item->Status == "finished_request" || $item->Status == "finished_service_r") && $item->User_ID == $_COOKIE['userid']): ?>
                    <div class="notification-card">
                        <div class="notification-header">YOU HAVE OFFER A SERVICE</div>
                        <div class="notification-subheader"><?=$item->Title?></div>
                        <div class="notification-description">
                            <?=$item->OfferDescription?>
                        </div>
                        <div class="notification-info">
                            <div class="price">OFFERS PRICE: <?= number_format($item->OfferPrice, 0, ',', '.') ?></div>
                            <button class="view-profile-btn">VIEW PROFILE</button>
                        </div>
                    </div>
                <?php elseif (($item->Status == "finished_request" || $item->Status == "finished_service_r") && $item->Buying_ID == $_COOKIE['userid']): ?>
                    <div class="notification-card">
                        <div class="notification-header">SOMEONE HAVE OFFERED YOU A SERVICE</div>
                        <div class="notification-subheader"><?=$item->Title?></div>
                        <div class="notification-description">
                            <?=$item->OfferDescription?>
                        </div>
                        <div class="notification-info">
                            <?php if ($item->Status == "finished_request"): ?>
                                <div class="button-container">
                                    <span class="star" data-value="1">&#9734;</span>
                                    <span class="star" data-value="2">&#9734;</span>
                                    <span class="star" data-value="3">&#9734;</span>
                                    <span class="star" data-value="4">&#9734;</span>
                                    <span class="star" data-value="5">&#9734;</span>
                                    <button class="confirm-btn" id="rating-request" data-id-transaction="<?= $item->Transaction_ID ?>" data-id="<?= $item->User_ID ?>" data-rating="1">CONFIRM</button>
                                </div>
                            <?php endif; ?>
                            <div class="price">OFFERS PRICE: <?= number_format($item->OfferPrice, 0, ',', '.') ?></div>
                            <button class="view-profile-btn">VIEW PROFILE</button>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>You have no notification!</p>
        <?php endif; ?>
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

        let subMenu = document.getElementById("subMenu");
        let profileIcon = document.querySelector(".profile-icon");

        function toggleMenu(event) {
            subMenu.classList.toggle("open-menu");
            event.stopPropagation(); 
        }

        subMenu.addEventListener("mouseover", function() {
            subMenu.classList.add("open-menu");
        });

        document.addEventListener("click", function(event) {
            if (!profileIcon.contains(event.target) && !subMenu.contains(event.target)) {
                subMenu.classList.remove("open-menu");
            }
        });

        document.querySelectorAll('.view-profile-btn').forEach(button => {
            button.addEventListener('mouseover', function() {
                this.style.transform = 'scale(1.05)';
            });
            button.addEventListener('mouseout', function() {
                this.style.transform = 'scale(1)';
            });
        });

        document.querySelectorAll('.accept-btn, .decline-btn').forEach(button => {
            button.addEventListener('click', function () {
                const transactionId = this.getAttribute('data-id');
                const status = this.getAttribute('data-status');

                const data = new URLSearchParams();
                data.append('transaction_id', transactionId);
                data.append('status', status);

                fetch('/update-status', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: data
                })
                .then(response => response.text())
                .then(result => {
                    console.log('Response:', result);
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });

        document.querySelectorAll('.star').forEach(star => {
            star.addEventListener('click', function () {
                const ratingValue = this.getAttribute('data-value');

                const allStars = this.parentElement.querySelectorAll('.star');
                allStars.forEach(s => s.classList.remove('selected'));
                for (let i = 0; i < ratingValue; i++) {
                    allStars[i].classList.add('selected');
                }

                const confirmButton1 = document.getElementById('rating-service');
                const confirmButton2 = document.getElementById('rating-request');
                confirmButton1.style.display = 'block';
                confirmButton2.style.display = 'block';
                confirmButton1.setAttribute('data-rating', ratingValue);
                confirmButton2.setAttribute('data-rating', ratingValue);
                console.log('Confirmed rating:', ratingValue);
            });
        });

        document.querySelectorAll('.confirm-btn').forEach(button => {
            button.addEventListener('click', function () {
                const ratingValue = this.getAttribute('data-rating');
                const sellingId = this.getAttribute('data-id');
                const transactionId = this.getAttribute('data-id-transaction');
                console.log('Confirmed rating:', ratingValue);

                const data = new URLSearchParams();
                data.append('rating', ratingValue);
                data.append('selling_id', sellingId);

                fetch('/submit-rating', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: data.toString()
                })
                .then(response => response.text())
                .then(result => {
                    if (result === 'success') {
                        alert('Thank you for your rating!');
                        this.style.display = 'none';
                    } else {
                        alert('Failed to submit rating' + result);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });

                data.append('transaction_id', transactionId);
                data.append('status', 'finished_service_r');

                fetch('/update-status', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: data
                })
                .then(response => response.text())
                .then(result => {
                    console.log('Response:', result);
                    location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });

    </script>
</body>
</html>