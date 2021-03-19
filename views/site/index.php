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

<div class="wrap">
	<div class="container">
		<div class="bestSellers">
			
			<div class="bestSellersHead">
				Топ продажу
			</div>
			
			<div class="bestSellerItem">
				<img src="images/products/1.jpg" class="productImg" alt="">
				<div class="title">
					Long Island Ice Tea
				</div>
				<div class="description">
					Солодкий ягідний твіст на класичну Маргариту. Готуємо зі свіжої полуниці, лаймового фрешу та текіли.
				</div>
				<select name="option" class="optionsList">
					<option value="1">100 мл</option>
					<option value="2">700 мл</option>
				</select>
				<div class="price">120 грн</div>
				<a href="#" class="button dark">Замовити</a>
			</div>
			<div class="bestSellerItem">

				<img src="images/products/2.jpg" class="productImg" alt="">
				<div class="title">
					Cosmopolitan
				</div>
				<div class="description">
					Солодкий ягідний твіст на класичну Маргариту. Готуємо зі свіжої полуниці, лаймового фрешу та текіли.
				</div>
				<select name="option" class="optionsList">
					<option value="1">100 мл</option>
					<option value="2">700 мл</option>
				</select>
				<div class="price">130 грн</div>
				<a href="#" class="button dark">Замовити</a>
			</div>
			<div class="bestSellerItem">

				<img src="images/products/3.jpg" class="productImg" alt="">
				<div class="title">
					Tequila Sunrise
				</div>
				<div class="description">
					Солодкий ягідний твіст на класичну Маргариту. Готуємо зі свіжої полуниці, лаймового фрешу та текіли.
				</div>
				<select name="option" class="optionsList">
					<option value="1">100 мл</option>
					<option value="2">700 мл</option>
				</select>
				<div class="price">120 грн</div>
				<a href="#" class="button dark">Замовити</a>
			</div>
			<div class="bestSellerItem">

				<img src="images/products/1.jpg" class="productImg" alt="">
				<div class="title">
					Long Island Ice Tea
				</div>
				<div class="description">
					Солодкий ягідний твіст на класичну Маргариту. Готуємо зі свіжої полуниці, лаймового фрешу та текіли.
				</div>
				<select name="option" class="optionsList">
					<option value="1">100 мл</option>
					<option value="2">700 мл</option>
				</select>
				<div class="price">120 грн</div>
				<a href="#" class="button dark">Замовити</a>
			</div>
			<div class="bestSellerItem">
				<img src="images/products/1.jpg" class="productImg" alt="">
				<div class="title">
					Long Island Ice Tea
				</div>
				<div class="description">
					Солодкий ягідний твіст на класичну Маргариту. Готуємо зі свіжої полуниці, лаймового фрешу та текіли.
				</div>
				<select name="option" class="optionsList">
					<option value="1">100 мл</option>
					<option value="2">700 мл</option>
				</select>
				<div class="price">120 грн</div>
				<a href="#" class="button dark">Замовити</a>
			</div>
			<div class="bestSellerItem">

				<img src="images/products/2.jpg" class="productImg" alt="">
				<div class="title">
					Cosmopolitan
				</div>
				<div class="description">
					Солодкий ягідний твіст на класичну Маргариту. Готуємо зі свіжої полуниці, лаймового фрешу та текіли.
				</div>
				<select name="option" class="optionsList">
					<option value="1">100 мл</option>
					<option value="2">700 мл</option>
				</select>
				<div class="price">130 грн</div>
				<a href="#" class="button dark">Замовити</a>
			</div>
			<div class="bestSellerItem">

				<img src="images/products/3.jpg" class="productImg" alt="">
				<div class="title">
					Tequila Sunrise
				</div>
				<div class="description">
					Солодкий ягідний твіст на класичну Маргариту. Готуємо зі свіжої полуниці, лаймового фрешу та текіли.
				</div>
				<select name="option" class="optionsList">
					<option value="1">100 мл</option>
					<option value="2">700 мл</option>
				</select>
				<div class="price">120 грн</div>
				<a href="#" class="button dark">Замовити</a>
			</div>
			<div class="bestSellerItem">

				<img src="images/products/1.jpg" class="productImg" alt="">
				<div class="title">
					Long Island Ice Tea
				</div>
				<div class="description">
					Солодкий ягідний твіст на класичну Маргариту. Готуємо зі свіжої полуниці, лаймового фрешу та текіли.
				</div>
				<select name="option" class="optionsList">
					<option value="1">100 мл</option>
					<option value="2">700 мл</option>
				</select>
				<div class="price">120 грн</div>
				<a href="#" class="button dark">Замовити</a>
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
