<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>


<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Faça seu Login</h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                        		<?php echo $form->labelEx($model,'login'); ?>
                        		<?php echo $form->textField($model,'username', ['class'=> 'form-control']); ?>
                        		<?php echo $form->error($model,'username'); ?>
                            </div>

                            <div class="form-group">
                        		<?php echo $form->labelEx($model,'senha'); ?>
                        		<?php echo $form->passwordField($model,'password', ['class'=> 'form-control']); ?>
                        		<?php echo $form->error($model,'password'); ?>
                            </div>
                        	<div class="checkbox">
                                <label>
                            		<?php echo $form->checkBox($model,'rememberMe'); ?>
                            		<?php echo $form->label($model,'rememberMe'); ?>
                            		<?php echo $form->error($model,'rememberMe'); ?>
                                </label>
                        	</div>

                        	<div class="buttons">
                        		<?php echo CHtml::submitButton('Entrar', [ 'class' => 'btn btn-lg btn-success btn-block']); ?>
                        	</div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->
