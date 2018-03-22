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
if ($model->estatus_contrasena == 0) {
    ?>
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Debe completar los datos de su registro para continuar Sr.&nbsp;
    <?php echo $model->primer_nombre . "&nbsp;" . $model->primer_apellido; ?>
        </strong>    
    </div>
    <?php
}
?>


<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'usuario-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'enableAjaxValidation' => false,
        ));
?>

<p class="alert alert-warning">The required fields contain <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <center>
            <?php //echo $form->textFieldGroup($model,'img',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250)))); ?>
            <?php
            $this->widget('ext.xphoto.XPhoto', array(
                'model' => $model,
                'attribute' => 'img',
            ));
            ?>
        </center>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-sm-4 col-md-4">
        <?php //echo $form->textFieldGroup($model,'tipo_documento',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));  ?>
        <?php echo $form->dropDownListGroup($model, 'tipo_documento', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5'), 'data' => array('' => 'Seleccione...', '1' => 'Venezolano', '2' => 'Extranjero')), 'labelOptions' => array('label' => 'Nationality'))); ?> 
    </div>
    <div class="col-sm-4 col-md-4">
        <?php echo $form->textFieldGroup($model, 'cedula', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 15)))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
<?php //echo $form->textFieldGroup($model,'rif',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));  ?>
<?php //echo $form->textFieldGroup($model,'rif',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)), 'labelOptions'=>array('label'=>'Registro Información Fiscal (RIF):')));  ?>
        <label class="control-label required" for="Socio_rif">
            Registro de Información Fiscal (RIF) /Tax Information Registry:
            <span class="required">*</span>
        </label>
        <br />
        <?php
        $data = array('J' => 'J', 'G' => 'G', 'V' => 'V', 'E' => 'E');
        $rif = $model->rif;
        $model->rif = substr($model->rif, 0, 1);
        echo $form->dropDownList($model, 'rif', array('' => 'Select...') + $data, array('id' => 'select_Socio_rif', 'name' => 'select_Socio_rif', 'class' => 'span5 form-control', 'style' => 'width: 20%;display: inline-table;'));
        ?>
<?php $model->rif = substr($rif, 1);
echo $form->textField($model, 'rif', array('class' => 'span5 form-control', 'maxlength' => 9, 'placeholder' => 'Registro Información Fiscal (RIF)', 'style' => 'width: 78%;display: inline-table;', 'onkeypress' => 'return soloNumero(event)'));
?>
    </div>
</div>

<div class="row">
    <div class="col-sm-4 col-md-4">
        <?php echo $form->textFieldGroup($model, 'primer_nombre', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 20)))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <?php echo $form->textFieldGroup($model, 'segundo_nombre', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 20)))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <?php echo $form->textFieldGroup($model, 'primer_apellido', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 20)))); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-4 col-md-4">
        <?php echo $form->textFieldGroup($model, 'segundo_apellido', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 20)))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
<?php //echo $form->datePickerGroup($model,'fecha_nacimiento',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.'));  ?>
<?php echo $form->datePickerGroup($model, 'fecha_nacimiento', array('widgetOptions' => array('options' => array('format' => 'dd-mm-yyyy'), 'htmlOptions' => array('class' => 'span5')), 'labelOptions' => array('label' => 'Birthday:'), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>')); ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <?php // echo $form->textFieldGroup($model,'sexo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>1))));  ?>
        <?php echo $form->dropDownListGroup($model, 'sexo', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5'), 'data' => array('' => 'Seleccione...', '1' => 'Femenino', '2' => 'Masculino')), 'labelOptions' => array('label' => 'Gender'))); ?> 
    </div>
</div>

<div class="row">
    <div class="col-sm-8 col-md-8">
        <?php echo $form->textFieldGroup($model, 'observacion_personal', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200)))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <?php echo $form->textFieldGroup($model, 'razon_social', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 250)))); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-4 col-md-4">
        <?php echo $form->textFieldGroup($model, 'tlf_habitacion', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 250)))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
