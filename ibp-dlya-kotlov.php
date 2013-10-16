<?php

/**
 * View page
 * @var Page $model
 */

// Set meta tags
$this->pageTitle       = ($model->meta_title) ? $model->meta_title : $model->title;
$this->pageKeywords    = $model->meta_keywords;
$this->pageDescription = $model->meta_description;

Yii::import('application.modules.orders.controllers.CartController');
class ProductBox {
  var $model;
  function __construct($url){
    Yii::import('application.modules.store.models.*');
    $this->model = StoreProduct::model()->find("`url`='$url'");
  }
  function ShowProduct($control, $desc, $har){
?>
<form action="/order/test.php" method="post">
    <div style="display:none">
        <input type="hidden" value="50be7fbdf1b7a2c347c6050d77967644cc2cccf1" name="YII_CSRF_TOKEN" />
    </div>
    <input id="product_id_<?= $this->model->id ?>" type="hidden" value="<?= $this->model->id ?>" name="product_id" />
    <input id="product_price_<?= $this->model->id ?>" type="hidden" value="8100.00" name="product_price" />
    <input id="use_configurations_<?= $this->model->id ?>" type="hidden" value="0" name="use_configurations" />
    <input id="currency_rate_<?= $this->model->id ?>" type="hidden" value="1.000" name="currency_rate" />
    <input id="configurable_id_<?= $this->model->id ?>" type="hidden" value="0" name="configurable_id" />
    <input id="quantity_<?= $this->model->id ?>" type="hidden" value="1" name="quantity" />

  <div class="product_block" style="min-height: 200px; float: left">
    <div class="table">
      <div class="image" style="padding-left: 30px">
        <?= CHtml::link(CHtml::image($this->model->mainImage->getUrl('190x150'), $this->model->name), array('//', 'product'=>$this->model->url.'.html')) ?>
        <div style="display: block; padding: 10px 0px 0px 30px">
<?php
$control->widget('CStarRating',array(
					'name'=>'rating_'.$this->model->id,
					'id'=>'rating_'.$this->model->id,
					'allowEmpty'=>false,
					'readOnly'=>true,
					'minRating'=>1,
					'maxRating'=>5,
					'value'=>($this->model->rating+$this->model->votes) ? round($this->model->rating / $this->model->votes) : 0,
					//'callback'=>'js:function(){rateProduct('.$this->modelmodel->id.')}',
			));

?>
        </div>
      </div>
    </div>
    <div class="product_block_right">
      <div class="name">
        <?php echo CHtml::link(CHtml::tag("h2", array("class"=>"product_h1", "title"=>$this->model->name), $this->model->name), array('//', 'product'=>$this->model->url.'.html'));?>
      </div>
      <div class="desc" style="padding-right: 20px">
         <?= $desc ?>
      </div>
      <div style="margin-top: 16px">
        <table style="border-spacing: 0px; border-collapse: collapse;">
<?php

  foreach ($har as $key  => $value)
  {
    echo "<tr>\n";
    echo "<td style=\"background: none repeat scroll 0% 0% rgb(236, 232, 229);
font-weight: normal;
text-align: left;
padding: 1px 5px;
border-color: rgb(255, 255, 255);
border-width: 0px 1px 1px 0px;
border-style: solid;\">$key</td>\n  <td style=\"background: none repeat scroll 0% 0% rgb(245, 241, 238);
padding: 1px 5px;
border-color: rgb(255, 255, 255);
border-width: 0px 1px 1px 0px;
border-style: solid;\">$value</td>\n";
    echo "</tr>\n";
  }


?>
        </table>
      </div>
      <div style="text-align: right; padding-right: 20px; font-style: italic">
        <?= CHtml::link( "Подробнее...", array('//', 'product'=>$this->model->url.'.html')) ?>
      </div>
    </div>
  </div>
  <div style=" margin-left: 740px">
    <br /><br />
    <input class="blue_button button orange" type="submit" name="yt" value="&nbsp;Купить&nbsp;" id="yt" style="min-width: 140px; max-width: 140px" />
    <br /><br />
    <div style="text-align: center; font-size: large; color: blue; width: 140px">
        <b><?= $this->model->price." руб." ?></b>
    </div>
    <br /><br />
    <?= ""/*CHtml::link(
    '<input type="button" class="blue_button button blue" value="Подробнее" style="min-width: 140px; max-width: 140px" />'
    ,array('//', 'product'=>$this->model->url.'.html'))*/ ?>
  </div>
</form>
<div class="clearboth">
</div>

<?php
  }
}

