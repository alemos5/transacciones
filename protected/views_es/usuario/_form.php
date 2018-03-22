<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDjnu9FM-PNfYzTqyHK5Rl3-p9TSOPFjAg"></script>
<script>
    var map;
    var marketPosition = new google.maps.LatLng(<?php if ($model->latitud AND $model->longitud) $position = trim($model->latitud) . ", " . trim($model->longitud);
else $position = "10.500000, -66.916664";
echo $position ?>);
    function initialize() {
    map = new google.maps.Map(document.getElementById('googleMap'), {
<?php if ($position != '10.500000, -66.916664') { ?>
        zoom: 15,
<?php } else { ?>
        zoom: 12,
<?php } ?>
    center: marketPosition,
    });
<?php if ($position != '10.500000, -66.916664') { ?>
        var marker = new google.maps.Marker({
        position: marketPosition,
        });
        marker.setMap(map);
<?php } else echo "var marker=null;"; ?>
    function placeMarker(location) {
    marker = new google.maps.Marker({
    position: location,
            map: map
    });
    map.setCenter(location);
    }
    google.maps.event.addDomListener(map, 'click', function(event) {
    if (marker == null) {
    document.getElementById('Usuario_latitud').value = event.latLng.lat();
    document.getElementById('Usuario_longitud').value = event.latLng.lng();
    placeMarker(event.latLng);
    } else {
    document.getElementById('Usuario_latitud').value = event.latLng.lat();
    document.getElementById('Usuario_longitud').value = event.latLng.lng();
    marker.setPosition(event.latLng)
    }
    });
    }
    google.maps.event.addDomListener(window, 'load', initialize);</script>

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

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>

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
        <?php echo $form->textFieldGroup($model, 'primer_nombre', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly'=>"readonly")))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <?php echo $form->textFieldGroup($model, 'primer_apellido', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly'=>"readonly")))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <label class="control-label required" for="Socio_rif">
            Documentación:
            <span class="required">*</span>
        </label>
        <br />
        <?php
        
        if($model->tipo_documento == 1){
            $data = array('1'=>'Cedula Ciudadanía');
        }
        if($model->tipo_documento == 2){
            $data = array('2'=>'Licencia de Conducir');
        }
        if($model->tipo_documento == 3){
            $data = array('3'=>'Cedula de Extranjería');
        }
        if($model->tipo_documento == 4){
            $data = array('4'=>'Pasaporte');
        }
        if($model->tipo_documento == 5){
            $data = array('5'=>'Tarjeta de Identidad');
        }
        if($model->tipo_documento == 6){
            $data = array('6'=>'Registro Civil');
        }
        echo $form->dropDownList($model, 'tipo_documento', $data, array('id' => 'select_Socio_rif', 'name' => 'select_Socio_rif', 'class' => 'span5 form-control', 'style' => 'width: 55%;display: inline-table;', 'disabled'=>"disabled"));
        ?>
        <?php 
        echo $form->textField($model, 'cedula', array('class' => 'span5 form-control', 'maxlength' => 9, 'placeholder' => 'Registro Información Fiscal (RIF)', 'style' => 'width: 40%;display: inline-table;', 'onkeypress' => 'return soloNumero(event)', 'readonly'=>"readonly"));
        ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-4 col-md-4">
        <?php echo $form->textFieldGroup($model, 'correo', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly'=>"readonly")))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <?php echo $form->textFieldGroup($model, 'tlf_personal', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly'=>"readonly")))); ?>
    </div>
    <!--<div class="col-sm-4 col-md-4">-->
        <?php //$model->fecha_nacimiento = date("d-m-Y", strtotime($model->fecha_nacimiento)); echo $form->textFieldGroup($model, 'fecha_nacimiento', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly'=>"readonly")))); ?>
    <!--</div>-->
    <div class="col-sm-12 col-md-1">
        <?php 
            $data = array(); for ($i=1; $i<=31; $i++) { if($i <10){ $i = "0".$i; } $data[$i]= $i;}
//            echo $model->dia = "0".$model->dia;
            if($model->dia){
                if($model->dia < 10){
                    $model->dia = "0".$model->dia;
                }
            }
            echo $form->dropDownListGroup($model,'dia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'disabled'=>"disabled"),'data'=>array(''=>'Seleccione...')+$data),  'labelOptions'=>array('label'=>'Día')));
            
        ?>
    </div>
    <div class="col-sm-12 col-md-1">
        <?php 
            $data = array(); for ($i=1; $i<=12; $i++) { if($i <10){ $i = "0".$i; } $data[$i]= $i;}
            if($model->mes){
                if($model->mes < 10){
                    $model->mes = "0".$model->mes;
                }
            }
            echo $form->dropDownListGroup($model,'mes',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'disabled'=>"disabled"),'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Mes')));
        ?>
    </div>
    <div class="col-sm-12 col-md-2">
        <?php 
            $data = array();for($i=date('o'); $i>=1910; $i--) { $data[$i]= $i;}
            echo $form->dropDownListGroup($model,'anio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'disabled'=>"disabled"),'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Año')));
        ?>
    </div>
</div>


<div class="row">
    <div class="col-sm-4 col-md-4">
        <?php
        //echo $model->sexo;
        if($model->sexo == "M" || $model->sexo =="Masculino"){
            $data = array('M'=>'Masculino');
        }else{
        //if($model->sexo == "F"){
            $data = array('F'=>'Femenino');
        //}
        }
        echo $form->dropDownListGroup($model,'sexo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'disabled'=>"disabled"), 'data'=>$data), 'labelOptions'=>array('label'=>'Sexo:'))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <?php
        if($model->tipo_usuario == 1){
            $data = array('1'=>'Competidor');
        }
        if($model->tipo_usuario == 2){
            $data = array('2'=>'Publico');
        }
        echo $form->dropDownListGroup($model,'tipo_usuario',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'disabled'=>"disabled"), 'data'=>$data), 'labelOptions'=>array('label'=>'Tipo de Usuario:'))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <?php
        $data = CHtml::listData(Pais::model()->findAll(array()), 'codigo', 'pais');
        echo $form->dropDownListGroup($model,'codigo_pais',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'disabled'=>"disabled"), 'data'=>$data), 'labelOptions'=>array('label'=>'Pais:'))); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-4 col-md-4">
        <?php
        //$data = CHtml::listData(Ciudad::model()->findAll(array()), 'id_ciudad', 'ciudad');
        //echo $form->dropDownListGroup($model,'id_ciudad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'disabled'=>"disabled"), 'data'=>$data), 'labelOptions'=>array('label'=>'Ciudad:'))); 
        echo $form->textFieldGroup($model, 'ciudad', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200, 'readonly'=>"readonly"))));
        ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <?php echo $form->passwordFieldGroup($model, 'contrasena', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200)))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="form-group">
            <label class="control-label required" for="repeat">Repetir Contraseña:<span class="required">*</span></label>
            <input id="repeat" class="span5 form-control" type="password" name="repeat" placeholder="Repetir Contraseña" maxlength="200">
        </div>
        <?php //echo $form->textFieldGroup($model,'id_perfil_sistema',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));  ?>
        
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
    'label' => $model->isNewRecord ? 'Crear' : 'Actualizar',
));
?>
</div>

<?php $this->endWidget(); ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-ui-no-conflict.min.js"></script>
<script>
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