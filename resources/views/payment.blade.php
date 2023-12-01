<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="{{ asset('assets/css/card.css') }}">
</head>
<body>
    <div class="container">
        <div class="left">
            <p>Payment methods</p>
            <hr>
            <div class="methods">
                <div onclick="selectPayment('paypal')">
                    <i class="fa-solid fa-wallet"></i> Payment by PayPal
                </div>
                <div onclick="selectPayment('mpesa')">
                    <i class="fas fa-mobile-alt"></i> Payment by Mpesa
                </div>
            </div>
        </div>
        <div class="center">
            <div class="card-details" id="card-details">
                <form id="paypalForm" action="" method="POST">
                    @csrf
                    <div class="email" id="email-field">
                        <img src="{{ asset('assets/images/paypal.jpeg') }}" alt="" class="image1">
                        <p>Email</p>
                        <input type="email" name="email" placeholder="example@example.com" id="email" >
                    </div>

                    <button type="submit">PAY NOW</button>
                </form>
                <form id="mpesaForm" action="{{ route('perform-stk-push') }}" method="POST" style="display:none;" >
                    @csrf
                    <div class="mpesa" id="mpesa-field">
                        <img src="{{ asset('assets/images/mpesa.jpeg') }}" alt="" class="image1">
                        <p>Phone Number</p>
                        <input type="tel" name="mpesa_number" placeholder="Mpesa Phone Number" id="mpesa-number">
                    </div>
                    <input type="hidden" name="amount" id="amount" value="200">
                    <button type="submit">PAY NOW</button>
                </form>
                <form id="mpesaForm" action="{{ route('perform-stk-push') }}" method="POST" style="display:none;">
    @csrf
    <div class="mpesa" id="mpesa-field">
        <img src="{{ asset('assets/images/mpesa.jpeg') }}" alt="" class="image1">
        <p>Phone Number</p>
        <input type="tel" name="mpesa_number" placeholder="Mpesa Phone Number" id="mpesa-number">
        <input type="hidden" id="mpesa-roomId" name="roomId" value="{{ $formData1['roomId'] ?? '' }}" required>

<input type="hidden" name="check_in" value="{{ $formData1['check_in'] ?? '' }}">
<input type="hidden" name="check_out" value="{{ $formData1['check_out'] ?? '' }}">
<input type="hidden" name="adults" value="{{ $formData1['adults'] ?? '' }}">
<input type="hidden" name="child" value="{{ $formData1['child'] ?? '' }}">
<input type="hidden" name="rooms" value="{{ $formData1['rooms'] ?? '' }}">
    </div>




    <button type="submit">PAY NOW</button>
</form>

            </div>
        </div>
        {{-- <div class="right">
    <p>Order information</p>
    <div class="details">
    <div class="order-description">
    <div>Order Description</div>
    <div>
        {{ $formData1['nights'] ?? 0 }} nights
        <br>
        {{ $formData1['adults'] ?? 1 }} adults
        <br>
        {{ $formData1['child'] ?? 0 }} children
    </div>
    <div>Total: $<span id="totalAmount">{{ $formData1['pricePerNightCalculated'] ?? 200 }}</span></div>
</div>

        </div>
    </div> --}}
</div>

            {{-- </div>
        </div>
    </div> --}}
    <script src="{{ asset('assets/card.js') }}" defer></script>
    <script>
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
    </script>
    <!-- payment.blade.php -->




<script>



</script>



    <script src="{{ asset('assets/card.js') }}" defer></script>

</body>
</html>
