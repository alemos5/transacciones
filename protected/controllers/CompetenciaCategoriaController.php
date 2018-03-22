<?php

class CompetenciaCategoriaController extends Controller
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
'actions'=>array('index','view', 'orden', 'ordenar' , 'actualizarFecha', 'ordenValidado', 'listadoInscripcion'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update', 'eliminarCc'),
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

public function actionActualizarFecha(){
    $id_categoria_competencia = $_POST['id_categoriaCompetencia'];
    $anio = $_POST['anio'];
    $mes = $_POST['mes'];
    $dia = $_POST['dia'];
    $hora = $_POST['hora'];
    $minuto = $_POST['minuto'];
    
    if($id_categoria_competencia){
        $model=$this->loadModel($id_categoria_competencia);
        $model->attributes=$_POST['id_categoriaCompetencia'];
        if($anio){
            $model->anio = $anio;
        }
        if($mes){
            $model->mes = $mes;
        }
        if($dia){
            $model->dia = $dia;
        }
        if($dia){
            $model->dia = $dia;
        }
        if($hora){
            $model->hora = $hora;
        }
        if($minuto){
            $model->minuto = $minuto;
        }
        
        $model->save();
    }
    
}
public function actionOrdenar(){
    $id_categoria_competencia = $_POST['id_categoriaCompetencia'];
    $accion = $_POST['accion'];
    $a = $_POST['a'];
    $orden_actual = $_POST['orden_actual'];
    $orden_actual = (int)$orden_actual;
//    die("Actual: ".$orden_actual);
    if($id_categoria_competencia){
        $model=$this->loadModel($id_categoria_competencia);
        $model->attributes=$_POST['id_categoriaCompetencia'];
        if($accion == 1){
            $orden_actual += 1;
            $model->orden = $orden_actual;
        }else{
            if($orden_actual == 0){
                $model->orden = 0;
            }else{
                $model->orden = $orden_actual - 1;
            }
        }
//        die("Actual: ".$orden_actual);
        if($model->save()){
            if($a || $a != 0){
                $modelContinuo=$this->loadModel($a);
                $modelContinuo->attributes=$a;
                $modelContinuo->orden = $orden_actual;
                $modelContinuo->save();
            }
        }else{
            print_r($model->getErrors());
            die();
        }
    }
    
    if($a != 0){
        $model=$this->loadModel($a);
        $model->attributes=$a;
        $model->orden = $model->orden - 1;
        $model->save();
    }
    
    
}

public function actionOrden()
{
    $id_competenciaCategoria = $_POST['id'];
    $valor = $_POST['valor'];
//    echo "Aqui";
    if($id_competenciaCategoria){
        $model=$this->loadModel($id_competenciaCategoria);
        $model->attributes=$_POST['id'];
        $model->orden = $valor;
        $model->save();
    }
}

public function actionOrdenValidado()
{
    $id_copetencia = $_POST['id_copetencia'];
    $id_competenciaCategoria = $_POST['id'];
    $valor = $_POST['valor'];
    $validado = $_POST['validado'];
    $todo = $_POST['todo'];
    
    if($todo == 1){
        if($id_competenciaCategoria){
            $model=$this->loadModel($id_competenciaCategoria);
            $model->attributes=$_POST['id'];
            $model->orden = $valor;
            $model->validado = $validado;
            $model->save();
        }
    }
    
    if($todo == 2){
        Yii::app()->db->createCommand("UPDATE `competencia_categoria` SET `validado` = ".$validado." WHERE `id_copetencia` = ".$id_copetencia.";")->query();
    }
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new CompetenciaCategoria;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['CompetenciaCategoria']))
{
$model->attributes=$_POST['CompetenciaCategoria'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_competencia_categoria));
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

if(isset($_POST['CompetenciaCategoria']))
{
$model->attributes=$_POST['CompetenciaCategoria'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_competencia_categoria));
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
$dataProvider=new CActiveDataProvider('CompetenciaCategoria');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new CompetenciaCategoria('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['CompetenciaCategoria']))
$model->attributes=$_GET['CompetenciaCategoria'];

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
$model=CompetenciaCategoria::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='competencia-categoria-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}

public function actionEliminarCc()
  {
    if($_POST['id_cc'])
    {
        CompetenciaCategoria::model()->deleteAll('id_competencia_categoria ='.$_POST['id_cc']);
    }
    
  }

}
