<?php
/* @var \App\Core\View\View $view */ ?>
<?php $view->renderComponent('start'); ?>

<form action="/employer/offers/add" method="post">
    <div>
        <p>
            Название
        </p>
    </div>
    <div>
        <input type="text" name="title">
    </div>
    <div>
        <button>
            Отправить
        </button>
    </div>
</form>
<?php $view->renderComponent('end'); ?>