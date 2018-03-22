<?php

class ManifiestoController extends Controller
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
'actions'=>array('create','update', 'estatusManifiesto', 'eliminarOrden', 'eliminarConsolidacion', 'eliminarOrdenManifiesto', 'eliminarOrdenManifiesto2'),
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


public function actionEstatusManifiesto(){
    
    $manifiesto = $_POST['manifiesto'];
    $estatus = $_POST['estatus'];
    
    
    
    Yii::app()->db->createCommand("UPDATE manifiesto SET status = '".$estatus."' where id_manifiesto =".$manifiesto)->query();
//    echo var_dump($_POST); die();
    
    
    
    
    switch ($estatus) {
            case '10':
                    $estado = 'Paquete listo para el envio.';
                    $mensaje = 'Su orden esta lista para ser despachado al destino elegido.'.'<br>'.'El proceso de entrega de su orden puede tardar 4 dias habiles, contados desde el dia siguiente despues del pago de su factura.';
                    break;

            case '11':
                    $estado = 'Entregado a la aerolinea';
                    $mensaje = 'Su paquete esta en transito, actualmente se encuentra procesando por la aerolinea.';
                    break;

                    case '12':
                    $estado = 'Pais destino';
                    $mensaje = 'Su paquete continua en transito;  se encuentra en el Pais de destino.';
                    break;

                    case '13':
                    $estado = 'Proceso de Aduanas';
                    $mensaje = 'Su paquete esta en transito, ingreso a proceso de Aduanas, esto puede tardar de 1 a 2 dias.';

                    break;

                    case '14':
                    $estado = 'Liberacion de Aduanas';
                    $mensaje = 'Su paquete esta en transito, fue liberado de aduanas sin ninguna novedad.';

                    break;

                    case '15':
                    $estado = 'Procesando para entrega local';
                    $mensaje = 'Su paquete esta en transito, se encuentra en nuestra bodega Bogota y esta en proceso para ser entregado a la trasnportadora terrestre local.';
                    break;

            default:
                    $estado = 'Procesando..';
                    break;
    }
    
    
    
    $manifiesto = Manifiesto::model()->find('id_manifiesto ='.$manifiesto);
    $ordenes = ManifiestoOrdenesBultoLoading::model()->findAll('id_manifiesto ='.$manifiesto->id_manifiesto." AND id_tipo = 1");
    
    $estatus1 = $estatus;
    if($estatus == 10){
        $estatus = 0;
    }
    if($estatus == 11){
        $estatus = 1;
    }
    if($estatus == 12){
        $estatus = 2;
    }
    if($estatus == 13){
        $estatus = 3;
    }
    if($estatus == 14){
        $estatus = 4;
    }
    if($estatus == 15){
        $estatus = 5;
    }
    
    foreach ($ordenes as $orden){
    
    Yii::app()->db->createCommand("UPDATE ordenes SET status = '".$estatus."' where id_orden =".$orden->id_orden)->query();
    //======================================//
    // Registro de estatus manifiesto
    //======================================//
    $ware_reciept = Ordenes::model()->find('id_orden ='.$orden->id_orden);
    $ware_reciept = $ware_reciept->ware_reciept;
    //echo "<hr>".$ware_reciept;
    
    Yii::app()->db->createCommand("INSERT INTO `ordenes_estatus` (`ware_reciept`, `estatus`, `fecha_orden`, `tipo`) "
            . "VALUES ('".$ware_reciept."', '".$estatus1."', '".date('Y-m-d H:i:s')."', '11');")->query();
    
    //======================================//
    // Registro de Email

        $email = new Email;
        $email->id_orden = $orden->id_orden;
        $email->code_cliente = $orden->idOrden->code_cliente;
        $email->tipo_email = 1;
        $email->estatus = 0;
        $email->descripcion = $estado;
        $email->mensaje = $mensaje;
        if($email->save()){

        }else{
            print_r($email->getErrors());
        }
    
    
    
        

    
    }
//    $model=new Manifiesto('search');
//    $model->unsetAttributes();  // clear any default values
//    if(isset($_GET['Manifiesto']))
//    $model->attributes=$_GET['Manifiesto'];
//
//    $this->render('admin',array(
//    'model'=>$model,
//    ));
    
}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

