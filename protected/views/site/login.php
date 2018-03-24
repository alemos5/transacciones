<?php

 
////session_start();
if(isset($_SESSION['idioma_login'])) {
    Yii::app()->language = $_SESSION['idioma_login'];
    if($_SESSION['idioma_login']=='es') {
        $Idioma = 'Español';
    }else{
        $Idioma = 'English';
    }
}else{
    $Idioma = 'English';
}

/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name.' - Log In';
$this->breadcrumbs=array(
  'Log In',
);
?>
<head>
    <!--=====================-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>-->
    <!--=====================-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/login.css" />
</head>
<!--
<style>
	.col{ border:2px solid #e5e5e5}
</style>
-->

<!--<div id="paypal-button-container"></div>-->

<!--    <script>
        paypal.Button.render({

            env: 'production', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
                production: 'AYhcDkqiM0njsHW0R6a445fUWCC60mVWxmX26mu0MALWptBDvT6PztGLWOMXDaDYKAaCGA1gHfovgAaL' //'<insert production client id>'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {

                // Make a call to the REST api to create the payment
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: '10.01', currency: 'USD' }
                            }
                        ]
                    }
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function() {
                    window.alert('Payment Complete!');
                });
            }

        }, '#paypal-button-container');

    </script>-->



<?php $valor = 84.00; ?>
<!--<form action="https://www.paypal.com/do/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="juan@bnf.com.co">
<input type="hidden" name="item_name" value="Pase de COmpetidor">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="amount" value="<?php echo $valor; ?>">
<input type="image" src="http://www.paypal.com/es_XC/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>-->

<!--    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="FSPLXPW5PTHDL">
        <input type="hidden" name="amount" value="14.99" />
        <input type="hidden" name="item_name" value="Pasde de Competidor">
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>-->

<!--<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="RJFSBNREEZD9E">
<table>
    <tr><td><input type="hidden" name="on0" value="monto">amount</td></tr><tr><td><input type="text" value="300" name="os0" maxlength="200"></td></tr>
</table>
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>-->

<!--<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="amount" value="14.99" />
<input type="hidden" name="hosted_button_id" value="RJFSBNREEZD9E">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>-->




<div class="row">
	<div class="col col-md-12">
            <center>
                <div id="logo"><img src="../images/logo.png"></div>
            </center>
	</div>
</div>
<div class="row">
    <div class="col col-md-12">
        <div class="center-block">
            <div id="bglogin">
                <fieldset>
        <legend><?php echo __('Log in'); ?></legend>
        <div class="form">
        <?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
        'id'=>'login-form',
        'type' => 'inline',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
        )); ?>

        <div class="alert alert-warning"><i class="glyphicon glyphicon-info-sign"></i> <?php echo __('Fields with * are required.'); ?></div>
        <p><?php echo $form->textFieldGroup($model,'username', array('widgetOptions'=>array('htmlOptions'=>array('placeholder'=>__('Type your email.'))),'append' => '<i class="glyphicon glyphicon-user"></i>')); ?></p>
        <p><?php echo $form->passwordFieldGroup($model,'password', array('widgetOptions'=>array('htmlOptions'=>array('placeholder'=>__('Type your password.'))),'append' => '<i class="glyphicon glyphicon-lock"></i>')); ?></p>
        <!--    <div class="row">
        <div class="col-sm-3 control-label"></div>
        <div class="col-sm-9">
        <?php // $this->widget('CCaptcha', array('clickableImage'=>1)); ?>
        </div>
        </div>-->
        <p><?php // echo $form->textFieldGroup($model,'verifyCode',array('widgetOptions'=>array('htmlOptions'=>array('id'=>'input-lg', 'placeholder'=>__('Type what you see on the image'),'autocomplete'=>'off')), 'append' => '<i class="glyphicon glyphicon-barcode"></i>')); ?></p>
        <!--<div class="row rememberMe">-->
        <?php //echo $form->checkBox($model,'rememberMe'); ?>
        <?php //echo $form->label($model,'rememberMe'); ?>
        <?php //echo $form->error($model,'rememberMe'); ?>
        <!--</div>-->
        <hr>
        <button id="yw1" style="width: 100%; margin-bottom: 5px; " class="btn btn-lg btn-primary" name="yt0" type="submit"><?php echo __('Log In'); ?></button><br>
        <label style="width: 100%;" data-target="#recuperarClaveUsuario" data-toggle="modal" class="btn"><?php echo __('Forgot your password?'); ?></label>

        <?php $this->endWidget(); ?>
        </div>
        </fieldset>
            </div>
        </div>
    </div>

</div>



