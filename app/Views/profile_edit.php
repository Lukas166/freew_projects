<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="/css/profileNavbar.css">
        <link rel="stylesheet" href="/css/profile_edit.css">
    </head>
<body>
    <nav class="nav-bar">
        <a href="/main" class="logo-icon">FREEW</a>
        <div class="menu">
            <?php if (isset($_COOKIE['username'])): ?>   
                <div class="profile-container">
                    <i class="fa-solid fa-user profile-icon" onclick="toggleMenu(event)"></i>
                    <div class="sub-menu-wrap" id="subMenu">
                        <div class="sub-menu" >
                            <div class="user-menu">
                                <img src="<?= base_url('image/Profile/user.png'); ?>" alt="Profile Image">
                                <a href="/profile_view" style="font-size: 30px"><?= $_COOKIE['username'] ?></a>
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

    <form class="container" action="/profile/saveChanges" method="POST">
        <h4 class="settings-title">Account Settings</h4>
        
        <div class="card">
            <div class="settings-layout">
                <div class="settings-sidebar">
                    <div class="settings-links">
                        <a href="#account-general" class="settings-link active" data-tab="account-general">General</a>
                        <a href="#account-info" class="settings-link" data-tab="account-info">Info</a>
                        <a href="#account-social-links" class="settings-link" data-tab="account-social-links">Social links</a>
                        <a href="#account-delete" class="settings-link" data-tab="account-delete" style="color:red;">Delete Account</a>
                    </div>
                </div>

                <div class="settings-content">
                    <div id="account-general" class="tab-pane active">
                    <div class="profile-photo-container">
                        <img src="<?= base_url('image/Profile/user.png'); ?>" alt="Current photo" class="profile-photo" id="currentPhoto">
                        <div class="photo-overlay">Click to change</div>
                    </div>
                    <div class="photo-selection" id="photoSelection">
                        <h5>Select Profile Photo</h5>
                        <div class="photo-grid">
                            <img src="<?= base_url('image/Profile/user.png'); ?>" alt="Profile 1" class="photo-option">
                            <img src="<?= base_url('image/Profile/profile1.png'); ?>" alt="Profile 2" class="photo-option">
                            <img src="<?= base_url('image/Profile/profile2.png'); ?>" alt="Profile 3" class="photo-option">
                            <img src="<?= base_url('image/Profile/profile3.png'); ?>" alt="Profile 4" class="photo-option">
                            <img src="<?= base_url('image/Profile/profile4.png'); ?>" alt="Profile 5" class="photo-option">
                            <img src="<?= base_url('image/Profile/profile5.png'); ?>" alt="Profile 6" class="photo-option">
                        </div>
                    </div>
                    <br>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" value="<?= $biodata['username']; ?>">    
                        </div>
                        <div class="form-group" style="display: flex">
                            <div style="width: 47%; margin-right: 6%">
                                <label>First Name</label>
                                <input type="text" class="form-control" style="width: 100%;" name="firstname" value="<?= $biodata['First_name']; ?>">
                            </div>
                            <div style="width: 47%;">
                                <label>Last Name</label>
                                <input type="text" class="form-control" style="width: 100%;" name="lastname" value="<?= $biodata['Last_name']; ?>">
                            </div>
                        </div>
                        <div class="form-group" style="display: flex">
                            <div style="width: 67%; margin-right: 6%" >
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="email" value="<?= $biodata['Email']; ?>">
                            </div>
                            <div style="width: 27%;">
                                <label>Age</label>
                                <input type="number" class="form-control" name="age" value="<?= $biodata['Age']; ?>">
                            </div>
                        </div>
                    </div>

                    <div id="account-info" class="tab-pane">
                        <div class="form-group" style="display: flex">
                            <div style="width: 27%; margin-right: 6%" >
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phonenumber" value="<?= $biodata['Phone_number']; ?>">
                            </div>
                            <div style="width: 67%;">
                                <label>Jobs</label>
                                <input type="text" class="form-control" name="jobs" value="<?= $biodata['Jobs']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Bio</label>
                            <textarea class="form-control" name="bio"><?= $biodata['Description']; ?></textarea>
                        </div>
                        <form class="info-form">
                        <div class="form-group" style="display: flex">
                            <div style="width: 47%; margin-right: 6%" >
                                <label>Location</label>
                                <input type="text" class="form-control" name="location" value="<?= $biodata['Location']; ?>">
                            </div>
                            <div style="width: 47%;">
                                <label>Language</label>
                                <input type="text" class="form-control" name="language" value="<?= $biodata['Language']; ?>">
                            </div>
                        </div>
                    </div>

                    <div id="account-social-links" class="tab-pane">
                        <div class="form-group">
                            <label>Instagram Account (Optional)</label>
                            <input type="text" class="form-control" name="instagram" value="<?= $biodata['Instagram_account']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tiktok Account (Optional)</label>
                            <input type="text" class="form-control" name="tiktok" value="<?= $biodata['Tiktok_account']; ?>">
                        </div>
                    </div>

                    <div id="account-delete" class="tab-pane">
                        <div class="form-group">
                            <label>Are you sure you want to delete you account?</label>
                            <br>
                            <a href="/profile/delete/<?= $biodata['user_id']; ?>" class="delete-button">Delete Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-actions">
            <button type="button" class="btn btn-primary" onclick="javascript:history.back()">Back</button>
            <button class="btn btn-primary" type="submit">Save changes</button>
        </div>
    </form>

    <div class="popup-notification" id="popup">
        <i class="fas fa-check-circle"></i>
        <span>Data berhasil disimpan!</span>
    </div>

    <?php if (session()->getFlashdata('message')): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const popup = document.getElementById('popup');
                popup.classList.add('show');
                setTimeout(() => {
                    popup.classList.remove('show');
                }, 3000);
            });
        </script>
    <?php endif; ?>

    <script src="/js/script_profile_edit.js"></script>

</body>
</html>