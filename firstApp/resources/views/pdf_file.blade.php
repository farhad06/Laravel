<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data['title'] }}</title>
</head>

<body>
    <strong>Hello {{ $data['name'] }}</strong>
    <p>
    <dl>
        <dt>Your Phone Number is:</dt><br>
        <dd>{{ $data['phone'] }}</dd><br>
        <dt>Your Email is:</dt><br>
        <dd>{{ $data['email'] }}</dd>
    </dl>
    </p>
    <p>Thanks For Registration</p>
</body>

</html>
