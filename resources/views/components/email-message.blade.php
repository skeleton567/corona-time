@props(['title', 'action', 'url'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
        <style>
            @media only screen and (min-width: 600px) {
                body {
            box-sizing: border-box;
            width: 100% !important;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            }

            h1{
                margin-bottom: 8px; 
                font-weight: 900; 
                font-size: 25px;
            }
        
            img{
                margin-bottom: 27px;
            }
            p{
                margin-bottom: 20px; 
                font-size: 18px
            }

            button{
            background: #0FBA68; 
            border-radius: 8px; 
            padding: 16px 16px;
            width: 392px; 
            color: inherit;
            border: none;
            font: inherit;
            cursor: pointer;
            outline: inherit;
            }

            a{
                color: white !important;
                text-decoration: none; 
                text-transform: uppercase;
            }
        }

            @media only screen and (max-width: 500px) {
                body {
            box-sizing: border-box;
            width: 100% !important;
            height: 100vh;
            margin: 0;
            display: grid; 
            place-items: center;
            padding: 16px;
            }

            img{
                width: 100%;
                height: 241px;
                margin-bottom: 40px;
            }

            h1{
                margin-bottom: 8px; 
                font-weight: 900; 
                font-size: 20px;
            }
        
            p{
                margin-bottom: 24px; 
                font-size: 16px
            }

            button{
            background: #0FBA68; 
            border-radius: 8px; 
            padding: 14px 14px;
            width: 100%; 
            color: inherit;
            border: none;
            font: inherit;
            cursor: pointer;
            outline: inherit;
            font-size: 14px;
            }

            a{
                color: white !important;
                text-decoration: none; 
                text-transform: uppercase;
            }

            }
        </style>
    </head>
    <body style="{{app()->getLocale() === 'en' ? 'font-family: inter;' : 'font-family: firGO;' }}">

        
            <img src="https://i.im.ge/2022/09/08/OfzTNW.email-image.png" class="logo" alt="Logo">
            <h1 >{{$title}}</h1>
            <p style=";">Click this button to {{$action}}</p>
            
            <button >
                <a href="{{$url}}">
                    {{$slot}}
                </a>
            </button>
    
        
        
    </body>
   </html>

