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
                <label id="campo8" style="display: none;" >Debe ingresar su fecha de nacimiento</label>
                <label id="campo9" style="display: none;" >Debe ingresar pais</label>
                <label id="campo10" style="display: none;" >Debe ingresar ciudad</label>
                <label id="campo11" style="display: none;" >Debe ingresar su Teléfono</label>
                <label id="campo12" style="display: none;" >Debe ingresar Tipo de usuario</label>
                <label id="campo13" style="display: none;" >Debe ingresar la validación del correo</label>
                <label id="campo14" style="display: none;" >Los correos no coinciden</label>
                <label id="campo15" style="display: none;" >Debe seleccionar el día de nacimiento</label>
                <label id="campo16" style="display: none;" >Debe seleccionar el mes de nacimiento</label>
                <label id="campo17" style="display: none;" >Debe seleccionar el año de nacimiento</label>
            </div>
            
          <p class="note">Campos con <span class="required">*</span> son requeridos.</p>
          <?php echo $form->errorSummary($usuario); ?>
          <div class="row">
            <div class="col-md-3">
              <?php $data = array(
                                  '1'=>'Cédula Ciudadanía', 
                                  '2'=>'Licencia de Conducir',
                                  '3'=>'Cédula de Extranjería',
                                  '5'=>'Tarjeta de Identidad',
                                  '6'=>'Registro Civil'
                  );
              echo $form->dropDownListGroup($usuario,'tipo_documento',array('widgetOptions'=>array('htmlOptions'=>array('name'=>'tipo_documento', 'class'=>'span5'),'data'=>array('4'=>'Pasaporte')+$data), 'labelOptions'=>array('label'=>'T. Identificación:')));
              ?>
            </div>
            <div class="col-md-9">
              <?php echo $form->textFieldGroup($usuario,'cedula',array('widgetOptions'=>array('htmlOptions'=>array('name'=>'identificacion', 'class'=>'span5', 'onblur'=>'findIdentificacion(this.value)' , 'maxlength'=>15)))); //, 'onKeyPress'=>'return soloNumeros(event)' ?>
            </div>
          </div>  
          <div class="row">
            <div class="col-md-12">
              <?php echo $form->textFieldGroup($usuario,'primer_nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php echo $form->textFieldGroup($usuario,'primer_apellido',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php echo $form->textFieldGroup($usuario,'correo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50, 'onblur'=>'validarEmail(this.value)')))); ?>
            </div>
          </div>
          
          <div class="row">
              
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label required" for="repeat">Repetir Correo:<span class="required">*</span></label>
                    <input id="Usuario_correo2" class="span5 form-control" type="text" name="repeat" placeholder="Repetir Correo" maxlength="50" onblur="validarEmail(this.value)">
                </div>
              <?php //echo $form->textFieldGroup($usuario,'correo2',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50, 'onblur'=>'validarEmail(this.value)')))); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                <?php $data = CHtml::listData(Pais::model()->findAll(array('order'=>'pais')), 'codigo', 'pais');
                echo $form->dropDownListGroup($usuario,'codigo_pais',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'findCiudad(this.value)'), 'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Pais:'))); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                <?php 
                //$data = CHtml::listData(Ciudad::model()->findAll(array('order'=>'ciudad')), 'id_ciudad', 'ciudad');
                //echo $form->dropDownListGroup($usuario,'id_ciudad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Ciudad:'))); 
                echo $form->textFieldGroup($usuario,'ciudad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250))));
                ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <?php echo $form->textFieldGroup($usuario,'tlf_personal',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
            </div>
          </div>
          <center>
              Ingrese su fecha de nacimiento
          </center>
          <hr>
          <div class="row">
              
            <div class="col-sm-12 col-md-4">
                <?php 
                    $data = array(); for ($i=1; $i<=31; $i++) { 
                        if($i<10){
                            $i = "0".$i;
                        }
                        $data[$i]= $i;
                        
                    }
                    echo $form->dropDownListGroup($usuario,'dia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Día')));
                ?>
            </div>
            <div class="col-sm-12 col-md-4">
                <?php 
                    $data = array(); for ($i=1; $i<=12; $i++) { 
                        if($i<10){
                            $i = "0".$i;
                        }
                        $data[$i]= $i;
                    }
                    echo $form->dropDownListGroup($usuario,'mes',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Mes')));
                ?>
            </div>
            <div class="col-sm-12 col-md-4">
                <?php 
                    $data = array();for($i=date('o'); $i>=1910; $i--) { $data[$i]= $i;}
                    echo $form->dropDownListGroup($usuario,'anio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Año')));
                ?>
            </div>  
          </div>
          <hr>
          
          <div class="row">
            <div class="col-md-12">
                <center>
                <?php //$model->isNewRecord ? $model->active = 1: $model->active = $model->active ;  ?>
                <?php
                
                $accountStatus = array('F'=>'Femenino', 'M'=>'Masculino');
                
                echo $form->radioButtonList($usuario,'sexo',$accountStatus,array('separator'=>'   '));
                ?>
                </center>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                <?php $data = array('1'=>'Competidor', 
                                  '2'=>'Público'
                  );
              echo $form->dropDownListGroup($usuario,'tipo_usuario',array('widgetOptions'=>array('htmlOptions'=>array('name'=>'tipo_documento', 'class'=>'span5'),'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Tipo de Usuario:')));
              ?>
                
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
            
 