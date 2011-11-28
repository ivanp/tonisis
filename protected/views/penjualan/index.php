<?php
$this->breadcrumbs=array(
	'Penjualan',
);?>
<h1>Form Penjualan</h1>


<div class="form">

<?php

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'produk-penjualan-form',
	'enableAjaxValidation'=>false,
));
if($form instanceof CActiveForm);


?>

	<?php echo $form->errorSummary($model); ?>

	

	
<div id="register_wrapper">
	<span>Register Mode</span>
<select name="mode" onchange="$('#mode_form').submit();">
<option value="sale" selected="selected">Sale</option>
<option value="return">Return</option>
</select><div id="show_suspended_sales_button">
	<a href="http://localhost/osspos/index.php/sales/suspended/width:425" class="thickbox none" title="Suspended Sales"><div class="small_button"><span style="font-size: 73%;">Suspended Sales</span></div></a></div>

<label id="item_label" for="item">

Find/Scan Item</label>
<input name="item" value="" id="item" size="40" type="text"><div id="new_item_button_register">
		<a href="http://localhost/osspos/index.php/items/view/-1/width:360" class="thickbox none" title="New Item"><div class="small_button"><span>New Item</span></div></a>	</div>

<table id="register">
<thead>
<tr>
<th style="width: 11%;">Delete</th>
<th style="width: 30%;">Item #</th>

<th style="width: 30%;">Item Name</th>
<th style="width: 11%;">Price</th>
<th style="width: 11%;">Qty.</th>
<th style="width: 11%;">Disc %</th>
<th style="width: 15%;">Total</th>
<th style="width: 11%;">Edit</th>
</tr>
</thead>
<tbody id="cart_contents">
	<tr>

		<td><a href="http://localhost/osspos/index.php/sales/delete_item/1">[Delete]</a><br></td>
		<td>A001<br></td>
		<td style="">TV LCD 47" Aquos<br> [5.00 in stock]<br></td>



					<td><input name="price" value="350.00" size="6" type="text"><br></td>
		
		<td>

		<input name="quantity" value="1" size="2" type="text">		<br></td>

		<td><input name="discount" value="0" size="3" type="text"><br></td>
		<td>$350.00<br></td>
		<td><input name="edit_item" value="Edit Item" type="submit"><br></td>
		</tr>
		<tr>
		<td style="color: rgb(47, 79, 79);" ;="">Desc:<br></td>

		<td colspan="2" style="text-align: left;">

		None
<input name="description" value="" type="hidden">
		<br></td>
		<td>&nbsp;<br></td>
		<td style="color: rgb(47, 79, 79);" ;="">
				<br></td>
		<td colspan="3" style="text-align: left;">
		

<input name="serialnumber" value="" type="hidden">
		<br></td>


		</tr>
		<tr style="height: 3px;">
		<td colspan="8" style="background-color: white;"> <br></td>
		</tr>		
	</tbody>

</table>
</div>


<div id="overall_sale">
		<label id="customer_label" for="customer">Select Customer (Optional)</label>
		<input name="customer" value="Start Typing customer's name..." id="customer" size="30" type="text">		<div style="margin-top: 5px; text-align: center;">
		<h3 style="margin: 5px 0pt;">OR</h3>

		<a href="http://localhost/osspos/index.php/customers/view/-1/width:350" class="thickbox none" title="New Customer"><div class="small_button" style="margin: 0pt auto;"><span>New Customer</span></div></a>		</div>
		<div class="clearfix">&nbsp;</div>
		
	<div id="sale_details">
		<div class="float_left" style="width: 55%;">Sub Total:</div>
		<div class="float_left" style="width: 45%; font-weight: bold;">$350.00</div>

		
		<div class="float_left" style="width: 55%;">Total:</div>

		<div class="float_left" style="width: 45%; font-weight: bold;">$350.00</div>
	</div>




	
    	<div id="Cancel_sale">
		
			<span>Cancel Sale</span>

		</div>
    	</div>
		<div class="clearfix" style="margin-bottom: 1px;">&nbsp;</div>
		


    <table width="100%"><tbody><tr>
    <td style="width: 55%;"><div class="float_left">Payments Total:</div></td>
    <td style="width: 45%; text-align: right;"><div class="float_left" style="text-align: right; font-weight: bold;">$0.00</div></td>
	</tr>

	<tr>
	<td style="width: 55%;"><div class="float_left">Amount Due:</div></td>
	<td style="width: 45%; text-align: right;"><div class="float_left" style="text-align: right; font-weight: bold;">$350.00</div></td>
	</tr></tbody></table>

	<div id="Payment_Types">

		<div style="height: 100px;">

						<table width="100%">
			<tbody><tr>
			<td>
				Payment Type:   			</td>
			<td>
				<select name="payment_type" id="payment_types">
<option value="Cash">Cash</option>
<option value="Check">Check</option>

<option value="Gift Card">Gift Card</option>
<option value="Debit Card">Debit Card</option>
<option value="Credit Card">Credit Card</option>
</select>			</td>
			</tr>
			<tr>
			<td>
				<span id="amount_tendered_label">Amount Tendered: </span>

			</td>
			<td>
				<input name="amount_tendered" value="350.00" id="amount_tendered" size="10" type="text">			</td>
			</tr>
        	</tbody></table>
			<div class="small_button" id="add_payment_button" style="float: left; margin-top: 5px;">
				<span>Add Payment</span>
			</div>

		</div>

		


	</div>



</div>
	
	
<div class="row buttons">
	<?php echo CHtml::submitButton('Selesaikan Penjualan'); ?>
</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->