@props(['title', 'action', 'url'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body style="{{app()->getLocale() === 'en' ? 'font-family: inter;' : 'font-family: firGO;' }}">

    <main style="display: grid; place-items: center;"> 
        <img style="margin-bottom: 56px;" src="https://i.im.ge/2022/09/08/OfzTNW.email-image.png" class="logo" alt="Logo">
        <h1 style="margin-bottom: 16px; font-weight: 900; font-size: 25px;" >{{$title}}</h1>
        <p tyle="margin-bottom: 40px; font-size: 18px;">Click this button to {{$action}}</p>
        
        <button style="background: #0FBA68; border-radius: 8px; padding: 16px 16px; width: 392px; ackground: none;
        color: inherit;
        border: none;
        font: inherit;
        cursor: pointer;
        outline: inherit;">
            <a style="color: white !important;text-decoration: none; text-transform: uppercase;" href="{{$url}}">
                {{$slot}}
            </a>
        </button>
    <main>
    
    
</body>
</html>

