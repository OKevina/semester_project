document.addEventListener('DOMContentLoaded', function () {
    var totalAmount = document.getElementById('totalAmount').innerText;
    document.getElementById('amount').value = totalAmount;
});

function handlePayment() {
    var selectedPaymentMethod = getSelectedPaymentMethod();

    if (selectedPaymentMethod === 'mpesa') {
        document.getElementById('mpesaForm').submit();
    } else if (selectedPaymentMethod === 'paypal') {
        document.getElementById('paypalForm').submit();
    } else {
        // Handle other payment methods or form submission
        alert('Processing other payment methods.');
    }
}

function selectPayment(option) {
    const showPaypal = document.getElementById('paypalForm');
    const showMpesa = document.getElementById('mpesaForm');


    if (option === 'paypal') {
       showPaypal.style.display = 'block';
        showMpesa.style.display = 'none';
    } else if (option === 'mpesa') {
        showPaypal.style.display = 'none';
        showMpesa.style.display = 'block';
    }
}

function processPayment() {
    // Add your payment processing logic here
    alert('Payment processed successfully!');
}

function getSelectedPaymentMethod() {
    // Your logic to get the selected payment method (e.g., from a variable or DOM)
    // Assuming there's a variable named 'selectedPaymentMethod'
    return '{{ $selectedPaymentMethod }}';
}
