<!DOCTYPE html>
<html>
<head>
    <title>Account Confirmation</title>
</head>
<body>
    <p>Click the following link to confirm your account:</p>
    <a href="{{ route('confirmation', ['token' => $ConfirmationToken]) }}">Confirm Account</a>
</body>
</html>
