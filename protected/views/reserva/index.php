<?php
/* @var $this ReservaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reservas',
);

$this->menu=array(
	array('label'=>'Create Reserva', 'url'=>array('create')),
	array('label'=>'Manage Reserva', 'url'=>array('admin')),
);
?>

<h1>Reservas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
