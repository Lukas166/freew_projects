<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>service Design - FREEW</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/service.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="js/script_service.js"></script>
</head>
<body>
        <div class="nav-bar-service">
            <a href="/main">
                <b class="logo-icon">FREEW</b>
            </a>
            <div class="menu" style="display: flex; justify-content:right; margin-right:15px; align-items:center;">
                <div class="search">
                    <form id="searchForm" method="POST" action="/services">
                        <input type="text" id="searchInput" name="search" placeholder="Search...">
                        <a>
                            <i class="fas fa-search"></i>
                        </a>
                    </form>
                </div>
                <?php if (isset($_COOKIE['username'])): ?>   
                    <a href="/notification" style="color: white; margin-right: 2rem;" class="notif-icon">
                            <?php if (isset($_SESSION['notification'])): ?>
                                <i class="fa-solid fa-bell large-icon"></i>
                            <?php else: ?>
                                <i class="fa-regular fa-bell large-icon"></i>
                            <?php endif; ?>
                        </a>
                        <a href="/services/input" style="color: white; margin-right: 1rem;"><i class="fas fa-edit fa-lg iconEdit"></i></a>
                <?php else: ?>
                    <a href="/login" class = "signIn">SIGN IN</a>
                <?php endif; ?>
            </div>
        </div>

    <main>
        <div class="container" style="display: flex; justify-content: end">
        <form class="sidebar" id="searchForm" method="POST" action="/services">
            <br><br>
            <h3>Categories</h3>
            <input type="hidden" id="search" name="search" value="" />
            <button type="button" class="menu-btn" onclick="showContent('')">All</button>
            <button type="button" class="menu-btn" onclick="showContent('voice')">Voice Over</button>
            <button type="button" class="menu-btn" onclick="showContent('logo')">Logo</button>
            <button type="button" class="menu-btn" onclick="showContent('web')">Website</button>
            <button type="button" class="menu-btn" onclick="showContent('design')">Design</button>
            <button type="button" class="menu-btn" style = "margin-top: 30vh;" onclick="window.location.href='/main'">Back</button>
        </form>

            <section class="content-service">
                <div id="content-search" class="content-box"></div>
                <div>
                    <?php if (!empty($service)): ?>
                        <div class="service-container">
                            <?php 
                            $i = 1;
                            foreach ($service as $item): ?>
                                <div class="service-box">
                                    <a href="/services/<?=$item['service_id']?>">
                                    <div class="image-box">
                                        <img class="image-display image-display<?= $i ?>" alt="Service Image"/>
                                    </div>
                                    <div>
                                        <p class="service-text"><strong style = "font-size: 25px;"><?= htmlspecialchars($item['service_type']) ?></strong></p>
                                        <p class="service-text">Rp. <?= htmlspecialchars($item['price']) ?> ,-</p>
                                        <p class="service-text">Service by: <strong><?= htmlspecialchars($item['username']) ?></strong></p>
                                    </div>
                                    </a>
                                </div>
                                <script>
                                    fetchRandomImage(<?= $i ?>);
                                </script>

                            <?php 
                                $i++;
                            endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p>No services found matching your search.</p>
                    <?php endif; ?>
                </div>
                <div class="pagination">
                    <ul class="pagination-list">
                        <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                            <a href="<?= $page > 1 ? site_url('services?page=' . ($page - 1)) : '#' ?>" class="page-link" aria-label="Previous">
                                <i class="fa fa-chevron-left"></i>
                            </a>
                        </li>

                        <?php for ($i = 1; $i <= ceil($total / $limit); $i++): ?>
                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                <a href="<?= site_url('services?page=' . $i) ?>" class="page-link"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>

                        <li class="page-item <?= $page == ceil($total / $limit) ? 'disabled' : '' ?>">
                            <a href="<?= $page < ceil($total / $limit) ? site_url('services?page=' . ($page + 1)) : '#' ?>" class="page-link" aria-label="Next">
                                <i class="fa fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
