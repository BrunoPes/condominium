<?php
/* @var $this ReservaController */
/* @var $model Reserva */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reserva-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'dataInicio'); ?>
		<?php echo $form->textField($model,'dataInicio'); ?>
		<?php echo $form->error($model,'dataInicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dataFim'); ?>
		<?php echo $form->textField($model,'dataFim'); ?>
		<?php echo $form->error($model,'dataFim'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuarioId'); ?>
		<?php echo $form->textField($model,'usuarioId'); ?>
		<?php echo $form->error($model,'usuarioId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'espacoId'); ?>
		<?php echo $form->textField($model,'espacoId'); ?>
		<?php echo $form->error($model,'espacoId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->