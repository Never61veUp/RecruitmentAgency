<?php
/* @var \App\Core\View\View $view */
/* @var AllOffersController $this */
/* @var array<\App\Core\Model\Offer> $offers */

use App\Controllers\AllOffersController;

?>
<?php $view->renderComponent('start'); ?>
<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Мои офферы</h2>
    <?php foreach ($offers as $offer) { ?>
        <div class="border-b py-4">
            <h3 class="text-lg font-semibold"><?php echo htmlspecialchars($offer->getTitle()); ?></h3>
            <p><?php echo htmlspecialchars($offer->getDescription()); ?></p>
            <p><strong>Зарплата:</strong> <?php echo htmlspecialchars($offer->getSalary()); ?></p>
            <p><strong>Опыт:</strong> <?php echo htmlspecialchars($offer->getRequiredExperience()); ?></p>
            <p><strong>Регион:</strong> <?php echo htmlspecialchars($offer->getRegion()); ?></p>
            <?php
            $color = $offer->isRemote() ? 'green' : 'red';
        ?>
            <p class="text-<?= $color ?>-500"><strong>Удаленная работа:</strong> <?php echo $offer->isRemote() ? 'Да' : 'Нет'; ?></p>

            <!-- Форма для редактирования оффера -->
            <form method="POST" class="mt-4">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="offer_id" value="<?php echo $offer->getId(); ?>">
                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Редактировать</button>
            </form>

            <!-- Форма для удаления оффера -->
            <form method="POST" class="mt-2">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="offer_id" value="<?php echo $offer->getId(); ?>">
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Удалить</button>
            </form>
        </div>
    <?php } ?>
    <a href="/employer/offers/add"> Добавить объявление</a>
</div>
<?php $view->renderComponent('end');
