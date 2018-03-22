<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'tarifa-envio-pais-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); ?>
<div class="row">
    <div class="col-md-12">
        <?php $data = CHtml::listData(TipoEnvio::model()->findAll(array('order'=>'tipo_envio ASC')), 'id_tipo_envio', 'tipo_envio');
        echo $form->dropDownListGroup($model,'id_tipo_envio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>__('Seleccione...'))+$data))); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php $data = CHtml::listData(Pais::model()->findAll(array('order'=>'pais ASC')), 'id_pais', 'pais');
        echo $form->dropDownListGroup($model,'id_pais',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>__('Seleccione...'))+$data))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textFieldGroup($model,'tarifa_envio_pais',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10, 'onkeyup'=>"miles_decimales(this,this.value.charAt(this.value.length-1),this,this,2)")))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textFieldGroup($model,'constante',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10, 'onkeyup'=>"miles_decimales(this,this.value.charAt(this.value.length-1),this,this,2)")))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->dropDownListGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data' => array('1' => 'Activo', '0'=>'Inactivo' ),), 'labelOptions'=>array('label'=>'Estatus:'))); ?>
    </div>
</div>




	<?php /*echo $form->textFieldGroup($model,'id_usuario_registro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'fecha_registro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'id_usuario_modifica',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'fecha_modifica',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); */ ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<script>
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