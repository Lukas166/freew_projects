
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

    document.getElementById('searchInput').value = id;

    fetchRandomImage();

    const contentService = document.querySelectorAll('.service-box');
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


function fetchRandomImage(i) {
    const imageUrls = [
        "https://images.unsplash.com/photo-1560249951-67f7a21fbd98?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwxfHxwZW9wbGVfd29ya2luZ3xlbnwwfHx8fDE3MzE4NDQxNjB8MA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1553861542-15283bc1bcd2?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwyfHxwZW9wbGVfd29ya2luZ3xlbnwwfHx8fDE3MzE4NDQxNjB8MA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1476357471311-43c0db9fb2b4?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwxfHxkZXNpZ258ZW58MHx8fHwxNzMxODM2OTQ2fDA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1534670007418-fbb7f6cf32c3?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwyfHxkZXNpZ258ZW58MHx8fHwxNzMxODM2OTQ2fDA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1484788984921-03950022c9ef?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwxfHxjb21wdXRlcnxlbnwwfHx8fDE3MzE4NDU4NzJ8MA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1496181133206-80ce9b88a853?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwyfHxjb21wdXRlcnxlbnwwfHx8fDE3MzE4NDU4NzJ8MA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1575387873837-4f25ee816453?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwxfHxwcmVtaWVyZXByb3xlbnwwfHx8fDE3MzE4NDU5MDh8MA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1575387873801-3ffec9e2839d?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwyfHxwcmVtaWVyZXByb3xlbnwwfHx8fDE3MzE4NDU5MDh8MA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1719937206498-b31844530a96?ixid=M3w2NzY1MTJ8MXwxfHNlYXJjaHwxfHxwaG90b2dyYXBoeXxlbnwwfHx8fDE3MzE4NDU5NTB8MA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1527011046414-4781f1f94f8c?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwyfHxwaG90b2dyYXBoeXxlbnwwfHx8fDE3MzE4NDU5NTB8MA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1471341971476-ae15ff5dd4ea?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwzfHxwaG90b2dyYXBoeXxlbnwwfHx8fDE3MzE4NDU5NTB8MA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1439853949127-fa647821eba0?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwxfHxuYXR1cmV8ZW58MHx8fHwxNzMxODQ2NzgxfDA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1472396961693-142e6e269027?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwyfHxuYXR1cmV8ZW58MHx8fHwxNzMxODQ2NzgxfDA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1664575196644-808978af9b1f?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwxfHxmcmVlbGFuY2VyfGVufDB8fHx8MTczMTg0NjgxNXww&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1664575198308-3959904fa430?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwyfHxmcmVlbGFuY2VyfGVufDB8fHx8MTczMTg0NjgxNXww&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1628258334105-2a0b3d6efee1?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwxfHxjb2Rpbmd8ZW58MHx8fHwxNzMxODQ2ODM5fDA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1515879218367-8466d910aaa4?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwyfHxjb2Rpbmd8ZW58MHx8fHwxNzMxODQ2ODM5fDA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1590935217281-8f102120d683?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwxfHxhcHBsaWNhdGlvbnxlbnwwfHx8fDE3MzE4NDY4NTh8MA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1590935216525-e35827458736?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwyfHxhcHBsaWNhdGlvbnxlbnwwfHx8fDE3MzE4NDY4NTh8MA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1590935216595-f9fc9b65179d?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwzfHxhcHBsaWNhdGlvbnxlbnwwfHx8fDE3MzE4NDY4NTh8MA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1579702493440-8b1b56d47e03?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwxfHxhY3RvcnxlbnwwfHx8fDE3MzE4NDY4OTl8MA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1512462629038-1ff3395c5e5d?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwyfHxhY3RvcnxlbnwwfHx8fDE3MzE4NDY4OTl8MA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwxfHx3ZWJzaXRlfGVufDB8fHx8MTczMTg0NjkyM3ww&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1455849318743-b2233052fcff?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwyfHx3ZWJzaXRlfGVufDB8fHx8MTczMTg0NjkyM3ww&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1709846486283-de18cb67bc67?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwxfHx2b2ljZW92ZXJ8ZW58MHx8fHwxNzMxODQ2OTUzfDA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1615714901553-bfb2b5a27750?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwyfHx2b2ljZW92ZXJ8ZW58MHx8fHwxNzMxODQ2OTUzfDA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwxfHxmYXNoaW9ufGVufDB8fHx8MTczMTg0Njk5OXww&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1483985988355-763728e1935b?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwyfHxmYXNoaW9ufGVufDB8fHx8MTczMTg0Njk5OXww&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1490481651871-ab68de25d43d?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwzfHxmYXNoaW9ufGVufDB8fHx8MTczMTg0Njk5OXww&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1619033742043-b9a1adf35b30?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwxfHxkaWdpdGFsYXJ0fGVufDB8fHx8MTczMTg0NzAyOXww&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1582177530303-88170eb279ac?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwyfHxkaWdpdGFsYXJ0fGVufDB8fHx8MTczMTg0NzAyOXww&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1706397095754-8a5dfa87c2b7?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwzfHxkaWdpdGFsYXJ0fGVufDB8fHx8MTczMTg0NzAyOXww&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1582201957428-5ff47ff7605c?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwxfHxkcmF3aW5nfGVufDB8fHx8MTczMTg0NzEzMnww&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1579762715118-a6f1d4b934f1?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwyfHxkcmF3aW5nfGVufDB8fHx8MTczMTg0NzEzMnww&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1642465789831-a176eb4a1b14?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwxfHxjcnlwdG98ZW58MHx8fHwxNzMxODQ3MTYwfDA&ixlib=rb-4.0.3",
        "https://images.unsplash.com/photo-1644361566696-3d442b5b482a?ixid=M3w2NzY1MTJ8MHwxfHNlYXJjaHwyfHxjcnlwdG98ZW58MHx8fHwxNzMxODQ3MTYwfDA&ixlib=rb-4.0.3",
    ];

    let imageElement = document.querySelector(".image-display" + i);
    
    if (imageElement) {
        const randomIndex = Math.floor(Math.random() * imageUrls.length);
        const randomImageUrl = imageUrls[randomIndex];

        imageElement.src = randomImageUrl;
    } else {
        console.log("Image element with id image-display" + i + " not found.");
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const menuButtons = document.querySelectorAll('.menu-btn');

    menuButtons.forEach(button => {
        button.addEventListener('click', function () {
            menuButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });
    });
});
