<?php
/* @var $this ReservaController */
/* @var $data Reserva */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dataInicio')); ?>:</b>
	<?php echo CHtml::encode($data->dataInicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dataFim')); ?>:</b>
	<?php echo CHtml::encode($data->dataFim); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuarioId')); ?>:</b>
	<?php echo CHtml::encode($data->usuarioId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('espacoId')); ?>:</b>
	<?php echo CHtml::encode($data->espacoId); ?>
	<br />


</div>