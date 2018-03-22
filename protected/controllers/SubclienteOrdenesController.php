<?php

class SubclienteOrdenesController extends Controller
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
'actions'=>array('create','update', 'tablaSubcliente'),
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

public function actionTablaSubcliente(){
    $id_cliente = $_POST['id_cliente'];
//    die($id_cliente);
    $clientes = ClientesSubcliente::model()->findAll('id_cliente ='.$id_cliente);
    
    if($clientes){
        
    ?>
        <div class="panel panel-default">
            <div class="panel-heading">Ordenes por Subclientes</div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td style=" width: 80%"><center><strong>Subcliente</strong></center></td>
                            <td style=" width: 20%"><center><strong>Peso</strong></center></td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 0;
                    foreach ($clientes as $cliente){
                        ?>
                        <tr>
                            <td>
                                <?php echo $cliente->idClienteHijo->nombre; ?>
                                <input type="hidden" id="subcliente<?php echo $i; ?>" name="subcliente<?php echo $i; ?>" value="<?php echo $cliente->id_cliente_hijo; ?>">
                            </td>
                            <td>
                                <input id="subclientePeso<?php echo $i; ?>" class="span5 form-control" type="text" value="" name="subclientePeso<?php echo $i; ?>" placeholder="0.00" maxlength="250">
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                    <input type="hidden" id="countSubcliente" name="countSubcliente" value="<?php echo $i; ?>">    
                    </tbody>
                </table>
            </div>
        </div>
    <?php
    
    }
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
$model=new SubclienteOrdenes;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

function generateRandomString($length = 10) {
    //$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
//die(generateRandomString());

if(isset($_POST['SubclienteOrdenes']))
{
//    echo var_dump($_POST); die();
//    $model->attributes=$_POST['SubclienteOrdenes'];
//    if(!$_POST["SubclienteOrdenes"]['id_cliente']){
//        $this->redirect(array('view','id'=>$model->id_subcliente_ordenes));
//    }
    $countSubcliente = $_POST['countSubcliente'];
    $cantidadSubcliente = $_POST['cantidadSubcliente'];
    if($cantidadSubcliente == 0){
        $cantidadSubcliente = 1;
    }
    $clientes = Clientes::model()->find('id_cliente ='.$_POST["SubclienteOrdenes"]['id_cliente']);
    $direccionOriginal = $clientes->ciudad;
    $code_clienteOriginal = $clientes->code_cliente;
    
    for($i = 0; $i < $countSubcliente; $i++){
        
        for($ii = 0; $ii < $cantidadSubcliente; $ii++){
        
        if($_POST["subclientePeso".$i]){
            $ordenSubcliente = new SubclienteOrdenes;
            $ordenSubcliente->id_cliente = $_POST["SubclienteOrdenes"]['id_cliente'];
            $ordenSubcliente->id_subcliente = $_POST["subcliente".$i];
            $ordenSubcliente->peso = $_POST["subclientePeso".$i];
            $ordenSubcliente->descripcion = $_POST["SubclienteOrdenes"]['descripcion'];
            $ordenSubcliente->costo_global = $_POST["SubclienteOrdenes"]['costo_global'];
            $ordenSubcliente->courier = $_POST["SubclienteOrdenes"]['courier'];
            $ordenSubcliente->fecha_registro = date('Y-m-d H:i:s');
            $ordenSubcliente->estatus = 1; 
            
            
            
            if($ordenSubcliente->save()){

                $orden = new Ordenes;
                $clientes = Clientes::model()->find('id_cliente ='.$_POST["subcliente".$i]);

                if(!$clientes->direccion){
                    $clientes->direccion = "NP";
                }
                
                $orden->code_cliente = $clientes->code_cliente;
                $orden->nombre_cliente =  $clientes->nombre;
                $orden->ciudad =  $direccionOriginal;
                $orden->telefono =  $clientes->telefono;
                $orden->descripcion =  $_POST["SubclienteOrdenes"]['descripcion'];
                $orden->costo = $_POST["SubclienteOrdenes"]['costo_global'];
                $orden->seguro = 0;
                $orden->numero_guia = 0;
                $orden->tracking = 0;
                $orden->courier = $_POST["SubclienteOrdenes"]['courier'];
                $orden->alto = 0;
                $orden->ancho = 0;
                $orden->largo = 0;
                $orden->peso = $_POST["subclientePeso".$i];
                $orden->env_email = $clientes->email;
                $orden->cant = 0;
                $orden->peli = 0;
                $orden->tienda = 0;
                $orden->doc = 0;
                $orden->direccion_cliente = $clientes->direccion;
                $orden->id_ope = 001;

                $tracking = generateRandomString();
                $numero_guia = substr(rand(0, 1000000), 0, 7);

                $code_cliente = $clientes->code_cliente;

                //$patrón = '/\s+/i';
                //$sustitución = '';
                //$numero_guia= preg_replace($patrón, $sustitución, $numero_guia);
//                $ware_reciept = $code_cliente.'-'.$numero_guia.substr($tracking,-4);
                $orden->ware_reciept = "0";
                $orden->numero_guia = $numero_guia;
                $orden->tracking = $tracking;
                
                $fecha = date('Y-m-d H:i:s');
                $nuevafecha = strtotime ( '-7 hour' , strtotime ( $fecha ) ) ;
                
                
                $orden->fecha = date('Y-m-d H:i:s' , $nuevafecha );
                $orden->recargo = 0;
                $orden->status_recargo = 0;
                $orden->status = 1;
                $orden->instrucciones = 2;
                $orden->orden = 0;
                $orden->seguro = 0;

                if($orden->save()){

                    $requerido = $orden->id_orden-247201;
                    $ware_reciept2 = $code_clienteOriginal.'-'.substr($tracking,-4).$requerido;

                    $orden= Ordenes::model()->findByPk($orden->id_orden);
                    $orden->attributes=$orden->id_orden;
                    $orden->numero_guia = $orden->id_orden + 1000000;
                    $orden->ware_reciept = $ware_reciept2; 
                    $orden->save();

                    $ordenSubcliente=SubclienteOrdenes::model()->findByPk($ordenSubcliente->id_subcliente_ordenes);
                    $ordenSubcliente->attributes=$ordenSubcliente->id_subcliente_ordenes;
                    $ordenSubcliente->orden = $orden->id_orden;
                    $ordenSubcliente->id_orden = $orden->id_orden;
                    $ordenSubcliente->ware_reciept = $ware_reciept2;
                    if($ordenSubcliente->save()){

                    }else{
                        echo "Error en actualizar el registro de Orden: <hr>";
                        print_r($ordenSubcliente->getErrors());
                        die();
                    }
                }else{
                    echo "Error en registro de Orden: <hr>";
                    print_r($orden->getErrors());
                    die();
                }



            }else{
                echo "Error en registro: ".$i."<hr>";
                echo ["subclientePeso".$i]."<hr>";
                print_r($ordenSubcliente->getErrors());
                die();
            }
        }
    }
    }
//    if($model->save()){
        
    $this->redirect(array('view','id'=>$model->id_subcliente_ordenes));
//    }
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

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['SubclienteOrdenes']))
{
$model->attributes=$_POST['SubclienteOrdenes'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_subcliente_ordenes));
}

$this->render('update',array(
'model'=>$model,
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
$dataProvider=new CActiveDataProvider('SubclienteOrdenes');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new SubclienteOrdenes('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['SubclienteOrdenes']))
$model->attributes=$_GET['SubclienteOrdenes'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=SubclienteOrdenes::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='subcliente-ordenes-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
