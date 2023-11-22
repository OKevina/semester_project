<p>Dear {{ $booking->user->name }},</p>

<p>Your booking with the code {{ $booking->generateUniqueCode() }} has been canceled.</p>

<p>Details:</p>
<ul>
    <li>Destination: {{ $booking->destination->DestinationName }}</li>
</ul>

<p>We apologize for any inconvenience caused.</p>
