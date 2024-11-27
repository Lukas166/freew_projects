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

document.addEventListener('DOMContentLoaded', function() {
    const categoryButtons = document.querySelectorAll('.category-btn');
    const requestCards = document.querySelectorAll('.request-card');

    categoryButtons.forEach(button => {
        button.addEventListener('click', () => {
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            requestCards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 300);
            });
        });
    });

    document.documentElement.style.scrollBehavior = 'smooth';

    let lastScrollPosition = 0;
    const navbar = document.querySelector('.nav-bar-request');

    window.addEventListener('scroll', () => {
        const currentScrollPosition = window.pageYOffset;

        if (currentScrollPosition > lastScrollPosition) {
            navbar.style.transform = 'translateY(-100%)';
        } else {
            navbar.style.transform = 'translateY(0)';
        }

        lastScrollPosition = currentScrollPosition;
    });
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

function showContent(id) {
    const contentSearch = document.getElementById('content-search');
    contentSearch.style.display = 'block';

    contentSearch.innerHTML = ''; 

    const textNode = document.createTextNode('Searching for ' + id);
    contentSearch.appendChild(textNode);

    const loadingIcon = document.createElement('i');
    loadingIcon.className = 'fas fa-spinner fa-spin loading-icon';
    loadingIcon.style.marginLeft = '8px';
    contentSearch.appendChild(loadingIcon);

    document.getElementById('search').value = id;

    const contentService = document.querySelectorAll('.request-card');
    contentService.forEach(box => (box.style.display = 'none'));

    document.getElementById('searchForm').submit();
}



document.getElementById('searchInput').addEventListener('keypress', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        var searchTerm = document.getElementById('searchInput').value;
        if (searchTerm) {
            document.getElementById('search').value = searchTerm;
            showContent(searchTerm);
        }
    }
});