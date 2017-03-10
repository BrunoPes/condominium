<?php
/* @var $this ReclamacaoController */
/* @var $model Reclamacao */

$this->breadcrumbs=array(
	'Reclamacaos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Reclamacao', 'url'=>array('index')),
	array('label'=>'Create Reclamacao', 'url'=>array('create')),
	array('label'=>'Update Reclamacao', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Reclamacao', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Reclamacao', 'url'=>array('admin')),
);
?>

<h1>View Reclamacao #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'descricao',
		'urlAnexo',
		'usuarioId',
	),
)); ?>
