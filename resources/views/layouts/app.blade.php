<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MANGCEK')</title>
    
    <!-- Tailwind CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .bg-primary { background-color: #f79039; }
        .text-primary { color: #f79039; }
        .border-primary { border-color: #f79039; }
        .hover\:bg-primary-dark:hover { background-color: #e6812a; }
    </style>
</head>
<body class="bg-gray-50">
    @yield('content')
</body>
</html>