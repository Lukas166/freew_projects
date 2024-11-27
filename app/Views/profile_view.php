<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile View</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/css/profileNavbar.css">
    <link rel="stylesheet" href="/css/profile_view.css">
</head>
<body>
    <nav class="nav-bar">
        <a href="/main" class="logo-icon">FREEW</a>
        <div class="menu">
            <?php if (isset($_COOKIE['username'])): ?>   
                <div class="profile-container">
                    <i class="fa-solid fa-user profile-icon" onclick="toggleMenu(event)"></i>
                    <div class="sub-menu-wrap" id="subMenu">
                        <div class="sub-menu">
                            <div class="user-menu">
                                <img src="<?= base_url('image/Profile/user.png'); ?>" alt="Profile Image">
                                <a href="/profile/<?= $_COOKIE['userid'] ?>" style="font-size: 30px"><?= $_COOKIE['username'] ?></a>
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
    </nav>

    <div class="profile-container">
        <div class="profile-header">
            <img src="<?= base_url('image/Profile/user.png'); ?>" alt="Profile Image" class="profile-image">
            <h1 class="profile-name"><?= $biodata['username'] ?> (<?= $biodata['First_name'] ?> <?= $biodata['Last_name'] ?>)</h1>
            <div class="rating">
                <span>RATING: 4.3 / 5</span>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
        </div>

        <section class="about-section">
            <h2>About</h2>
            <div class="info-grid">
                <div style="display: flex; width: 100%">
                    <div class="info-item" style="width: 15%; margin-right:6%">
                        <label>AGE</label>
                        <p><?= $biodata['Age'] ?></p>
                    </div>
                    <div class="info-item" style="width: 79%;">
                        <label>Jobs</label>
                        <p><?= $biodata['Jobs'] ?></p>
                    </div>
                </div>
                <div style="display: flex; width: 100%">
                    <div class="info-item" style="width: 32%; margin-right:6%">
                        <label>Phone Number</label>
                        <p><?= $biodata['Phone_number'] ?></p>
                    </div>
                    <div class="info-item" style="width: 62%;">
                        <label>Email</label>
                        <p><?= $biodata['Email'] ?></p>
                    </div>
                </div>
                <div class="info-item description">
                    <label>Description</label>
                    <p><?= $biodata['Description'] ?></p>
                </div>

                <div style="display: flex; width: 100%">
                    <div class="info-item" style="width: 54%; margin-right:6%">
                        <label>Location</label>
                        <p><?= $biodata['Location'] ?></p>
                    </div>
                    <div class="info-item" style="width: 40%">
                        <label>Language</label>
                        <p><?= $biodata['Language'] ?></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="social-section">
            <h2>Sosial</h2>
            <div class="social-links">
                <?php if (!empty($biodata['Instagram_account'])): ?>
                <a href="https://instagram.com/<?= $biodata['Instagram_account'] ?>" class="social-link">
                    <i class="fab fa-instagram"></i>
                    <span>@<?= $biodata['Instagram_account'] ?></span>
                </a>
                <?php endif; ?>
                
                <?php if (!empty($biodata['Tiktok_account'])): ?>
                <a href="https://tiktok.com/@<?= $biodata['Tiktok_account'] ?>" class="social-link">
                    <i class="fab fa-tiktok"></i>
                    <span>@<?= $biodata['Tiktok_account'] ?></span>
                </a>
                <?php endif; ?>
            </div>
        </section>
    </div>

    <script src="/js/script_profile_view.js"></script>
</body>
</html>