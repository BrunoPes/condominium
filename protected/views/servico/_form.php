<?php
/* @var $this ServicoController */
/* @var $model Servico */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'servico-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nomeServico'); ?>
		<?php echo $form->textField($model,'nomeServico',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nomeServico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preco'); ?>
		<?php echo $form->textField($model,'preco'); ?>
		<?php echo $form->error($model,'preco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuarioId'); ?>
		<?php echo $form->textField($model,'usuarioId'); ?>
		<?php echo $form->error($model,'usuarioId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->