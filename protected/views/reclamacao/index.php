<?php
/* @var $this ReclamacaoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reclamacaos',
);

$this->menu=array(
	array('label'=>'Create Reclamacao', 'url'=>array('create')),
	array('label'=>'Manage Reclamacao', 'url'=>array('admin')),
);
?>

<h1>Reclamacaos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
