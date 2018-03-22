<?php

class OrdenesController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column2';

/**
* @return array action filters
*/
public function filters()
{
return array(
'accessControl', // perform access control for CRUD operations
);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
public function accessRules()
{
return array(
array('allow',  // allow all users to perform 'index' and 'view' actions
'actions'=>array('index','view'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update', 'Instruccion', 'RegistroInstruccion', 'Eliminar', 'pagada'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete'),
'users'=>array('admin'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/

public function actionPagada(){
    $id = $_POST['id'];
    $accion = $_POST['accion'];
    $tipo = $_POST['tipo'];
    if($tipo == 1){
        Yii::app()->db->createCommand("UPDATE ordenes SET pagada = ".$accion." where id_orden =".$id)->query();
    }else{
        Yii::app()->db->createCommand("UPDATE consolidaciones SET pagada = ".$accion." where id_con =".$id)->query();
    }
}

public function actionEliminar(){
    $orden = $_POST['orden'];
    Yii::app()->db->createCommand("DELETE FROM `ordenes` WHERE `id_orden`='".$orden."';")->query();
}

public function actionInstruccion(){
    $id_orden = $_POST['orden'];
    $orden = Ordenes::model()->find('id_orden ='.$id_orden);
//    $cliente = Clientes::model()->find("code_cliente LIKE '".$orden->code_cliente."' ");
    ?>
    <form id="FormInstruccion" name="FormInstruccion" action="RegistroInstruccion" method="post">
        <input type="hidden" value="<?php echo $id_orden; ?>" name="ordenPrincipal">    
        <div class="row">
            <div class="col-xs-12">
                <center>
                    <b>Instrucciones para el paquete:<?php echo $orden->ware_reciept; ?><br>
                        No orden: <?php echo $orden->id_orden." - ".$orden->courier." - ".$orden->descripcion; ?></b>
                </center>
            </div>
        </div>
        <br>
        <div class="row">
<!--            <div class="col-xs-4">
                <center>
                    <input type="radio" name="primero" value="1">&nbsp;
                    Envío Marítimo
                </center>
            </div>-->
            <div class="col-xs-12">
                <center>
                    <input checked type="radio" name="primero" value="2">&nbsp;
                    Envío Aereo
                </center>
            </div>
<!--            <div class="col-xs-4">
                <center>
                    <input type="radio" name="primero" value="3">&nbsp;
                    In & Out
                </center>
            </div>-->
        </div>
<!--        <div style=" background-color: #E6E6E6; font-weight: bold;" class="row">
            <div class="col-xs-4">
                <center>
                    Costo: $
                    119,00
                </center>
            </div>
            <div class="col-xs-12">
                <center>
                    Costo: $
                    25,00
                </center>
            </div>
            <div class="col-xs-4">
                <center>
                    Costo: $
                    10,00
                </center>
            </div>
        </div>-->
        <br>
<!--        <div class="row">
            <div class="col-xs-12">
                <center>
                    <input name="reempaquetar" id="orden_1" class="orden" rel="1" value="1" type="checkbox">&nbsp;Reempaquetar
                </center>
            </div>
        </div> 
        <div class="row">
            <div style=" background-color: #E6E6E6; font-weight: bold;"  class="col-xs-12">
                <center>
                    <br>
                    <div id="mul_1" style="width: 530px; text-align: left; height: 60px; background-color: #ffffff; border-style: solid; border-color: #999999; border-width: 0.1px; overflow-y: scroll;">

                    </div>
                    <h6><font color="red"> Esta instrucción se lleva a cabo en 24 Hrs a partir de este momento. </font></h6>
                </center>
            </div>
        </div> 
        <br>-->
        <div class="row">
            <div class="col-xs-12">
                <center>
                    <input 
                        onClick="
                        if(this.checked == true){
//                            $('#listaOrdenes').css('display', 'block');
                        }else{
//                            $('#listaOrdenes').css('display', 'none');
                        }
                        " 
                        name="consolidar" 
                        id="orden_2" 
                        class="orden" 
                        rel="2" 
                        value="1" 
                        type="checkbox">
                    &nbsp;Consolidar
                    
                </center>
            </div>
        </div>
        <div class="row">
            <div style=" background-color: #E6E6E6; font-weight: bold;"  class="col-xs-12">
                <center>
                    <br>
                    <div id="mul_2" style="width: 95%; text-align: left; height: 90px; background-color: #ffffff; border-style: solid; border-color: #999999; border-width: 0.1px; overflow-y: scroll;" disabled="true">
                        <div  id="listaOrdenes" style=" display: block;" class="pd-inner">
                            <?php
                            $ordenClientes = Ordenes::model()->findAll("code_cliente LIKE '".$orden->code_cliente."' AND status=0 AND id_orden <>".$id_orden);
                            $c = 0;
                            foreach ($ordenClientes as $ordenCliente){
                                ?>
                                <input
                                    onClick="
                                    var pesoGlobal = $('#TextPesoListadoOrdenes').val();
                                    var peso = <?php echo $ordenCliente->peso; ?>;
                                    var resultado = 0;
                                    if(this.checked == true){
//                                        $('#listaOrdenes').css('display', 'block');
//                                        alert(pesoGlobal+' - '+peso);
                                        resultado = parseFloat(peso) + parseFloat(pesoGlobal);
                                    }else{
                                        resultado = parseFloat(pesoGlobal) - parseFloat(peso);
//                                        $('#listaOrdenes').css('display', 'none');
//                                        alert('0');
                                    }
                                    $('#TextPesoListadoOrdenes').val(resultado.toFixed(2));
                                    $('#PesoListadoOrdenes').html(resultado.toFixed(2));
                                    "
                                    name="consolidarCliente<?php echo $c; ?>" 
                                    id="consolidarCliente<?php echo $c; ?>" 
                                    class="orden" 
                                    value="<?php echo $ordenCliente->id_orden; ?>" 
                                    type="checkbox">
                                &nbsp;&nbsp;<?php echo $ordenCliente->ware_reciept." / ".$ordenCliente->descripcion." / ".$ordenCliente->tracking; ?><br>
                                <?php
                                $c++;
                            }
                            ?>
                                
                            <input type="hidden" value="<?php echo $c; ?>" name="totalConsolidacion">    
                        </div>
                    </div>
                    <br>
                </center>
                <br>
                <p class="text-right">
                    Peso:&nbsp;
                    <input id="TextPesoListadoOrdenes" type="hidden" value="<?php echo $orden->peso; ?>">
                    <label id="PesoListadoOrdenes" ><?php echo $orden->peso; ?></label>
                </p>
            </div>
        </div>
        <br>
<!--        <div class="row">
            <div class="col-xs-12">
                <center>
                    <input name="seguro" id="seguro" value="1" type="checkbox">
                    &nbsp;Seguro
                </center>
            </div>
        </div>
        <div class="row">
            <div style=" background-color: #E6E6E6; font-weight: bold;"  class="col-xs-12">
                <center>
                    <br>
                    <h6><font color="red">Aumento de un 2% sobre el valor de la compra</font></h6>
                    <br>
                </center>
            </div>
        </div>-->
    </form>    
    <?php
}
public function actionRegistroInstruccion(){
    
    
    //============================================================================================//
    // Registro de instrucción
    //============================================================================================//
    $count = 0;
    if($_POST['consolidar'] == 1){
        
        for($i = 0; $i <= $_POST['totalConsolidacion']; $i++){
            if($_POST['consolidarCliente'.$i]){
                $count++;
            }
        }
        for($i = 0; $i <= $_POST['totalConsolidacion']; $i++){
            if($_POST['consolidarCliente'.$i]){
                Yii::app()->db->createCommand("UPDATE ordenes SET status = '1', instrucciones = '".$_POST['primero']."', orden ='".$count."' where id_orden =".$_POST['consolidarCliente'.$i])->query();
            }
        }                
        
    }
    if(!$count == 0){
        $count = 1;
    }
    Yii::app()->db->createCommand("UPDATE ordenes SET status = '1', instrucciones = '".$_POST['primero']."', orden ='".$count."' where id_orden =".$_POST['ordenPrincipal'])->query();
    
    
    //============================================================================================//
    // Consolidación
    //============================================================================================//
    $orden = Ordenes::model()->find('id_orden ='.$_POST['ordenPrincipal']);
    $peso = $orden->peso;
    for($i = 0; $i <= $_POST['totalConsolidacion']; $i++){
        if($_POST['consolidarCliente'.$i]){
            $odenC = Ordenes::model()->find('id_orden ='.$_POST['consolidarCliente'.$i]);
            $peso += $odenC->peso;
        }
    } 
    
    
    $cliente = Clientes::model()->find("code_cliente LIKE '".$orden->code_cliente."' ");
    $clienteCiudad = substr($cliente->estado,0,3);
    $codigoConsolidacion = strtoupper($clienteCiudad).$cliente->code_cliente.date('Ymd');
    
    
    if($_POST['consolidar'] == 1){
        Yii::app()->db->createCommand(
            "INSERT INTO consolidaciones (id_cliente, ware_reciept, direccion, peso, instruccion, cliente_manifiesto, status, fecha)"
          . "value('".$cliente->id_cliente."', '".$codigoConsolidacion."', '".$cliente->direccion."', '".$peso."', '2', '".$cliente->nombre."' , '1', '".date('Y-m-d')."')"    
        )->query();


        $consolidacion = Consolidaciones::model()->find("ware_reciept LIKE '".$codigoConsolidacion."' ");
        //============================================================================================//
        // Ordenes Consolidación
        //============================================================================================//
        Yii::app()->db->createCommand(
            "INSERT INTO `ordenes-consolidaciones` (id_con, id_orden)"
          . "value('".$consolidacion->id_con."', '".$_POST['ordenPrincipal']."')"    
        )->query();

        for($i = 0; $i <= $_POST['totalConsolidacion']; $i++){
            if($_POST['consolidarCliente'.$i]){
                Yii::app()->db->createCommand(
                    "INSERT INTO `ordenes-consolidaciones` (id_con, id_orden)"
                  . "value('".$consolidacion->id_con."', '".$_POST['consolidarCliente'.$i]."')"    
                )->query();
            }
        }  
    }
//    echo var_dump($_POST);
//    die();
    /*$model=new Ordenes('search');
    $model->unsetAttributes();
    if(isset($_GET['Ordenes']))
    $model->attributes=$_GET['Ordenes'];
    $cantidad = 500;
    $this->render('admin',array(
        'model'=>$model, 'cantidad'=>$cantidad
    ));*/
    
    
}
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new Ordenes;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Ordenes']))
{
    
$model->attributes=$_POST['Ordenes'];
$cliente = Clientes::model()->find("code_cliente LIKE '".$model->code_cliente."'");
if($model->tracking == ""){
    $model->tracking = $_POST['TrackingCliente'];
}
$model->numero_guia = rand(1, 999999);
$model->env_email = $cliente->email;
$model->id_ope = "001";
$model->status = 0;
$model->instrucciones = 0;
$model->orden = 0;
$model->peli = 0;
$model->doc = 0;
////$model->numero_guia = substr(rand(0, 1000000), 0, 7);
//$numero_guia = $model->numero_guia;
//$tracking = $model->tracking;
$code_cliente = $model->code_cliente;
$model->fecha = date('Y-m-d H:i:s');
$model->cant = 0;
$model->tarifa = $_POST['Tarifa'];

$model->ware_reciept = $code_cliente.'-'.$numero_guia.substr($tracking,-4);

if($model->save()){
    
    //====================//
    $numero_guia = $model->id_orden+1000000;
    $id_orden = $model->id_orden;
    //====================//
    $tracking = $model->tracking; //"el tracking que ingresan al crear la orden";
    //$requeridon = $id_orden + 247201;
    $requeridon = $model->id_orden + 247201;
    //echo $requeridon;
    $ware_reciept = $code_cliente.substr($tracking,-4).$requeridon;
    //echo substr($tracking,-4);
    //die();
    //===================//
    Yii::app()->db->createCommand(
        "UPDATE ordenes SET `numero_guia` = '".$numero_guia."', `ware_reciept` = '".$ware_reciept."' WHERE id_orden =".$model->id_orden
    )->query();
    
    $factura = new Factura;
    $factura->id_orden = $model->id_orden;
    $factura->status = 0;
    $factura->fecha = date('Y-m-d');
    $factura->tipo = 1;
    $factura->save();
    
    
        //====================================================================//
        // Si la orden es igual al tracking de Orden cliente                  //
        //====================================================================//
        
        $ordenCliente = OrdenesCliente::model()->find("tracking LIKE '".$model->tracking."'");
        if($ordenCliente){
            Yii::app()->db->createCommand("UPDATE ordenes_cliente SET observacion = 'Recibido' WHERE id_orden_cli = ".$ordenCliente->id_orden_cli)->query();
            //die("1.- Llegaste : UPDATE ordenes_cliente SET observacion = 'Recibido' WHERE id_orden_cli = ".$ordenCliente->id_orden_cli);
        }
    
        
        //=====================================================================//
        // Envio de correo
        //=====================================================================//
        
        /*$usuario = $cliente->email;
        $message = new YiiMailMessage;        

        $message->subject = __('Te lo Compro en Usa');*/
        $body = '<table width="600" align="center" cellspacing="0" cellpadding="0" border="0">
  <tbody><tr>
       <td><div align="center"><img src="https://telocomproenusa.com/controlcourier/images/logo.png" class="CToWUd"></div></td>
  </tr>
  <tr>
    <td><div align="center"><span style="font-family:Arial,Helvetica,sans-serif;font-size:14px"></span> <span style="font-family:Arial,Helvetica,sans-serif;font-weight:bold;font-size:16px">NUEVA ORDEN EN Telocomproenusa</span> <span style="font-family:Arial,Helvetica,sans-serif;font-size:14px"></span></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><p align="justify"><span style="font-family:Arial,Helvetica,sans-serif;font-size:14px">Estimado (a): ( </span><span style="font-family:Arial,Helvetica,sans-serif;font-weight:bold;font-size:14px">'.$cliente->nombre.' '.$cliente->code_cliente.'</span><span style="font-family:Arial,Helvetica,sans-serif;font-size:14px"> )</span><br>
        <br>

      <span style="font-family:Arial,Helvetica,sans-serif;font-size:14px">Se ha registrado un nueva orden en Telocomproenusa a su nombre, por favor gire las instrucciones en nuestra página Web para procesarla con la mayor rapidez posible.<br>
        </span></p>

    Detalles de la orden:

    <div>
        <ul>
            <li>Warehouse Receipt:'.$ware_reciept.' </li>
            <li>Tracking Number: '.$tracking.'</li>
            <li>Nombre del Cliente: '.$cliente->nombre.'</li>
            <li>Código del Cliente: '.$cliente->code_cliente.' </li>
            <li>Medidas en pulgadas: '.$model->alto.'x'.$model->ancho.'x.'.$model->largo.'</li>
            
            <li>Descripción: '.$model->descripcion.'</li>
        </ul>
    </div>



      <p style="font-family:Arial,Helvetica,sans-serif;font-size:14px">Si no recibe una cotización durante las proximas 24 horas, o no la obtiene online desde la web por
favor contactenos para cotizar su envío por vía aerea y marítima. Su mercancía saldra de Miami
una vez que usted seleccione el modo de envío y efectue su pago. <b> Por favor note que todos los
envios son pre­pagados </b>
    <br>
    <br>
   NECESITAMOS QUE GIRES INSTRUCCIONES SOBRE COMO DESEAS QUE ENVIEMOS TU PAQUETE: AEREO-MARITIMO-CONSOLIDAR-REEM<wbr>PACAR- ESPERAR POR MAS COMPRAS O ENVIAR COMPRA.
        <br>
        <br>
Ingresa a tu cuenta aquí para indicarnos:  <a href="http://tracking.Telocomproenusa.com/" target="_blank" data-saferedirecturl="">Ver Cuenta</a> 
       <br>
       <br>
   Al Momento de Indicarnos sobre tu opcion, recibiras una factura para efectuar el pago de tu envio hasta Colombia
        <a href="mailto:atencion@Telocomproenusa.com" target="_blank"> atencion@Telocomproenusa.com </a>
        <br>
        <br>
        <strong>Por favor note que todos los envios son pre¬pagados </strong>
        <br><br>
        Necesitamos la factura o recibo de compra para todos los envios. Si aun no la ha enviado por favor ingrese desde su cuenta como usuario registrado y su clave en la página web, en el botón: agregar orden para optimizar la eficiencia de embarque y despacho del mismo, también puede colocar su número de guía en el título/asunto de su email y envíe la copia de su factura o recibo de compra a: 
        <br>
        <br>
         <a href="mailto:atencion@Telocomproenusa.com" target="_blank"> atencion@Telocomproenusa.com </a>
         
    <br>
    <br>
    Para mas informacion sobre su envío puede contactarnos a través de nuestra página de internet:
    <br>
    <br>
    <a href="http://www.Telocomproenusa.com" target="_blank" data-saferedirecturl="">www.Telocomproenusa.com</a>
    <br>
    <br>
    Usted recibirá un email cada vez que su guía cambie de estatus.
    <br>
    <br>
    Aprovechamos la oportunidad para expresarle nuestras gracias por favorecernos en el manejo de
su carga.

       
      <p><span style="font-family:Arial,Helvetica,sans-serif;font-size:14px"><br>
        </span><span style="font-family:Arial,Helvetica,sans-serif;font-size:14px"><br>
        Gracias por su atención.</span></p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</tbody>
</table>';
        
    /*$message->setBody($body,'text/html');//codificar el html de la vista
    $message->from =('logistico@Telocomproenusa.com'); // alias del q envia
    $message->setTo($usuario); // a quien se le envia
    Yii::app()->mail->send($message);*/

    //======================================//
    // Registro de Email
    $mensaje = "Envio de Orden";
    $email = new Email;
    $email->id_orden = $model->id_orden;
    $email->code_cliente = $cliente->code_cliente;
    $email->tipo_email = 2;
    $email->estatus = 0;
    $email->descripcion = $body;
    $email->mensaje = $mensaje;
    if($email->save()){

    }else{
        print_r($email->getErrors());
    }
    
    $this->redirect(array('admin'));
    
    
}
}

$this->render('create',array(
'model'=>$model,
));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
$model=$this->loadModel($id);
$tracking = $model->tracking;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
//echo var_dump($_POST); die();
if(isset($_POST['Ordenes']))
{
    
    $model->attributes=$_POST['Ordenes'];
    $cliente = Clientes::model()->find("code_cliente LIKE '".$model->code_cliente."'");
    
//    echo $model->tracking." - ".$tracking;
//    die();
    if($model->tracking == $tracking){
        $model->tracking = $_POST['TrackingCliente'];
    }
    $model->fecha = date('Y-m-d H:i:s');
    $model->tarifa = $_POST['Tarifa'];
    if($model->save()){
        
        $code_cliente = $model->code_cliente;
        //====================//
        $numero_guia = $model->id_orden+1000000;
        $id_orden = $model->id_orden;
        //====================//
        $tracking = $model->tracking; //"el tracking que ingresan al crear la orden";
        $requeridon = $id_orden-247201;
        $ware_reciept = $code_cliente.'-'.substr($tracking,-4).$requeridon;
        //===================//
        Yii::app()->db->createCommand(
            "UPDATE ordenes SET `numero_guia` = '".$numero_guia."', `ware_reciept` = '".$ware_reciept."' WHERE id_orden =".$model->id_orden    
        )->query();

        $factura = new Factura;
        $factura->id_orden = $model->id_orden;
        $factura->status = 0;
        $factura->fecha = date('Y-m-d');
        $factura->tipo = 1;
        $factura->save();


            //====================================================================//
            // Si la orden es igual al tracking de Orden cliente                  //
            //====================================================================//

            $ordenCliente = OrdenesCliente::model()->find("tracking LIKE '".$model->tracking."'");
            if($ordenCliente){
                Yii::app()->db->createCommand("UPDATE ordenes_cliente SET observacion = 'Recibido' WHERE id_orden_cli = ".$ordenCliente->id_orden_cli)->query();
                //die("1.- Llegaste : UPDATE ordenes_cliente SET observacion = 'Recibido' WHERE id_orden_cli = ".$ordenCliente->id_orden_cli);
            }


            //=====================================================================//
            // Envio de correo
            //=====================================================================//

            $usuario = $cliente->email; 
            $message = new YiiMailMessage;        

            $message->subject = __('Te lo Compro en Usa');
            $body = '<table width="600" align="center" cellspacing="0" cellpadding="0" border="0">
      <tbody><tr>
           <td><div align="center"><img src="https://telocomproenusa.com/controlcourier/images/logo.png" class="CToWUd"></div></td>
      </tr>
      <tr>
        <td><div align="center"><span style="font-family:Arial,Helvetica,sans-serif;font-size:14px"></span> <span style="font-family:Arial,Helvetica,sans-serif;font-weight:bold;font-size:16px">NUEVA ORDEN EN Telocomproenusa</span> <span style="font-family:Arial,Helvetica,sans-serif;font-size:14px"></span></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><p align="justify"><span style="font-family:Arial,Helvetica,sans-serif;font-size:14px">Estimado (a): ( </span><span style="font-family:Arial,Helvetica,sans-serif;font-weight:bold;font-size:14px">'.$cliente->nombre.' '.$cliente->code_cliente.'</span><span style="font-family:Arial,Helvetica,sans-serif;font-size:14px"> )</span><br>
            <br>

          <span style="font-family:Arial,Helvetica,sans-serif;font-size:14px">Se ha registrado un nueva orden en Telocomproenusa a su nombre, por favor gire las instrucciones en nuestra página Web para procesarla con la mayor rapidez posible.<br>
            </span></p>

        Detalles de la orden:

        <div>
            <ul>
                <li>Warehouse Receipt:'.$ware_reciept.' </li>
                <li>Tracking Number: '.$tracking.'</li>
                <li>Nombre del Cliente: '.$cliente->nombre.'</li>
                <li>Código del Cliente: '.$cliente->code_cliente.' </li>
                <li>Medidas en pulgadas: '.$model->alto.'x'.$model->ancho.'x.'.$model->largo.'</li>

                <li>Descripción: '.$model->descripcion.'</li>
            </ul>
        </div>



          <p style="font-family:Arial,Helvetica,sans-serif;font-size:14px">Si no recibe una cotización durante las proximas 24 horas, o no la obtiene online desde la web por
    favor contactenos para cotizar su envío por vía aerea y marítima. Su mercancía saldra de Miami
    una vez que usted seleccione el modo de envío y efectue su pago. <b> Por favor note que todos los
    envios son pre­pagados </b>
        <br>
        <br>
       NECESITAMOS QUE GIRES INSTRUCCIONES SOBRE COMO DESEAS QUE ENVIEMOS TU PAQUETE: AEREO-MARITIMO-CONSOLIDAR-REEM<wbr>PACAR- ESPERAR POR MAS COMPRAS O ENVIAR COMPRA.
            <br>
            <br>
    Ingresa a tu cuenta aquí para indicarnos:  <a href="http://tracking.Telocomproenusa.com/" target="_blank" data-saferedirecturl="">Ver Cuenta</a> 
           <br>
           <br>
       Al Momento de Indicarnos sobre tu opcion, recibiras una factura para efectuar el pago de tu envio hasta Colombia
            <a href="mailto:atencion@Telocomproenusa.com" target="_blank"> atencion@Telocomproenusa.com </a>
            <br>
            <br>
            <strong>Por favor note que todos los envios son pre¬pagados </strong>
            <br><br>
            Necesitamos la factura o recibo de compra para todos los envios. Si aun no la ha enviado por favor ingrese desde su cuenta como usuario registrado y su clave en la página web, en el botón: agregar orden para optimizar la eficiencia de embarque y despacho del mismo, también puede colocar su número de guía en el título/asunto de su email y envíe la copia de su factura o recibo de compra a: 
            <br>
            <br>
             <a href="mailto:atencion@Telocomproenusa.com" target="_blank"> atencion@Telocomproenusa.com </a>

        <br>
        <br>
        Para mas informacion sobre su envío puede contactarnos a través de nuestra página de internet:
        <br>
        <br>
        <a href="http://www.Telocomproenusa.com" target="_blank" data-saferedirecturl="">www.Telocomproenusa.com</a>
        <br>
        <br>
        Usted recibirá un email cada vez que su guía cambie de estatus.
        <br>
        <br>
        Aprovechamos la oportunidad para expresarle nuestras gracias por favorecernos en el manejo de
    su carga.


          <p><span style="font-family:Arial,Helvetica,sans-serif;font-size:14px"><br>
            </span><span style="font-family:Arial,Helvetica,sans-serif;font-size:14px"><br>
            Gracias por su atención.</span></p></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </tbody>
    </table>';

        $message->setBody($body,'text/html');//codificar el html de la vista
        $message->from =('logistico@Telocomproenusa.com'); // alias del q envia
        $message->setTo($usuario); // a quien se le envia
        Yii::app()->mail->send($message);
        
        
        
        
    
//        $this->redirect(array('view','id'=>$model->id_orden));
        $this->redirect(array('admin'));

    }
}
    $this->render('update',array(
    'model'=>$model
    ));
}


/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
$criteria=new CDbCriteria;
$criteria->order = 'id_orden DESC';
$dataProvider = new CActiveDataProvider('Ordenes',array('criteria'=>$criteria,));    
    
//$dataProvider=new CActiveDataProvider('Ordenes');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Ordenes('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Ordenes']))
$model->attributes=$_GET['Ordenes'];

$cantidad = 500;
if($_POST['include']){
    $cantidad =$_POST['include'];
}

$this->render('admin',array(
'model'=>$model, 'cantidad'=>$cantidad
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Ordenes::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='ordenes-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
