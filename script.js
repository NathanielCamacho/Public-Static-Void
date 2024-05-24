/**
 * Quantity Script ---- inedit ko ~hans
 */
function increaseQty() {
    const qtyInput = document.querySelector('.product-qty');
    let qty = parseInt(qtyInput.value);
    if (qty < 10) {
        qtyInput.value = qty + 1;
    }
}

function decreaseQty() {
    const qtyInput = document.querySelector('.product-qty');
    let qty = parseInt(qtyInput.value);
    if (qty > 1) {
        qtyInput.value = qty - 1;
    }
}


/**
 * Profile Script
 */
document.getElementById('uname').addEventListener('input', function() {
    var uname = this.value;
    var error = document.getElementById('usernameError');

    if (/\s/.test(uname)) {
        error.style.display = 'inline';
    } else {
        error.style.display = 'none';
    }
});

document.getElementById('psw').addEventListener('input', function() {
    var psw = this.value;
    var passwordError = document.getElementById('passwordError');

    if (!/^[A-Za-z0-9]{8,}$/.test(psw)) {
        passwordError.style.display = 'inline';
    } else {
        passwordError.style.display = 'none';
    }
});

document.getElementById('unameForm').addEventListener('submit', function(event) {
    var uname = document.getElementById('uname').value;
    var psw = document.getElementById('psw').value;
    var unameError = document.getElementById('usernameError');
    var passwordError = document.getElementById('passwordError');

    if (/\s/.test(uname)) {
        unameError.style.display = 'inline';
        event.preventDefault();
    }

    if (!/^[A-Za-z0-9]{8,}$/.test(psw)) {
        passwordError.style.display = 'inline';
        event.preventDefault();
    }
});

/**
 * show password shitssss
 */
function myFunction() {
    var passwordField = document.getElementById("psw");
    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}

