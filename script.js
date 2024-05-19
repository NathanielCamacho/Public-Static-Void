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
