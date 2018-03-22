<?php

class OrdenesConsolidacionesController extends Controller
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
'actions'=>array('create','update', 'findoOrden', 'Elemento'),
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

public function actionElemento(){
    $id_tipo = $_GET['tipo'];
    if (isset($_GET['term'])) {
        if($id_tipo == 1){
            
            $ordenes = $_GET['orden'];
            if($ordenes){
                $ordenes = explode("/", $ordenes);
                $whereOrden = "";
                for($i=0; $i<=count($ordenes); $i++){
                    if($ordenes[$i]){
                        $whereOrden .=" AND t.id_orden !=".$ordenes[$i]; 
                    }
                    
                }
            }
            $criteria =new CDbCriteria;
            $criteria->join = 'LEFT JOIN `manifiesto-ordenes-bulto-loading` b ON (t.id_orden = b.id_orden)';
            $criteria->addCondition('t.ware_reciept like "%'.$_GET['term'].'%" AND t.status = 1 AND t.instrucciones = 2 AND b.id_orden is null '.$whereOrden);
            
            
            $data = Ordenes::model()->findAll($criteria);
            echo CJSON::encode($data);
        }
        if($id_tipo == 2){
            
            $consolidaciones = $_GET['consolidacion'];
            if($consolidaciones){
                $consolidaciones = explode("/", $consolidaciones);
                $whereConsolidacion = "";
                for($i=0; $i<=count($consolidaciones); $i++){
                    if($consolidaciones[$i]){
                        $whereConsolidacion .=" AND t.id_con !=".$consolidaciones[$i]; 
                    }
                    
                }
            }
            
            $criteria =new CDbCriteria;
            $criteria->join = 'LEFT JOIN `manifiesto-ordenes-bulto-loading` b ON (t.id_con = b.id_con)';
            $criteria->addCondition('t.ware_reciept like "%'.$_GET['term'].'%" AND t.status = 1 AND t.instruccion = 2 AND b.id_con is null '.$whereOrden);
            
            //'ware_reciept like "%'.$_GET['term'].'%" AND status = 1 AND instruccion = 2 '.$whereConsolidacion
            $data = Consolidaciones::model()->findAll($criteria);
            echo CJSON::encode($data);
        }
    }
    
    
    
    Yii::app()->end();
}

public function actionFindoOrden(){
    $id_elemento = $_POST['tipo'];
    $elemento = $_POST['id'];
    if($id_elemento == 1){
        $tipo = "Orden";
        $data = Ordenes::model()->find("`ware_reciept` LIKE '".$elemento."' AND status = 1 AND instrucciones = 2 ");
        if($data){
            $cliente = Clientes::model()->find("code_cliente like '".$data->code_cliente."'");
            ?>
            <input type="hidden" id="idOrden" value="<?php echo $data->id_orden; ?>">
            <input type="hidden" id="Orden" value="<?php echo $data->ware_reciept; ?>">
            <input type="hidden" id="Ordenpeso" value="<?php echo $data->peso; ?>">
            <input type="hidden" id="OrdenCliente" value="<?php echo $cliente->nombre; ?>">
            <?php
        }
    }
    if($id_elemento == 2){
        $tipo = "Consolidación";
        $data = Consolidaciones::model()->find("`ware_reciept` LIKE '".$elemento."' AND status = 1 AND `instruccion`  = 2 ");
        if($data){
            $cliente = Clientes::model()->find('id_cliente ='.$data->id_cliente);
            ?>
            <input type="hidden" id="idConsolidacion" value="<?php echo $data->id_con; ?>">
            <input type="hidden" id="Consolidacion" value="<?php echo $data->ware_reciept; ?>">
            <input type="hidden" id="Consolidacionpeso" value="<?php echo $data->peso; ?>">
            <input type="hidden" id="ConsolidacionCliente" value="<?php echo $cliente->nombre; ?>">
            <?php
        }
    }
    if($data){
        ?>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <div class="alert alert-info">
                        <?php echo $tipo;?>:&nbsp;<?php echo $data->ware_reciept;?><br>
                        <?php
                            if($cliente){
                                ?>
                                Cliente:&nbsp;<?php echo $cliente->nombre;?>
                                <?php 
                            }
                        ?>
                        <br>Peso:&nbsp;<?php echo $data->peso;?>
                        <center>
                            <button id="btAgregarOrden" onclick="addNewElemento(<?php echo $id_elemento; ?>)" type="button" class="btn btn-default">
                                Agregar
                            </button>
                        </center>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        <?php
    }else{
        ?><div class="alert alert-danger">No se encontraron elementos</div><?php
    }
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
$model=new OrdenesConsolidaciones;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['OrdenesConsolidaciones']))
{
$model->attributes=$_POST['OrdenesConsolidaciones'];
if($model->save())
$this->redirect(array('view','id'=>$model->id));
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

if(isset($_POST['OrdenesConsolidaciones']))
{
$model->attributes=$_POST['OrdenesConsolidaciones'];
if($model->save())
$this->redirect(array('view','id'=>$model->id));
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
$dataProvider=new CActiveDataProvider('OrdenesConsolidaciones');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new OrdenesConsolidaciones('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['OrdenesConsolidaciones']))
$model->attributes=$_GET['OrdenesConsolidaciones'];

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
$model=OrdenesConsolidaciones::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='ordenes-consolidaciones-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
