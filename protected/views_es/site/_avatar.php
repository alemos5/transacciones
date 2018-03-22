<br>
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
            'id'=>'inspection-form',
            'enableAjaxValidation'=>false,
          )); ?>
    <div id="okRegistro" style="display: none;">
        
    </div>
    <div id="RU">     
            <input id="cedulaExistente" type="hidden" value="2">          
            <input id="correoExistente" type="hidden" value="2">           
            <input id="correoMal" type="hidden" value="2">          
            <input id="contrasenaRetir" type="hidden" value="2">          

            <div id="errorRegistro" style="display: none;" class="alert alert-danger">
                <b>Errores Presentados</b>
                <hr>
                <label id="cedulaE" style="display: none;" >La identificación ingresada ya existe</label>
                <label id="correoE" style="display: none;">El correo ingresado ya existe</label>
                <label id="correoM" style="display: none;">El correo ingresado no presenta una forma correcta <b>(usuario@dominio.com)</b></label>
                <label id="claveM" style="display: none;">Las contraseñas no coinsiden</label>
                <label id="campo1" style="display: none;" >Debe ingresar el tipo de documento</label>
                <label id="campo2" style="display: none;" >Debe ingresar su documentación</label>
                <label id="campo3" style="display: none;" >Debe ingresar su primer nombre</label>
                <label id="campo4" style="display: none;" >Debe ingresar su primer apellido</label>
                <label id="campo5" style="display: none;" >Debe ingresar su correo electrónico</label>
                <label id="campo6" style="display: none;" >Debe ingresar su contraseña</label>
                <label id="campo7" style="display: none;" >Debe ingresar de nuevo su contraseña</label>
            </div>
            

          <p class="note">Campos con <span class="required">*</span> son requeridos.</p>
          <?php echo $form->errorSummary($usuario); ?>
            
          
          <div class="row">
            <div class="col-md-3">
              <?php 
              echo $form->dropDownListGroup($usuario,'tipo_documento',array('widgetOptions'=>array('htmlOptions'=>array('name'=>'tipo_documento', 'class'=>'span5'),'data'=>array(''=>'Seleccione...', '1'=>'C.I', '2'=>'Pasaporte')), 'labelOptions'=>array('label'=>'T. Identificación:')));
              ?>
            </div>
            <div class="col-md-9">
              <?php echo $form->textFieldGroup($usuario,'cedula',array('widgetOptions'=>array('htmlOptions'=>array('name'=>'identificacion', 'class'=>'span5', 'onblur'=>'findIdentificacion(this.value)' , 'onKeyPress'=>'return soloNumeros(event)', 'maxlength'=>9)))); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php echo $form->textFieldGroup($usuario,'primer_nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50, 'onkeyup'=>'javascript:this.value=this.value.toUpperCase();')))); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php echo $form->textFieldGroup($usuario,'primer_apellido',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50, 'onkeyup'=>'javascript:this.value=this.value.toUpperCase();')))); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                <?php echo $form->datePickerGroup($usuario, 'fecha_nacimiento', array('widgetOptions' => array('options' => array('format' => 'dd-mm-yyyy'), 'htmlOptions' => array('class' => 'span5')), 'labelOptions' => array('label' => 'Fecha de Nacimiento:'), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>')); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                <?php 
                $accountStatus = array('F'=>'Femenino', 'M'=>'Masculino');
                echo $form->radioButtonList($usuario,'sexo',$accountStatus,array('separator'=>''));

                ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php echo $form->textFieldGroup($usuario,'correo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50, 'onblur'=>'validarEmail(this.value)')))); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                <?php echo $form->passwordFieldGroup($usuario,'contrasena',array('widgetOptions'=>array('htmlOptions'=>array('id'=>'clave', 'class'=>'span5','maxlength'=>200, 'onkeyup'=>'seguridad_clave(this.value)')))); ?>
                <div class="progress">
                    <div id="barra1" class="progress-bar progress-bar-success" style="width: 0%;"></div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="control-label required" for="repeat">Repetir Contraseña:<span class="required">*</span></label>
                <input id="repeat" class="span5 form-control" type="password" onblur="validarRepeClave()" name="repeat" placeholder="Repetir Contraseña" maxlength="200">
              </div>
                
                
                
            </div>  
          </div>
          <?php $this->endWidget(); ?>
        </div>
            
 