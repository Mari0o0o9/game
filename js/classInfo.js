document.addEventListener('DOMContentLoaded', function() {
    var raccon = document.querySelectorAll(".classRacoon");
    var info = document.querySelectorAll(".classInfo");

    raccon.forEach(function (element, index) {
        element.addEventListener("mouseenter", function () {
            info[index].style.display = "block";
            info[index].style.animation = `infoOn 0.4s ease forwards`;
        });

        element.addEventListener("mouseleave", function () {
            info[index].style.display = "none";
        });
    });
});