/**
 * Quantity Script
 */
function increaseQty() {
    let qtyInput = document.querySelector('.product-qty');
    let currentValue = parseInt(qtyInput.value);
    if (currentValue < parseInt(qtyInput.max)) {
        qtyInput.value = currentValue + 1;
    }
}

function decreaseQty() {
    let qtyInput = document.querySelector('.product-qty');
    let currentValue = parseInt(qtyInput.value);
    if (currentValue > parseInt(qtyInput.min)) {
        qtyInput.value = currentValue - 1;
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