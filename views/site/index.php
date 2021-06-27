<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = '2051. Виготовлення та доставка алкогольних коктейлів по Софіївській Борщагівці та Вишневому';
$this->registerCssFile('@web/css/pages/index.css');
$this->registerCssFile('@web/css/libs/jquery.toast.css');
$this->registerJsFile('@web/js/libs/jquery.toast.js', ['depends' => 'yii\web\JqueryAsset', 'position' => $this::POS_END]);
$this->registerJsFile('@web/js/libs/jquery.maskedinput.min.js', ['depends' => 'yii\web\JqueryAsset', 'position' => $this::POS_END]);


?>

<!--<div class="slidesPanel">-->
<!--	<div class="slideItem">Безкоштовна доставка замовлень від 700 грн</div>-->
<!--	<div class="slideItem">При замовленні від 1500 грн - подаруночок!</div>-->
<!--	<div class="slideItem">Спробуйте смаки, що перевірені часом</div>-->
<!--</div>-->

<div class="mainContent">
	<div class="wrap">
		<div class="container">
			<div class="mainTextWrapper">
				<div class="mainText">Змішуємо, охолоджуємо та доставляємо алкогольні коктейлі</div>
				<div class="featuresWrapper">
					<div class="feature">
						<div class="title">Безкоштовна доставка замовлень</div>
						<div class="text">
							По Софіївській Борщагівці та Вишневому доставка здійснюється безкоштовно
						</div>
					</div>
					<div class="feature">
						<div class="title">При замовленні - подаруночок!</div>
						<div class="text">
							Отримайте додатково коктейль на дегустацію на вибір бармена при замовленні від 1000 грн
						</div>
					</div>
					<div class="feature">
						<div class="title">Смаки, що перевірені часом</div>
						<div class="text">
							Тільки відомі коктейлі, якими пригощають у всьому світі
						</div>
					</div>
				</div>
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
							<img src="<?= $product->getImage() ?>" class="productImg" alt="">
							<div class="title">
								<?= $product->title ?>
							</div>
<!--							<div class="description">-->
<!--								--><?//= $product->description ?>
<!--							</div>-->
							<div class="composition">
								<?if($product->composition){?>
									<ul>
										<? foreach($product->composition as $item){?>
											<li><?=$item->ingridient->title?></li>
										<?}?>
									</ul>
								<?}?>
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
				<div class="title">
					Оплата
				</div>
				<ul class="text">
					<li>Оплата здійснюється на карту ПриватБанку або Монобанку</li>
					<li>Оплата здійснюється до приготування коктейлів</li>
				</ul>
			</div>
			<div class="delivery">
				<div class="title">
					Доставка
				</div>
				<ul class="text">
					<li>Приготування коктейлів відбувається безпосередньо перед відправленням.</li>
					<li>Доставка відбувається мінімум за годину з часу оформлення замовлення</li>
					<li>Доставка по Софіївськії Борщагівці та Вишневому безкоштовна.</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function(){
        // $(".slidesPanel > div:gt(0)").hide();
		//
        // setInterval(function() {
        //     $('.slidesPanel > div:first')
        //         .fadeOut(1)
        //         .next()
        //         .fadeIn(500)
        //         .end()
        //         .appendTo('.slidesPanel');
        // },  5000);
        
        $('.optionsList').change(function (e) {
			var price = $(e.target).find(':selected').data('price');
            $(e.target).parents('.bestSellerItem').find('.price span').text(price);
        });
        
		$('.addToCart').click(function (e) {
		    e.preventDefault();
			var optionID = $(e.target).parents('.bestSellerItem').find('select option:selected').val();

            changeOptionQty(optionID, 1);
        });
		$(document).on('click', '.changeOptionQtyButton', function (e) {
            e.preventDefault();
            var optionID = $(e.target).parents('.cartItem').data('id');
            var qty = $(e.target).data('qty');

            changeOptionQty(optionID, qty)
        })
		
		$(document).on('click', '.confirmOrderButton', function (e) {
            $.ajax({
                url: "<?= Url::toRoute(['site/confirm-order'])?>",
                data: $('.orderData').find('input, textarea').serialize(),
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    if(response.status){
                        $('.modalContent').html(response.html);
					}else{
                        $.toast({
                            text : response.data ? response.data.message : 'Щось не так. Оновіть сторінку та спробуйте ще раз',
                            icon: 'warning'
                        })
					}
                }
            });
        })

        $("#phone").mask("+38 (099) 999 99 99");
    });

    function changeOptionQty(optionID, qty){
        if(optionID){
            $.ajax({
                url: "<?= Url::toRoute(['site/change-cart'])?>",
                data: {optionID: optionID, qty: qty},
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    if(response.status){
                        $.toast({
                            text : qty > 0 ? "Коктейль доданий у замовлення" : "Кількість змінена"
                        })
                        $(".modalContent").load(location.href+" .modalContent>*", function (){
                            $("#phone").mask("+38 (099) 999 99 99");
						});
                        $(".cartWrapper").load(location.href+" .cartWrapper>*","");
                    }else{
                        console.warn('Невалидный ответ');
                    }
                },
				error: function () {
                    console.warn('Ошибка!');
                }
            });
        }else{
            console.warn('Не выбрана опция');
        }
	}

