document.addEventListener('DOMContentLoaded', function() {
    var raccon = document.querySelectorAll(".classRacoon");
    var info = document.querySelectorAll(".classInfo");

    raccon.forEach(function (element, index) {
        element.addEventListener("mouseenter", function () {
            info[index].style.display="block";
        });
    });
    raccon.forEach(function (element, index) {
        element.addEventListener("mouseleave", function () {
            info[index].style.display="none";
        });
    });
});
