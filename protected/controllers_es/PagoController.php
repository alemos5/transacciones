<?php

class PagoController extends Controller
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
'actions'=>array('create','update', 'pagoPaypal', 'ReportePago'),
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
    public function actionCreate($id = NULL, $tipo = NULL)
    {
        $model=new Pago;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
//       echo var_dump($_POST);
//       die();
        if(isset($_POST['Pago']))
        {
            
//            echo var_dump($_POST)."<hr>";
//            echo $_POST['countRowParticipante2'];
            
            
            
            
            $model->attributes=$_POST['Pago'];
//            $rnd = rand(0,9999);  // generate random number between 0-9999
//            $uploadedFile=CUploadedFile::getInstance($model,'img');
//            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
//            $model->img = $fileName;
            $model->id_tipo_pago = $_POST['tipo'];
            $model->fecha_pago = date('Y-m-d H:i:s');           
            
            if($_POST['tipo'] == 1){
                $model->id_copetencia = $_POST['id'];
            }else{
                $model->id_categoria = $_POST['id'];
            }
            $model->id_usuario = Yii::app()->user->id_usuario_sistema;
            if($_POST['nextRowParticipante2'] > 0) {
                $acumulador = 0;
                for($i=0; $i < $_POST['countRowParticipante2']; $i++) {
                    $acumulador += $_POST['acumulador'.$i];
                }
            }
            $model->costo_pagar = $acumulador;
            $model->id_usuario_pagador = Yii::app()->user->id_usuario_sistema;
            
            if($model->save()){
                
//                if($model->img){
//                    $uploadedFile->saveAs(YiiBase::getPathOfAlias("webroot").'/images/pago/'.$fileName);  // image will uplode to rootDirectory/banner/
//                }
//                die("aqui");
                if($_POST['nextRowParticipante2'] > 0) {
                    $acumulador = 0;
                    for($i=0; $i < $_POST['countRowParticipante2']; $i++) {
                        $id_usuario_eR = $_POST['id_usuario_eR'.$i];
                        $acumulador = $_POST['acumulador'.$i];
//                        $acumulador = $_POST['acumulador'.$i];
                        $pagoD = $_POST['pagoDetalle'.$i];
                        if($id_usuario_eR){
                            $pagoDetalle = new PagoDetalle;
                            $pagoDetalle->id_pago = $model->id_pago;
                            $pagoDetalle->id_tipo_pago = $model->id_tipo_pago;
                            if($_POST['tipo'] == 1){
                                $pagoDetalle->id_competencia = $model->id_copetencia;
                            }else{
                                $pagoDetalle->id_categoria = $model->id_copetencia;
                            }
                            $pagoDetalle->id_usuario = $id_usuario_eR;
                            $pagoDetalle->id_usuario_registro = Yii::app()->user->id_usuario_sistema;
                            $pagoDetalle->items = $pagoD;
                            $pagoDetalle->monto = $acumulador;	
                            if($pagoDetalle->save()){
//                                die("Exitoso");
                            }else{
                                print_r($pagoDetalle->getErrors());
                                die();
                            }
                        }
                    }
                }
//                die("Exitoso");

                

                $this->redirect(array('view','id'=>$model->id_pago));   
//                header("Location: ".Yii::app()->baseUrl.'/pago/create/'.$id.'?tipo=1');
            }else{
                print_r($model->getErrors());
                die();
            }
           
        }

        $this->render('create',array(
        'model'=>$model, 'id'=>$id, 'tipo'=>$tipo,
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

        if(isset($_POST['Pago']))
        {
            $model->attributes=$_POST['Pago'];
            $rnd = rand(0,9999);  // generate random number between 0-9999
            $uploadedFile=CUploadedFile::getInstance($model,'img');
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->img = $fileName;
            if($model->save()){
                $uploadedFile->saveAs(YiiBase::getPathOfAlias("webroot").'/images/pago/'.$fileName);  // image will uplode to rootDirectory/banner/
            }
            $this->redirect(array('view','id'=>$model->id_pago));
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
//$dataProvider=  new CActiveDataProvider('Pago'); //Pago::model()->findAll('id_usuario ='.Yii::app()->user->id_usuario_sistema.' OR id_usuario_pagador ='.Yii::app()->user->id_usuario_sistema);
$criteria=new CDbCriteria;
$criteria->addCondition('id_usuario ='.Yii::app()->user->id_usuario_sistema.' OR id_usuario_pagador ='.Yii::app()->user->id_usuario_sistema);
$dataProvider = new CActiveDataProvider('Pago',array('criteria'=>$criteria,));
//$dataProvider = new Pago::model()->findAll();
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

public function actionPagoPaypal(){
   $this->render('_pagoPaypal',array());
}

public function actionReportePago(){

    if($_POST['idPago'] == 00){
        Yii::app()->db->createCommand("UPDATE pago SET id_pago_estatus = '2', fecha_pagado = '".date('Y-m-d H:i:s')."' WHERE id_tipo_pago = 2 AND id_inscripcion is not null AND id_usuario_pagador = ".Yii::app()->user->id_usuario_sistema.";")->query();
    }else{
        $id = $_POST['idPago'];
        $model=$this->loadModel($id);
        $model->attributes=$_POST['idPago'];
        $model->fecha_pagado = date('Y-m-d H:i:s');
        $model->id_pago_estatus = 2;
        $model->save();
    }

    $this->redirect(array('index'));

}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Pago('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Pago']))
$model->attributes=$_GET['Pago'];

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
$model=Pago::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='pago-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
?>
