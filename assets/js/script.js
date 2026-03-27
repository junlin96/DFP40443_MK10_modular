function printInvoice() {
    window.print();
}

const quantityInputs = document.querySelectorAll('.quantity-input');
const totalPriceEl = document.getElementById('total-price');

function calculateTotal() {
    let total = 0;
    quantityInputs.forEach(input => {
        const quantity = parseInt(input.value, 10) || 0;
        const price = parseFloat(input.dataset.price) || 0;
        total += quantity * price;
    });
    if (totalPriceEl) {
        totalPriceEl.textContent = new Intl.NumberFormat('ms-MY', {
            style: 'currency',
            currency: 'MYR'
        }).format(total);
    }
}

if (quantityInputs.length > 0) {
    quantityInputs.forEach(input => {
        input.addEventListener('input', calculateTotal);
    });
    calculateTotal();
}