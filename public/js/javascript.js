let closebutton = document.getElementById('close');
closebutton?.addEventListener('click', function () {
    navbarNav.className = 'navbar-collapse collapse ';

});
let divMost = document.getElementById('div-MostViewed');
let divlatest = document.getElementById('div-LatestNews');
let latestlink = document.getElementById('pills-home-tab');
let mostlink = document.getElementById('pills-profile-tab');
latestlink?.addEventListener('click', function () {
    divlatest.className = 'tab-pane fade show active ';
    divMost.className = 'tab-pane fade ';
    mostlink.style.backgroundColor = '#f0f0f0'
    mostlink.style.color = 'black';
    latestlink.style.backgroundColor = '#000757'
    latestlink.style.color = 'white';
});
mostlink?.addEventListener('click', function () {
    divlatest.className = 'tab-pane fade ';
    divMost.className = 'tab-pane fade show active ';
    mostlink.style.backgroundColor = '#000757'
    mostlink.style.color = 'white';
    latestlink.style.backgroundColor = '#f0f0f0'
    latestlink.style.color = 'black'
});


var page = 1;
$(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
        page++;

        loadMoreData(page);

    }
});


function loadMoreData(page) {

    $.ajax(
        {
            url: '?page=' + page,
            type: "get",
        })
        .done(function (data) {
            $("#post-data").append(data.html);
        })
        .fail(function (jqXHR) {
            console.log(jqXHR);
        });
}

