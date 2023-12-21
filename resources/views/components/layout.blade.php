<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
    
    <link rel="shortcut icon" href="/media/favicon.png" type="image/x-icon">
    {{-- CDN AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- CDN BOXICONS --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    {{-- Css Swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body>
    
    <x-navbar></x-navbar>
    <div>
        {{$slot}}
    </div>
    
    
    <x-footer></x-footer>
    
    {{-- script search - navbar --}}
    <script>
        const icon = document.querySelector('.icon');
        const search = document.querySelector('.search');
        icon.onclick = function(){
            search.classList.toggle('active')
        }
    </script>
    
    {{-- js Aos --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    {{-- Js Swiper --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>