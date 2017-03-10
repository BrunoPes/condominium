<?php
/* @var $this PedidoservicoController */
/* @var $model Pedidoservico */
/* @var $form CActiveForm */
	$userId = Yii::app()->user->id;
?>

<script type="text/javascript">
	$(document).ready( _ => {
		$("#turnDate").attr("type", "date");
	});
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pedidoservico-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
)); ?>

<div class="container" style="padding-left: 0px; width:100%">
    <div class="col-md-10" style="padding-left: 0px">
        <form role="form">
            <fieldset>
            	<?php echo $form->errorSummary($model); ?>
            	<div class="row">
            		<div class="form-group col-md-6" style="padding-left: 0px;">
            			<label class="control-label">Nome</label>
            			<input type="text" class="form-control" placeholder="<?=$s['name']?>" disabled></input>
            		</div>

            		<div class="form-group col-md-6" style="padding-left: 0px;">
            			<label class="control-label">Serviço</label>
            			<input type="text" class="form-control" placeholder="<?=$s['serv']?>" disabled></input>
            		</div>
            	</div>
            	<div class="row">
            		<div class="form-group col-md-6" style="padding-left: 0px;">
            			<label class="control-label">Valor(R$)</label>
            			<input type="text" class="form-control" placeholder="<?=$s['preco']?>,00" disabled></input>
            		</div>
            		<div class="form-group col-md-6" style="padding-left: 0px;">
            			<label class="control-label">Email</label>
            			<input type="text" class="form-control" placeholder="<?=$s['email']?>" disabled></input>
            		</div>
            	</div>
            	<div class="row">
            		<div class="form-group col-md-6" style="padding-left: 0px;">
            			<label class="control-label">Data</label>
            			<?php echo $form->textField($model,'dataServico', ['id'=>'turnDate', 'class' => 'form-control'])?>
            			<?php echo $form->error($model,'dataServico'); ?>
            		</div>

            		<div class="form-group col-md-6" style="padding-left: 0px;">
            			<label class="control-label">Telefone</label>
            			<input type="text" class="form-control" placeholder="<?=$s['telefone']?>" disabled></input>
            		</div>
            	</div>
				<div class="row">
				    <div class="form-group" style="padding-left: 0px">
				    	<?php echo $form->labelEx($model,'mensagem'); ?>
						<?php echo $form->textArea($model,'mensagem',['style'=>'min-height: 100px', 'class'=> 'form-control']);?>
						<?php echo $form->error($model,'mensagem'); ?>
					</div>
				</div>
				<input class="classInp" name="Pedidoservico[usuarioId]" value="<?=$userId?>" style="display: none">
				<input class="classInp" name="Pedidoservico[servicoId]" value="<?=$s['id']?>" style="display: none">
				<input class="classInp" name="Pedidoservico[prestadorId]" value="<?=$s['usuarioId']?>" style="display: none">

				<div class="buttons col-md-2" style="padding-left: 0px;" >
					<?php echo CHtml::submitButton('Contratar', ['style'=>'height: 35px;padding-top: 4px!important;','class' => 'btn btn-lg btn-success btn-block']); ?>
				</div>
			</fieldset>
		</form>
	</div>
</div>

<?php $this->endWidget(); ?>

</div>
