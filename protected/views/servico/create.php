<?php
/* @var $this ServicoController */
/* @var $model Servico */

$this->breadcrumbs=array(
	'Servicos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Servico', 'url'=>array('index')),
	array('label'=>'Manage Servico', 'url'=>array('admin')),
);
?>

<h1>Create Servico</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>