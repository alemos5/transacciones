<?php

class FranquiciadoController extends Controller
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
'actions'=>array('create','update', 'admin', 'categoria', 'listadoCategoria', 'listadoInscripcion', 'wallet', 'validar', 'updateFranquiciado', 'findFranquiciado'),
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

public function actionFindFranquiciado()
  {
    if($_POST['competencia'])
    {
      $model= Franquiciado::model()->findAll('id_competencia=:id_competencia AND lider = 1', array(':id_competencia'=>$_POST['competencia']));
      echo "<option value=\"\">Seleccione...</option>";
      foreach($model as $franquiciado)
      {
        echo "<option value=\"".$franquiciado->id_usuario_sistema."\">".$franquiciado->idUsuario->correo."</option>";
      }
    }
    else echo "<option value=\"\">Seleccione...</option>";
    Yii::app()->end();
  }



public function actionListadoInscripcion($id_copetencia = Null, $id_categoria = Null)
{
//    echo var_dump($_GET); die();
    $id_copetencia = $_GET['idc'];
    $id_categoria = $_GET['idca_'];
    //$dataProvider=new CActiveDataProvider('Dj');
    $this->render('_listado_inscripcion',array(
    'id_copetencia'=>$id_copetencia, 'id_categoria'=>$id_categoria
    ));
}

public function actionUpdateFranquiciado(){
    $id = $_POST['id'];
    $model=$this->loadModel($id);
    $imagenAnterior = $model->img;
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
    
    if(isset($_POST['Franquiciado']))
    {
    
        
    $model->attributes=$_POST['Franquiciado'];
//    echo $imagenAnterior." / ".$img = CUploadedFile::getInstance($model,'img');    
    $img = CUploadedFile::getInstance($model,'img');
    
    
        if($img != ""){
            if($imagenAnterior != $img){
                $rnd = rand(0,9999);  // generate random number between 0-9999
                $uploadedFile=CUploadedFile::getInstance($model,'img');
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $model->img = $fileName;
                $valorImg = 0; 
            }else{
                $valorImg = 1;
            }
        }else{
            if($imagenAnterior != "img_defaul.png"){
//                echo "aqui";
//                $rnd = rand(0,9999);  // generate random number between 0-9999
//                $uploadedFile=CUploadedFile::getInstance($model,'img');
//                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
//                $model->img = $fileName;
//                $valorImg = 0; 
                 $model->img = $imagenAnterior;
                    $valorImg = 1;
            }else{
                $model->img = "img_defaul.png";
                $valorImg = 1;
            }
                
        }
//    die();
    if($model->save()){
        if($valorImg != 1 ){
            $uploadedFile->saveAs(YiiBase::getPathOfAlias("webroot").'/images/franquiciado/'.$fileName);  // image will uplode to rootDirectory/banner/
        }
    }
    
    }
//    if(){
//   
//    }

    $this->render('_wallet',array(
        
    ));
}

public function actionValidar()
{
    $id_franquiciado = $_POST['id_franquiciado'];
    $accion = $_POST['accion'];
//    echo "Aqui";
    if($id_franquiciado){
        $model = FranquiciadoAprobacion::model()->findByPk($id_franquiciado);
        $id_franquiciado_desembolso = $model->id_franquiciado_desembolso;	
        $model->attributes=$_POST['id_franquiciado'];
        $model->fecha_aprobacion = date('Y-m-d H:i:s');
        $model->estatus = $accion;
        if($model->save()){
            $countAprobacion = FranquiciadoAprobacion::model()->findAll('id_franquiciado_desembolso ='.$id_franquiciado_desembolso);
            $countAprobacionValidado = FranquiciadoAprobacion::model()->findAll('id_franquiciado_desembolso ='.$id_franquiciado_desembolso.' AND estatus = 1');
            if($countAprobacion == $countAprobacionValidado){
                $modelDesembolso = FranquiciadoDesembolso::model()->findByPk($id_franquiciado_desembolso);
                $modelDesembolso->attributes=$_POST['id_franquiciado'];
                $modelDesembolso->estatus = 1;
                $modelDesembolso->save();
            }
        }
    }
}

public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}
public function actionWallet()
{
$this->render('_wallet',array(
//'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new Franquiciado;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Franquiciado']))
{
$model->attributes=$_POST['Franquiciado'];

$img = CUploadedFile::getInstance($model,'img');
if($img != ""){
    $rnd = rand(0,9999);  // generate random number between 0-9999
    $uploadedFile=CUploadedFile::getInstance($model,'img');
    $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
    $model->img = $fileName;
    $valorImg = 0; 
}else{
    $model->img = "img_defaul.png";
    $valorImg = 1;
}


if($model->save()){
    if($valorImg != 1 ){
        $uploadedFile->saveAs(YiiBase::getPathOfAlias("webroot").'/images/franquiciado/'.$fileName);  // image will uplode to rootDirectory/banner/
    }
    $this->redirect(array('view','id'=>$model->id_franquiciado));
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

if(isset($_POST['Franquiciado']))
{
$model->attributes=$_POST['Franquiciado'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_franquiciado));
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
$dataProvider=new CActiveDataProvider('Franquiciado');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

public function actionCategoria(){
    
    $this->render('_categoria',array(
    )); 
}

public function actionListadoCategoria($id_copetencia = Null)
{
    $id_copetencia = $_GET['idc'];
    //$dataProvider=new CActiveDataProvider('Dj');
    $this->render('_listado_categoria',array(
    'id_copetencia'=>$id_copetencia,
    ));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Franquiciado('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Franquiciado']))
$model->attributes=$_GET['Franquiciado'];

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
$model=Franquiciado::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='franquiciado-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
