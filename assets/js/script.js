var customFileInput = document.querySelector('.custom-file-input') !== null;
if (customFileInput) {

    customFileInput.addEventListener('change', function (e) {
        var fileName = document.getElementById("file").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    });
}
$(document).ready(function(){


});

