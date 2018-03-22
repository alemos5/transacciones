<?php

class ClientesController extends Controller
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
'actions'=>array('create','update', 'findJsonCliente', 'admin'),
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

 public function actionfindJsonCliente() {
     
    if(Yii::app()->user->id_perfil_sistema=='2'){
        if (isset($_GET['term'])) {
          if(isset($_GET['onlyId'])) $data = Clientes::model()->findAll('id_cliente::TEXT = :term ', array(':term'=>$_GET['term']));
          else $data = Clientes::model()->findAll('id_cliente ='.Yii::app()->user->id_usuario_sistema);
          echo CJSON::encode($data);
        }
        Yii::app()->end();
    }else{ 
        if (isset($_GET['term'])) {
          if(isset($_GET['onlyId'])) $data = Clientes::model()->findAll('id_cliente::TEXT = :term ', array(':term'=>$_GET['term']));
          else $data = Clientes::model()->findAll('id_cliente like "%'.$_GET['term'].'%" OR code_cliente like "%'.$_GET['term'].'%" OR nombre like "%'.$_GET['term'].'%";');
          echo CJSON::encode($data);
        }
        Yii::app()->end();
    }
    
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
$model=new Clientes;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Clientes']))
{
$model->attributes=$_POST['Clientes'];

$model->estado = 1;
$model->fecha = date('Y-m-d H:i:s');
$model->id_cliente_padre = Yii::app()->user->id_usuario_sistema; 
$model->codigo_cliente_hijo = "NULL"; 

if($model->save()){
   
//    die($model->id_cliente);
    $codCLiente = $model->id_cliente-2730 ;
    //die("Suma: ".$codCLiente);
    $modelCliente=Clientes::model()->findByPk($model->id_cliente); 
    $modelCliente->attributes=$model->id_cliente;
    $modelCliente->code_cliente = 'SB'.$codCLiente;
    
    if($modelCliente->save()){
        
        //===========================================================//
        // Registro de Usuario para el clientes
        //===========================================================//

        $usuario = new Usuario;
        $usuario->cedula = $modelCliente->id_cliente;
        $usuario->usuario = $modelCliente->email;
        $usuario->primer_nombre= $modelCliente->nombre;
        $usuario->segundo_nombre= $modelCliente->nombre;
        $usuario->primer_apellido= $modelCliente->nombre;
        $usuario->segundo_apellido= $modelCliente->nombre;
        $usuario->fecha_nacimiento= date('Y-m-d');
        $usuario->sexo= 1;
        $usuario->observacion_personal= "Registro de Cliente";
        $usuario->contrasena= md5($modelCliente->email);
        $usuario->fecha_registro= date('Y-m-d H:i:s');
        $usuario->estatus= 1;
        $usuario->estatus_contrasena= 1;
        $usuario->id_perfil_sistema= 4;
        $usuario->direccion_ip= '127.0.0.1';
        $usuario->id_registrador= Yii::app()->user->id_usuario_sistema;
        $usuario->id_sociedad= 1;
        $usuario->correo= $modelCliente->email;
        $usuario->id_cliente= $modelCliente->id_cliente;
        $usuario->code_cliente= $modelCliente->code_cliente;
        $usuario->padre_hijo= 0;
        $usuario->direccion = $modelCliente->direccion;
        
        
        if($usuario->save()){

        }else{
            echo "Cliente Padre: <hr>";
           print_r($usuario->getErrors());
           die();
        }
        
        
    }else{
        print_r($modelCliente->getErrors());
        die();
    }
    
    
    $subcliente =new ClientesSubcliente;
    $subcliente->id_cliente = Yii::app()->user->id_cliente;
    $subcliente->id_cliente_hijo = $modelCliente->id_cliente;
    $subcliente->code_cliente_padre = Yii::app()->user->code_cliente;
    $subcliente->code_cliente_hijo = $modelCliente->code_cliente;
    $codigoPadreHijo = $subcliente->code_cliente_padre.' - '.$subcliente->code_cliente_hijo;
    $subcliente->code_padre_hijo = $codigoPadreHijo;
    $subcliente->fecha_registro = date('Y-m-d H:i:s');
    $subcliente->estatus = 1;
    $subcliente->descripcioon = 'Np';
            //$_POST['group_id_list'][$i];
    if($subcliente->save()){
        //$this->redirect(array('view','id'=>$model->id_cliente));
    }else{
        print_r($subcliente->getErrors());
        die();
    }
    
$this->redirect(array('view','id'=>$model->id_cliente));
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

if(isset($_POST['Clientes']))
{
$model->attributes=$_POST['Clientes'];
$model->fecha = date('Y-m-d H:i:s');
$model->id_cliente_padre = Yii::app()->user->id_usuario_sistema; 
$model->codigo_cliente_hijo = "NULL"; 
if($model->save()){
    
    
    $this->redirect(array('view','id'=>$model->id_cliente));
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
$dataProvider=new CActiveDataProvider('ClientesSubcliente', array(
    'criteria'=>array(
        'condition'=>'id_cliente = :id_cliente',
        'params'=>array(':id_cliente'=>Yii::app()->user->id_cliente),
    ))
);
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Clientes('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Clientes']))
$model->attributes=$_GET['Clientes'];

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
$model=Clientes::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='clientes-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
