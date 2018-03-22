<?php

class InscripcionController extends Controller
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
public function actionCreate($id_competencia = NULL)
{
$model=new Inscripcion;
//echo $id_competencia;
//die();
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
//die($_POST['Inscripcion']);
//echo var_dump($_POST); die();
    if(isset($_POST['Inscripcion']))
    {
        $id_competencia = $_POST['id'];
//        echo var_dump($_POST); die();
//        die($_POST['valorCategoriaController']);
        $model->attributes=$_POST['Inscripcion'];
        $valorAudio = 0;
        if($model->audio){
            $rnd = rand(0,9999);  // generate random number between 0-9999
            $uploadedFile=CUploadedFile::getInstance($model,'audio');
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->audio = $fileName;
            $valorAudio = 0; 
        }else{
            $model->audio = "audio_defaul.mp3";
            $valorAudio = 1;
        }
        $model->fecha_inscripcion = date('Y-m-d H:i:s');
        $model->id_copetencia = $_POST['id'];
        $model->id_competencia_tipo = $_POST['tipoCategoriaSeleccionada'];
        $model->id_usuario = Yii::app()->user->id_usuario_sistema;
        $model->id_estatu_inscripcion = 1;
        $model->id_categoria = $_POST['categoriaSeleccionadaFinal'];
        $model->costo = $_POST['valorCategoriaController'];
        //========================================================//
        // Costo de la inscripcion
        //========================================================//
        
        
        
        
        if($model->save()){
            
            if($valorAudio != 1 ){
                $uploadedFile->saveAs(YiiBase::getPathOfAlias("webroot").'/images/audio/'.$fileName);  // image will uplode to rootDirectory/banner/
            }
            
            //==================================//
            // Registro de Pago 
            //==================================//
            
            $pago = new Pago;
            $pago->id_tipo_pago = 2;
            $pago->id_copetencia = $_POST['id'];
            $pago->fecha_pago = date('Y-m-d H:i:s');
            $pago->id_inscripcion = $model->id_inscripcion;
            $pago->id_usuario = Yii::app()->user->id_usuario_sistema;
            $pago->id_usuario_pagador = Yii::app()->user->id_usuario_sistema;
            $pago->costo_pagar = $_POST['valorCategoriaController'];
            $pago->save();
//            die();
            
            if($_POST['nextRowParticipante'] > 0) {
                for($i=0; $i < $_POST['countRowParticipante']; $i++) {
                    $id_usuario_eR = $_POST['id_usuario_eR'.$i];
                    if($id_usuario_eR){
                        $participanteInscripcion = new Participante;
                        $participanteInscripcion->id_inscripcion = $model->id_inscripcion;
                        $participanteInscripcion->id_copetencia = $model->id_copetencia;
                        $participanteInscripcion->id_categoria = $_POST['categoriaSeleccionadaFinal'];
                        $participanteInscripcion->id_usuario = $id_usuario_eR;
                        $participanteInscripcion->id_usuario_registro = Yii::app()->user->id_usuario_sistema;
                        $participanteInscripcion->estatus = 1;	
                        if($participanteInscripcion->save()){
//                                
                            $pagoDetalle = new PagoDetalle;
                            $pagoDetalle->id_pago = $pago->id_pago;
                            $pagoDetalle->id_tipo_pago = 2;
                            $pagoDetalle->id_inscripcion = $model->id_inscripcion;
                            $pagoDetalle->id_usuario = $id_usuario_eR;
                            $pagoDetalle->id_usuario_registro = Yii::app()->user->id_usuario_sistema;
                            $pagoDetalle->items = "Pago de Categoría";
                            $pagoDetalle->monto = $_POST['valorCategoriaController'];	
                            $pagoDetalle->save();
                            
                        }else{
                            print_r($participanteInscripcion->getErrors());
                            die();
                        }
                    }
                }
            }
            
            
            
//            die("Aqui");
//            $this->redirect(array('view','id'=>$model->id_inscripcion));
//            $this->render('create',array(
//                'model'=>$model, 'id_competencia'=>$id_competencia
//            ));
            header("Location: ".Yii::app()->baseUrl.'/inscripcion/create?id_competencia='.$id_competencia);
        } else {
            print_r($model->getErrors());
        }
        
//            die("Aqui2");
    }

    $this->render('create',array(
    'model'=>$model, 'id_competencia'=>$id_competencia
    ));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
    public function actionUpdate($id)
    {
//        echo "aqui"; die();
        $model=$this->loadModel($id);
        $id_competencia = $model->id_copetencia;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
//        echo $uploadedFile; die();
        if(isset($_POST['Inscripcion']))
        {
            $model->attributes=$_POST['Inscripcion'];
            
            
            $model->fecha_inscripcion = date('Y-m-d H:i:s');
            $valorAudio = 0;
            $cancion = CUploadedFile::getInstance($model,'audio');
             if($cancion != ""){
                 $rnd = rand(0,9999);  // generate random number between 0-9999
                 $uploadedFile=CUploadedFile::getInstance($model,'audio');
                 $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                 $model->audio = $fileName;
                 $valorAudio = 0; 
             }else{
//                 $model->audio = "audio_defaul.mp3";
                 $valorAudio = 1;
             }
            
            $model->id_competencia_tipo = $_POST['tipoCategoriaSeleccionada'];
            $model->id_usuario = Yii::app()->user->id_usuario_sistema;
            $model->id_estatu_inscripcion = 1;
            $model->id_categoria = $_POST['categoriaSeleccionadaFinal'];
            
            if($model->save()){
                //die(YiiBase::getPathOfAlias("webroot").'/images/audio/'.$fileName);
                if($valorAudio != 1 ){
                    $uploadedFile->saveAs(YiiBase::getPathOfAlias("webroot").'/images/audio/'.$fileName);  // image will uplode to rootDirectory/banner/
                }
                
                Participante::model()->deleteAll('id_inscripcion ='.$id);
                if($_POST['nextRowParticipante'] > 0) {
                    for($i=0; $i < $_POST['countRowParticipante']; $i++) {
                        $id_usuario_eR = $_POST['id_usuario_eR'.$i];
                        if($id_usuario_eR){
                            $participanteInscripcion = new Participante;
                            $participanteInscripcion->id_inscripcion = $model->id_inscripcion;
                            $participanteInscripcion->id_copetencia = $model->id_copetencia;
                            $participanteInscripcion->id_categoria = $_POST['categoriaSeleccionadaFinal'];
                            $participanteInscripcion->id_usuario = $id_usuario_eR;
                            $participanteInscripcion->id_usuario_registro = Yii::app()->user->id_usuario_sistema;
                            $participanteInscripcion->estatus = 1;	
                            if($participanteInscripcion->save()){
    //                                die("Exitoso");
                            }else{
                                print_r($participanteInscripcion->getErrors());
                                die();
                            }
                        }
                    }
                }
                
                $this->redirect(array('view','id'=>$model->id_inscripcion));
            }
        }

        $this->render('update',array(
        'model'=>$model, 'id_competencia'=>$id_competencia
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
$dataProvider=new CActiveDataProvider('Inscripcion');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
    $model=new Inscripcion('search');
    $model->unsetAttributes();  // clear any default values
    if(isset($_GET['Inscripcion'])){
        $model->attributes=$_GET['Inscripcion'];
    }
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
$model=Inscripcion::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='inscripcion-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
