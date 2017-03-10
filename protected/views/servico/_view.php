<?php
/* @var $this ServicoController */
/* @var $data Servico */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomeServico')); ?>:</b>
	<?php echo CHtml::encode($data->nomeServico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preco')); ?>:</b>
	<?php echo CHtml::encode($data->preco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuarioId')); ?>:</b>
	<?php echo CHtml::encode($data->usuarioId); ?>
	<br />


</div>