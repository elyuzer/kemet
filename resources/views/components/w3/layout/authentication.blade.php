<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="{{asset('images/logo/kcaa.png')}}">
        <link rel="stylesheet" href="{{asset('css/auth.css')}}">
    </head>
<body class="w3-sand">
    <div class="w3-container" style="padding:50px;">
        <div class="w3-card-4 w3-white center" style="max-width:600px">
            
        {{$slot}}
        </div>
    </div>
</body>
</html>
