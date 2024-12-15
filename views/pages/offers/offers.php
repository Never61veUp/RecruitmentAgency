<?php
/* @var \App\Core\View\View $view */
/* @var AllOffersController $this */
/* @var array<\App\Core\Model\Offer> $offers */

use App\Controllers\AllOffersController;

?>
<?php $view->renderComponent('start'); ?>
<?php $view->renderComponent('search'); ?>

<?php foreach ($offers as $offer) {
    ?>
    <div class='bg-white shadow-md rounded-lg p-8 my-6 w-full max-w-lg mx-auto'>
        <h2 class='text-2xl font-bold text-gray-800 mb-2'><?php echo $offer->getTitle() ?></h2>
        <p class='text-gray-600 mb-1'><strong>Компания:</strong><?php echo $offer->getCompanyName() ?></p>
        <p class='text-gray-600 mb-1'><strong>Местоположение:</strong><?php echo $offer->getRegion() ?></p>
        <p class='text-gray-600 mb-1'><strong>Зарплата:</strong> <?php echo $offer->getSalary() ?></p>
        <p class='text-gray-600 mb-1'><strong>Опыт:</strong><?php echo $offer->getRequiredExperience() ?></p>
        <p class='text-gray-600 mb-1'><strong>Статус:</strong><?php echo $offer->getStatus() ?></p>
        <?php
        $color = $offer->isRemote() ? 'green' : 'red';
    ?>
        <p class="text-<?= $color ?>-500 font-semibold mb-4"><strong>Удалённая работа:</strong><?php echo $offer->isRemote() ? ' Да' : ' Нет'; ?></p>

        <a href="/offer/<?php echo $offer->getId(); ?>" class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded'>Откликнуться</a>
        <div>
            <p>добавлено: <?php echo $offer->getCreatedAt() ?></p>
            <p>обнавлено: <?php echo $offer->getUpdatedAt() ?></p>
        </div>
    </div>
        <?php
}?>


<?php $view->renderComponent('end');
