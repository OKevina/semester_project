<!DOCTYPE html>
<html>
<head>
    <title>Booking Cancellation</title>
</head>
<body>
    <h1>Booking Cancellation</h1>

    <p>Dear {{ $booking->user->name }},</p>

    <p>Your booking with the code {{ $booking->generateUniqueCode() }} has been canceled.</p>

    <p>Details:</p>
    <ul>
        <li>Hotel: {{ optional($booking->hotel)->name }}</li>
        <!-- Add more booking details here -->
    </ul>

    <p>We apologize for any inconvenience caused.</p>

    <p>Thank you for using our service.</p>

    <p>Best regards,</p>
    <p>Travel and Tours ltd</p>
</body>
</html>