<?php echo $form->textFieldGroup($model, 'tlf_personal', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 250)))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <?php echo $form->textFieldGroup($model, 'tlf_personal2', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 250)))); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-4 col-md-4">
        <?php echo $form->textFieldGroup($model, 'correo', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 250)))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
<?php echo $form->textFieldGroup($model, 'correo2', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 250)))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
<?php //echo $form->textFieldGroup($model,'autorizacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));  ?>
<?php //echo $form->dropDownListGroup($model, 'autorizacion', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5'), 'data' => array('' => 'Seleccione...', '1' => 'Si', '0' => 'No')), 'labelOptions' => array('label' => 'Autorizar'))); ?> 
        <?php echo $form->dropDownListGroup($model, 'id_perfil_sistema', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5'), 'data' => array('' => 'Seleccione...') + CHtml::listData(Perfil::model()->findAll(array('order' => 'nombre')), 'id_perfil_sistema', 'nombre'),))); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-4 col-md-4">
        <?php echo $form->textFieldGroup($model, 'usuario', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 50)))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <?php echo $form->passwordFieldGroup($model, 'contrasena', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200)))); ?>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="form-group">
            <label class="control-label required" for="repeat">Repetir Contraseña:<span class="required">*</span></label>
            <input id="repeat" class="span5 form-control" type="password" name="repeat" placeholder="repeat password" maxlength="200">
        </div>
        <?php //echo $form->textFieldGroup($model,'id_perfil_sistema',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));  ?>
        
    </div>
</div>

<div class="row">
    <div class="col-sm-4 col-md-4">
        
    </div>
    <div class="col-sm-4 col-md-4">
        
    </div>
    <div class="col-sm-4 col-md-4">
        <?php //echo $form->textFieldGroup($model, 'observacion_personal', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 200)))); ?>
    </div>
</div>
<hr>
<h4>Georeferencia</h4>
<hr>

<div class="row">
    <div class="col-sm-3 col-md-3">
        <?php $data = CHtml::listData(Estado::model()->findAll(array('order'=>'nombre')), 'id_estado', 'nombre');
        echo $form->dropDownListGroup($model,'id_estado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'findMunicipio(this.value)'), 'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'State:'))); ?>
    </div>
    <div class="col-sm-3 col-md-3">
        <?php if($model->id_estado) $data = CHtml::listData(Municipio::model()->findAll('id_estado=:id_estado', array(':id_estado'=>$model->id_estado)), 'id_municipio', 'nombre');
        else $data = array();
        echo $form->dropDownListGroup($model,'id_municipio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'findParroquia(this.value)'), 'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Municipality:'))); ?>
    </div>
    <div class="col-sm-3 col-md-3">
        <?php if($model->id_municipio) $data = CHtml::listData(Parroquia::model()->findAll('id_municipio=:id_municipio', array(':id_municipio'=>$model->id_municipio)), 'id_parroquia', 'nombre');
        echo $form->dropDownListGroup($model,'id_parroquia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Parish:'))); ?>
    </div>
    <div class="col-sm-3 col-md-3">
<?php echo $form->textFieldGroup($model, 'zona_postal', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 4)))); ?>
    </div>
</div>
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

<div class="form-actions">
<?php
$this->widget('booster.widgets.TbButton', array(
    'buttonType' => 'submit',
    'context' => 'primary',
    'label' => $model->isNewRecord ? 'Create' : 'Update',
));
?>
</div>

<?php $this->endWidget(); ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-ui-no-conflict.min.js"></script>
<script>
function findMunicipio(estado) {
  $.post("<?php echo Yii::app()->createUrl('municipio/findMunicipio') ?>",{ id_estado:estado },function(data){$("#Usuario_id_municipio").html(data);});
  findParroquia('');
}

function findParroquia(municipio) {
  $.post("<?php echo Yii::app()->createUrl('parroquia/findParroquia') ?>",{ id_municipio:municipio },function(data){$("#Usuario_id_parroquia").html(data);});
}

</script>