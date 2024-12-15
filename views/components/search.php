<form action="/offers" method="post" class="flex items-center my-10 space-x-2 justify-center w-full max-w-5xl px-4 mx-auto">
    <!-- Search Input -->
    <div class="flex-grow flex items-center border border-gray-300 rounded-lg px-3 py-2 bg-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" d="M10 2a8 8 0 105.293 14.707l4.292 4.293a1 1 0 001.415-1.414l-4.293-4.293A8 8 0 0010 2zM4 10a6 6 0 1112 0 6 6 0 01-12 0z" clip-rule="evenodd" />
        </svg>
        <input type="text" name="title" id="title" placeholder="Профессия, должность или компания" class="ml-2 w-full outline-none text-gray-600 placeholder-gray-400">
    </div>

    <!-- Search Button -->
    <button class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none">
        Найти
    </button>

    <!-- Filter Button -->
    <a id="filterButton" class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-lg hover:bg-gray-200 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L15 13.414V19a1 1 0 01-1.447.894l-4-2A1 1 0 019 17v-3.586L3.293 7.707A1 1 0 013 7V5zm2 1v.586l5.707 5.707A1 1 0 0111 12v3.382l2 1V12a1 1 0 01.293-.707L19 6.586V6H5z" clip-rule="evenodd" />
        </svg>
    </a>
    <div id="filterModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <h3 class="text-xl font-semibold mb-4">Фильтры для поиска</h3>

            <form action="search.php" method="GET">
                <div class="mb-4">
                    <label for="position" class="block text-gray-700">Должность</label>
                    <input type="text" id="position" name="position" class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="Введите должность">
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-gray-700">Локация</label>
                    <input type="text" id="location" name="location" class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="Введите локацию">
                </div>

                <div class="mb-4">
                    <label for="salary" class="block text-gray-700">Зарплата от</label>
                    <input type="number" id="salary" name="salary" class="w-full p-2 border border-gray-300 rounded mt-1" placeholder="Введите минимальную зарплату">
                </div>

                <div class="mb-4">
                    <label for="experience" class="block text-gray-700">Опыт</label>
                    <select id="experience" name="experience" class="w-full p-2 border border-gray-300 rounded mt-1">
                        <option value="">Не важно</option>
                        <option value="junior">Junior</option>
                        <option value="middle">Middle</option>
                        <option value="senior">Senior</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="button" id="closeButton" class="bg-red-500 text-white px-4 py-2 rounded mr-2 hover:bg-red-700">
                        Закрыть
                    </button>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">
                        Применить фильтры
                    </button>
                </div>
            </form>
        </div>
    </div>

</form>
<script>
    // Открытие окна с фильтрами
    document.getElementById('filterButton').addEventListener('click', function() {
        document.getElementById('filterModal').classList.remove('hidden');
    });
    document.getElementById('closeButton').addEventListener('click', function() {
        filterModal.classList.add('hidden');
         // Восстановить текст кнопки
    });
    // Закрытие окна с фильтрами
    // document.getElementById('closeButton').addEventListener('click', function() {
    //     document.getElementById('filterModal').classList.add('hidden');
    // });
</script>
