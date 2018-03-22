<?php

class OrdenesClienteController extends Controller
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
'actions'=>array('create','update', 'findJsonOrdenesCliente'),
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


public function actionfindJsonOrdenesCliente() {
     
//    if(Yii::app()->user->id_perfil_sistema=='2'){
//        if (isset($_GET['term'])) {
//          if(isset($_GET['onlyId'])) $data = Clientes::model()->findAll('id_cliente::TEXT = :term ', array(':term'=>$_GET['term']));
//          else $data = Clientes::model()->findAll('id_cliente ='.Yii::app()->user->id_usuario_sistema);
//          echo CJSON::encode($data);
//        }
//        Yii::app()->end();
//    }else{ 
        if (isset($_GET['term'])) {
          if(isset($_GET['onlyId'])) $data = OrdenesCliente::model()->findAll('tracking::TEXT = :term ', array(':term'=>$_GET['term']));
          else $data = OrdenesCliente::model()->findAll('tracking like "%'.$_GET['term'].'%";');
          echo CJSON::encode($data);
        }
        Yii::app()->end();
//    }
    
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
$model=new OrdenesCliente;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['OrdenesCliente']))
{
    
    
    
    $model->attributes=$_POST['OrdenesCliente'];
    $model->fecha = date("Y-m-d H:i:s");
    $model->id_cli = Yii::app()->user->id_cliente;
    $valorImg=0;
    $rnd = rand(0,9999);
    $uploadedFile=CUploadedFile::getInstance($model,'doc');
    if (!empty($uploadedFile)){
        $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
        $model->doc = $fileName;
        $valorImg = 1;
    }else{
        $model->doc = "default_doc.png";
        $valorImg = 0;
    }

    if($model->save()){
        if($valorImg == 1){
            $uploadedFile->saveAs(YiiBase::getPathOfAlias("webroot").'/images/prealerta/'.$fileName);  // image will uplode to rootDirectory/banner/
        }else{

        }
        
        $this->redirect(array('view','id'=>$model->id_orden_cli));
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
$valorImg = $model->doc;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['OrdenesCliente']))
{
$model->attributes=$_POST['OrdenesCliente'];
$model->fecha = date("Y-m-d H:i:s");
$rnd = rand(0,9999);  // generate random number between 0-9999
            
//            echo $uploadedFile=CUploadedFile::getInstance($model,'img'); die();
            $img = $uploadedFile=CUploadedFile::getInstance($model,'doc');
            if($img == "" || $img == null){
//                echo "Vacio";
                $model->doc = $valorImg;
            }else{
//                echo "Lleno";
                $uploadedFile=CUploadedFile::getInstance($model,'doc');
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->doc = $fileName;
            }


if($model->save()){
    
    if($img == "" || $img == null){
        }else{
        if(!empty($uploadedFile))  // check if uploaded file is set or not
        {
            $uploadedFile->saveAs(YiiBase::getPathOfAlias("webroot").'/images/prealerta/'.$fileName);
        }
    }
    
    $this->redirect(array('view','id'=>$model->id_orden_cli));
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
    
if(Yii::app()->user->id_perfil_sistema!='1'){    
    $criteria=new CDbCriteria;
    $criteria->addCondition('id_cli ='.Yii::app()->user->id_cliente.' ORDER BY id_orden_cli DESC');
    $dataProvider = new CActiveDataProvider('OrdenesCliente',array('criteria'=>$criteria,));    
}else{
    $dataProvider=new CActiveDataProvider('OrdenesCliente');
}

$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new OrdenesCliente('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['OrdenesCliente']))
$model->attributes=$_GET['OrdenesCliente'];

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
$model=OrdenesCliente::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='ordenes-cliente-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
