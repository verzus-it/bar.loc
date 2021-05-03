<?php

/* @var $this yii\web\View */

use yii\helpers\Url;$this->title = '2051 - Доставка коктейлей по Киеву. Главная';
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
								<a href="javascript:void(0)" class="button dark addToCart">Замовити</a>
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
        });
        
		$('.addToCart').click(function (e) {
		    e.preventDefault();
			var optionID = $(e.target).parents('.bestSellerItem').find('select option:selected').val();
			if(optionID){
                $.ajax({
                    url: "<?= Url::toRoute(['site/change-cart'])?>",
                    data: {optionID: optionID, qty: 1},
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if(response.status){
                        
                        }else{
                            console.warn('Невалидный ответ');
                        }
                    }
                });
			}else{
			    console.warn('Не выбрана опция');
			}
        });
    });
 
</script>

<div class="modal opened">
	<div class="modalBody">
		<span class="modalClose" onclick="$('.modal').removeClass('opened')"></span>
		<div class="modalContent">
			<div class="cartTitle">Ваше замовлення:</div>
			<div class="cartItems">
				<div class="cartItem">
					<div class="image"><img src="http://bar.loc/uploads/products/Something-Tasty.jpg" alt="" /></div>
					<div class="title">
						Щось смачненьке/Something Tasty<br/><small>200 мл.</small>
					</div>
					<div class="price">140 грн</div>
					<div class="qty">2 шт.</div>
					<div class="amount">280 грн</div>
				</div>
				<div class="cartItem">
					<div class="image"><img src="http://bar.loc/uploads/products/1.jpg" alt=""></div>
					<div class="title">
						Лонг Айленд / Long Island<br/><small>150 мл. + Coca Cola</small>
					</div>
					<div class="price">140 грн</div>
					<div class="qty">2 шт.</div>
					<div class="amount">280 грн</div>
				</div>
			</div>
			<div class="cartTotal">
				<div class="amount">До сплати: 560 грн.</div>
			</div>
			<div class="orderData">
				<div class="inputLine">
					<div class="formLabel">Ім'я</div>
					<input type="text" value="" placeholder="Ім'я">
				</div>
				<div class="inputLine">
					<div class="formLabel">Телефон</div>
					<input type="text" value="" placeholder="+380">
				</div>
				<div class="inputLine">
					<div class="formLabel">Адреса доставки</div>
					<input type="text" value="" placeholder="">
				</div>
				<div class="inputLine">
					<div class="formLabel">Час доставки</div>
					<input type="text" value="" placeholder="">
				</div>
				<div class="inputLine ">
					<div class="formLabel">Коментар</div>
					<textarea name="comment" id="" rows="5"></textarea>
				</div>
			</div>
			<button class="button dark">Оформити замовлення</button>
		</div>
	</div>
</div>