<?php $this->beginWidget('booster.widgets.TbModal', array('id'=>'recuperarClaveUsuario')) ?>
    <div class="modal-header">
      <a class="close" data-dismiss="modal">&times;</a>
      <h4>Recuperar Clave: </h4>
    </div>

    <div class="modal-body">
    <div id="respuestaUsuario"></div>
    <div id="contenidoModal" style="display: block;">
      <div class="container-fluid">

        <div class="row" style="">
            <center>
                <div id="cedulaBusqueda_form" class="col-md-12">

                    <!--====================================================================-->
                    <!-- Errores
                    <!--====================================================================-->
                    <div id="errorRecuperacion2" style="display: none;" class="alert alert-danger">
                        <b>Errors</b>
                        <hr>
                        <input type="hidden" value="0" name="errorRecuperacion" id="errorRecuperacion">
                        <label id="correoRM" style="display: none;">Correo Invalido <b>(user@domain.com)</b></label>
                        <label id="correoRE" style="display: none;">El correo ingresado no lo poseemos en nuestra base de datos</label>
                    </div>

                    <div id="okRecuperar">
                        <div class="form-group">
                            <div  class="col-sm-10 bootstrap-timepicker input-group">
                                <input  size="35" id="correoBusqueda" class="form-control" type="text" maxlength="70" name="correoBusqueda" placeholder="Ingrese su correo" onblur="correoForma(this.value)" >
                                <label onclick="claveCorreo()" class="input-group-addon btn btn-primary" style="width: 10%;"><span class="glyphicon glyphicon-send" aria-hidden="true"></span>&nbsp;&nbsp;Send Email</label>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
            <!--<div id="recuperarClaveContenido"></div>-->
       </div>
          <div id="msg"></div>
          <div style="display: none;" id="FormularioRecuperarClave" class="row">
              <div class="col-xs-12">
                    <div id="fecha_nacimiento_form" class="form-group">
                      <?php
                          //echo $form->datePickerGroup($usuario,'fecha_nacimiento',array('widgetOptions'=>array('options'=>array('format'=>'yyyy-mm-dd'), 'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>''));
                      //echo $form->datePickerGroup($usuario,'fecha_nacimiento',array('widgetOptions'=>array('options'=>array('format'=>'dd-mm-yyyy'), 'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'<!--Click on Month/Year to select a different Month/Year.-->'));
                      ?>
                    <!--<div id="fecha_nacimiento_em_" class="help-block error" style="display:none"></div>-->
                    </div>
              </div>
              <div class="col-xs-12">
                  <div id="contrasena" class="form-group">
                    <?php echo $form->passwordFieldGroup($usuario,'contrasena',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>
                  </div>
              </div>
              <div style="margin-top: 10px;" id="repetir_Contrasena" class="col-xs-12">
                  <div class="form-group">
                      <label class="col-sm-3 control-label required" for="RepetirContrasena">Repeat Password</label>
                      <div class="col-sm-9">
                          <input class="span5 form-control" type="password" id="RepetirContrasena" name="RepetirContrasena" onkeyup="validarClave()" placeholder="Repeat Password" maxlength="200">
                          <div id="RepetirContrasena_em_" class="help-block error" style="display:none"></div>
                      </div>
                  </div>
              </div>
          <br>
          </div>
          <center>
              <div id="rcb" onclick="validarClaveUsuaurio()" class="btn btn-primary" style="width: 45%; display: none; ">Recover Password</div>
          </center>

      </div>

     </div>
    </div>

    <div class="modal-footer">
      <?php $this->widget('booster.widgets.TbButton', array(
        'context'=>'default',
        'label'=>'Cancel',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal', 'onclick'=>'location.reload()')
      ));?>
    </div>
<?php $this->endWidget(); ?>



<?php $this->beginWidget(
    'booster.widgets.TbModal',
    array('id' => 'Registro')
); ?>

    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4><?php echo __('User Sign Up'); ?></h4>
    </div>

    <div class="modal-body">

        <?php $date = new Date();  ?>
        <div class="container-fluid">


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
                    <b><?php echo 'Errors Presented'; ?></b>
                    <hr>
                    <!--<label id="cedulaE" style="display: none;" ><?php // echo __('Incoming identification already exists'); ?></label>-->
                    <label id="correoE" style="display: none;"><?php echo __('Incoming mail already exists'); ?></label>
                    <label id="correoM" style="display: none;"><?php echo __('The email entered is incorrect'); ?>  <b>(user@domain.com)</b></label>
                    <label id="claveM" style="display: none;"><?php echo __('Passwords do not match'); ?></label>
                    <label id="campo1" style="display: none;" ><?php echo __('You must enter the document type'); ?></label>
                    <label id="campo2" style="display: none;" ><?php echo __('You must enter your documentation'); ?></label>
                    <label id="campo3" style="display: none;" ><?php echo __('You must enter your  name'); ?></label>
                    <label id="campo4" style="display: none;" ><?php echo __('You must enter your last name'); ?></label>
                    <label id="campo5" style="display: none;" ><?php echo __('You must enter your email'); ?></label>
                    <label id="campo6" style="display: none;" ><?php echo __('You must enter your password'); ?></label>
                    <label id="campo7" style="display: none;" ><?php echo __('You must confirm your password'); ?></label>
                    <label id="campo8" style="display: none;" ><?php echo __('Enter your birthdate'); ?></label>
                    <label id="campo9" style="display: none;" ><?php echo __('You must enter your country'); ?></label>
                    <label id="campo10" style="display: none;" ><?php echo __('You must enter your city'); ?></label>
                    <label id="campo11" style="display: none;" ><?php echo __('You must enter your phone'); ?></label>
                    <label id="campo12" style="display: none;" ><?php echo __('You must enter your user type'); ?></label>
                    <label id="campo13" style="display: none;" ><?php echo __('You must enter your email validation'); ?></label>
                    <label id="campo14" style="display: none;" ><?php echo __('Emails do not match'); ?></label>
                    <label id="campo15" style="display: none;" ><?php echo __('You must select the day of birth'); ?></label>
                    <label id="campo16" style="display: none;" ><?php echo __('You must select the month of birth'); ?></label>
                    <label id="campo17" style="display: none;" ><?php echo __('You must select the year of birth'); ?></label>
                    <label id="campo18" style="display: none;" ><?php echo __('Debe ingresar su dirección'); ?></label>
                </div>

                <p class="note"><?php echo __('Fields with <span class="required">*</span> are required.'); ?></p>
                <?php echo $form->errorSummary($usuario); ?>
<!--                <div class="row">
                    <div class="col-md-3">
                        <?php 
//                            $data = array('1'=>__('National ID'),
//                            '2'=>__('Driver License'),
//                            '3'=>__('Cédula de Extranjería'),
//                            '5'=>__('Tarjeta de Identidad'),
//                            '6'=>__('Registro Civil')
//                            );
//                            echo $form->dropDownListGroup($usuario,'tipo_documento',array('widgetOptions'=>array('htmlOptions'=>array('name'=>'tipo_documento', 'class'=>'span5'),'data'=>array('4'=>'Passport')+$data)));
                        ?>
                    </div>
                    <div class="col-md-9">
                        <?php 
//                            echo $form->textFieldGroup($usuario,'cedula',array('widgetOptions'=>array('htmlOptions'=>array('name'=>'identificacion', 'class'=>'span5', 'onblur'=>'findIdentificacion(this.value)', 'maxlength'=>15)))); 
                        ?>
                    </div>
                </div>-->
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
                            <label class="control-label required" for="repeat"><?php echo __('Repeat email'); ?>:<span class="required">*</span></label>
                            <input id="Usuario_correo2" class="span5 form-control" type="text" name="repeat" placeholder="<?php echo __('Repeat email'); ?>"placeholder="<?php echo __('Repeat email'); ?>" maxlength="50" onblur="validarEmail(this.value)">
                        </div>
                        <?php //echo $form->textFieldGroup($usuario,'correo2',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50, 'onblur'=>'validarEmail(this.value)')))); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php $data = CHtml::listData(Pais::model()->findAll('permitido = 1 ORDER BY pais ASC'), 'id_pais', 'pais');
                        echo $form->dropDownListGroup($usuario,'codigo_pais',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'FindCiudad(this.value)'), 'data'=>array(''=>__('Select...'))+$data))); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="DivLoader"></div>
                        <div id="DivCiudad">
                        <?php
                        if($usuario->codigo_pais) {
                            $data = CHtml::listData(Ciudad::model()->findAll(array('order' => 'ciudad')), 'id_ciudad', 'ciudad');
                        }else{
                            $data = array();
                        }
                        echo $form->dropDownListGroup($usuario,'id_ciudad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>__('Select...'))+$data)));
                        //echo $form->textFieldGroup($usuario,'ciudad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250))));
                        ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $form->textAreaGroup($usuario,'direccion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $form->textFieldGroup($usuario,'tlf_personal',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>


                            <!--
                            <div class="form-group">
                            <label class="control-label" for="Usuario_tlf_personal"><?php echo __('Phone'); ?></label>
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <input type="text" class="form-control" aria-label="...">
                            </div>
                            </div>-->


                    </div>
                </div>
                <center>
                    <?php echo __('Enter your birthdate'); ?>
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
                        echo $form->dropDownListGroup($usuario,'dia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>array(''=>__('Select...'))+$data)));
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
                        echo $form->dropDownListGroup($usuario,'mes',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>array(''=>__('Select...'))+$data), 'labelOptions'=>array('label'=>__('Month'))));
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <?php
                        $data = array();for($i=date('o'); $i>=1910; $i--) { $data[$i]= $i;}
                        echo $form->dropDownListGroup($usuario,'anio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>array(''=>__('Select...'))+$data), 'labelOptions'=>array('label'=>__('Year'))));
                        ?>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <?php //$model->isNewRecord ? $model->active = 1: $model->active = $model->active ;  ?>
                            <?php

                            $accountStatus = array('F'=>__('Female'), 'M'=>__('Male'));

                            echo $form->radioButtonList($usuario,'sexo',$accountStatus,array('separator'=>'   '));
                            ?>
                        </center>
                    </div>
                </div>
<!--                <div class="row">
                    <div class="col-md-12">-->
                        <?php /*
                        $data = array(
                                                '1'=>__('Competitor'),
                                                '2'=>__('Public')
                                            );
                        echo $form->dropDownListGroup($usuario,'tipo_usuario',array('widgetOptions'=>array('htmlOptions'=>array('name'=>'tipo_documento', 'class'=>'span5'),'data'=>array(''=>__('Select...'))+$data), 'labelOptions'=>array('label'=>__('User Type:'))));
                        */?>
<!--
                    </div>
                </div>-->
                <?php echo $form->hiddenField($usuario,'tipo_usuario',array('type'=>"hidden", 'value'=>'1', 'id'=>'Usuario_tipo_usuario', 'name'=>'Usuario_tipo_usuario')); ?>

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
                            <label class="control-label required" for="repeat"><?php echo __('Repeat password'); ?>:<span class="required">*</span></label>
                            <input id="repeat" class="span5 form-control" type="password" onblur="validarRepeClave()" name="repeat" placeholder="<?php echo __('Repeat password');?>" maxlength="200">
                        </div>
                    </div>
                </div>
                <?php $this->endWidget(); ?>
            </div>



        </div>
    </div>
    <div class="modal-footer">
        <?php $this->widget(
            'booster.widgets.TbButton',
            array(
                'context' => 'primary',
                'id'=>'bt_registro',
                'label' => __('Sign Up'),
                'url' => '#',
                'htmlOptions' => array(
//                    'data-dismiss' => 'modal',
                    'onclick' => 'RegistroUsuario()'
                ),
            )
        ); ?>
        <?php $this->widget(
            'booster.widgets.TbButton',
            array(
                'id'=>'bt_cancelar',
                'label' => __('Cancel'),
                'url' => '#',
                'htmlOptions' => array('data-dismiss' => 'modal'),
            )
        ); ?>
    </div>

<?php $this->endWidget(); ?>





<?php $this->beginWidget(
    'booster.widgets.TbModal',
    array('id' => 'RegistroE')
); ?>

    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4>Registro de Usuario</h4>
    </div>

    <div class="modal-body">

        <?php $date = new Date();  ?>
        <div class="container-fluid">
            <?php
            $this->widget('booster.widgets.TbTabView', array(
              'type' => 'pills',
              'tabs' => array(
//                array('label'=>'Contrato', 'view' =>'_contrato', 'data'=>array('usuario'=>$usuario)),
                array('itemOptions' => array('id' => 'registroUsuario'),'label'=>'Registro de Usuario', 'view' =>'_registroUsuario_es', 'data'=>array('usuario'=>$usuario)),
              ),
            ));
            
            
            ?>
        </div>
    </div>
    <div class="modal-footer">
        <?php $this->widget(
            'booster.widgets.TbButton',
            array(
                'context' => 'primary',
                'id'=>'bt_registro',
                'label' => 'Registrate',
                'url' => '#',
                'htmlOptions' => array(
//                    'data-dismiss' => 'modal',
                    'onclick' => 'RegistroUsuario()'
                ),
            )
        ); ?>
        <?php $this->widget(
            'booster.widgets.TbButton',
            array(
                'id'=>'bt_cancelar',
                'label' => 'Cancelar',
                'url' => '#',
                'htmlOptions' => array('data-dismiss' => 'modal'),
            )
        ); ?>
    </div>
<script>
    function FindCiudad(pais) {
        $("#DivCiudad").css('display', 'none');
        $("#DivLoader").html('<div align="center"><img src="../images/loader.gif" /></div>');
        $.post("<?php echo Yii::app()->createUrl('ciudad/FindCiudad') ?>",
            { pais:pais },
            function(data){
                $("#DivLoader").html('');
                $("#DivCiudad").css('display', 'block');
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
</script>
<?php $this->endWidget(); ?>


<script>
$(document).ready(function() {
    //one_two_ml = $('input:radio[name=ModelName[oneml_twoml]]:checked').val();
    //$('#Usuario_sexo_0').css('display', 'none');

    $("#Usuario_sexo_0").prop("checked", true);
});

function correoForma(correo){
    if(correo){
        if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(correo)){
           // Paso
           $('#errorRecuperacion2').css('display', 'none');
           $('#correoRM').css('display', 'none');
           $('#errorRecuperacion').val(0);
         } else {
           // Error
           $('#errorRecuperacion').val(1);
           $('#errorRecuperacion2').css('display', 'block');
           $('#correoRM').css('display', 'block');
        }
    }else{
        $('#errorRecuperacion2').css('display', 'none');
    }
//      findCorreo(valor);
}

function claveCorreo(){
    var correo = $('#correoBusqueda').val();
    var error = $('#errorRecuperacion').val();
    $.post("<?php echo Yii::app()->createUrl('usuario/findCorreo') ?>",{ correo:correo },
    function(data){
        if(error != 1){
                $('#errorRecuperacion2').css('display', 'none');
                $('#correoRM').css('display', 'none');
            if(data == 1){
                $('#errorRecuperacion2').css('display', 'none');
                $('#correoRE').css('display', 'none');
                //===========================================//
                // Envio de correo
                //===========================================//
                var url = "http://www.appwin.net/images/cargando.gif";
                $('#okRecuperar').html('<center><img src="'+url+'"/></center>');
                $.post("<?php echo Yii::app()->createUrl('usuario/RecordarClave') ?>",{ correo:correo },
                function(data){
                    $('#okRecuperar').html(data);
                });
            }else{
                $('#errorRecuperacion2').css('display', 'block');
                $('#correoRE').css('display', 'block');
            }
        }else{
            $('#errorRecuperacion2').css('display', 'block');
            $('#correoRM').css('display', 'block');
        }
//       $('#correoExistente').val(data);
    });
}

<?php /*
function findCiudad(pais){
    $.post("<?php //echo Yii::app()->createUrl('ciudad/findCiudad') ?>",{ pais:pais },function(data){$("#Usuario_id_ciudad").html(data);});
}
*/ ?>



function RegistroUsuario(){

    //None a los mensajes

//    $('#cedulaE').css('display', 'none');
    $('#correoE').css('display', 'none');
    $('#correoM').css('display', 'none');
    $('#claveM').css('display', 'none');
    $('#campo1').css('display', 'none');
    $('#campo2').css('display', 'none');
    $('#campo3').css('display', 'none');
    $('#campo4').css('display', 'none');
    $('#campo5').css('display', 'none');
    $('#campo6').css('display', 'none');
    $('#campo7').css('display', 'none');
    $('#campo8').css('display', 'none');
    $('#campo9').css('display', 'none');
    $('#campo10').css('display', 'none');
    $('#campo11').css('display', 'none');
    $('#campo12').css('display', 'none');
    $('#campo13').css('display', 'none');
    $('#campo14').css('display', 'none');

    //Texto validadores
//    var cedulaExistente = document.getElementById("cedulaExistente").value;
    var correoExistente = document.getElementById("correoExistente").value;
    var correoMal = document.getElementById("correoMal").value;
    var contrasenaRetir = document.getElementById("contrasenaRetir").value;

    //Campos obligatorios

//    var tipo_documento = document.getElementById("tipo_documento").value;
//    var identificacion = document.getElementById("identificacion").value;
    var Usuario_primer_nombre = document.getElementById("Usuario_primer_nombre").value;
    var Usuario_primer_apellido = document.getElementById("Usuario_primer_apellido").value;
    var Usuario_correo = document.getElementById("Usuario_correo").value;
    var Usuario_correo2 = document.getElementById("Usuario_correo2").value;
    var clave = document.getElementById("clave").value;
    var repeat = document.getElementById("repeat").value;
    var dia = document.getElementById("Usuario_dia").value;
    var mes = document.getElementById("Usuario_mes").value;
    var anio = document.getElementById("Usuario_anio").value;
//    document.getElementById("Usuario_fecha_nacimiento").val(dia+'-'+mes+'-'+anio);
//    var fechan = document.getElementById("Usuario_fecha_nacimiento").value;
    var pais = document.getElementById("Usuario_codigo_pais").value;
    var ciudad = document.getElementById("Usuario_id_ciudad").value;
    //var id_ciudad = document.getElementById("Usuario_id_ciudad").value;
    var sexo = $('input[name="Usuario[sexo]"]:checked').val();
    var tlf = document.getElementById("Usuario_tlf_personal").value;
    var tipo_usuario = document.getElementById("Usuario_tipo_usuario").value;
    var Usuariodireccion = document.getElementById("Usuario_direccion").value;
//alert(Usuariodireccion);
    if(correoExistente == 1 || correoMal == 1 || contrasenaRetir == 1){
        $('#errorRegistro').css('display', 'block');
//        if(cedulaExistente == 1){
//            $('#cedulaE').css('display', 'block');
//        }else{
//            $('#cedulaE').css('display', 'none');
//        }
        if(correoExistente == 1){
            $('#correoE').css('display', 'block');
        }else{
            $('#correoE').css('display', 'none');
        }
        if(correoMal == 1){
            $('#correoM').css('display', 'block');
        }else{
            $('#correoM').css('display', 'none');
        }
        if(contrasenaRetir == 1){
            $('#claveM').css('display', 'block');
        }else{
            $('#claveM').css('display', 'none');
        }
    }else{


//        if(tipo_documento == ""){
//            $('#errorRegistro').css('display', 'block');
//            $('#campo1').css('display', 'block');
//        }else{

//            $('#campo1').css('display', 'none');
//            if(identificacion == ""){
//                $('#errorRegistro').css('display', 'block');
//                $('#campo2').css('display', 'block');
//            }else{
//                $('#campo2').css('display', 'none');
                if(Usuario_primer_nombre == ""){
                    $('#errorRegistro').css('display', 'block');
                    $('#campo3').css('display', 'block');
                }else{
                    $('#campo3').css('display', 'none');
                    if(Usuario_primer_apellido == ""){
                    $('#errorRegistro').css('display', 'block');
                        $('#campo4').css('display', 'block');
                    }else{
                        $('#campo4').css('display', 'none');
                        if(Usuario_correo == ""){
                            $('#errorRegistro').css('display', 'block');
                            $('#campo5').css('display', 'block');
                        }else{
                            $('#campo5').css('display', 'none');
                            if(clave == ""){
                                $('#errorRegistro').css('display', 'block');
                                $('#campo6').css('display', 'block');
                            }else{
                                $('#campo6').css('display', 'none');
                                if(repeat == ""){
                                    $('#errorRegistro').css('display', 'block');
                                    $('#campo7').css('display', 'block');
                                }else{
                                    $('#campo7').css('display', 'none');
                                    $('#errorRegistro').css('display', 'none');
//                                    if(fechan == ""){
//                                        $('#errorRegistro').css('display', 'block');
//                                        $('#campo8').css('display', 'block');
//                                    }else{
                                        if(pais == ""){
                                            $('#errorRegistro').css('display', 'block');
                                            $('#campo9').css('display', 'block');
                                        }else{
                                            if(ciudad == ""){
                                                $('#errorRegistro').css('display', 'block');
                                                $('#campo10').css('display', 'block');
                                            }else{
                                                if(tlf == ""){
                                                    $('#errorRegistro').css('display', 'block');
                                                    $('#campo11').css('display', 'block');
                                                }else{
                                                    if(tipo_usuario == ""){
                                                        $('#errorRegistro').css('display', 'block');
                                                        $('#campo12').css('display', 'block');
                                                    }else{
                                                        if(Usuario_correo2 == ""){

                                                            $('#errorRegistro').css('display', 'block');
                                                            $('#campo13').css('display', 'block');
                                                        }else{

                                                            if(dia == ""){
                                                                $('#errorRegistro').css('display', 'block');
                                                                $('#campo15').css('display', 'block');
                                                            }else{
                                                                if(mes == ""){
                                                                    $('#errorRegistro').css('display', 'block');
                                                                    $('#campo16').css('display', 'block');
                                                                }else{
                                                                    if(anio == ""){
                                                                        $('#errorRegistro').css('display', 'block');
                                                                        $('#campo17').css('display', 'block');
                                                                    }else{
                                                                        
                                                                        if(Usuariodireccion == ""){
                                                                            $('#errorRegistro').css('display', 'block');
                                                                            $('#campo18').css('display', 'block');
                                                                        }else{
                                                                        
                                                            if(Usuario_correo2 == Usuario_correo){

                                                                //========================================//
                                                                // Registro de Información
                                                                //========================================//
                                                                $('#bt_registro').css('display', 'none');
                                                                $('#RU').css('display', 'none');
                                                                $('#okRegistro').css('display', 'block');
                                                                var url = "http://www.appwin.net/images/cargando.gif";
                                                                $('#okRegistro').html('<center><img src="'+url+'"/></center>');
                                                                $.post("<?php echo Yii::app()->createUrl('usuario/RegistarUsuario') ?>",
                                                                {
//                                                                    tipo_documento:tipo_documento,
//                                                                    identificacion:identificacion,
                                                                    Usuario_primer_nombre:Usuario_primer_nombre,
                                                                    Usuario_primer_apellido:Usuario_primer_apellido,
                                                                    Usuario_correo:Usuario_correo,
                                                                    clave:clave,
                                                                    direccion: Usuariodireccion,
                                                                    dia:dia,
                                                                    mes:mes,
                                                                    anio:anio,
                                                                    pais: pais,
                                                                    ciudad: ciudad,
                                                                    sexo:sexo,
                                                                    tlf:tlf,
                                                                    tipo_usuario: tipo_usuario
                                                                },
                                                                function(data){
                                                                   $('#bt_cancelar').html("Close");
                                                                   $('#okRegistro').css('display', 'block');
                                                                   $('#okRegistro').html(data);
                                                                   $('#RU').css('display', 'none');
                                                                   $('#bt_registro').css('display', 'none');
                                                                });
                                                            }else{
                                                                $('#errorRegistro').css('display', 'block');
                                                                $('#campo14').css('display', 'block');
                                                            }
                                                            
                                                            }
                                                            
                                                            }
                                                            }
                                                            }
//                                                            }
                                                            }
                                                    }
                                                }
                                            }
                                        }
//                                    }
                                }
                            }
                        }
                    }

                }

//            }




//        }
    }

}

//============================================================================//
// Validar Identificación unica
//============================================================================//

function findIdentificacion(identificacion) {
  var tipo_documento = document.getElementById("tipo_documento").value;
  $.post("<?php echo Yii::app()->createUrl('usuario/findIdentificacion') ?>",{ tipo_documento:tipo_documento, identificacion:identificacion },
  function(data){
     if(data == 1){
         alert("This user is registered");
         $('#errorRegistro').css('display', 'block');
         $('#cedulaE').css('display', 'block');
     }else{
         $('#errorRegistro').css('display', 'none');
         $('#cedulaE').css('display', 'none');
     }
     $('#cedulaExistente').val(data);
  });
}

//============================================================================//
// Validar correo unico
//============================================================================//


function findCorreo(correo) {
  $.post("<?php echo Yii::app()->createUrl('usuario/findCorreo') ?>",{ correo:correo },
  function(data){
     $('#correoExistente').val(data);
  });
}

//============================================================================//
// Validar contraseña
//============================================================================//
function validarRepeClave() {
    var clave = document.getElementById("clave").value;
    var repeat = document.getElementById("repeat").value;
    if(clave == repeat ){
        $('#contrasenaRetir').val('0');
    }else{
        $('#contrasenaRetir').val('1');
        document.getElementById("repeat").value('');
    }
}
//============================================================================//


var numeros="0123456789";

function tiene_numeros(texto){
   for(i=0; i<texto.length; i++){
      if (numeros.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}
var letras="abcdefghyjklmnñopqrstuvwxyz";
function tiene_letras(texto){
   texto = texto.toLowerCase();
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}
var letras_mayusculas="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";
function tiene_mayusculas(texto){
   for(i=0; i<texto.length; i++){
      if (letras_mayusculas.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}
var letras="abcdefghyjklmnñopqrstuvwxyz";

function tiene_minusculas(texto){
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}
function seguridad_clave(clave){
   var seguridad = 0;
   if (clave.length!=0){
      if (tiene_numeros(clave) && tiene_letras(clave)){
         seguridad += 30;
      }
      if (tiene_minusculas(clave) && tiene_mayusculas(clave)){
         seguridad += 30;
      }
      if (clave.length >= 4 && clave.length <= 5){
         seguridad += 10;
      }else{
         if (clave.length >= 6 && clave.length <= 8){
            seguridad += 30;
         }else{
            if (clave.length > 8){
               seguridad += 40;
            }
         }
      }
   }

   $('#barra1').css("width", seguridad+'%');



}


function validarEmail(valor) {
  if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)){
//   alert("Your email " + valor + " is correct!.");
    $("#correoMal").val('0');
  } else {
//   alert("Your email is incorrect.");
    $("#correoMal").val('1');
  }
  findCorreo(valor);
}

function soloNumeros(e)
{
var key = window.Event ? e.which : e.keyCode
return ((key >= 48 && key <= 57) || (key==8))
}
function mostrarTab(){
    if( $('#acepto').attr('checked') ) {
            $('#registroUsuario').css('display', 'block');
    }else{
            $('#registroUsuario').css('display', 'none');
    }
}

function varificarCedula(){
    var UsuarioCedula = $('#cedulaBusqueda').val();



    if (UsuarioCedula !=""){
        $.post("<?php echo Yii::app()->createUrl('usuario/cedulaDisponible') ?>",{ UsuarioCedula:UsuarioCedula},function(data){
            if (data==0){
                $("#cedulaBusqueda_form").removeClass("form-group").addClass("form-group has-error");
                $("#cedulaBusqueda_em_").css("display", "block");
                $('#cedulaBusqueda_em_').html('La cedula no se encuentra registrada');
                $("#FormularioRecuperarClave").css("display", "none");
                $("#rcb").css("display", "none");
            }else{
                $("#cedulaBusqueda_form").removeClass("form-group has-error").addClass("form-group");
                $("#cedulaBusqueda_em_").css("display", "none");
                $('#cedulaBusqueda_em_').html('');
                $("#rcb").css("display", "block");
                $("#FormularioRecuperarClave").css("display", "block");

            }
        });
    }else{
        alert("You have to type your ID number");
    }

}
function cedulaExistente(){
    var UsuarioCedula = $('#cedulaBusqueda').val();
    if (UsuarioCedula !=""){
    $.post("<?php echo Yii::app()->createUrl('usuario/cedulaDisponible') ?>",{ UsuarioCedula:UsuarioCedula},function(data){
               if (data==0){
                    $("#cedulaBusqueda_form").removeClass("form-group").addClass("form-group has-error");
                    $("#cedulaBusqueda_em_").css("display", "block");
                    $('#cedulaBusqueda_em_').html('La cedula no se encuentra registrada');
                    $("#rcb").css("display", "none");
                    $('#recuperarClaveContenido').html('');
                }else{
                    $("#cedulaBusqueda_form").removeClass("form-group has-error").addClass("form-group");
                    $("#cedulaBusqueda_em_").css("display", "none");
                    $('#cedulaBusqueda_em_').html('');
                    $("#rcb").css("display", "block");
                }
            });
    }else{
        alert("You have to type your ID number");
    }
}

function validarClave(){
    var Usuario_contrasena = $('#Usuario_contrasena').val();
    var RepetirContrasena = $('#RepetirContrasena').val();

    if (RepetirContrasena!=Usuario_contrasena){
        $("#repetir_Contrasena").removeClass("form-group").addClass("form-group has-error");
        $("#RepetirContrasena_em_").css("display", "block");
        $('#RepetirContrasena_em_').html('ambas contraseñas deberan ser iguales');
    }else{
        if (RepetirContrasena==""){
            $("#repetir_Contrasena").removeClass("form-group").addClass("form-group has-error");
            $("#RepetirContrasena_em_").css("display", "block");
            $('#RepetirContrasena_em_').html('Debe ingresar la misma contraseña ingresada anteriormente');
        }else{
            if (RepetirContrasena!=Usuario_contrasena){
                $("#repetir_Contrasena").removeClass("form-group").addClass("form-group has-error");
                $("#RepetirContrasena_em_").css("display", "block");
                $('#RepetirContrasena_em_').html('ambas contraseñas deberan ser iguales');
            }else{
                $("#repetir_Contrasena").removeClass( "form-group has-error" ).addClass( "form-group has-success" );
                $("#RepetirContrasena_em_").css("display", "none");
                $('#RepetirContrasena_em_').html('');

                $("#contrasena").removeClass( "form-group has-error" ).addClass( "form-group has-success" );
                $("#Usuario_contrasena_em_").css("display", "none");
                $('#Usuario_contrasena_em_').html('');
            }
        }
    }
}
function validarClaveUsuaurio(){
    var fechaNacimiento = $('#Usuario_fecha_nacimiento').val();
    var Usuario_contrasena = $('#Usuario_contrasena').val();
    var RepetirContrasena = $('#RepetirContrasena').val();
    var UsuarioCedula = $('#cedulaBusqueda').val();
    var error = 0;

    if (fechaNacimiento==""){
            $("#fecha_nacimiento_form").removeClass("form-group").addClass("form-group has-error");
            $("#fecha_nacimiento_em_").css("display", "block");
            $('#fecha_nacimiento_em_').html('Debe ingresar su fecha de Nacimiento');
            error =1;
        }else{
            $("#fecha_nacimiento_form").removeClass( "form-group has-error" ).addClass( "form-group" );
            $("#fecha_nacimiento_em_").css("display", "none");
            $('#fecha_nacimiento_em_').html('');
            if (error != 1){ error =0; }
        }

        if (Usuario_contrasena==""){
            $("#contrasena").removeClass("form-group").addClass("form-group has-error");
            $("#Usuario_contrasena_em_").css("display", "block");
            $('#Usuario_contrasena_em_').html('Debe ingresar una contraseña');
            error =1;
        }else{
            $("#contrasena").removeClass( "form-group has-error" ).addClass( "form-group" );
            $("#Usuario_contrasena_em_").css("display", "none");
            $('#Usuario_contrasena_em_').html('');
            if (error != 1){ error =0; }
        }

        if (RepetirContrasena!=Usuario_contrasena){
            $("#repetir_Contrasena").removeClass("form-group").addClass("form-group has-error");
            $("#RepetirContrasena_em_").css("display", "block");
            $('#RepetirContrasena_em_').html('ambas contraseñas deberan ser iguales');
            error =1;
        }else{
            if (RepetirContrasena==""){
                $("#repetir_Contrasena").removeClass("form-group").addClass("form-group has-error");
                $("#RepetirContrasena_em_").css("display", "block");
                $('#RepetirContrasena_em_').html('Debe ingresar la misma contraseña ingresada anteriormente');
                error =1;
            }else{
                if (RepetirContrasena!=Usuario_contrasena){
                    $("#repetir_Contrasena").removeClass("form-group").addClass("form-group has-error");
                    $("#RepetirContrasena_em_").css("display", "block");
                    $('#RepetirContrasena_em_').html('ambas contraseñas deberan ser iguales');
                    error =1;
                }else{
                    $("#repetir_Contrasena").removeClass( "form-group has-error" ).addClass( "form-group has-success" );
                    $("#RepetirContrasena_em_").css("display", "none");
                    $('#RepetirContrasena_em_').html('');

                    $("#contrasena").removeClass( "form-group has-error" ).addClass( "form-group has-success" );
                    $("#Usuario_contrasena_em_").css("display", "none");
                    $('#Usuario_contrasena_em_').html('');
                    if (error != 1){ error =0; }
                }
            }
        }

        if (error == 0){
            $.post("<?php echo Yii::app()->createUrl('usuario/validarCedulaUsuario') ?>",{
              UsuarioCedula:UsuarioCedula,
              fechaNacimiento:fechaNacimiento,
              Usuario_contrasena:Usuario_contrasena
            },function(data){

                     $('#msg').html(data);
                     $('#Usuario_fecha_nacimiento').val('');
                     $('#Usuario_contrasena').val('');
                     $('#RepetirContrasena').val('');
                     $("#FormularioRecuperarClave").css("display", "none");
                     $("#rcb").css("display", "none");
            });
        }else{
          alert("There are errors");
        }

}
</script>
