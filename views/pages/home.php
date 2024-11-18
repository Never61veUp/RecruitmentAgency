<?php
/* @var \App\Core\View\View $view */
/* @var HomeController $this */
/* @var array<\App\Core\Model\Offer> $offers */
/* @var array<\App\Core\Model\User> $users */
/* @var array<\App\Core\Model\Company> $companies */
use App\Controllers\HomeController;

?>
<?php $view->renderComponent('start'); ?>
<?php
$title = 'Работа найдётся для каждого';
$placeholder = 'Профессия, должность или компания';
$button_text = 'Найти';
$resume_count = $users;
$vacancies_count = $offers;
$companies_count = $companies;
?>
<div id="myDiv" class="relative w-full bg-cover bg-center min-h-screen flex items-center justify-center" style="background-image: url('https://s10.stc.yc.kpcdn.net/share/i/4/1614508/wr-750.webp');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="container mx-auto flex flex-col items-center justify-center text-center relative z-10">
        <h1 class="text-white text-4xl font-bold my-6"> <?php echo $title; ?> </h1>
        <div class="w-full max-w-xl">
            <?php $view->renderComponent('homeSearch'); ?>
            <a href="/lookingemployee" class="text-blue-400 mt-4 inline-block">Я ищу сотрудника</a>
        </div>
    </div>
    <div class="container mx-auto absolute bottom-10 left-0 right-0 text-center">
        <div class="text-white flex justify-center space-x-8">
            <div>
                <span class="text-lg font-bold"><?php echo $resume_count; ?></span>
                <p>соискателей</p>
            </div>
            <div>
                <span class="text-lg font-bold"><?php echo $vacancies_count; ?></span>
                <p>вакансий</p>
            </div>
            <div>
                <span class="text-lg font-bold"><?php echo $companies_count; ?></span>
                <p>компаний</p>
            </div>
        </div>
        <div class="flex justify-center mt-6 space-x-4">
            <a href="/download/appStore" class="bg-black text-white px-4 py-2 rounded-lg">Загрузите в App Store</a>
            <a href="/download/googlePlay" class="bg-black text-white px-4 py-2 rounded-lg">Доступно в Google Play</a>
            <a href="/download/appGallery" class="bg-black text-white px-4 py-2 rounded-lg">Откройте в AppGallery</a>
        </div>
    </div>
</div>


<?php $view->renderComponent('end'); ?>

