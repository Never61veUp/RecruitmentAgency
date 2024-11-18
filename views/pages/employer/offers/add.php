<?php
/* @var \App\Core\View\View $view */
/* @var \App\Core\Session\Session $session? */
?>
<?php $view->renderComponent('start'); ?>

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <form action="/employer/offers/add" method="post" class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md">
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Название
                </label>
                <input type="text" name="title" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <ul class="mt-2 text-red-500 text-sm">
                    <?php if ($session->has('title')) { ?>
                        <?php foreach ($session->getFlash('title') as $error) { ?>
                            <li><?php echo $error; ?></li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Описание
                </label>
                <input type="text" name="description" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <ul class="mt-2 text-red-500 text-sm">
                    <?php if ($session->has('description')) { ?>
                        <?php foreach ($session->getFlash('description') as $error) { ?>
                            <li><?php echo $error; ?></li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Зарплата
                </label>
                <input type="text" name="salary" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <ul class="mt-2 text-red-500 text-sm">
                    <?php if ($session->has('salary')) { ?>
                        <?php foreach ($session->getFlash('salary') as $error) { ?>
                            <li><?php echo $error; ?></li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Требуемый опыт
                </label>
                <input type="text" name="requiredExperience" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <ul class="mt-2 text-red-500 text-sm">
                    <?php if ($session->has('requiredExperience')) { ?>
                        <?php foreach ($session->getFlash('requiredExperience') as $error) { ?>
                            <li><?php echo $error; ?></li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Местоположение (Территория России)
                </label>
                <select name="location" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Москва">Москва</option>
                    <option value="Санкт-Петербург">Санкт-Петербург</option>
                    <option value="Новосибирск">Новосибирск</option>
                    <option value="Екатеринбург">Екатеринбург</option>
                    <option value="Нижний Новгород">Нижний Новгород</option>
                    <option value="Казань">Казань</option>
                    <option value="Челябинск">Челябинск</option>
                    <option value="Омск">Омск</option>
                    <option value="Самара">Самара</option>
                    <option value="Ростов-на-Дону">Ростов-на-Дону</option>
                    <!-- Добавьте другие города по мере необходимости -->
                </select>
                <ul class="mt-2 text-red-500 text-sm">
                    <?php if ($session->has('location')) { ?>
                        <?php foreach ($session->getFlash('location') as $error) { ?>
                            <li><?php echo $error; ?></li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Формат работы
                </label>
                <select name="isRemote" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="1">Удаленно</option>
                    <option value="0">В офисе</option>
                </select>
                <ul class="mt-2 text-red-500 text-sm">
                    <?php if ($session->has('workFormat')) { ?>
                        <?php foreach ($session->getFlash('workFormat') as $error) { ?>
                            <li><?php echo $error; ?></li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
            <div>
                <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Отправить
                </button>
            </div>
        </form>
    </div>

<?php $view->renderComponent('end'); ?>