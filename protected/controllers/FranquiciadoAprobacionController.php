<?php

class FranquiciadoAprobacionController extends Controller
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
'actions'=>array('create','update', 'listado'),
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

public function actionlistado(){
    $id_franquiciado_desembolso = $_POST['id_franquiciado_desembolso'];
    $franquiciadoDesembolsos = FranquiciadoAprobacion::model()->findAll('id_franquiciado_desembolso ='.$id_franquiciado_desembolso);
    
    ?>
    <table class="table table-hover table-bordered">
        <thead>
            <tr style="background-color: #ccc;">
                <td><center><strong><?php echo __('Competition'); ?></strong></center></td>
                <td><center><strong><?php echo __('Registration date'); ?></strong></center></td>
                <td><center><strong><?php echo __('Request'); ?></strong></center></td>
                <td><center><strong><?php echo __('Approval date'); ?></strong></center></td>
                <td><center><strong><?php echo __('Status'); ?></strong></center></td>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($franquiciadoDesembolsos as $franquiciadoDesembolso){
                ?>
                <tr>
                    
                    <?php if($i == 0){ ?>
                        <td rowspan="<?php echo count($franquiciadoDesembolsos) ?>"><center><?php echo $franquiciadoDesembolso->idFranquiciadoDesembolso->idCompetencia->competencia; ?></center></td>
                        <td rowspan="<?php echo count($franquiciadoDesembolsos) ?>"><center><?php echo $franquiciadoDesembolso->idFranquiciadoDesembolso->fecha_registro; ?></center></td>
                        <td rowspan="<?php echo count($franquiciadoDesembolsos) ?>"><center><?php echo $franquiciadoDesembolso->idFranquiciadoDesembolso->monto; ?></center></td>
                    <?php } ?>
                    <td>
                        <center>
                            <?php 
                                if($franquiciadoDesembolso->estatus == 0){
                                    echo "-";
                                }else{
                                    echo $franquiciadoDesembolso->fecha_aprobacion; 
                                }
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php 
                            if($franquiciadoDesembolso->id_franquiciado == Yii::app()->user->id_usuario_sistema){
                                if($franquiciadoDesembolso->estatus != 1){
                                    ?>
                                    <button onclick="validar(<?php echo $franquiciadoDesembolso->id_franquiciado_aprobacion; ?>, 1)" type="button" class="btn btn-default">
                                        <?php echo __('Validate'); ?>
                                    </button>
                                    <?php
                                }else{
                                    echo '<font color="green">'.__('Validated').'</font>';
                                }
                            }else{
                                if($franquiciadoDesembolso->estatus == 0){
                                    echo '<font color="red">'.__('By Validate').'</font>';
                                } 
                                if($franquiciadoDesembolso->estatus == 1){
                                    echo '<font color="green">'.__('Validated').'</font>';
                                } 
                            }
                            ?>
                        </center>
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
    <?php
    
    
}

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
$model=new FranquiciadoAprobacion;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['FranquiciadoAprobacion']))
{
$model->attributes=$_POST['FranquiciadoAprobacion'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_franquiciado_aprobacion));
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

if(isset($_POST['FranquiciadoAprobacion']))
{
$model->attributes=$_POST['FranquiciadoAprobacion'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_franquiciado_aprobacion));
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
$dataProvider=new CActiveDataProvider('FranquiciadoAprobacion');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new FranquiciadoAprobacion('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['FranquiciadoAprobacion']))
$model->attributes=$_GET['FranquiciadoAprobacion'];

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
$model=FranquiciadoAprobacion::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='franquiciado-aprobacion-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
