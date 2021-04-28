<?php

/* @var $this yii\web\View */

$this->title = '2051 - Доставка коктейлей по Киеву. Главная';
$this->registerCssFile('@web/css/pages/index.css');

//\yii\helpers\VarDumper::dump($products, 10, 1);
foreach($products as $product){
	//\yii\helpers\VarDumper::dump($product->options, 10, 1);
}

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
		<div class="bestSellers" id="cocktailMenu">
			
			<div class="bestSellersHead">
				Коктейльна карта
			</div>
			
			<?if($products){?>
				<? foreach($products as $product){?>
					<div class="bestSellerItem">
						<div>
							<img src="<?= file_exists($product->image) ? $product->image : 'uploads/products/golubaja_loguna_logo-850x639.jpg'?>" class="productImg" alt="">
							<div class="title">
								<?= $product->title ?>
							</div>
							<div class="description">
								<?= $product->description ?>
							</div>
						</div>
						<div>
							<div class="price"><span><?=$product->options[0]->price?></span> грн.</div>
							<div class="bottomPart">
								<select name="option" class="optionsList">
									<?if($product->options){?>
										<? foreach($product->options as $option){?>
											<option value="<?=$option->id?>" data-price="<?=$option->price?>"><?=$option->title?></option>
										<?}?>
									<?}?>
								</select>
								<a href="#" class="button dark">Замовити</a>
							</div>
							
						</div>
						
					</div>
				<?}?>
			<?}?>
			
			
			
		</div>
		
		<div id="paymentAndDelivery">
			<div class="payment">
			
			</div>
			<div class="delivery">
				
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
        
        $('.optionsList').change(function (e) {
			var price = $(e.target).find(':selected').data('price');
            $(e.target).parents('.bestSellerItem').find('.price span').text(price);
        })
    });
 
</script>
