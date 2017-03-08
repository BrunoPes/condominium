<?php
/* @var $this ReservaController */
/* @var $model Reserva */
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
		<?php echo $form->label($model,'dataInicio'); ?>
		<?php echo $form->textField($model,'dataInicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dataFim'); ?>
		<?php echo $form->textField($model,'dataFim'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuarioId'); ?>
		<?php echo $form->textField($model,'usuarioId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'espacoId'); ?>
		<?php echo $form->textField($model,'espacoId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->