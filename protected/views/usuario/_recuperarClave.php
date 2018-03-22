<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'usuario-form',
    'action'=> Yii::app()->baseUrl.'/usuario/update/'.$model->id_usuario_sistema,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'enableAjaxValidation' => false,
        ));
?>
<div class="pd-inner">
    
<p class="alert alert-warning">The required fields contain <span class="required">*</span>.</p>
    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-sm-4 col-md-12">
            <center>
                <!--<img style="width:200px; height: 200px;" src="<?php echo $model->img; ?>" alt="" class="img-circle">-->
                <input type="hidden" name="rclave" value="1">
            </center>
        </div>
    </div>
    <br>
    <div class="row">
        <?php
        $model->contrasena = "";
        ?>
        <div class="col-sm-4 col-md-12">
            <center>
                <?php echo $form->passwordFieldGroup($model, 'contrasena', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'style'=>"width: 30%" , 'maxlength' => 200)))); ?>
            </center>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-md-12">
            
            <center>
            <div class="form-group">
                <label class="control-label required" for="repeat">Repetir Contraseña:<span class="required">*</span></label>
                <input id="repeat" class="span5 form-control" type="password" name="repeat" style="width: 30%" placeholder="Repetir Contraseña" maxlength="200">
            </div>
            <?php //echo $form->textFieldGroup($model,'id_perfil_sistema',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));  ?>
            </center>
        </div>
    </div>
    <center>
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Update',
    ));
    ?>
    </center>
</div>
<?php $this->endWidget(); ?>