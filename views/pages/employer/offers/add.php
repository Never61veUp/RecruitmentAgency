<?php
/* @var \App\Core\View\View $view */
/* @var \App\Core\Session\Session $session? */
?>
<?php $view->renderComponent('start'); ?>

<form action="/employer/offers/add" method="post">

    <div>
        <div>
            <p>
                Название
            </p>
        </div>
        <div>
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
        </div>
    </div>
    <div>
        <div>
            <p>
                Описание
            </p>
        </div>
        <div>
            <div>
                <input type="text" name="description" class="border">
            </div>
            <ul>
                <?php
if ($session->has('description')) { ?>

                    <?php foreach ($session->getFlash('description') as $error) {
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
                Зарплата
            </p>
        </div>
        <div>
            <div>
                <input type="text" name="salary" class="border">
            </div>
            <ul>
                <?php
                if ($session->has('salary')) { ?>

                    <?php foreach ($session->getFlash('salary') as $error) {
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
                Требуемый опыт
            </p>
        </div>
        <div>
            <div>
                <input type="text" name="requiredExperience" class="border">
            </div>
            <ul>
                <?php
if ($session->has('requiredExperience')) { ?>

                    <?php foreach ($session->getFlash('requiredExperience') as $error) {
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