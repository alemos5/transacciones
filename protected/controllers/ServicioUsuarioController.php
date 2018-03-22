<?php

class ServicioUsuarioController extends Controller
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
'actions'=>array('create','update'),
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

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
    public function actionCreate()
    {
        $model=new ServicioUsuario;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['ServicioUsuario']))
        {
            $model->attributes=$_POST['ServicioUsuario'];
            if($_POST['nextRowParticipante'] > 0) {
                for($i=0; $i < $_POST['countRowParticipante']; $i++) {
                    if($_POST['AddItemsImpuesto'.$i]){
                        
                        $serviciosImpuestos = ServicioImpuesto::model()->findAll('id_servicio ='.$_POST['AddItemsImpuesto'.$i]);
                        $count = 0;
                        foreach ($serviciosImpuestos as $servicioImpuestoU){
                            
                            $servicioUsuario = new ServicioUsuario;
                            $servicioUsuario->id_empresa = $_POST['AddItemsImpuestoEmpresa'.$i];
                            $servicioUsuario->id_servicio = $_POST['AddItemsImpuesto'.$i];
                            $servicioUsuario->id_usuario = $model->id_usuario;
                            $servicioUsuario->id_impuesto = $servicioImpuestoU->id_impuesto;
                            //$costoServicio = Servicio::model()->find('id_servicio ='.$_POST['AddItemsImpuesto'.$i]);
                            
                            $servicioUsuario->costo_servicio = $servicioImpuestoU->precio_sugerido;
                            $servicioUsuario->costo_especial = $_POST['PrecioEspecial'.$i.'_'.$count];
                            $servicioUsuario->estatus = 1;
                            if($servicioUsuario->save()){

                            }else{
                                echo "Error en registro de servicio Impuesto <hr>";
                                print_r($model->getErrors());
                                die();
                            }
                            $count++;
                        }
                        
                    }
                }
            }
            
            
            $this->redirect(array('view','id'=>$model->id_servicio_usuario));
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
        $servicioUsuarioItemsCount = ServicioUsuario::model()->findAll('id_usuario ='.$model->id_usuario.' group by `id_servicio`');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['ServicioUsuario']))
        {
//            echo var_dump($_POST); die();
            $model->attributes=$_POST['ServicioUsuario'];
            ServicioUsuario::model()->deleteAll('id_usuario ='.$model->id_usuario);
            
            if($_POST['nextRowParticipante'] > 0) {
                for($i=0; $i < $_POST['countRowParticipante']; $i++) {
                    if($_POST['AddItemsImpuesto'.$i]){
                        
                        $serviciosImpuestos = ServicioImpuesto::model()->findAll('id_servicio ='.$_POST['AddItemsImpuesto'.$i]);
                        $count = 0;
                        foreach ($serviciosImpuestos as $servicioImpuestoU){
                            
                            $servicioUsuario = new ServicioUsuario;
                            $servicioUsuario->id_empresa = $_POST['AddItemsImpuestoEmpresa'.$i];
                            $servicioUsuario->id_servicio = $_POST['AddItemsImpuesto'.$i];
                            $servicioUsuario->id_usuario = $model->id_usuario;
                            $servicioUsuario->id_impuesto = $servicioImpuestoU->id_impuesto;
                            //$costoServicio = Servicio::model()->find('id_servicio ='.$_POST['AddItemsImpuesto'.$i]);
                            
                            $servicioUsuario->costo_servicio = $servicioImpuestoU->precio_sugerido;
                            $servicioUsuario->costo_especial = $_POST['PrecioEspecial'.$i.'_'.$count];
                            $servicioUsuario->estatus = 1;
                            if($servicioUsuario->save()){

                            }else{
                                echo "Error en registro de servicio Impuesto <hr>";
                                print_r($model->getErrors());
                                die();
                            }
                            $count++;
                        }
                        
                    }
                }
            }
            
            
//            if($_POST['nextRowParticipante'] > 0) {
//                for($i=0; $i < $_POST['countRowParticipante']; $i++) {
//                    if($_POST['AddItemsImpuesto'.$i]){
//                        $servicioUsuario = new ServicioUsuario;
//                        $servicioUsuario->id_empresa = $_POST['AddItemsImpuestoEmpresa'.$i];
//                        $servicioUsuario->id_servicio = $_POST['AddItemsImpuesto'.$i];
//                        $servicioUsuario->id_usuario = $model->id_usuario;
//                        $costoServicio = Servicio::model()->find('id_servicio ='.$_POST['AddItemsImpuesto'.$i]);
//                        $servicioUsuario->costo_servicio = $costoServicio->precio_sugerido;
//                        $servicioUsuario->costo_especial = $_POST['ImpuestoCosto'.$i];
//                        $servicioUsuario->estatus = 1;
//                        if($servicioUsuario->save()){
//
//                        }else{
//                            echo "Error en registro de servicio Impuesto <hr>";
//                            print_r($model->getErrors());
//                            die();
//                        }
//                    }
//                }
//            }
//            if($model->save){
//                $this->redirect(array('view','id'=>$model->id_servicio_usuario));
//            }
            $this->redirect('../index');
            die("Aqui");
            
        }

        $this->render('update',array(
            'model'=>$model, 'servicioUsuarioItemsCount'=>$servicioUsuarioItemsCount
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
$dataProvider=new CActiveDataProvider('ServicioUsuario');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new ServicioUsuario('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['ServicioUsuario']))
$model->attributes=$_GET['ServicioUsuario'];

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
$model=ServicioUsuario::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='servicio-usuario-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
