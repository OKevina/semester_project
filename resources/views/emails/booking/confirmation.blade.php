<p>Dear {{ optional($booking->user)->name }},</p>


<p>Your booking with the code {{ $booking->generateUniqueCode() }} has been confirmed.</p>

<p>Details:</p>
<ul>
    <li>Destination: {{ optional($booking->destination)->DestinationName }}</li>

</ul>

<p>Thank you for choosing our service!</p>
