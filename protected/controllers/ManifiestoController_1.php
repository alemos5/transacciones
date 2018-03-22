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
'actions'=>array('create','update', 'eliminarOrden', 'eliminarConsolidacion'),
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
        echo var_dump($_POST); die(); 
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
            
            if (count($_POST['group_id_list'] > 0)){
                for($i=0; $i < count($_POST['group_id_list']); $i++) {

                    
                    
                    $orden = Ordenes::model()->find('id_orden ='.$_POST['group_id_list'][$i]);
                    $peso = $peso +  $orden->peso;
                    //===========================================================//
                    // Registro de Ordenes
                    //===========================================================//
                    $ordenes =new ManifiestoOrdenesBultoLoading;
                    $ordenes->id_manifiesto = $model->id_manifiesto;
                    $ordenes->id_orden = $_POST['group_id_list'][$i];
                    $ordenes->id_tipo = 1;
                    if($ordenes->save()){
                        
                    }else{
                        print_r("Ordenes =".$ordenes->getErrors());
                        die();
                    }
                }
            }
            
            if (count($_POST['group_id_list2'] > 0)){
                for($i=0; $i < count($_POST['group_id_list2']); $i++) {

                    //===========================================================//
                    // Buscamos Ordenes por Consolidación
                    //===========================================================//
                    
                    $ordenesConsolidaciones = OrdenesConsolidaciones::model()->findAll('id_con ='.$_POST['group_id_list2'][$i]);
                    if($ordenesConsolidaciones){
                        foreach ($ordenesConsolidaciones as $ordenConsolidacion){
                            
                            $consolidacion = Consolidaciones::model()->find('id_con ='.$_POST['group_id_list2'][$i]);
                            $peso = $peso + $consolidacion->peso;
                            //===========================================================//
                            // Registro de Ordenes de consolidación
                            //===========================================================//
                            $ordenes =new ManifiestoOrdenesBultoLoading;
                            $ordenes->id_manifiesto = $model->id_manifiesto;
                            $ordenes->id_orden = $ordenConsolidacion->id_orden;
                            $ordenes->id_tipo = 2;
                            $ordenes->id_con = $_POST['group_id_list2'][$i];
                            if($ordenes->save()){

                            }else{
                                print_r("Consolidaciones =".$ordenes->getErrors());
                                die();
                            }
                        }
                    }
                    
                    $manifiesto=Manifiesto::model()->findByPk($model->id_manifiesto);
                    $manifiesto->attributes=$model->id_manifiesto;
                    $manifiesto->float_peso = $peso;
                    $manifiesto->save();
                }
            }
            
            
            
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
        
        if (count($_POST['group_id_list'] > 0)){
            for($i=0; $i < count($_POST['group_id_list']); $i++) {




                //===========================================================//
                // Registro de Ordenes
                //===========================================================//
                $ordenes =new ManifiestoOrdenesBultoLoading;
                $ordenes->id_manifiesto = $model->id_manifiesto;
                $ordenes->id_orden = $_POST['group_id_list'][$i];
                $ordenes->id_tipo = 1;
                if($ordenes->save()){

                }else{
                    print_r("Ordenes =".$ordenes->getErrors());
                    die();
                }
            }
        }

        if (count($_POST['group_id_list2'] > 0)){
            for($i=0; $i < count($_POST['group_id_list2']); $i++) {

                //===========================================================//
                // Buscamos Ordenes por Consolidación
                //===========================================================//

                $ordenesConsolidaciones = OrdenesConsolidaciones::model()->findAll('id_con ='.$_POST['group_id_list2'][$i]);
                if($ordenesConsolidaciones){
                    foreach ($ordenesConsolidaciones as $ordenConsolidacion){
                        //===========================================================//
                        // Registro de Ordenes de consolidación
                        //===========================================================//
                        $ordenes =new ManifiestoOrdenesBultoLoading;
                        $ordenes->id_manifiesto = $model->id_manifiesto;
                        $ordenes->id_orden = $ordenConsolidacion->id_orden;
                        $ordenes->id_tipo = 2;
                        $ordenes->id_con = $_POST['group_id_list2'][$i];
                        if($ordenes->save()){

                        }else{
                            print_r("Consolidaciones =".$ordenes->getErrors());
                            die();
                        }
                    }
                }



            }
        }
        
        
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
