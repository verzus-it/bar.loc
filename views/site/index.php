<?php

/* @var $this yii\web\View */

$this->title = '2051 - Доставка коктейлей по Киеву. Главная';
$this->registerCssFile('@web/css/pages/index.css');

?>

<div class="slidesPanel">
	<div class="slideItem">Безкоштовна доставка замовлень від 700 грн</div>
	<div class="slideItem">При замовленні від 1000 грн - подаруночок!</div>
	<div class="slideItem">Спробуйте нові смаки</div>
</div>

<div class="mainContent">
	<div class="wrap">
		<div class="container">
			<div class="mainTextWrapper">
				<div class="mainText">Змішуємо, охолоджуємо та доставляємо алкогольні коктейлі</div>
				<a href="#" class="button dark">До коктейльної карти</a>
			</div>
		</div>
	</div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function(){
        $(".slidesPanel > div:gt(0)").hide();

        setInterval(function() {
            $('.slidesPanel > div:first')
                .fadeOut(1)
                .next()
                .fadeIn(500)
                .end()
                .appendTo('.slidesPanel');
        },  5000);
    });
 
</script>
