<?php
/* @var \App\Core\View\View $view */
/* @var \App\Core\Session\Session $session? */
?>
<?php $view->renderComponent('start'); ?>
<form action="/signIn" method="post">
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
