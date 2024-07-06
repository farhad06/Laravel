<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body>
    {{-- @php
        $token=$mailData['token'];
    @endphp --}}
    <strong>Hello {{ $mailData['name'] }}</strong><br>
    <p>
    <dl>
        <dt>Your Phone Number is:</dt><br>
        <dd>{{ $mailData['phone'] }}</dd><br>
        <dt>Your Email is:</dt><br>
        <dd>{{ $mailData['email'] }}</dd>
    </dl>
    </p>
    <p>Please click the following link to verify your email:</p>
    <a href="{{ $mailData['url'] }}">Verify Email</a>
</body>

</html>
