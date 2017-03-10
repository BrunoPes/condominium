<?php
/* @var $this ServicoController */
/* @var $model Servico */

$this->breadcrumbs=array(
	'Servicos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Servico', 'url'=>array('index')),
	array('label'=>'Create Servico', 'url'=>array('create')),
	array('label'=>'View Servico', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Servico', 'url'=>array('admin')),
);
?>

<h1>Update Servico <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>