<?php
/* @var $this PedidoservicoController */
/* @var $data Pedidoservico */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('servicoId')); ?>:</b>
	<?php echo CHtml::encode($data->servicoId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuarioId')); ?>:</b>
	<?php echo CHtml::encode($data->usuarioId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prestadorId')); ?>:</b>
	<?php echo CHtml::encode($data->prestadorId); ?>
	<br />


</div>