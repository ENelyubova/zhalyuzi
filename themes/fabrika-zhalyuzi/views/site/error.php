<?php 
$this->title = Yii::t('default', 'Error') . ' ' . $error['code']; 
$this->layout = "//layouts/404";
?>

<div class="page-error">
    <div class="content-site">
        <div class="page-error__content">
            <div class="page-error__img">
                <img src="<?= $this->mainAssets . '/images/404/404.svg' ?>" alt="Фабрика Жалюзи">
            </div>
            <div class="page-error__text">
                <h2 class="heading heading-pb">Страница не найдена</h2>
                <p>К сожалению, данная страница не найдена или больше<br> недоступна. Воспользуйтесь кнопкой меню или перейдите <br>на главную страницу.</p>
            </div>
            <a href="/" class="btn btn-black">Вернуться на главную</a>
        </div>
    </div>
</div>