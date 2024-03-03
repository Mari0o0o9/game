function points() {
    var pointsValue = parseInt(document.getElementById("pointsValue").value);
    var plus = document.querySelectorAll(".plus");
    var minus = document.querySelectorAll(".minus");
    var value = document.getElementById("value");
    var inputPoints = document.querySelectorAll(".inputPoints");

    function updatePoints() {
        if (pointsValue <= 0) {
            pointsValue = 0
            plus.forEach(button => button.disabled = true);
            value.textContent = "Nie masz już punktów";
        } else if (pointsValue >= 10) {
            pointsValue = 10
            minus.forEach(button => button.disabled = true);
            value.textContent = "";
        } else {
            plus.forEach(button => button.disabled = false);
            minus.forEach(button => button.disabled = false);
            value.textContent = "";
        }

        document.getElementById("pointsValue").value = pointsValue;
    }

    plus.forEach(function (button, index) {
        button.addEventListener("click", function() {
            var input = inputPoints[index];
            if (pointsValue > 0) {
                input.value = parseInt(input.value) + 1;
                pointsValue = pointsValue - 1;
                updatePoints();
            }
        });
    });

    minus.forEach(function (button, index) {
        button.addEventListener("click", function() {
            var input = inputPoints[index];
            if (parseInt(input.value) > 0) {
                input.value = parseInt(input.value) - 1;
                pointsValue = pointsValue + 1;
                updatePoints();
            }
        });
    });

    updatePoints();
}
points();