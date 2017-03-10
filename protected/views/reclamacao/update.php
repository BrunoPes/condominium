<?php
/* @var $this ReclamacaoController */
/* @var $model Reclamacao */

$this->breadcrumbs=array(
	'Reclamacaos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Reclamacao', 'url'=>array('index')),
	array('label'=>'Create Reclamacao', 'url'=>array('create')),
	array('label'=>'View Reclamacao', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Reclamacao', 'url'=>array('admin')),
);
?>

<h1>Update Reclamacao <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>