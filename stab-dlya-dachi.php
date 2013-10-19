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
  function ShowProductLeft($list, $text, $control){
?>
<div>
  <div style="float:left">
    <div class="container">
      <div>
<?php echo CHtml::tag("h3", array("class"=>"product_h1", "title"=>$this->model->name), CHtml::link($this->model->name, array('//', 'product'=>$this->model->url.'.html')));?>
      </div>
      <div class="leftcol"><br />
        <ul>
<?php
foreach($list as $val){
   foreach($val as $class=>$value){
     echo CHtml::tag("li", array("class"=>$class), $value);
   }
}
?>
        </ul>
      </div>
      <div class="rightcol">
<?php
echo CHtml::link(CHtml::image($this->model->mainImage->getUrl('190x150'), $this->model->name), array('//', 'product'=>$this->model->url.'.html'));
?>
        <div style="display: block; padding: 6px 0px 6px 34px">
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
        <br />
        <div class="articleprice">
          <?= $this->model->price." руб." ?>
        </div>
        <div class="actions" style="padding: 10px 0 0 16px;">
          <form action="/order/test.php" method="post">
            <div style="display:none"><input type="hidden" value="205001b0476c6fe787634d245c5186c63883b07f" name="YII_CSRF_TOKEN" /></div>
            <input id="product_id_<?= $this->model->id ?>" type="hidden" value="<?= $this->model->id ?>" name="product_id" />
            <input id="product_price_<?= $this->model->id ?>" type="hidden" value="<?= $this->model->price ?>" name="product_price" />
            <input id="use_configurations_<?= $this->model->id ?>" type="hidden" value="0" name="use_configurations" />
            <input id="currency_rate_<?= $this->model->id ?>" type="hidden" value="1.000" name="currency_rate" />
            <input id="configurable_id_<?= $this->model->id ?>" type="hidden" value="0" name="configurable_id" />
            <input id="quantity_<?= $this->model->id ?>" type="hidden" value="1" name="quantity" />
            <input class="blue_button button orange"  type="submit" name="yt" value="Заказать" id="yt_<?= $this->model->id ?>" />
<!--            <div class="silver_clean silver_button" style="margin-left: 0px">
            <button title="Сравнить" onclick="return addProductToCompare(<?= $this->model->id ?>);">
              <span class="icon compare"></span>Сравнить
            </button>
            </div>
-->          </form>
        </div>

      </div>
      <div class="articledesc" style="margin-top: -36px;">
        <div>
<?php
echo CHtml::link("Подробнее...", array('//', 'product'=>$this->model->url.'.html'));
?>
        </div>
      </div>
    </div>
  </div>
  <div class="tltright">
    <?= $text ?>
  </div>
  <div style="clear:both"></div>
</div>
<?php
  }
  function ShowProductRight($list, $text){
    ?>
<div>
  <div style="float:left">
    <div class="tltleft">
      <?= $text ?>
    </div>
  </div>
  <div class="container2">
    <div>
<?php echo CHtml::tag("h3", array("class"=>"product_h1", "title"=>$this->model->name), CHtml::link($this->model->name, array('//', 'product'=>$this->model->url.'.html')));?>
    </div>
  <div class="leftcol">
    <br />
    <ul>
<?php
foreach($list as $val){
   foreach($val as $class=>$value){
     echo CHtml::tag("li", array("class"=>$class), $value);
   }
}
?>
    </ul>
  </div>
  <div class="rightcol">
<?php
echo CHtml::link(CHtml::image($this->model->mainImage->getUrl('190x150'), $this->model->name), array('//', 'product'=>$this->model->url.'.html'));
?>
    <br />
    <div class="articleprice">
      <?= $this->model->price." руб." ?>
    </div>
<!--    <div class="actions">
-->      <form action="/order/test.php" method="post">
        <div style="display:none"><input type="hidden" value="205001b0476c6fe787634d245c5186c63883b07f" name="YII_CSRF_TOKEN" /></div>
        <input id="product_id_<?= $this->model->id ?>" type="hidden" value="<?= $this->model->id ?>" name="product_id" />
        <input id="product_price_<?= $this->model->id ?>" type="hidden" value="<?= $this->model->price ?>" name="product_price" />
        <input id="use_configurations_<?= $this->model->id ?>" type="hidden" value="0" name="use_configurations" />
        <input id="currency_rate_<?= $this->model->id ?>" type="hidden" value="1.000" name="currency_rate" />
        <input id="configurable_id_<?= $this->model->id ?>" type="hidden" value="0" name="configurable_id" />
        <input id="quantity_<?= $this->model->id ?>" type="hidden" value="1" name="quantity" />
        <input class="blue_button" type="submit" name="yt" value="Заказать" id="yt_<?= $this->model->id ?>" />
        <div class="silver_clean silver_button" style="margin-left: 0px">
		  <button title="Сравнить" onclick="return addProductToCompare(<?= $this->model->id ?>);">
            <span class="icon compare"></span>Сравнить
          </button>
        </div>
      </form>
<!--    </div>
-->  </div>
  <div class="articledesc">
    <div style="float:left; padding-right:100px">
<?php
echo CHtml::link("Подробнее...", array('//', 'product'=>$this->model->url.'.html'));
?>
    </div>
  </div>
  <div style="clear:both"></div>
  </div>
</div>
<?php
  }
 }

?>

<h1 class="has_background"><?php echo $model->title; ?></h1>

