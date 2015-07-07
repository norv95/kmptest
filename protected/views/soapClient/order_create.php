<?php
$this->breadcrumbs=array(
	'Orders',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php
echo CHtml::beginForm();

echo CHtml::label('ID книги','book_id');
echo CHtml::textfield('book_id');
echo CHtml::tag('br');echo CHtml::tag('br');
echo CHtml::label('Количество','count');
echo CHtml::textfield('count');
echo CHtml::tag('br');

echo CHtml::tag('br');
echo CHtml::submitButton('Отправить');
echo CHtml::tag('br');echo CHtml::tag('br');
echo CHtml::endForm($this->action->id);

if (!empty($info)) {
    echo 'Номер заказа ' . $info;
}

?>
