<style>
input#Usuario_img{
  color: transparent;
}
</style>

<?php $date = new Date(); ?>
<?php
/*if ($model->estatus_contrasena == 0) {
    ?>
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Debe completar los datos de su registro para continuar Sr.&nbsp;
    <?php echo $model->primer_nombre . "&nbsp;" . $model->primer_apellido; ?>
        </strong>    
    </div>
    <?php
}*/
?>


<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'usuario-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'enableAjaxValidation' => false,
        ));
?>

<p class="alert alert-warning"><?php echo __('The required fields contain <span class="required">*</span>.'); ?></p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <center>
            <?php echo $form->labelEx($model,'img'); ?>
            <?php echo CHtml::activeFileField($model, 'img'); ?>  
            <?php echo $form->error($model,'img'); ?>
            </div>
            <?php if($model->isNewRecord!='1'){ ?>
            
            <div class="row">
            </div>
            
            <div class="row">
                
                <center>
                    <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/usuario/'.$model->img,"image",array("width"=>200, 'class'=>"img-responsive img-thumbnail")); ?>  
                </center>
            </div>
            <?php } ?>
        </center>    
    </div>
<br><br>
<div class="row">
    <div class="col-sm-4 col-md-4">
        <?php echo $form->textFieldGroup($model, 'primer_nombre', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200)))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <?php echo $form->textFieldGroup($model, 'primer_apellido', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200)))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <?php
        if(isset(Yii::app()->user->id_perfil_sistema)){
            if(Yii::app()->user->id_perfil_sistema=='1'){
                ?>
                <?php echo $form->dropDownListGroup($model,'id_perfil_sistema',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data' => array(''=>'Seleccione...')+CHtml::listData(Perfil::model()->findAll(array('order'=>'nombre')), 'id_perfil_sistema', 'nombre'),))); ?>
                <?php
            }
        }
        ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-4 col-md-4">
        <?php echo $form->textFieldGroup($model, 'correo', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200)))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <?php echo $form->textFieldGroup($model, 'observacion_personal', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200)))); ?>
    </div>
    <!--<div class="col-sm-4 col-md-4">-->
        <?php //$model->fecha_nacimiento = date("d-m-Y", strtotime($model->fecha_nacimiento)); echo $form->textFieldGroup($model, 'fecha_nacimiento', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly'=>"readonly")))); ?>
    <!--</div>-->
    <div class="col-sm-4 col-md-4">
        <div class="col-sm-4">
            <?php
                $data = array(); for ($i=1; $i<=31; $i++) { if($i <10){ $i = "0".$i; } $data[$i]= $i;}
    //            echo $model->dia = "0".$model->dia;
                if($model->dia){
                    if($model->dia < 10){
                        $model->dia = "0".$model->dia;
                    }
                }
                echo $form->dropDownListGroup($model,'dia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>array(''=>__('Select...'))+$data)));

            ?>
        </div>
        <div class="col-sm-4">
            <?php
                $data = array(); for ($i=1; $i<=12; $i++) { if($i <10){ $i = "0".$i; } $data[$i]= $i;}
                if($model->mes){
                    if($model->mes < 10){
                        $model->mes = "0".$model->mes;
                    }
                }
                echo $form->dropDownListGroup($model,'mes',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>array(''=>__('Select...'))+$data)));
            ?>
        </div>
        <div class="col-sm-4">
            <?php
                $data = array();for($i=date('o'); $i>=1910; $i--) { $data[$i]= $i;}
                echo $form->dropDownListGroup($model,'anio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>array(''=>__('Select...'))+$data)));
            ?>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-4 col-md-4">
        <?php
        //echo $model->sexo;
//        if($model->sexo == "M" || $model->sexo =="Masculino"){
            $data = array('M'=>__('Male'), 'F'=>__('Female'));
//        }else{
        //if($model->sexo == "F"){
//            $data = array('F'=>'Female');
        //}
//        }
        echo $form->dropDownListGroup($model,'sexo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>$data))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <?php
//        $data = CHtml::listData(Pais::model()->findAll(array()), 'codigo', 'pais');
//        echo $form->dropDownListGroup($model,'codigo_pais',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>$data))); 
            $data = CHtml::listData(Pais::model()->findAll(array('order'=>'pais')), 'id_pais', 'pais');
            echo $form->dropDownListGroup($model,'codigo_pais',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'FindCiudad(this.value)'), 'data'=>array(''=>__('Select...'))+$data))); 
        ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <?php
        if($model->codigo_pais) {
            $data = CHtml::listData(Ciudad::model()->findAll(array('order' => 'ciudad')), 'id_ciudad', 'ciudad');
        }else{
            $data = array();
        }
        echo $form->dropDownListGroup($model,'id_ciudad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>__('Select...'))+$data)));
        //echo $form->textFieldGroup($usuario,'ciudad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250))));
        ?>
    </div>
</div>

<div class="row">
    
    <div class="col-sm-4 col-md-4">
        <?php echo $form->passwordFieldGroup($model, 'contrasena', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200)))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="form-group">
            <label class="control-label required" for="repeat"><?php echo __('Repeat Password'); ?>:<span class="required">*</span></label>
            <input id="repeat" class="span5 form-control" type="password" name="repeat" placeholder="<?php echo __('Repeat Password'); ?>" maxlength="200">
        </div>
        <?php //echo $form->textFieldGroup($model,'id_perfil_sistema',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));  ?>
        
    </div>
    <div class="col-sm-4 col-md-4">
        <?php echo $form->textFieldGroup($model,'tlf_personal',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
    </div>
    
    <?php 
    /*if(isset(Yii::app()->user->id_perfil_sistema)){
        if(Yii::app()->user->id_perfil_sistema=='1'){
            ?>
            <div class="row">
    <!--            <div class="col-md-4">
                  <?php //echo $form->dropDownListGroup($model,'id_perfil_sistema',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data' => array(''=>'Seleccione...')+CHtml::listData(Perfil::model()->findAll(array('order'=>'nombre')), 'id_perfil_sistema', 'nombre'),))); ?>
                </div>-->
                <div class="col-md-4">
                    <?php 
                        echo $form->textFieldGroup($model,'code_cliente',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20))));
                    ?>
                </div>
            </div>
            <?php
        }
    }
*/
    ?>
</div>

    <div class="row">
        <div class="col-md-12">
            <?php echo $form->textAreaGroup($model,'direccion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
        </div>
    </div>

<?php /*
<hr>
<h4>Georeferencia</h4>
<hr>


<div class="row">
<?php echo $form->hiddenField($model, 'latitud'); ?>
<?php echo $form->hiddenField($model, 'longitud'); ?>
    <div class="col-md-12"><div id="googleMap" style="width:100%; height:380px;"></div><br /></div>
</div>

<?php // echo $form->datePickerGroup($model,'fecha_registro',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.')); ?>

<?php // echo $form->textFieldGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<?php // echo $form->textFieldGroup($model,'estatus_contrasena',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<?php // echo $form->textFieldGroup($model,'direccion_ip',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>

<?php // echo $form->textFieldGroup($model,'id_registrador',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php // echo $form->textFieldGroup($model,'id_sociedad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));  ?>

    <?php //  echo $form->textFieldGroup($model,'latitud',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php //  echo $form->textFieldGroup($model,'longitud',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

*/?>

<div class="form-actions">
<?php
$this->widget('booster.widgets.TbButton', array(
    'buttonType' => 'submit',
    'context' => 'primary',
    'label' => $model->isNewRecord ? __('Create') : __('Update'),
));
?>
</div>

<?php $this->endWidget(); ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-ui-no-conflict.min.js"></script>
<script>
    function FindCiudad(pais) {
        $("#DivCiudad").css('display', 'none');
        $("#DivLoader").html('<div align="center"><img src="../images/loader.gif" /></div>');
        $.post("<?php echo Yii::app()->createUrl('ciudad/FindCiudad') ?>",
            { pais:pais },
            function(data){
//                $("#DivLoader").html('');
//                $("#DivCiudad").css('display', 'block');
                $("#Usuario_id_ciudad").html(data);
            });

        $.post("<?php echo Yii::app()->createUrl('pais/FindTelfPais') ?>",
            { pais:pais },
            function(data){
                var datos = $.parseJSON(data);

                if (datos['calling_code'] == null ){
                    datos['calling_code'] = '' ;
                }
                if (datos['codigo'] == null ){
                    datos['codigo'] = '' ;
                }
                $("#Usuario_tlf_personal").val('+'+datos['calling_code']+' ');

            });

    }

function imgStatus(valor){
//   alert(valor);
 $('#img_estatus').val(valor);
    if(valor == 1){
        $('#img_pic1').css('display', 'none');
        $('#img_pic2').css('display', 'block');
    }else{
        $('#img_pic1').css('display', 'block');
        $('#img_pic2').css('display', 'none');
    }
}    
    
    
function findMunicipio(estado) {
  $.post("<?php echo Yii::app()->createUrl('municipio/findMunicipio') ?>",{ id_estado:estado },function(data){$("#Usuario_id_municipio").html(data);});
  findParroquia('');
}

function findParroquia(municipio) {
  $.post("<?php echo Yii::app()->createUrl('parroquia/findParroquia') ?>",{ id_municipio:municipio },function(data){$("#Usuario_id_parroquia").html(data);});
}

</script>