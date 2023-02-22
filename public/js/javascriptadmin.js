let navbutt=document.getElementById('navbutt');
let navleft=document.getElementById('navleft');
let closenav=document.getElementById('closenav');
navbutt.addEventListener('click',function () {
    navleft.className ='navleft d-block';
});
closenav.addEventListener('click',function () {
    navleft.className='navleft d-none d-sm-block';
});
var elem = document.getElementsByClassName('destroy');
const csrf = document.getElementById('csrf_token_delete').value

for (var i = 0; i < (elem.length); i++) {

    elem[i].addEventListener('click', function (ev) {
        ev.preventDefault();
        const id=this.dataset.id;
        const url=this.attributes.href.value + '?_token=' + csrf;


        const confirmMasseg =confirm('Are you sure you want to delete   '+this.dataset.name);
        if (confirmMasseg){
            var xhttp = new XMLHttpRequest();
            xhttp.open("DELETE", url, true);
            xhttp.send();
            xhttp.onload = function () {

                let res = JSON.parse(xhttp.response);
                if (res.valid){
                    let deletetr= document.getElementById('tr'+id);
                    deletetr.remove();
                }


            }


        }

    });
}

let hidden =document.getElementById('hidden');
let password=document.getElementsByClassName('passwords');
for (var i = 0; i < (password.length); i++) {
    password[i].addEventListener('click', function () {
        hidden.value=this.dataset.id;
    });

}
const img = document.getElementsByClassName('img')
const imges = document.getElementById('imges')
for (let i = 0; i < img.length; i++) {
    img[i].addEventListener('click', function () {
        imges.src = '../' + this.dataset.name;

    });

}
