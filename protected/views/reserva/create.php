<?php
/* @var $this ReservaController */
/* @var $model Reserva */

$this->breadcrumbs=array(
	'Reservas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Reserva', 'url'=>array('index')),
	array('label'=>'Manage Reserva', 'url'=>array('admin')),
);
?>

<h1>Create Reserva</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>