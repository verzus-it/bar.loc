<table style="font-size: 14px; font-family: 'Tahoma', sans-serif;border-collapse: collapse;color: #686461; width: 100%; max-width: 600px; margin: auto" border="1">
	<tr style="font-weight: bold">
		<td style="padding: 5px">Товар</td>
		<td style="text-align:center;padding: 5px">Вартість</td>
		<td style="text-align:center;padding: 5px">Кількість</td>
		<td style="text-align:center;padding: 5px">Сума</td>
	</tr>
	<? foreach($cart['products'] as $productOption){?>
		<tr>
			<td style="padding: 5px">
				<?=$productOption['data']->product->title?><br/>
				<small><?=$productOption['data']->title?></small>
			</td>
			<td style="text-align:center;padding: 5px"><?=(float)$productOption['data']->price?> грн</td>
			<td style="text-align:center;padding: 5px"><?=$productOption['qty']?></td>
			<td style="text-align:center;padding: 5px"><?=$productOption['amount']?> грн</td>
		</tr>
	<?}?>
	<tr>
		<td style="text-align:right;padding: 5px" colspan="3">Підсумкова вартість</td>
		<td style="text-align:center;padding: 5px;font-weight: bold;"><?=$cart['totalAmount']?> грн</td>
	</tr>
	<tr>
		<td style="padding: 5px" colspan="100">
			<p>
				<b>Дані клієнта:</b><br/>
				<b>Ім'я:</b> <?=$customer['name'] ?: ' - '?><br/>
				<b>Телефон:</b> <?=$customer['phone']?><br/>
				<b>Адреса доставки:</b> <?=$customer['deliveryAddress'] ?: ' - '?><br/>
				<b>Дата та час доставки:</b> <?=$customer['deliveryDateAndTime'] ?: ' - '?><br/>
				<b>Коментар:</b> <?=$customer['comment'] ?: ' - '?><br/>
			</p>
		</td>
	</tr>
</table>