<div style="padding: 10px 0px">
<div style="float: left; padding-right: 16px"><img src="http://www.omoza.ru/assets/images/dacha.jpg" width="300" height="180" border="0" alt="" /></div>
 <div style="text-align: justify">
 <p>Очень часто бывает так, что электросети, подведенные к дачным поселкам, их <b>не обеспечивают качественным напряжением</b>. Поэтому приятное времяпрепровождение за городом бывает омрачено нестабильной работой электроприборов или омрачено заботами о доставке их в ремонтную мастерскую. <b>Решением</b> данной проблемы является стабилизатор напряжения для дачи. </p>
<p>Наш магазин предлагает большой выбор стабилизаторов напряжения. Мы предлагаем стабилизаторы, подобранные по характеристикам, позволяющим использовать в дачных условиях. Основной такой характеристикой является мощность. Чем больше Вы одновременно используете электроприборов, и чем больше их потребляемая мощность, тем мощнее требуется стабилизатор напряжения. Так же рекомендуем обратить внимание на такие характеристики, как диапазон входного напряжения, с учетом наблюдаемых скачков и перепадов, допустимый диапазон температуры окружающей среды (если вы планируете использовать стабилизатор в холодное время года в неотапливаемых помещениях, то он должен соответствовать этому требованию) и способ установки (крепления) стабилизатора (если планируется устанавливать стабилизатор в небольшом помещении, например, чулане, то лучше выбрать стабилизатор напряжения с <b>настенной установкой</b>).</p>
<p>Телефон для консультаций и оформления заказа: <span style=" font-size: large; color: #FF0000">8 (499) 704-10-32</span> (круглосуточно, без входных).</p>
<br />
</div>
<div style="clear: "></div>
</div>
<h2 class="grouparticleh3">Оптимальный вариант</h2>
<?php
$prod = new ProductBox("voltron-rsn-10000h");
$list = array(
  array("liplus"=>"Качество отечественного производства"),
  array("liplus"=>"Работает при низких температурах (от -30 до +40 &deg;С"),
  array("liplus"=>"Удобное настенное крепление экономит пространство"),
  array("liplus"=>"Мощность 10 кВа позволяет обеспечит все электроприборы качественным электропитанием"),
  array("liplus"=>"\"Вытягивет\" напряжение от 105 В"),
  array("liplus"=>"Микропроцессорный контроль"),
  array("liplus"=>"Гарантия 1 год"),
  array("liplus"=>"Бесплатная доставка"),
);
$text = "Надежный релейный стабилизатор напряжения, предназначенный для использования на даче. Обеспечивает защиту электроприборов в широком диапазоне нпряжений. Номинальная мощность позволяет использовать его для обеспечения стабильным напряжением на большинстве дач. Если мощность данного стабилизатра для Вас избыточна, предлагаем <a href=\"/product/voltron-rsn-8000h.html\">Voltron РСН-8000h</a> <b>(8 кВА, </b>цена - <b>10010.00 руб)</b>.";
$prod->ShowProductLeft($list, $text, $this);
?>

<br />

<h2 class="grouparticleh3">Средний ценовой диапазон</h2>
<?php $prod = new ProductBox("upower-asn-10000");
$list = array(
  array("liplus"=>"Работает при низких температурах (от -30 до +40 &deg;С"),
  array("liplus"=>"Невысокая цена при соответствующем аналогам качестве"),
  array("liplus"=>"Мощность 10 кВа"),
  array("liplus"=>"\"Вытягивет\" напряжение от 120 В"),
  array("liplus"=>"Защита от импульсных помех"),
  array("liplus"=>"Гарантия 1 год"),
);
$text = "Релейный стабилизатор некачественного напряжения дачи, характеризуется высокой мощностью и надежностью работы. Обеспечит стабильное электропитание для большого числа электрических приборов с различной нагрузкой. Так же в наличии для дачи стабилизаторы этой серии: <a href=\"/product/upower-asn-15000.html\">UPower АСН-15000</a> <strong>(15 кВа, 18340.00 р)</strong> и <a href=\"/product/upower-asn-8000.html\">UPower АСН-8000</a> <strong>(8 кВа, 6180.00 р)</strong>.";
$prod->ShowProductLeft($list, $text, $this);


?>

<br />
<h2 class="grouparticleh3">Бюджетный вариант</h2>
<?php
$prod = new ProductBox("rdr-rd10000");
$list = array(
  array("liplus"=>"Низкая цена"),
  array("liplus"=>"Мощность 10 кВа"),
  array("liplus"=>"\"Вытягивет\" напряжение от 140 В"),
  array("liminus"=>"Невозможность эксплуатации при отрицательных температурах"),
  array("liminus"=>"Недопустимость перегрузки"),
  array("liplus"=>"Гарантия 1 год"),
);
$text = "Электронный стабилизатор напряжения для небольшой дачи с <strong>очень низкой ценой</strong>. Если суммарная потребляемая мощность электроприборов, которые могут быть включены одновременно не превышает мощность на которую рассчитан стабилизатор напряжения, и Вы предпочитаете выезжать на дачу только в теплое время года, то этот стабилизатор Вам подойдет.";
$prod->ShowProductLeft($list, $text, $this);
?>

<?php $prod = new ProductBox("rdr-rd10000"); ?>

<br />
<br />
Все стабилизаторы напряжения сертифицированы на соответствие ГОСТу и имеет технический паспорт на русском языке.

<br /><br />



<img name="РСТ" src="http://www.omoza.ru/assets/images/znaki.jpg" alt="РСТ">
