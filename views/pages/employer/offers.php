<?php
/* @var \App\Core\View\View $view */
/* @var AllOffersController $this */
/* @var array<\App\Core\Model\Offer> $offers */

use App\Controllers\AllOffersController;

?>
<?php $view->renderComponent('start'); ?>
<div class="bg-white p-4 rounded-lg shadow max-w-4xl mx-auto my-4">
    <h2 class="text-2xl font-semibold mb-4 text-center">Мои офферы</h2>
    <?php foreach ($offers as $offer) { ?>
        <div class="p-4 mb-4 bg-gray-100 rounded-lg shadow-md">
            <form method="POST" action="/employer/offers/edit" class="grid gap-4">
                <input type="hidden" name="id" value="<?php echo $offer->getId(); ?>">

                <!-- Заголовок -->
                <label class="block">
                    <span class="text-gray-700">Заголовок</span>
                    <input
                            type="text"
                            name="title"
                            value="<?php echo htmlspecialchars($offer->getTitle()); ?>"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-300"
                    >
                </label>

                <!-- Описание -->
                <label class="block">
                    <span class="text-gray-700">Описание</span>
                    <textarea
                            name="description"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-300"
                    ><?php echo htmlspecialchars($offer->getDescription()); ?></textarea>
                </label>

                <!-- Зарплата -->
                <label class="block">
                    <span class="text-gray-700">Зарплата</span>
                    <input
                            type="number"
                            name="salary"
                            value="<?php echo htmlspecialchars($offer->getSalary()); ?>"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-300"
                    >
                </label>

                <!-- Опыт -->
                <label class="block">
                    <span class="text-gray-700">Требуемый опыт</span>
                    <input
                            type="text"
                            name="requiredExperience"
                            value="<?php echo htmlspecialchars($offer->getRequiredExperience()); ?>"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-300"
                    >
                </label>

                <!-- Регион -->
                <label class="block">
                    <span class="text-gray-700">Регион</span>
                    <input
                            type="text"
                            name="location"
                            value="<?php echo htmlspecialchars($offer->getRegion()); ?>"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-300"
                    >
                </label>

                <!-- Удаленная работа -->
                <label class="block">
                    <span class="text-gray-700">Удаленная работа</span>
                    <select
                            name="isRemote"
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-300"
                    >
                        <option value="1" <?php echo $offer->isRemote() ? 'selected' : ''; ?>>Да</option>
                        <option value="0" <?php echo ! $offer->isRemote() ? 'selected' : ''; ?>>Нет</option>
                    </select>
                </label>
                <p><?php echo $offer->getStatus() ?></p>

                <!-- Кнопка сохранить -->
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Сохранить изменения
                </button>
            </form>
        </div>
    <?php } ?>
    <div class="text-center">
        <a href="/employer/offers/add" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Добавить объявление
        </a>
    </div>
</div>
<?php $view->renderComponent('end'); ?>
