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
                <label id="cedulaE" style="display: none;" >Incoming identification already exists</label>
                <label id="correoE" style="display: none;">Incoming mail already exists</label>
                <label id="correoM" style="display: none;">The email entered is incorrect  <b>(user@domain.com)</b></label>
                <label id="claveM" style="display: none;">Passwords do not match</label>
                <label id="campo1" style="display: none;" >You must enter the document type</label>
                <label id="campo2" style="display: none;" >You must enter your documentation</label>
                <label id="campo3" style="display: none;" >You must enter your  name</label>
                <label id="campo4" style="display: none;" >You must enter your last name</label>
                <label id="campo5" style="display: none;" >You must enter your email</label>
                <label id="campo6" style="display: none;" >You must enter your password</label>
                <label id="campo7" style="display: none;" >You must confirm your password</label>
                <label id="campo8" style="display: none;" >Enter your birthdate</label>
                <label id="campo9" style="display: none;" >You must enter your country</label>
                <label id="campo10" style="display: none;" >You must enter your city</label>
                <label id="campo11" style="display: none;" >You must enter your phone</label>
                <label id="campo12" style="display: none;" >You must enter your user type</label>
                <label id="campo13" style="display: none;" >You must enter your email validation</label>
                <label id="campo14" style="display: none;" >Emails do not match</label>
                <label id="campo15" style="display: none;" >You must select the day of birth</label>
                <label id="campo16" style="display: none;" >You must select the month of birth</label>
                <label id="campo17" style="display: none;" >You must select the year of birth</label>
            </div>
            
          <p class="note">Fields with <span class="required">*</span> are required.</p>
          <?php echo $form->errorSummary($usuario); ?>
          <div class="row">
            <div class="col-md-3">
              <?php $data = array('1'=>'National ID', 
                                  '2'=>'Driver License',
                                  '3'=>'Cédula de Extranjería',
                                  '5'=>'Tarjeta de Identidad',
                                  '6'=>'Registro Civil'
                  );
              echo $form->dropDownListGroup($usuario,'tipo_documento',array('widgetOptions'=>array('htmlOptions'=>array('name'=>'tipo_documento', 'class'=>'span5'),'data'=>array('4'=>'Passport')+$data), 'labelOptions'=>array('label'=>'Identification:')));
              ?>
            </div>
            <div class="col-md-9">
              <?php echo $form->textFieldGroup($usuario,'cedula',array('widgetOptions'=>array('htmlOptions'=>array('name'=>'identificacion', 'class'=>'span5', 'onblur'=>'findIdentificacion(this.value)', 'maxlength'=>15)))); ?>
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
                    <label class="control-label required" for="repeat">Repeat email:<span class="required">*</span></label>
                    <input id="Usuario_correo2" class="span5 form-control" type="text" name="repeat" placeholder="Repeat email" maxlength="50" onblur="validarEmail(this.value)">
                </div>
              <?php //echo $form->textFieldGroup($usuario,'correo2',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50, 'onblur'=>'validarEmail(this.value)')))); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                <?php $data = CHtml::listData(Pais::model()->findAll(array('order'=>'pais')), 'codigo', 'pais');
                echo $form->dropDownListGroup($usuario,'codigo_pais',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'findCiudad(this.value)'), 'data'=>array(''=>'Select...')+$data), 'labelOptions'=>array('label'=>'Country:'))); ?>
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
              Enter your birthday
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
                    echo $form->dropDownListGroup($usuario,'dia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>array(''=>'Select...')+$data), 'labelOptions'=>array('label'=>'Day')));
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
                    echo $form->dropDownListGroup($usuario,'mes',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>array(''=>'Select...')+$data), 'labelOptions'=>array('label'=>'Month')));
                ?>
            </div>
            <div class="col-sm-12 col-md-4">
                <?php 
                    $data = array();for($i=date('o'); $i>=1910; $i--) { $data[$i]= $i;}
                    echo $form->dropDownListGroup($usuario,'anio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>array(''=>'Select...')+$data), 'labelOptions'=>array('label'=>'Year')));
                ?>
            </div>  
          </div>
          <hr>
          
          <div class="row">
            <div class="col-md-12">
                <center>
                <?php //$model->isNewRecord ? $model->active = 1: $model->active = $model->active ;  ?>
                <?php
                
                $accountStatus = array('F'=>'Female', 'M'=>'Male');
                
                echo $form->radioButtonList($usuario,'sexo',$accountStatus,array('separator'=>'   '));
                ?>
                </center>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                <?php $data = array('1'=>'Competitor', 
                                  '2'=>'Public'
                  );
              echo $form->dropDownListGroup($usuario,'tipo_usuario',array('widgetOptions'=>array('htmlOptions'=>array('name'=>'tipo_documento', 'class'=>'span5'),'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'User Type:')));
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
                <label class="control-label required" for="repeat">Repeat password:<span class="required">*</span></label>
                <input id="repeat" class="span5 form-control" type="password" onblur="validarRepeClave()" name="repeat" placeholder="Repeat password" maxlength="200">
              </div>
            </div>  
          </div>
          <?php $this->endWidget(); ?>
        </div>
            
 