</script>

<div class="modalWindow">
	<div class="modalBody">
		<span class="modalClose" onclick="$('.modalWindow').removeClass('opened')"></span>
		<div class="modalContent">

			<div class="cartTitle">Ваше замовлення:</div>
			<div class="cartItems">
				<?if($cart['products']){?>
					<? foreach($cart['products'] as $productOption){?>
						<div class="cartItem" data-id="<?=$productOption['data']->id?>">
							<div class="image"><img src="<?= $productOption['data']->product->getImage() ?>" alt="" /></div>
							<div class="title">
								<?=$productOption['data']->product->title?><br/>
								<small><?=$productOption['data']->title?></small>
							</div>
							<div class="price"><?=(float)$productOption['data']->price?> грн</div>
							<div class="qty">
								<div class="changeOptionsQtyWrapper"><button class="button dark changeOptionQtyButton" data-qty="1">+</button></div>
								<?=$productOption['qty']?>
								<div class="changeOptionsQtyWrapper"><button class="button dark changeOptionQtyButton" data-qty="-1">-</button></div>
							</div>
							<div class="amount"><?=$productOption['amount']?> грн</div>
						</div>
					<?}?>
				<?}else{?>
					<div class="cartItem">
						Замовлення порожнє. Додайте улюбленні коктейлі!
					</div>
				<?}?>
			</div>
			<div class="cartTotal">
				<div class="amount">До сплати: <?=$cart['totalAmount']?> грн.</div>
			</div>
			<?if($cart['products']){?>
				<div class="orderDataTitle">Контактні дані</div>
				<div class="orderData">
					<div class="inputLine">
						<div class="formLabel">Ім'я</div>
						<input type="text" value="" name="name">
					</div>
					<div class="inputLine">
						<div class="formLabel">* Телефон</div>
						<input type="text" id="phone" name="phone" value="">
					</div>
					<div class="inputLine">
						<div class="formLabel">Адреса доставки</div>
						<input type="text" value="" name="deliveryAddress" placeholder="">
					</div>
					<div class="inputLine">
						<div class="formLabel">Дата та час доставки</div>
						<input type="text" value="" name="deliveryDateAndTime" placeholder="">
					</div>
					<div class="inputLine" style="width: 100%;">
						<div class="formLabel">Коментар</div>
						<textarea name="comment" id="" rows="4" style="resize: none;"></textarea>
					</div>
				</div>
				<div class="confirmOrderButtonWrapper">
					<button class="button dark confirmOrderButton">Оформити замовлення</button>
				</div>
			<?}?>
			
		</div>
	</div>
</div>