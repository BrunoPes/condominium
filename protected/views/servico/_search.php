<?php
/* @var $this ServicoController */
/* @var $model Servico */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nomeServico'); ?>
		<?php echo $form->textField($model,'nomeServico',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preco'); ?>
		<?php echo $form->textField($model,'preco'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuarioId'); ?>
		<?php echo $form->textField($model,'usuarioId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->