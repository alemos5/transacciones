<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'inventario-usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model);

if(Yii::app()->user->id_perfil_sistema!='1'){
    $model->code_cliente = Yii::app()->user->code_cliente;
    $model->id_usuario_sistema = Yii::app()->user->id_usuario_sistema;
    echo $form->hiddenField($model,'code_cliente',array('type'=>"hidden"));
    echo $form->hiddenField($model,'id_usuario_sistema',array('type'=>"hidden"));
}else{
?>


<div class="row">
  <div class="col-xs-12">
      <label class="control-label required" for="Afianzamiento_id_socio">
        Código del Cliente:
        <span class="required">*</span>
      </label>
      <?php 
      if($model->code_cliente){
        $socio = Clientes::model()->find("code_cliente ='".$model->code_cliente."'");
      }
      ?>
      <input id="codigoCliente" onblur="vaciar(this.value)" class="span5 ui-autocomplete-input form-control" type="text" name="codigoCliente" placeholder="Código de Cliente" autocomplete="off" value="<?php echo $socio->nombre; ?>">
        <?php //echo $form->textFieldGroup($model,'id_socio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
        <?php echo $form->hiddenField($model,'code_cliente',array('type'=>"hidden")); ?>
        <?php echo $form->hiddenField($model,'id_usuario_sistema',array('type'=>"hidden")); ?>
        <?php //echo $form->hiddenField($model,'id_usuario_sistema',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
      <br>
  </div>
</div>

<?php } ?>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textFieldGroup($model,'producto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textFieldGroup($model,'peso',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10, 'onkeyup'=>"miles_decimales(this,this.value.charAt(this.value.length-1),this,this,2)")))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textFieldGroup($model,'distribuidor',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textFieldGroup($model,'cantidad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200, 'onkeyup'=>"miles_decimales(this,this.value.charAt(this.value.length-1),this,this,0)")))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textAreaGroup($model,'descripcion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
    </div>
</div>


<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textFieldGroup($model,'precio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45, 'onkeyup'=>"miles_decimales(this,this.value.charAt(this.value.length-1))")))); ?>
    </div>
</div>
<?php //echo $form->textFieldGroup($model,'code_cliente',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45)))); ?>



	

<?php /*echo $form->textFieldGroup($model,'id_registrador',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<?php echo $form->textFieldGroup($model,'fecha_registro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<?php echo $form->textFieldGroup($model,'id_modificador',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<?php echo $form->textFieldGroup($model,'fecha_modificacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); */ ?>

<div class="form-actions">
<?php $this->widget('booster.widgets.TbButton', array(
                'buttonType'=>'submit',
                'context'=>'primary',
                'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
        )); ?>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-ui-no-conflict.min.js"></script>
<script>
jQuery('#codigoCliente').autocomplete({
  minLength: 3,
  source: function (request, response) {
    $.ajax({
      url: '<?php echo Yii::app()->createUrl('clientes/findJsonCliente') ?>',
      dataType: "json",
      data: {term: request.term},
      success: function (data) {
        if(data){  
            response($.map(data, function (item) {
              return {
                label: 'Código Cliente: ' + item.code_cliente + ', Nombre: ' + item.nombre,
                value: item.code_cliente+'; '+item.nombre,//item.id_socio,
                id: item.id_cliente,
                code_cliente: item.code_cliente,
                name: item.nombre,
                direccion: item.direccion,
                estado: item.estado,
                telefono: item.telefono,
              }
            }));
        }
    }
    });
  },
  select: function (event, ui) {
    $('#InventarioUsuario_code_cliente').val(ui.item.code_cliente);
    $('#InventarioUsuario_id_usuario_sistema').val(ui.item.id);
  },
});


//===============================================================================//
// TrackingCliente
//===============================================================================//
jQuery('#TrackingCliente').autocomplete({
  minLength: 3,
  source: function (request, response) {
    $.ajax({
      url: '<?php echo Yii::app()->createUrl('ordenesCliente/findJsonOrdenesCliente') ?>',
      dataType: "json",
      data: {term: request.term},
      success: function (data) {
        if(data){  
            response($.map(data, function (item) {
              return {
                label: 'Traking: ' + item.tracking + ', Descripción: ' + item.descripcion,
                value: item.tracking+'; '+item.descripcion,//item.id_socio,
                tracking: item.tracking,
                descripcion: item.descripcion,
                valor: item.valor,
                tienda: item.tienda,
//                code_cliente: item.code_cliente,
//                name: item.nombre,
//                direccion: item.direccion,
//                estado: item.estado,
//                telefono: item.telefono,
              }
            }));
        }
    }
    });
  },
  select: function (event, ui) {
        $('#Ordenes_tracking').val(ui.item.tracking);
        $('#Ordenes_descripcion').val(ui.item.descripcion);
        $('#Ordenes_costo').val(ui.item.valor);
        $('#Ordenes_tienda').val(ui.item.tienda);
  },
});

$("#cant").change(function() {
  var htmlString = "";
  var len = $(this).val();
  for (var i = 0; i < len; i++) {
    htmlString += "</br><input type='text' name='descripcion"+ i +"' placeholder='Descripcion' class='formulario obt'></br>";
   // htmlString += "<input type='text' class='name'>";

  }

  $("#outputArea").html(htmlString);
});

function miles_decimales(donde,caracter,campo,porcentaje, cantidadNumeroEntero, cantidadDecimales){

  if(!cantidadDecimales){
      cantidadDecimales = 2;
  }
  if(!cantidadNumeroEntero){
      cantidadNumeroEntero = 4;
  }
  var decimales = true;
  dec= cantidadDecimales;

  pat = /[\*,\+,\(,\),\?,\\,\$,\[,\],\^]/
  valor = donde.value
  largo = valor.length
  crtr = true
  if(isNaN(caracter) || pat.test(caracter) == true){
      if (pat.test(caracter)==true) 
              {caracter = "\\" + caracter}
      carcter = new RegExp(caracter,"g")
      valor = valor.replace(carcter,"")
      donde.value = valor
      crtr = false
  }else{
      var nums = new Array()
      cont = 0
      for(m=0;m<largo;m++){
          if(valor.charAt(m) == "." || valor.charAt(m) == " " || valor.charAt(m) == ","){
            continue;
          }else{
            nums[cont] = valor.charAt(m)
            cont++
          }
      }
  }

  if(decimales == true) {
    ctdd = eval(1 + dec);
    nmrs = cantidadNumeroEntero
  }else {
    ctdd = 1; nmrs = 3
  }
  var cad1="",cad2="",cad3="",tres=0
  if(largo > nmrs && crtr == true){
    for (k=nums.length-ctdd;k>=0;k--){
      cad1 = nums[k]
      cad2 = cad1 + cad2
      tres++
      if((tres%3) == 0){
          if(k!=0){
            //cad2 = "." + cad2 // agregar punto de miles
          }
      }
  }

    for (dd = dec; dd > 0; dd--){
      cad3 += nums[nums.length-dd] 
    }
    if(decimales == true){
      cad2 += "." + cad3
    }
    donde.value = cad2
  }
  donde.focus()
  
  
}

</script>