public function actionEliminarOrden(){
    $id = $_POST['id'];
    if($id){
        ManifiestoOrdenesBultoLoading::model()->deleteAll('datos_extra ='.$id);
    }
}

public function actionEliminarOrdenManifiesto(){
    $id = $_POST['valor'];
    if($id){
        ManifiestoOrdenesBultoLoading::model()->deleteAll('datos_extra ='.$id);
    }
}
public function actionEliminarOrdenManifiesto2(){
    $id = $_POST['valor'];
    if($id){
        ManifiestoOrdenesBultoLoading::model()->deleteAll('id_con ='.$id);
    }
}

public function actionEliminarConsolidacion(){
    $id = $_POST['id'];
    if($id){
        ManifiestoOrdenesBultoLoading::model()->deleteAll('id_con ='.$id);
    }
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
    $model=new Manifiesto;

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    
    
    if(isset($_POST['Manifiesto']))
    {
//        echo var_dump($_POST); die(); 
        $peso = 0;
        $model->attributes=$_POST['Manifiesto'];
        
        $model->vchar_nombre = "Casillero Express LLC";
        $model->vchar_numero = date('Ymd');
        $model->float_peso = 0;
        $model->id_instruccion = 2;
        $model->dt_registro = date('Y-m-d H:i:s');
        $model->id_status = 0;
        $model->vchar_comprador = "Tester";
        $model->vchar_rif = "xxx";
        $model->vchar_direccion = "Direccion";
        $model->vchar_telefono = "2127629858";
        $model->vchar_codigoi_manifiesto = "0";
        $model->vchar_atencion = "Tester";
        $model->status = 0;

        if($model->save()){
            $model=$this->loadModel($model->id_manifiesto);
            $model->attributes=$_POST['Manifiesto'];
            $model->vchar_codigoi_manifiesto = "MA0000".$model->id_manifiesto;
            $model->save();
            
            if($_POST['nextRowParticipante']){
                for($i=0; $i <= $_POST['nextRowParticipante']; $i++) {
                    if($_POST['id_orden'.$i]){
                        $orden = Ordenes::model()->find('id_orden ='.$_POST['id_orden'.$i]);
                        $peso = $peso +  $orden->peso;
                        //===========================================================//
                        // Registro de Ordenes
                        //===========================================================//
                        $ordenes =new ManifiestoOrdenesBultoLoading;
                        $ordenes->id_manifiesto = $model->id_manifiesto;
                        $ordenes->id_orden = $_POST['id_orden'.$i];
                        $ordenes->id_tipo = 1;
                        if($ordenes->save()){

                        }else{
                            print_r("Ordenes =".$ordenes->getErrors());
                            die();
                        }
                    }
                }
            }
            
           
            if($_POST['nextRowParticipante2']){
                if ($_POST['nextRowParticipante2'] > 0){
                    for($i=0; $i <= $_POST['nextRowParticipante2']; $i++) {
                        if($_POST['idConsolidacion'.$i]){
                        //===========================================================//
                        // Buscamos Ordenes por Consolidación
                        //===========================================================//

                        $ordenesConsolidaciones = OrdenesConsolidaciones::model()->findAll('id_con ='.$_POST['idConsolidacion'.$i]);
                        if($ordenesConsolidaciones){
                            foreach ($ordenesConsolidaciones as $ordenConsolidacion){

                                $consolidacion = Consolidaciones::model()->find('id_con ='.$_POST['idConsolidacion'.$i]);
                                $peso = $peso + $consolidacion->peso;
                                //===========================================================//
                                // Registro de Ordenes de consolidación
                                //===========================================================//
                                $ordenes =new ManifiestoOrdenesBultoLoading;
                                $ordenes->id_manifiesto = $model->id_manifiesto;
                                $ordenes->id_orden = $ordenConsolidacion->id_orden;
                                $ordenes->id_tipo = 2;
                                $ordenes->id_con = $_POST['idConsolidacion'.$i];
                                if($ordenes->save()){

                                }else{
                                    print_r("Consolidaciones =".$ordenes->getErrors());
                                    die();
                                }
                            }
                        }
                    }

                    }
                }
            }
            
            $manifiesto=Manifiesto::model()->findByPk($model->id_manifiesto);
            $manifiesto->attributes=$model->id_manifiesto;
            $manifiesto->float_peso = $peso;
            $manifiesto->save();
            
            $this->redirect(array('view','id'=>$model->id_manifiesto));
        }else{
            print_r($model->getErrors());
            die();
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

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if(isset($_POST['Manifiesto']))
    {
    $model->attributes=$_POST['Manifiesto'];
    if($model->save()){
        
        ManifiestoOrdenesBultoLoading::model()->deleteAll('id_manifiesto ='.$id);
        $peso = 0;
        if($_POST['nextRowParticipante']){
                for($i=0; $i <= $_POST['nextRowParticipante']; $i++) {
                    if($_POST['id_orden'.$i]){
                        $orden = Ordenes::model()->find('id_orden ='.$_POST['id_orden'.$i]);
                        $peso = $peso +  $orden->peso;
                        //===========================================================//
                        // Registro de Ordenes
                        //===========================================================//
                        $ordenes =new ManifiestoOrdenesBultoLoading;
                        $ordenes->id_manifiesto = $model->id_manifiesto;
                        $ordenes->id_orden = $_POST['id_orden'.$i];
                        $ordenes->id_tipo = 1;
                        if($ordenes->save()){

                        }else{
                            print_r("Ordenes =".$ordenes->getErrors());
                            die();
                        }
                    }
                }
            }
           
           
            if($_POST['nextRowParticipante2']){
                if ($_POST['nextRowParticipante2'] > 0){
                    for($i=0; $i <= $_POST['nextRowParticipante2']; $i++) {
                        if($_POST['idConsolidacion'.$i]){
                            
                            
                            
                        //===========================================================//
                        // Buscamos Ordenes por Consolidación
                        //===========================================================//

                        $consolidacion = Consolidaciones::model()->find('id_con ='.$_POST['idConsolidacion'.$i]);
                        $peso = $peso + $consolidacion->peso;
//                        echo "<hr>".$consolidacion->id_con." = ".$consolidacion->peso;    
                            
                        $ordenesConsolidaciones = OrdenesConsolidaciones::model()->findAll('id_con ='.$_POST['idConsolidacion'.$i]);
                        if($ordenesConsolidaciones){
                            foreach ($ordenesConsolidaciones as $ordenConsolidacion){
                                if($_POST['idConsolidacion'.$i]){
                                    
                                    //===========================================================//
                                    // Registro de Ordenes de consolidación
                                    //===========================================================//
                                    $ordenes =new ManifiestoOrdenesBultoLoading;
                                    $ordenes->id_manifiesto = $model->id_manifiesto;
                                    $ordenes->id_orden = $ordenConsolidacion->id_orden;
                                    $ordenes->id_tipo = 2;
                                    $ordenes->id_con = $_POST['idConsolidacion'.$i];
                                    if($ordenes->save()){

                                    }else{
                                        print_r("Consolidaciones =".$ordenes->getErrors());
                                        die();
                                    }
                                }
                            }
                        }
                    }

                    }
                }
            }
//            die();
            $manifiesto=Manifiesto::model()->findByPk($model->id_manifiesto);
            $manifiesto->attributes=$model->id_manifiesto;
            
            $manifiesto->float_peso = $peso;
            $manifiesto->save();
        
        
        $this->redirect(array('view','id'=>$model->id_manifiesto));
    }
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
$dataProvider=new CActiveDataProvider('Manifiesto', array(
  'sort'=>array(
    'defaultOrder'=>'id_manifiesto DESC',
  )));
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Manifiesto('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Manifiesto']))
$model->attributes=$_GET['Manifiesto'];

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
$model=Manifiesto::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='manifiesto-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
