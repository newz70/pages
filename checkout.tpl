<?php echo $header; ?>
<style type="text/css">
<!--
.row {
  display: block;
  padding-bottom: 6px;
}

-->
</style>
<?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content"><?php echo $content_top; ?>
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <h1><?php echo $heading_title; ?></h1>

  <div id="vid">
  <div>
    <div class="checkout-heading">Вид доставки / Оплата</div>
    <div class="checkout-content" style="display: block;">
      <div class="left">
        <h2>Доставка</h2>
        <label >
        <input type="radio" name="delivery" value="0" checked="checked" />
        <b>Курьером</b>
        </label>
        <br>
        <label >
        <input type="radio" name="delivery" value="1" />
        <b>Самовывоз</b>
        </label>
      </div>

      <div class="right">
        <h2>Тип плательщика</h2>
        <label >
        <input type="radio" name="customer" value="1" id="1" checked="checked" />
        <b>Физическое лицо</b>
        </label>
        <br>
        <label >
        <input type="radio" name="customer" value="2" id="2" />
        <b>Юридическое лицо</b>
        </label>
      </div>
  </div>
  </div>
  <br>
  <div id="err" style="color: #CC0000; background-color: #FFD1D1; display: none;"></div>
  <div id="jur_desc" style="display: none">
    <div class="checkout-heading">Платежные реквизиты</div>
    <div class="row">
      <label><div style="display: block; width: 200px; float: left"><b>Плательщик <span class="required">*</span></b></div>
        <input type="text" name="yur_payer" style="width: 393px" value="<?= isset($_SESSION['pwprtnrs']['yur_payer']) ? $_SESSION['pwprtnrs']['yur_payer'] : '' ?>" />
      </label>
    </div>
    <div class="row">
      <label><div style="display: block; width: 200px; float: left"><b>Юридический адрес <span class="required">*</span></b></div>
        <input type="text" name="yur_address" style="width: 393px" value="<?= isset($_SESSION['pwprtnrs']['yur_address']) ? $_SESSION['pwprtnrs']['yur_address'] : '' ?>" />
      </label>
    </div>
    <div class="row">
      <label><div style="display: block; width: 200px; float: left"><b>ИНН <span class="required">*</span></b></div>
        <input type="text" id="inn" name="yur_inn" style="width: 200px" value="<?= isset($_SESSION['pwprtnrs']['yur_inn']) ? $_SESSION['pwprtnrs']['yur_inn'] : '' ?>" />
      </label>
    </div>
    <div class="row">
      <label><div style="display: block; width: 200px; float: left"><b>КПП <span class="required">*</span></b></div>
        <input type="text" id="kpp" name="yur_kpp" style="width: 200px" value="<?= isset($_SESSION['pwprtnrs']['yur_kpp']) ? $_SESSION['pwprtnrs']['yur_kpp'] : '' ?>" />
      </label>
    </div>
    <div class="row">
      <label><div style="display: block; width: 200px; float: left"><b>Расчётный счет <span class="required">*</span></b></div>
        <input type="text" id="rs" name="yur_rs" style="width: 200px" value="<?= isset($_SESSION['pwprtnrs']['yur_rs']) ? $_SESSION['pwprtnrs']['yur_rs'] : '' ?>" />
      </label>
    </div>
    <div class="row">
      <label><div style="display: block; width: 200px; float: left"><b>Наименование банка, город <span class="required">*</span></b></div>
        <input type="text" name="yur_bank" style="width: 393px" value="<?= isset($_SESSION['pwprtnrs']['yur_bank']) ? $_SESSION['pwprtnrs']['yur_bank'] : '' ?>" />
      </label>
    </div>
    <div class="row">
      <label><div style="display: block; width: 200px; float: left"><b>Корреспондентский счет <span class="required">*</span></b></div>
        <input type="text" id="ks" name="yur_ks" style="width: 200px" value="<?= isset($_SESSION['pwprtnrs']['yur_ks']) ? $_SESSION['pwprtnrs']['yur_ks'] : '' ?>" />
      </label>
    </div>
    <div class="row">
      <label><div style="display: block; width: 200px; float: left"><b>БИК банка <span class="required">*</span></b></div>
        <input type="text" id="bic" name="yur_bik" style="width: 200px" value="<?= isset($_SESSION['pwprtnrs']['yur_bik']) ? $_SESSION['pwprtnrs']['yur_bik'] : '' ?>" />
      </label>
    </div>
    <br>
  </div>

  <div>
    <div class="checkout-heading">Доставка / Выдача покупки</div>
    <div class="row">
      <label><div style="display: block; width: 200px; float: left"><b>Получатель (Ф.И.О.) <span class="required">*</span></b></div></label>
        <input type="text" name="lname" value="<?= isset($_SESSION['pwprtnrs']['lname']) ? $_SESSION['pwprtnrs']['lname'] : '' ?>" />
        <input type="text" name="fname" value="<?= isset($_SESSION['pwprtnrs']['fname']) ? $_SESSION['pwprtnrs']['fname'] : '' ?>" />
        <input type="text" name="mname" value="<?= isset($_SESSION['pwprtnrs']['mname']) ? $_SESSION['pwprtnrs']['mname'] : '' ?>" />

    </div>
    <div class="row">
      <label><div style="display: block; width: 200px; float: left"><b>Контактный телефон <span class="required">*</span></b></div>
          <input id="phone" type="text" name="phone" value="<?= isset($_SESSION['pwprtnrs']['phone']) ? $_SESSION['pwprtnrs']['phone'] : '' ?>" />
      </label>
    </div>
    <div class="row" id="email" style="display: none;">
      <label><div style="display: block; width: 200px; float: left"><b>e-mail <span class="required">*</span></b></div>
        <input type="text" name="email" style="width: 200px" value="<?= isset($_SESSION['pwprtnrs']['email']) ? $_SESSION['pwprtnrs']['email'] : '' ?>" />
      </label>
    </div>
    <div class="row" id="address">
      <label><div style="display: block; width: 200px; float: left"><b>Адрес доставки <span class="required">*</span></b></div>
        <input type="text" name="address" style="width: 393px" value="<?= isset($_SESSION['pwprtnrs']['address']) ? $_SESSION['pwprtnrs']['address'] : '' ?>" />
      </label>
    </div>
    <div class="row">
      <label><div style="display: block; width: 200px; float: left"><b>Комментарии к заказу</b></div>
        <textarea type="text" name="comment" style="width: 393px"><?= isset($_SESSION['pwprtnrs']['comment']) ? $_SESSION['pwprtnrs']['comment'] : '' ?></textarea>
      </label>
    </div>
    <br>
  </div>

  <input type="button" value="Оформить" id="button-account" class="button" />
  </div>

