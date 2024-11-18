<?php
/* @var \App\Core\View\View $view */
/* @var \App\Core\Session\Session $session? */
?>
<?php $view->renderComponent('start'); ?>
<div id="myDiv" class="bg-gray-100 flex items-center justify-center">
    <form action="/signIn" class="flex flex-col items-center w-full justify-center max-w-md p-10 bg-white rounded-2xl shadow-md space-y-6 mx-auto" method="post">
        <div>
            <div class="mb-4">
                <p class="text-xl font-semibold text-gray-700">Почта</p>
            </div>
            <div>
                <div class="mb-4">
                    <input
                            type="email"
                            name="email"
                            class="w-full px-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Введите ваш email"
                    >
                </div>
                <ul class="text-sm text-red-500">
                    <?php if ($session->has('email')) { ?>
                        <?php foreach ($session->getFlash('email') as $error) { ?>
                            <li class="mb-1">
                                <?php echo $error; ?>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div>
            <div class="mb-4">
                <p class="text-xl font-semibold text-gray-700">Пароль</p>
            </div>
            <div>
                <div class="mb-4">
                    <input class="w-full px-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           type="password" name="password" class="border"
                    placeholder="Введите пароль">
                </div>
                <ul>
                    <?php
if ($session->has('password')) { ?>

                        <?php foreach ($session->getFlash('password') as $error) {
                            ?> <li>
                                <?php echo $error; ?>
                            </li>

                            <?php

                        }
}
?>
                </ul>
            </div>
        </div>
        <div class="mt-4 flex gap-4">
            <a href="/signUp/company" class="w-full py-1 px-1 bg-blue-500 text-white font-semibold rounded-lg border border-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 active:bg-blue-700 transition text-center">
                Регистрация для соискателя
            </a>

            <a href="/signUp/user" class="w-full py-1 px-1 bg-green-500 text-white font-semibold rounded-lg border border-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300 active:bg-green-700 transition text-center">
                Регистрация для работодателя
            </a>
        </div>
        <div class="mt-4">
            <button class="w-full py-2 px-8 bg-blue-500 text-white font-semibold rounded-lg border border-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 active:bg-blue-700 transition">
                Войти
            </button>
        </div>
    </form>
</div>

<?php $view->renderComponent('end'); ?>
