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
    <button class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-lg hover:bg-gray-200 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L15 13.414V19a1 1 0 01-1.447.894l-4-2A1 1 0 019 17v-3.586L3.293 7.707A1 1 0 013 7V5zm2 1v.586l5.707 5.707A1 1 0 0111 12v3.382l2 1V12a1 1 0 01.293-.707L19 6.586V6H5z" clip-rule="evenodd" />
        </svg>
    </button>

</form>
