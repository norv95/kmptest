<?php
$this->breadcrumbs=array(
	'Soap Client',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php


if (!isset($info['authors']) || count($info) <= 0) {
    return;
}

foreach ($info[0] as $item) {

    echo $item;
    echo '<br><br>';
}
echo 'Авторы';
echo '<br><br>';

foreach ($info[authors] as $item) {

    echo $item['secname'] . ' ' . $item['name'] . ' ' . $item['lastname'];
    echo '<br><br>';
}

?>