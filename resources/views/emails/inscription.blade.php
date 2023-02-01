<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <title>Confirm you account</title>
</head>
<body>
<div class="container my-2">
        <img class='mx-auto w-25' src="{{ asset('logo.png')}}" alt="Logo">
        <h1 class="title p-1">Confirm you account</h1>
        <h3>Hello {{ $name }}</h3>
        <p class="p-1">
            Confirm Your Identity With our site. 
            Before we can review your account, please click on the link below to help us verify your account.
        </p>
        <a href="{{ $href }}" class="btn btn-primary">Confirm your account</a>
</div>
</body>
</html>