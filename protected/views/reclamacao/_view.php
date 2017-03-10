<?php
/* @var $this ReclamacaoController */
/* @var $data Reclamacao */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($data->descricao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('urlAnexo')); ?>:</b>
	<?php echo CHtml::encode($data->urlAnexo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuarioId')); ?>:</b>
	<?php echo CHtml::encode($data->usuarioId); ?>
	<br />


</div>