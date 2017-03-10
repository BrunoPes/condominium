<?php
/* @var $this PedidoservicoController */
/* @var $model Pedidoservico */

$this->breadcrumbs=array(
	'Pedidoservicos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pedidoservico', 'url'=>array('index')),
	array('label'=>'Create Pedidoservico', 'url'=>array('create')),
	array('label'=>'Update Pedidoservico', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pedidoservico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pedidoservico', 'url'=>array('admin')),
);
?>

<h1>View Pedidoservico #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'servicoId',
		'usuarioId',
		'prestadorId',
	),
)); ?>