?>

<h1 class="has_background"><?php echo $model->title; ?></h1>
<div style="float: left; padding-right: 10px;">
<img src="/assets/images/kotel.jpg" width="200" height="300" border="0" alt="" />
</div>
<div>
<br />
<p>Все <strong>газовые котлы</strong>, имеющие закрытую горелку и модулируемый вентилятор, работают от электричества. Если оно будет постоянно колебаться, то выход из строя основного узла &ndash; <strong>импульсного блока питания</strong> котла также окажется дело времени. Если произойдет сбой, то обороты вентилятора нарушатся, а электророзжиг котла более не будет работать. Но выход имеется &ndash; это покупка и установка<strong> источника бесперебойного питания</strong> (ИБП), который выпускается специально для газовых котлов данного типа. Если даже на короткое время отключится электричество, все равно &ndash; газовый котел сможет исправно работать в полностью автономном режиме. Более того, даже если электричество и не будет отключаться, то все электронное оборудование котла будет получать чистую синусоиду на выходе, что положительным образом скажется на долговечной эксплуатации всей отопительной системы.</p>
<p><strong>Инверторы</strong> серии Энергия ПН сочетают в себе функционал как стабилизатора напряжения
(при входном напряжении от 120 до 270 В обеспечивают потребителя напряжением 220 &plusmn; 10% В.),
так и источника бесперебойного питания - при выходе входного напряжения за диапазон 120 - 270 В
инвертор отключается от входной элетросети и снабжает газовый котел переменным напряжением в 220 &plusmn; 1% В
за счет аккумуляторов.
Вермя работы инвертора в режиме ИБП составляет <b>до 2 часов</b>!
Кроме того, если отключения электроэнергии сотавляют более 2 часов,
к инвертору можно подключить автомобильные аккумуляторы.
При этом время автономной работы устройства прямо пропорционально количеству и емкости
подключенных к нему аккумуляторов.</p>
<p>Телефон для консультаций и оформления заказа: <span style=" font-size: large; color: #FF0000">8 (499) 704-10-32</span> (круглосуточно, без входных)</p>
</div>
<div style="clear: both"></div>
<br /><br />

<?php


$prod = new ProductBox("pn-750");
$desc = "Инвертор со встроенным стабилизатором напряжения, применяемый для защиты и обеспечения
бесперебойного питания газовых котлов <b>мощностью до 400 Вт</b>. Подходит для большинства бытовых котлов.";
$har = array(
  "Рабочий диапазон температур" => "-20..+40 °C",
  "Напряжение входа, В" => "120 - 270",
  "Напряжение АКБ" => "12 В",
);
$prod->ShowProduct($this, $desc, $har);

$prod = new ProductBox("pn-1000");
$desc = "Инвертор со встроенным электронным стабилизатором для защиты мощных бытовых котлов и
обеспечения их беспрерывной работы при отключениях электричества <b>мощностью до 700 Вт</b>";
$har = array(
  "Рабочий диапазон температур" => "-20..+40 °C",
  "Напряжение входа, В" => "120 - 285",
  "Напряжение АКБ" => "12 В",
);
$prod->ShowProduct($this, $desc, $har);

$prod = new ProductBox("pn-500");
$desc = "Инвертор со встроенным стабилизатором напряжения, применяемый для построения систем бесперебойного
питания маломощных газовых котлов <b>мощностью до 100 Вт</b>. При выборе этого инвертора следует учесть, что пиковая нагрузка стоваттного котла может превышать 500 Вт.";
$har = array(
  "Рабочий диапазон температур" => "-20..+40 °C",
  "Напряжение входа, В" => "147 - 250",
  "Напряжение АКБ" => "12 В",
);
$prod->ShowProduct($this, $desc, $har);


?>
