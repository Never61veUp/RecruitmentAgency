<?php /* @var \App\Core\Auth\IAuth $auth */
$user = $auth->user()?>
<header class="flex items-center justify-between p-4 bg-white shadow-md">
    <div class="flex items-center space-x-4">
        <a href="/home" class="flex items-center justify-center w-10 h-10 bg-blue-600 rounded-full text-white font-bold">
            JL
        </a>
        <div class="flex space-x-2">
            <a href="/offers" class="px-4 py-2 font-semibold text-black bg-gray-100 rounded-md">Работа</a>
            <?php

if ($auth->isEmployer()) {

    ?><a href="/employer/offers" class="px-4 py-2 text-gray-400">Наём</a> <?php
} ?>

        </div>
    </div>
    <nav class="flex items-center space-x-4">
        <a href="/services" class="text-black">Сервисы</a>
        <a href="/help" class="text-black">Помощь</a>
        <div class="flex items-center space-x-2">
            <span class="text-black">Россия</span>
<!--            <a href="/addResume" class="px-4 py-2 font-semibold text-black bg-gray-100 rounded-md">Создать резюме</a>-->

            <?php if ($auth->isLoggedIn()) {
                $user = $auth->user();
                ?>
                <div class="relative">
                    <!-- Profile Button -->
                    <button id="profileButton" class="flex items-center text-black hover:text-blue-500 focus:outline-none">
                        <img src="https://www.svgrepo.com/show/512729/profile-round-1342.svg" alt="Profile Icon" class="h-6 w-6">
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-10">
                        <p class="block px-4 py-2 text-gray-700 hover:bg-gray-200"><?php echo $user->getName()?></p>
                        <?php
                        if ($auth->isEmployer()) {
                            ?>
                            <a href="/employer/offers" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Мои вакансии</a>
                            <a href="/employer/offers/add" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Создать вакансию</a>
                            <a href="/employer/responses" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Мои отклики</a>
                            <?php
                        } elseif ($auth->isAdmin()) {
                            ?>
                    <a href="/admin/offers" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Одобрить вакансии</a>
                    <?php
                        } else {
                            ?>
                            <a href="/responses" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Мои отклики</a>
                            <?php
                        }
                ?>

                        <!-- Logout Button -->
                        <form action="/signOut" method="POST" class="block w-full">
                            <button type="submit" name="logout" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-200">Выход</button>
                        </form>
                    </div>
                </div>


            <?php } else { ?>
                <a href="/signIn" class="px-4 py-2 font-semibold text-black bg-gray-100 rounded-md">Войти</a>
            <?php } ?>

        </div>
    </nav>
    <script>
        // Toggle Dropdown Menu
        document.getElementById('profileButton').addEventListener('click', function() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
        });

        // Close the dropdown if clicked outside
        window.addEventListener('click', function(event) {
            const dropdown = document.getElementById('dropdownMenu');
            const profileButton = document.getElementById('profileButton');
            if (!profileButton.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</header>
