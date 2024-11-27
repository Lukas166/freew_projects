function toggleMenu() {
    const subMenu = document.getElementById('subMenu');
    subMenu.classList.toggle('open-menu');
}

// Tab switching functionality
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.settings-link');
    const tabPanes = document.querySelectorAll('.tab-pane');

    tabs.forEach(tab => {
        tab.addEventListener('click', (e) => {
            e.preventDefault();
            
            // Remove active class from all tabs and panes
            tabs.forEach(t => t.classList.remove('active'));
            tabPanes.forEach(p => p.classList.remove('active'));
            
            // Add active class to clicked tab
            tab.classList.add('active');
            
            // Show corresponding tab pane
            const tabId = tab.getAttribute('data-tab');
            document.getElementById(tabId).classList.add('active');
        });
    });

    fileInput.addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
            const reader = new FileReader();
            const profilePhoto = document.querySelector('.profile-photo');
            
            reader.onload = function(e) {
                profilePhoto.src = e.target.result;
            };
            
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    // Reset photo functionality
    const resetButton = document.querySelector('.upload-buttons .btn:last-child');
    if (resetButton) {
        resetButton.addEventListener('click', () => {
            const profilePhoto = document.querySelector('.profile-photo');
            profilePhoto.src = 'image/Profile/user.png';
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const photoOptions = document.querySelectorAll('.photo-option');
    const currentPhoto = document.getElementById('currentPhoto');

    photoOptions.forEach(function(photo) {
        photo.addEventListener('click', function() {
            currentPhoto.src = photo.src;

            document.getElementById('photoSelection').style.display = 'none';
        });
    });

    document.querySelector('.photo-overlay').addEventListener('click', function() {
        document.getElementById('photoSelection').style.display = 'block';
    });
});
