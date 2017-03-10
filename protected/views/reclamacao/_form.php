<?php
/* @var $this ReclamacaoController */
/* @var $model Reclamacao */
/* @var $form CActiveForm */
	$userId = Yii::app()->user->id;
?>



<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reclamacao-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
)); ?>

	<div class="container" style="padding-left: 0px; width:100%">
		<p class="note">Os campos marcados <span class="required">(*)</span> são obrigatórios.</p>
	    <div class="col-md-10" style="padding-left: 0px">
	        <form role="form">
	            <fieldset>
	            	<?php echo $form->errorSummary($model); ?>
	            	<div class="row">
		                <div class="form-group col-md-10" style="padding-left: 0px">
		                	<?php echo $form->labelEx($model,'descricao'); ?>
							<?php echo $form->textArea($model,'descricao', ['style' => 'min-height: 150px', 'class'=> 'form-control'],
													   array('rows'=>6, 'cols'=>50)); ?>
							<?php echo $form->error($model,'descricao'); ?>
						</div>
					</div>
					<div class="row" style="display:block;">
						<div class="form-group col-md-10" style="padding-left: 0px;">
							<?php echo $form->labelEx($model,'urlAnexo', ['class' => 'control-label']); ?>
							<?php echo $form->textField($model,'urlAnexo',
											['id'=>'input-1a', 'type'=>'file','class'=> 'file form-control', 'data-show-preview'=>'false',
											"style"=>"height:10px"],
											array('size'=>60,'maxlength'=>100)); ?>
							<?php echo $form->error($model,'urlAnexo'); ?>
						</div>
					</div>
					<input type="input" name="Reclamacao[usuarioId]" value="<?=$userId?>" style="display: none">
					<div class="buttons col-md-2" style="padding-left: 0px;" >
						<?php echo CHtml::submitButton('Enviar', ['style'=>'height: 35px;padding-top: 4px!important;','class' => 'btn btn-lg btn-success btn-block']); ?>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
<?php $this->endWidget(); ?>
</div>

<script type="text/javascript">

	$(document).ready( _ => {
		$("#input-1a").attr("type", "file");
		$("#input-1a").fileinput({
			'showUpload': true,
			'uploadUrl': 'receiveFile',
			'uploadAsync':false,
	        'allowedFileExtensions': ['jpg', 'png', 'gif', 'pdf'],
	        'msgAjaxError': data => {
	        	console.log("Data". data);
	        },
	        'fileerror': data => {
	        	console.log("Data". data);
	        },
	        'fileuploaderror':data => {
	        	console.log("Data". data);
	        },
    	});
	});
</script>
