<?php
/* @var \App\Core\View\View $view */
/* @var OfferController $this */
/* @var \App\Core\Model\Offer $offer */

use App\Controllers\OfferController;

?>

<?php $view->renderComponent('start'); ?>

    <div class="max-w-2xl mx-auto bg-white p-8 shadow-md rounded-lg">

        <h2 class="text-xl font-semibold text-gray-600 mb-6">Вы откликаетесь на позицию: <?php echo $offer->getTitle(); ?></h2>

        <form action="/offer/respond" method="POST" class="space-y-4">
            <input type="hidden" name="offer_id" value="<?php echo htmlspecialchars($offer->getId()); ?>">

            <div>
                <label for="full_name" class="block text-gray-700 font-medium">Ваше имя</label>
                <input
                    type="text"
                    id="full_name"
                    name="full_name"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Иван Иванов"
                    required>
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-medium">Ваш email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="ivan.ivanov@example.com"
                    required>
            </div>

            <div>
                <label for="phone" class="block text-gray-700 font-medium">Ваш телефон</label>
                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="+7 (999) 123-45-67"
                    required>
            </div>

            <div>
                <label for="cover_letter" class="block text-gray-700 font-medium">Сопроводительное письмо</label>
                <textarea
                    id="cover_letter"
                    name="cover_letter"
                    rows="5"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Расскажите немного о себе и своем опыте..."
                    required></textarea>
            </div>

            <div>
                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Отправить отклик
                </button>
            </div>
        </form>
    </div>

<?php $view->renderComponent('end'); ?>