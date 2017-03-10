	<div class="row">
		<?php echo $form->labelEx($model,'servicoId'); ?>
		<?php echo $form->textField($model,'servicoId'); ?>
		<?php echo $form->error($model,'servicoId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuarioId'); ?>
		<?php echo $form->textField($model,'usuarioId'); ?>
		<?php echo $form->error($model,'usuarioId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prestadorId'); ?>
		<?php echo $form->textField($model,'prestadorId'); ?>
		<?php echo $form->error($model,'prestadorId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>