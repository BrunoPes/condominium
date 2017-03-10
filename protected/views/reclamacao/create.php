<?php
/* @var $this ReclamacaoController */
/* @var $model Reclamacao */

$this->breadcrumbs=array(
	'Reclamacaos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Reclamacao', 'url'=>array('index')),
	array('label'=>'Manage Reclamacao', 'url'=>array('admin')),
);
?>

<h1>Enviar Reclamação</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>