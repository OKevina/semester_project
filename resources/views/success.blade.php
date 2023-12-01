<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Processing</title>
    <link rel="stylesheet" href="{{ asset('assets/css/success.css') }}">
    <style> body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f0f0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
}

.container {
    text-align: center;
}

.loading-text {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #2d3134;
}

@keyframes rotate {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

.loading-spinner {
    border: 8px solid #2d3134;
    border-top: 8px solid #fff;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: rotate 1s linear infinite;
    margin-bottom: 20px;
    margin-left: 300px;

}

button {
    background-color: #2d3134;
    color: white;
    font-size: 18px;
    padding: 12px 24px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
    margin-left: 300px;

}

button a{
    color: white;
    text-decoration: none;
}

button:hover {
    background-color: #79ddf1;
    transform: scale(1.05);
}
</style>
</head>
<body>

<!-- Include SweetAlert CDN links -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

<div class="success_container">
    <div class="loading-text">Payment is being processed...Please check your phone</div>
    <div class="loading-spinner"></div>

    <button><a href="{{ route('user.bookings') }}">OK</a></button>

</div>

</body>
</html>
