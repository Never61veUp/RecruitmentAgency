<?php
/* @var \App\Core\View\View $view */
/* @var \App\Core\Session\Session $session? */
?>
<?php $view->renderComponent('start'); ?>

<form action="/employer/offers/add" method="post">
    <div>
        <p>
            Название
        </p>
    </div>
    <div>
        <input type="text" name="title" class="border">
    </div>
    <ul>
    <?php
    if ($session->has('title')) { ?>

            <?php foreach ($session->getFlash('title') as $error) {
                ?> <li>
                <?php echo $error; ?>
            </li>

            <?php

            }
    }
?>
    </ul>
    <div>
        <button class="btn btn-primary border">
            Отправить
        </button>
    </div>
</form>
<?php $view->renderComponent('end'); ?>