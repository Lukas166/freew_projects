<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Design - FREEW</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/request.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="nav-bar">
        <a href="/main">
            <b class="logo-icon">FREEW</b>
        </a>
        <div class="menu" style="display: flex; justify-content:right; margin-right:15px; align-items:center;">
                <div class="search">
                    <form id="searchForm" method="POST" action="/request">
                        <input type="text" id="searchInput" name="search" placeholder="Search...">
                        <a>
                            <i class="fas fa-search"></i>
                        </a>
                    </form>
                </div>
                <a href="/request/input" style="color: white;" class="line-animation">MAKE A REQUEST</a>
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

    <main>
        <div class="container">
            <form class="sidebar" id="searchForm" method="POST" action="/request">
                <div class="category-buttons">
                    <h3>Categories</h3>
                    <input type="hidden" id="search" name="search" value="" />
                    <button class="category-btn active" onclick="showContent('')">All Requests</button>
                    <button class="category-btn" onclick="showContent('web')">Web Development</button>
                    <button class="category-btn" onclick="showContent('design')">Design</button>
                    <button class="category-btn" onclick="showContent('voice')">Voice Over</button>
                    <button class="category-btn" onclick="showContent('logo')">Logo Design</button>
                </div>
            </form>
            
            <div class="requests-container">
                <div id="content-search" class="content-box"></div>
                <?php if (!empty($req)): ?>
                    <?php foreach ($req as $item): ?>
                        <a href="/request/<?=$item['Request_ID']?>" style="text-decoration:none;">
                            <div class="request-card">
                                <div class="card-content">
                                    <div class="card-header">
                                        <h2 class="card-title"><?= htmlspecialchars($item['Title']) ?></h2>
                                        <div class="budget">
                                            Budget: Rp.<?= htmlspecialchars($item['Min_budget']) ?> - <?= htmlspecialchars($item['Max_budget']) ?>
                                        </div>
                                    </div>
                                    <p class="card-description">
                                        <?= htmlspecialchars($item['description_request']) ?>
                                    </p>
                                    <div class="card-footer">
                                        <div class="requirements">
                                            Job Requirement: <?= htmlspecialchars($item['Job_requirement']) ?>
                                        </div>
                                        <div class="requester">
                                            Request by: <?= htmlspecialchars($item['username']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No request found matching your search.</p>
                <?php endif; ?>
                <div class="pagination">
                    <ul class="pagination-list">
                        <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                            <a href="<?= $page > 1 ? site_url('request?page=' . ($page - 1)) : '#' ?>" class="page-link" aria-label="Previous">
                                <i class="fa fa-chevron-left"></i>
                            </a>
                        </li>
                        
                        <?php for ($i = 1; $i <= ceil($total / $limit); $i++): ?>
                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                <a href="<?= site_url('request?page=' . $i) ?>" class="page-link"><?= $i ?></a>
                            </li>
                            <?php endfor; ?>
                            
                            <li class="page-item <?= $page == ceil($total / $limit) ? 'disabled' : '' ?>">
                                <a href="<?= $page < ceil($total / $limit) ? site_url('request?page=' . ($page + 1)) : '#' ?>" class="page-link" aria-label="Next">
                                    <i class="fa fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
            </div>
        </div>
    </main>
    <script src="js/script_request.js" defer></script>
</body>
</html>
