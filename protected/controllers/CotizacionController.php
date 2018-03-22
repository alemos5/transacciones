<?php

class CotizacionController extends Controller
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
        $model=new Cotizacion;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Cotizacion']))
        {
            
            $model->attributes=$_POST['Cotizacion'];
            $model->n_cotizacion = 'Cot-'.date('Y-m-d')."-".Yii::app()->user->id_usuario_sistema.'-'.rand(5, 15);
            $model->id_usuario_cotizacion = Yii::app()->user->id_usuario_sistema;
            $model->id_usuario_registro = Yii::app()->user->id_usuario_sistema;
            $model->id_usuario_modificacion = Yii::app()->user->id_usuario_sistema;
            $model->fecha_registro = date('Y-m-d H:i:s');
            $model->id_estatus_cotizacion = 1;
            $model->porcentaje_impuesto=0.00;
            $model->monto_impuesto=0.00;
            $model->monto_total= 0.00;
            
            
            $total = 0;
            if($model->save()){
                if($_POST['nextRowParticipante'] > 0) {
                    //die();
                    $totalImpuesto = 0;
                    for($i=0; $i < $_POST['countRowParticipante']; $i++) {
                        if($_POST['idServicio'.$i]){
                            $cotizacionDetalle = new CotizacionDetalle;
                            $cotizacionDetalle->id_cotizacion = $model->id_cotizacion;
                            $cotizacionDetalle->id_empresa = $_POST['AddItemsImpuestoEmpresa'.$i];
                            $cotizacionDetalle->id_servicio = $_POST['idServicio'.$i];
                            $cotizacionDetalle->cant_servicio = $_POST['CantidadCotizar'.$i];
                            
                            //==============================================================//
                            // Calculo del Servicio
                            //==============================================================//
                            
                            $servicioEspecial = ServicioUsuario::model()->find('id_servicio ='.$_POST['idServicio'.$i].' AND id_usuario ='.Yii::app()->user->id_usuario_sistema);
                            if($servicioEspecial){
                                $precioUnitario = $servicioEspecial->costo_especial;
                            }else{
                                $servicio = Servicio::model()->find('id_servicio = '.$_POST['idServicio'.$i]);
                                $precioUnitario = $servicio->precio_sugerido;
                            }
                            $cotizacionDetalle->precio_unitario = $precioUnitario;
                            $cotizacionDetalle->precio_total = $precioUnitario * $_POST['CantidadCotizar'.$i];
                            
                            //==============================================================//
                            
                            $cotizacionDetalle->estatus = 1; 
                            if($cotizacionDetalle->save()){
                                
                                //=======================================================//
                                // Registrar valor total
                                //=======================================================//
                                
                                $total +=  $cotizacionDetalle->precio_total;
                                
                                
                            }else{
                                echo "Error en registro de detalle cotización<hr>";
                                print_r($cotizacionDetalle->getErrors());
                                die();
                            }
                        }
                    }
                    
                    //=======================================================//
                    // Actualizar valor monto 
                    //=======================================================//
                    
                    if($total > 200){
                        $impuesto = 19.00;
                    }
                    if($total < 200){
                        $impuesto = 10.00;
                    }

                    $monto_impuesto = ($total*$impuesto)/100;
                    $monto_total = $total + $monto_impuesto; 
                    Yii::app()->db->createCommand("UPDATE `cotizacion` SET "
                            . "`porcentaje_impuesto` = '".number_format($impuesto, 2, '.', '')."', "
                            . "`monto_impuesto` = '".number_format($monto_impuesto, 2, '.', '')."', "
                            . "`monto_total` = '".number_format($monto_total, 2, '.', '')."' "
                            . "WHERE `id_cotizacion` = ".$model->id_cotizacion.";")->query();
                    
                }
            }else{
                echo "Error al registrar<hr>";
                print_r($model->getErrors());
                die();
            }
            $this->redirect(array('view','id'=>$model->id_cotizacion));
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
        $cotizacionForm = new CotizacionDetalle;
        $cotizacionDetalle = CotizacionDetalle::model()->findAll('id_cotizacion ='.$id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Cotizacion']))
        {
            $model->attributes=$_POST['Cotizacion'];
//            echo var_dump($_POST); die();
            $model->porcentaje_impuesto=0.00;
            $model->monto_impuesto=0.00;
            $model->monto_total= 0.00;
            $total = 0;
            if($model->save()){
                $cotizacionDetalle = CotizacionDetalle::model()->deleteAll('id_cotizacion ='.$id);
                if($_POST['nextRowParticipante'] > 0) {
                    //die();
                    $totalImpuesto = 0;
                    
                    for($i=0; $i < $_POST['countRowParticipante']; $i++) {
                        if($_POST['idServicio'.$i]){
                            $cotizacionDetalle = new CotizacionDetalle;
                            $cotizacionDetalle->id_cotizacion = $model->id_cotizacion;
                            $cotizacionDetalle->id_empresa = $_POST['AddItemsImpuestoEmpresa'.$i];
                            $cotizacionDetalle->id_servicio = $_POST['idServicio'.$i];
                            $cotizacionDetalle->cant_servicio = $_POST['CantidadCotizar'.$i];
                            
                            //==============================================================//
                            // Calculo del Servicio
                            //==============================================================//
                            
                            $servicioEspecial = ServicioUsuario::model()->find('id_servicio ='.$_POST['idServicio'.$i].' AND id_usuario ='.Yii::app()->user->id_usuario_sistema);
                            if($servicioEspecial){
                                $precioUnitario = $servicioEspecial->costo_especial;
                            }else{
                                $servicio = Servicio::model()->find('id_servicio = '.$_POST['idServicio'.$i]);
                                $precioUnitario = $servicio->precio_sugerido;
                            }
                            $cotizacionDetalle->precio_unitario = $precioUnitario;
                            $cotizacionDetalle->precio_total = $precioUnitario * $_POST['CantidadCotizar'.$i];
                            
                            //==============================================================//
                            
                            $cotizacionDetalle->estatus = 1; 
                            if($cotizacionDetalle->save()){
                                
                                //=======================================================//
                                // Registrar valor total
                                //=======================================================//
                                
                                $total +=  $cotizacionDetalle->precio_total;
                                
                                
                            }else{
                                echo "Error en registro de detalle cotización<hr>";
                                print_r($cotizacionDetalle->getErrors());
                                die();
                            }
                        }
                    }
                    
                    
                    //=======================================================//
                    // Actualizar valor monto 
                    //=======================================================//
                    
                    if($total > 200){
                        $impuesto = 19.00;
                    }
                    if($total < 200){
                        $impuesto = 10.00;
                    }

                    $monto_impuesto = ($total*$impuesto)/100;
                    $monto_total = $total + $monto_impuesto; 
                    Yii::app()->db->createCommand("UPDATE `cotizacion` SET "
                            . "`porcentaje_impuesto` = '".number_format($impuesto, 2, '.', '')."', "
                            . "`monto_impuesto` = '".number_format($monto_impuesto, 2, '.', '')."', "
                            . "`monto_total` = '".number_format($monto_total, 2, '.', '')."' "
                            . "WHERE `id_cotizacion` = ".$model->id_cotizacion.";")->query();
                    
                    
                }
                
                
                
            }else{
                echo "Error en registro de detalle cotización<hr>";
                print_r($model->getErrors());
                die();
            }
            $this->redirect(array('view','id'=>$model->id_cotizacion));
        }

        $this->render('update',array(
        'model'=>$model, 'cotizacionDetalle'=>$cotizacionDetalle, 'cotizacionForm'=>$cotizacionForm
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
$dataProvider=new CActiveDataProvider('Cotizacion');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Cotizacion('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Cotizacion']))
$model->attributes=$_GET['Cotizacion'];

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
$model=Cotizacion::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='cotizacion-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
