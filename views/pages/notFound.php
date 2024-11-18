<?php
/*
 * Страница ошибки 404 с использованием Tailwind CSS и PHP
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница не найдена - 404</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @keyframes float {
            0% { transform: translatey(0px); }
            50% { transform: translatey(-15px); }
            100% { transform: translatey(0px); }
        }
        .floating {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-blue-500 to-purple-600 h-screen flex items-center justify-center">
<div class="text-center">
    <div class="floating">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-40 w-40 text-white mx-auto mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 9V5a3.75 3.75 0 117.5 0v4m-9.25 7.5h10a2.25 2.25 0 012.25 2.25v1.25a2.25 2.25 0 01-2.25 2.25H6.5A2.25 2.25 0 014.25 20v-1.25a2.25 2.25 0 012.25-2.25z" />
        </svg>
    </div>
    <h1 class="text-6xl font-bold text-white mb-4">404</h1>
    <p class="text-2xl text-white mb-6">Ой! Похоже, что эта страница не существует.</p>
    <a href="/home" class="inline-block px-8 py-3 text-lg font-semibold text-blue-600 bg-white rounded-lg shadow-lg hover:bg-gray-100 hover:shadow-2xl transition duration-300 ease-in-out">
        Вернуться на главную
    </a>
</div>
</body>
</html>

