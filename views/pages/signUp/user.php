<?php
/* @var \App\Core\View\View $view */
/* @var \App\Core\Session\Session $session? */
?>
<?php $view->renderComponent('start'); ?>
    <form action="/signUp/user" method="post">
        <div>
            <div>
                <p>
                    Имя
                </p>
            </div>
            <div>
                <div>
                    <input type="text" name="name" class="border">
                </div>
                <ul>
                    <?php
                    if ($session->has('name')) { ?>

                        <?php foreach ($session->getFlash('name') as $error) {
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
        <div>
            <div>
                <p>
                    Фамилия
                </p>
            </div>
            <div>
                <div>
                    <input type="text" name="surName" class="border">
                </div>
                <ul>
                    <?php
if ($session->has('surName')) { ?>

                        <?php foreach ($session->getFlash('surName') as $error) {
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
        <div>
            <div>
                <p>
                    Дата рождения
                </p>
            </div>
            <div>
                <div>
                    <input type="date" name="birthDate" class="border">
                </div>
                <ul>
                    <?php
if ($session->has('birthDate')) { ?>

                        <?php foreach ($session->getFlash('birthDate') as $error) {
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
        <div>
            <div>
                <p>
                    Почта
                </p>
            </div>
            <div>
                <div>
                    <input type="email" name="email" class="border">
                </div>
                <ul>
                    <?php
                    if ($session->has('email')) { ?>

                        <?php foreach ($session->getFlash('email') as $error) {
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
        <div>
            <div>
                <p>
                    Пароль
                </p>
            </div>
            <div>
                <div>
                    <input type="password" name="password" class="border">
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
        <div>
            <button class="btn btn-primary border">
                Отправить
            </button>
        </div>
    </form>
<?php $view->renderComponent('end'); ?>