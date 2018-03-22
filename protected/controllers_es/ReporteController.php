<?php

class ReporteController extends Controller
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
'actions'=>array('create','update', 'listadoCompetencia'),
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
$model=new Reporte;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Reporte']))
{
$model->attributes=$_POST['Reporte'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_reporte));
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

if(isset($_POST['Reporte']))
{
$model->attributes=$_POST['Reporte'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_reporte));
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
//$dataProvider=new CActiveDataProvider('Reporte');

//$dataProvider=new CActiveDataProvider('Inscripcion');
//    $model=new Inscripcion('search');
//    $model->unsetAttributes();  // clear any default values
//    if(isset($_GET['Inscripcion'])){
//        $model->attributes=$_GET['Inscripcion'];
//    }
    $this->render('index',array(
//        'model'=>$model,
    ));
}
public function actionlistadoCompetencia()
{
//$dataProvider=new CActiveDataProvider('Reporte');

//$dataProvider=new CActiveDataProvider('Inscripcion');
//    $model=new Inscripcion('search');
//    $model->unsetAttributes();  // clear any default values
//    if(isset($_GET['Inscripcion'])){
//        $model->attributes=$_GET['Inscripcion'];
//    }
    
    $criteria=new CDbCriteria;
//    $criteria->select = "d.categoria as categoriaIns";
    $criteria->join = 'INNER JOIN competencia b ON (t.id_copetencia = b.id_copetencia) ';
    $criteria->join .= 'INNER JOIN participante c ON (t.id_inscripcion = c.id_inscripcion)';
    $criteria->join .= 'INNER JOIN categoria d ON (d.id_categoria = t.id_categoria)';
    $criteria->join .= 'INNER JOIN tipo_categoria dd ON (dd.id_tipo_categoria = d.id_tipo_categoria)';
    $criteria->join .= 'INNER JOIN usuario_sistema e ON (e.id_usuario_sistema = c.id_usuario)';
    $criteria->join .= 'INNER JOIN usuario_sistema f ON (f.id_usuario_sistema = c.id_usuario_registro)';
    $criteria->addCondition("b.estatus = 1");
    $criteria->order = 'b.id_copetencia DESC';

    $inscripciones = Inscripcion::model()->findAll($criteria);
    
    $this->render('_listado_competencia',array(
        'inscripciones'=>$inscripciones,
    ));
}



/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Reporte('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Reporte']))
$model->attributes=$_GET['Reporte'];

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
$model=Reporte::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='reporte-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
