<?php
/* @var \App\Core\View\View $view */
/* @var \App\Controllers\EmployeeResponsesController $this */
/* @var array $responses */

?>

<?php $view->renderComponent('start'); ?>

<div class="overflow-x-auto max-w-screen-2xl mx-auto bg-white p-8 shadow-md rounded-lg my-4">
    <table class="table-fixed border-collapse bg-white w-full">
        <thead>
        <tr class="bg-gray-100 border-b">
            <th class="text-left py-3 px-4 font-semibold text-sm text-gray-700">Имя</th>
            <th class="w-1/4 text-left py-3 px-4 font-semibold text-sm text-gray-700">Email</th>
            <th class="w-1/6 text-left py-3 px-4 font-semibold text-sm text-gray-700">Телефон</th>
            <th class="text-left py-3 px-4 font-semibold text-sm text-gray-700">Компания</th>
            <th class="text-left py-3 px-4 font-semibold text-sm text-gray-700">Позиция</th>
            <th class="w-1/4 text-left py-3 px-4 font-semibold text-sm text-gray-700">Сопроводительное письмо</th>
            <th class="text-left py-3 px-3 font-semibold text-sm text-gray-700">Управление</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($responses as $response) { ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="py-3 px-4 text-gray-800">
                    <?php echo htmlspecialchars($response['fullName']); ?>
                </td>
                <td class="py-3 px-4 text-gray-800">
                    <?php echo htmlspecialchars($response['email']); ?>
                </td>
                <td class="py-3 px-4 text-gray-800">
                    <?php echo htmlspecialchars($response['phone']); ?>
                </td>
                <td class="py-3 px-4 text-gray-800">
                    <?php echo htmlspecialchars($response['company_name']); ?>
                </td>
                <td class="py-3 px-4 text-gray-800">
                    <?php echo htmlspecialchars($response['offer_title']); ?>
                </td>
                <td class="py-3 px-4 text-gray-800">
                    <div class="relative">
                        <p class="cover-letter break-words">
                            <?php echo nl2br(htmlspecialchars($response['Cv'])); ?>
                        </p>
                        <button class="toggle-btn text-blue-500 mt-2 hover:underline">
                            Читать дальше
                        </button>
                    </div>
                </td>
                <td class="py-3 px-4 text-gray-800">
                    <form method="POST" action="/responses/remove">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($response['id']); ?>">
                        <button type="submit" class="text-red-500 hover:text-red-700 font-semibold cursor-pointer transition duration-200">
                            Отозвать
                        </button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const coverLetters = document.querySelectorAll('.cover-letter');
        const toggleButtons = document.querySelectorAll('.toggle-btn');

        toggleButtons.forEach((btn, index) => {
            btn.addEventListener('click', function () {
                const coverLetter = coverLetters[index];
                const isExpanded = coverLetter.classList.toggle('expanded');
                btn.textContent = isExpanded ? 'Свернуть' : 'Читать дальше';
            });
        });
    });
</script>

<style>
    .cover-letter {
        max-height: 1.5em; /* Высота для 3 строк текста */
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .cover-letter.expanded {
        max-height: 100%; /* Полностью показываем текст */
    }
</style>
<?php $view->renderComponent('end'); ?>


