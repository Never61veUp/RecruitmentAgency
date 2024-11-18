<?php
/* @var \App\Core\View\View $view */
/* @var \App\Core\Session\Session $session? */
?>
<?php $view->renderComponent('start'); ?>
<div id="myDiv" class="bg-gray-100 flex items-center justify-center">

    <form action="/signUp/company" method="post" class="flex flex-col items-center w-full justify-center max-w-md p-8 bg-white rounded-2xl shadow-md space-y-6 mx-auto">
        <h1 class="text-2xl font-semibold">Регистрация компании</h1>
        <div class="mb-6">
            <label for="title" class="block text-lg font-semibold text-gray-700">Название</label>
            <input type="text" name="title" id="title" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <ul class="text-sm text-red-500 mt-2">
                <?php if ($session->has('title')) { ?>
                    <?php foreach ($session->getFlash('title') as $error) { ?>
                        <li><?php echo $error; ?></li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>

        <div class="mb-6">
            <label for="email" class="block text-lg font-semibold text-gray-700">Почта</label>
            <input type="email" name="email" id="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <ul class="text-sm text-red-500 mt-2">
                <?php if ($session->has('email')) { ?>
                    <?php foreach ($session->getFlash('email') as $error) { ?>
                        <li><?php echo $error; ?></li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>

        <div class="mb-6">
            <label for="password" class="block text-lg font-semibold text-gray-700">Пароль</label>
            <input type="password" name="password" id="password" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <ul class="text-sm text-red-500 mt-2">
                <?php if ($session->has('password')) { ?>
                    <?php foreach ($session->getFlash('password') as $error) { ?>
                        <li><?php echo $error; ?></li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>

        <div>
            <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg border border-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 active:bg-blue-700 transition">
                Отправить
            </button>
        </div>
    </form>
</div>

<?php $view->renderComponent('end'); ?>