<div class="checkout">
    <div id="payment-method">
      <div class="checkout-content">
      <input type="hidden" value="1" name="agree" />
      <input type="hidden" value="cod" name="payment_method" />
      </div>
    </div>

 </div>    <br><br>
<div class="checkout">
    <div id="confirm">
      <div id="confirm_header" class="checkout-heading" style="display: none;">Подтверждение заказа</div>
      <div class="checkout-content"></div>
    </div>

 </div>

<?php echo $content_bottom; ?></div>
<?php echo $footer; ?>
<script>
jQuery(function($) {
      $.mask.definitions['~']='[+-]';
      $('#kpp').mask('999999999');
      $('#inn').mask('9999999999');
      $('#rs').mask('999 99 999 9 9999 9999999');
      $('#ks').mask('999 99 999 9 9999 9999999');
      $('#bic').mask('999999999');
      $('#date').mask('99/99/9999');
      $('#phone').mask('(999) 999-99-99');
      $('#phoneext').mask("(999) 999-9999? x99999");
      $("#tin").mask("99-9999999");
      $("#ssn").mask("999-99-9999");
      $("#product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
      $("#eyescript").mask("~9.99 ~9.99 999");
   });

$('input[type=\'radio\'][name=\'customer\']').bind('click', function()
{
  if (this.value == 1)
  {
    $('#jur_desc').slideUp('fast');
    $('#email').slideUp('fast');
  }
  if (this.value == 2)
  {
    $('#jur_desc').slideDown('fast');
    $('#email').slideDown('fast');
  }
});

$('input[type=\'radio\'][name=\'delivery\']').bind('click', function() {
  if (this.value == 0) $('#address').slideDown('fast'); else $('#address').slideUp('fast');
});

$('#button-confirm').live('click', function() {
  $.ajax({
    url: 'index.php?route=checkout/pwprtnrs/confirm',
    type: 'post',
    data: $('[name=\'lname\'], [name=\'fname\'], [name=\'mname\'], [name=\'phone\'], [name=\'address\'], [name=\'email\'], [name=\'comment\'], [name=\'yur_payer\'], [name=\'yur_address\'], [name=\'yur_inn\'], [name=\'yur_kpp\'], [name=\'yur_rs\'], [name=\'yur_bank\'], [name=\'yur_ks\'], [name=\'yur_bik\'], input[name=\'delivery\']:checked, input[name=\'customer\']:checked'),
    beforeSend: function() {
    	$('#button-confirm').attr('disabled', true);
    	$('#button-confirm').after('<span class="wait">&nbsp;<img src="catalog/view/theme/default/image/loading.gif" alt="" /></span>');
    },

    complete: function() {
    	//$('#button-confirm').attr('disabled', false);
    	//$('.wait').remove();

    	$.ajax({
    		type: 'get',
    		url: 'index.php?route=payment/cheque/confirm',
    		success: function() {
    			location = '<?php echo $continue; ?>';
    		}
    	});


    },
    });
});


$('#button-account').live('click', function() {
  var ncount;
  var noldcount;
  ncount = 0;
  $('#err').html('');
  ncount += vElement($('[name=\'lname\']'),'Фамилия');
  ncount += vElement($('[name=\'fname\']'),'Имя');
  ncount += vElement($('[name=\'mname\']'),'Отчество');
  ncount += vElement($('[name=\'phone\']'),'Контактный телефон');

  if ($('input[type=\'radio\'][name=\'delivery\']:checked')[0].value==0)  {
    ncount += vElement($('[name=\'address\']'),'Адрес доставки');
  }
  if ($('[name=customer]')[1].checked)
  {
    noldcount = ncount;
    ncount += vElement($('[name=email]'),'e-mail');
    if(noldcount === ncount) ncount += valiEmail($('[name=email]'),'e-mail');
    ncount += vElement($('[name=\'yur_payer\']'),'Плательщик');
    ncount += vElement($('[name=\'yur_address\']'),'Юридический адрес');
    ncount += vElement($('[name=\'yur_inn\']'),'ИНН');
    ncount += vElement($('[name=\'yur_kpp\']'),'КПП');
    ncount += vElement($('[name=\'yur_rs\']'),'Расчётный счет');
    ncount += vElement($('[name=\'yur_bank\']'),'Наименование банка, город');
    ncount += vElement($('[name=\'yur_ks\']'),'Корреспондентский счет');
    ncount += vElement($('[name=\'yur_bik\']'),'БИК банка');
  }
  if (ncount > 0) return 0;
// Шаг 5

	$.ajax({
		url: 'index.php?route=checkout/pwprtnrs',
        type: 'post',
        data: $('[name=\'lname\'], [name=\'fname\'], [name=\'mname\'], [name=\'phone\'], [name=\'address\'], [name=\'email\'], [name=\'comment\'], [name=\'yur_payer\'], [name=\'yur_address\'], [name=\'yur_inn\'], [name=\'yur_kpp\'], [name=\'yur_rs\'], [name=\'yur_bank\'], [name=\'yur_ks\'], [name=\'yur_bik\'], input[name=\'delivery\']:checked, input[name=\'customer\']:checked'),
		dataType: 'json',
		beforeSend: function() {
		},
		complete: function() {
		  $('#vid').slideUp('slow');
          //$('#jur_desc'))[0].style.display = 'none';
		},
		success: function(html) {
 		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
	$.ajax({
		url: 'index.php?route=checkout/payment_method/validate',
		type: 'post',
		data: $('input[name=\'agree\'], input[name=\'payment_method\'], textarea[name=\'comment\']'),
		dataType: 'json',
		beforeSend: function() {
			$('#button-account').attr('disabled', true);
			$('#button-account').after('<span class="wait">&nbsp;<img src="catalog/view/theme/default/image/loading.gif" alt="" /></span>');
		},
		complete: function() {
			$('#button-account').attr('disabled', false);
			$('.wait').remove();
		},
		success: function(json) {
			$('.warning, .error').remove();
			if (json['redirect']) {
				location = json['redirect'];
			} else if (json['error']) {     alert(json['error']['warning']);
				if (json['error']['warning']) {
					$('#payment-method .checkout-content').prepend('<div class="warning" style="display: none;">' + json['error']['warning'] + '<img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>');

					$('.warning').fadeIn('slow');
				}
			} else {
                $('#confirm_header')[0].style.display = 'block';
				$.ajax({
					url: 'index.php?route=checkout/confirm',
					dataType: 'html',
					success: function(html) {
						$('#confirm .checkout-content').html(html);

						$('#payment-method .checkout-content').slideUp('slow');

						$('#confirm .checkout-content').slideDown('slow');

						$('#payment-method .checkout-heading a').remove();

						$('#payment-method .checkout-heading').append('<a><?php echo $text_modify; ?></a>');
					},
					error: function(xhr, ajaxOptions, thrownError) {
						alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
					}
				});
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});

});

function setErr(text){
  $('#err').html(text);
}

function vElement(el, sname){
  $(el).css({'border' : '1px solid rgb(204, 204, 204)'});
  if ($(el).val() === ''){
    $(el).css({'border' : '1px solid #ff0000'});
    $('#err')[0].style.display = 'block';
    $('#err').html($('#err').html()+'Необходимо заполнить поле "' + sname + '"<br>');
    return 1;
  }
  return 0;
}
function valiEmail(el, sname){
  $(el).css({'border' : '1px solid rgb(204, 204, 204)'});
  var pattern = /^([a-zа-я0-9_\.-])+@[a-zа-я0-9-]+\.([a-zа-я]{2,4}\.)?[a-zа-я]{2,4}$/i;
  if(!pattern.test($(el).val())){
    $(el).css({'border' : '1px solid #ff0000'});
    $('#err')[0].style.display = 'block';
    $('#err').html($('#err').html()+'Поле "' + sname + '" заполнено неверно<br>');
    return 1;
  }
  return 0;
}
</script>
