var menuOpen = document.querySelector('.menu-name');
var sideMenu = document.querySelector('.header-menus');
var menuClose = document.querySelector('.close');
if(menuOpen && sideMenu){
menuOpen.addEventListener('click', function () {
    sideMenu.classList.add('active');
})}
if(menuClose && sideMenu) {
    menuClose.addEventListener('click', function () {
        sideMenu.classList.remove('active');
    })
}

var footerMobile = document.querySelectorAll('.main-text');
if(footerMobile) {
    footerMobile.forEach((el) => {
        var footerDesc = el.nextElementSibling;
        el.addEventListener('click', function () {
            footerDesc.classList.toggle('active');
        })
    });
}

var burgerMenu = document.querySelector('.burger-menu');
if(burgerMenu) {
    burgerMenu.addEventListener('click', function () {
        sideMenu.classList.add('active');
    })
}


var searchInput = document.querySelector('.search-input');
var searchBg = document.querySelector('.search-bg')
var search = document.querySelector('.search');
search.addEventListener('click', function () {

    searchInput.classList.remove('hidden');
    searchBg.classList.remove('hidden');
})
var searchClose = document.querySelector('.search-exit');
searchClose.addEventListener('click', function () {
    searchInput.classList.add('hidden');
    searchBg.classList.add('hidden');
})

var map;
var mapContainer = document.getElementById('map');
var lat = +mapContainer.dataset.lat;
var lng = +mapContainer.dataset.lng;
console.log(lat,lng)
var mapPosition = {lat, lng};
function initMap()
{
    map = new google.maps.Map(document.getElementById('map'), {
      center: mapPosition,
      zoom:8,
    });
}

