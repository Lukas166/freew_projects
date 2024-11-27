<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FREEW</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="nav-bar">
            <a href="/main">
                <b class="logo-icon">FREEW</b>
            </a>
            <div class="menu" style=" width:70%; display: flex; justify-content:right; align-items:center;">
                <div class="menu">
                    <a href="/services" style="color: white;" class="line-animation">SERVICES</a>
                    <a href="/request" style="color: white;" class="line-animation">REQUEST</a>
                    <a href="#expandGallery" style="color: white;" class="line-animation">GALLERY</a>
                    <?php if (isset($_COOKIE['username'])): ?>   
                        <a href="/notification" style="color: white;" class="notif-icon">
                            <?php if (isset($_SESSION['notification'])): ?>
                                <i class="fa-solid fa-bell large-icon"></i>
                            <?php else: ?>
                                <i class="fa-regular fa-bell large-icon"></i>
                            <?php endif; ?>
                        </a>
                        <div class="profile-container">
                            <i class="fa-solid fa-user profile-icon" onclick="toggleMenu(event)"></i>
                            <div class="sub-menu-wrap" id="subMenu">
                                <div class="sub-menu" >
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
                            <a href="/login" class = "signIn">SIGN IN</a>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    
    <section class="hero">
        <div class="hero-text">
            <h2>FREEW</h2>
            <p>Platform freelancer yang menghubungkan Anda dengan berbagai jasa profesional dari berbagai bidang.</p>
            <p>Cari layanan yang Anda butuhkan, atau daftarkan diri Anda sebagai penyedia jasa dan temukan peluang baru untuk berkembang.</p>
            <p>Dengan Freew, kemudahan berkolaborasi dalam pekerjaan hanya sejauh satu klik</p>
        </div>
        <div class="hero-image-placeholder">
            <img src="image/hero.jpeg" alt="Hero Image" loading="lazy" class="hero-image">
        </div>
    </section>
    
    <section class="about-us">
        <div class="about-container">
            <div class="about-box top-left">
                <p>Di FREEW, kami memberikan kesempatan bagi para profesional untuk menawarkan keterampilan dan keahlian mereka kepada klien yang membutuhkan. Apakah Anda seorang desainer grafis, penulis, programmer, atau ahli pemasaran, FREEW memudahkan Anda untuk mendaftar dan mempromosikan layanan Anda.</p>
            </div>
            <div class="about-box bottom-right">
                <p>Bagi Anda yang mencari solusi untuk berbagai kebutuhan, FREEW adalah tempat yang tepat untuk menemukan penyedia jasa yang berkualitas. Dengan berbagai kategori layanan yang tersedia, Anda dapat dengan mudah menjelajahi pilihan dan menemukan profesional terbaik untuk proyek Anda.</p>
            </div>
        </div>
    </section><br><br><br><br><br>
    
    <section class="services">
        <h2>Our Services</h2>
        <div class="service-grid">
            <div class="service-item" data-name="voice-over">
                <img src="image/Services/voice_over.png" alt=""/>
                <div class="service-item-body">
                    <h6 class="service-item-title">Voice Over</h6>
                </div>
            </div>
            
            <div class="service-item" data-name="Design">
                <img src="image/Services/design.png" alt=""/>
                <div class="service-item-body">
                    <h6 class="service-item-title">Design</h6>
                </div>
            </div>

            <div class="service-item" data-name="Website">
                <img src="image/Services/website.png" alt=""/>
                <div class="service-item-body">
                    <h6 class="service-item-title">Website</h6>
                </div>
            </div>
            
            <div class="service-item" data-name="Others">
                <img src="image/Services/other.png" alt=""/>
                <div class="service-item-body">
                    <h6 class="service-item-title">Others</h6>
                </div>
            </div>
        </div>
    </section><br><br><br><br><br><br><br><br>


    <section class="gallery" id ="expandGallery">
        <b style="font-size: 50px; font-family: Arial, sans-serif;">Made on FREEW</b><br><br>
        <div class="container-gallery">
            <div class="image-display1 panel active" style="background-image: url(image/Gallery/Gallery1.png);">
                <h1></h1>
            </div>
            <div class="image-display2 panel" style="background-image: url(image/Gallery/Gallery2.png);">
                <h1></h1>
            </div>
            <div class="image-display3 panel" style="background-image: url(image/Gallery/Gallery3.png);">
                <h1></h1>
            </div>
            <div class="image-display4 panel" style="background-image: url(image/Gallery/Gallery4.png);">
                <h1></h1>
            </div>
            <div class="image-display5 panel" style="background-image: url(image/Gallery/Gallery5.jpg);">
                <h1></h1>
            </div>
        </div>
    </section>
    
    <footer>
        <div class="waves">
            <div class="wave" id="wave1"></div>
            <div class="wave" id="wave2"></div>
            <div class="wave" id="wave3"></div>
            <div class="wave" id="wave4"></div>
        </div>
        <ul class="social_icon">
            <li>
                <a href="https://www.instagram.com/lukas_austin?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">
                    <ion-icon name="logo-instagram"></ion-icon>
                    <p class="name">Lukas</p>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/bcs.ds/?utm_source=ig_web_button_share_sheet">
                    <ion-icon name="logo-instagram"></ion-icon>
                    <p class="name">Devin</p>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/rip_unagi?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">
                    <ion-icon name="logo-instagram"></ion-icon>
                    <p class="name">Orlando</p>
                </a>
            </li>
        </ul>
            <p class="footer-text">Project Praktikum PemWeb - Bangsawan Cina A</p>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="<?= base_url('js/script_main.js'); ?>"></script>
</body>
</html>
