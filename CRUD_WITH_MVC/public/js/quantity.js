// Retrieve DOM elements
const plus = document.getElementById("btnPlus");
const minus = document.getElementById("btnMinus");
const qty = document.getElementById("txtQty");
const pid = document.getElementById("pid");
const btnCart = document.getElementById("btnCart");
const userid = document.getElementById("userid");
const csrfToken = document.getElementById("csrf");
const btnFav = document.getElementById("btnFav");

// Function to handle incrementing quantity
plus &&
    plus.addEventListener("click", () => {
        let quantity = Number(qty.value) || 0;
        if (quantity < 10) {
            qty.value = quantity + 1;
        }
    });

// Function to handle decrementing quantity
minus &&
    minus.addEventListener("click", () => {
        let quantity = Number(qty.value) || 0;
        if (quantity > 0) {
            qty.value = quantity - 1;
        }
    });
btnCart &&
    btnCart.addEventListener("click", function () {
        let quantity = Number(qty.value) || 0;

        if (quantity > 0) {
            const postObj = {
                product_qty: quantity,
                pid: pid.value,
                userid: userid.value,
            };

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "/cart", true);
            xhr.setRequestHeader(
                "Content-Type",
                "application/json;charset=UTF-8"
            );
            xhr.setRequestHeader("X-CSRF-TOKEN", csrfToken.value);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        alert(response.message);
                    } else {
                        console.error(xhr.responseText);
                    }
                }
            };
            xhr.send(JSON.stringify(postObj));
        }
    });

// Function to handle adding item to favorites
btnFav &&
    btnFav.addEventListener("click", () => {
        const postObj = {
            pid: pid.value,
            userid: userid.value,
        };

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/favourite", true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.setRequestHeader("X-CSRF-TOKEN", csrfToken.value);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    alert(response.message);
                } else {
                    console.error(xhr.responseText);
                }
            }
        };
        xhr.send(JSON.stringify(postObj));
    });
