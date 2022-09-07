<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://free.bboxtype.com/embedfonts/?family=FiraGO:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <title>Coronatime</title>
    @vite('resources/css/app.css')
</head>
<body class="border-box {{app()->getLocale() === 'en' ? 'font-[Inter]' : 'font-[FiraGO]' }} p-0 m-0">
    {{$slot}}
</body>
</html>