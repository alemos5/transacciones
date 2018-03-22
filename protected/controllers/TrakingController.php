<?php

class TrakingController extends Controller
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
    $model=new Traking;

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if(isset($_POST['Traking']))
    {
    $model->attributes=$_POST['Traking'];
    $model->id_usuario = Yii::app()->user->id_usuario_sistema;
    $model->fecha = date('Y-m-d H:i:s');

    if($model->save()){
        
        $prealerta = OrdenesCliente::model()->find("tracking LIKE '".$model->traking."'");
        if(count($prealerta) > 0){
        
            
             Yii::app()->db->createCommand("UPDATE ordenes_cliente SET observacion = 'En almacen' where id_orden_cli =".$prealerta->id_orden_cli)->query();
            $usuario = Usuario::model()->find('id_cliente ='.$prealerta->id_cli);
        
            $message = new YiiMailMessage;        

            $message->subject = __('Te lo Compro en Usa');
    //        $message->view ='prueba';//nombre de la vista q conformara el mail

    //        $message->etBody($params, 'text/html');



            $body = '

            <html>
            <head>
            <title>HTML Editor - Full Version</title>
            <style>
            .btn {
              background: #34bdd9;
              background-image: -webkit-linear-gradient(top, #34bdd9, #2bb8af);
              background-image: -moz-linear-gradient(top, #34bdd9, #2bb8af);
              background-image: -ms-linear-gradient(top, #34bdd9, #2bb8af);
              background-image: -o-linear-gradient(top, #34bdd9, #2bb8af);
              background-image: linear-gradient(to bottom, #34bdd9, #2bb8af);
              -webkit-border-radius: 28;
              -moz-border-radius: 28;
              border-radius: 28px;
              font-family: Arial;
              color: #ffffff;
              font-size: 20px;
              padding: 10px 20px 10px 20px;
              text-decoration: none;
            }

            .btn:hover {
              background: #3cb0fd;
              background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
              background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
              background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
              background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
              background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
              text-decoration: none;
            }
            </style>
    </head>
    <body>
    <table align="center" border="0" cellpadding="1" cellspacing="1" height="246" width="932">
            <tbody>
                    <tr>

                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td><center><img src="https://telocomproenusa.com/controlcourier/images/logo.png"></center></td></tr>
                    <tr>
                            <td>
                            <style type="text/css">p { margin-bottom: 0.25cm; line-height: 120%; }
                            </style>

                            <p style="margin-bottom: 0cm; line-height: 100%; text-align: center;"> 
                             Hemos recibido en nuestro almacén el paquete que Pre-alertaste con el numero de tracking :
                            <br>
                            <center><h2>'.$model->traking.'</h2></center>
                            </p>
                            <style type="text/css">p { margin-bottom: 0.25cm; line-height: 120%; }
                            
                            </style>
                            <br>Descripción: '.$prealerta->descripcion.'
                            </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                        <td>
                        <hr><br>
                        <center>'.__('Te lo Compro en Usa').'<br />
                        <span><b>2018 - 2019 | &copy; Te lo Compro en Usa | NIC: xxxxx</b></span></center>
                        </td>
                    </tr>

                    <tr><td>&nbsp;</td></tr>
                    <tr>

                    </tr>
            </tbody>
    </table>

    <p>&nbsp;</p>
    </body>
    </html>


                    ';



            $message->setBody($body,'text/html');//codificar el html de la vista
            $message->from =('logistico@Telocomproenusa.com'); // alias del q envia
            $message->setTo($usuario->correo); // a quien se le envia
            Yii::app()->mail->send($message);
        
        
        }
        
//        $this->redirect(array('view','id'=>$model->id_traking));
        $this->redirect('create');
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

if(isset($_POST['Traking']))
{
$model->attributes=$_POST['Traking'];
$model->id_usuario = Yii::app()->user->id_usuario_sistema;
$model->fecha = date('Y-m-d H:i:s');
if($model->save()){
    $this->redirect(array('view','id'=>$model->id_traking));
    
    $prealerta = OrdenesCliente::model()->find("tracking LIKE '".$model->traking."' ");
        if($prealerta){
            
            $usuario = Usuario::model()->find('id_cliente ='.$prealerta->id_cli);
        
        $message = new YiiMailMessage;        

            $message->subject = __('Te lo Compro en Usa');
    //        $message->view ='prueba';//nombre de la vista q conformara el mail

    //        $message->etBody($params, 'text/html');



            $body = '

            <html>
            <head>
            <title>HTML Editor - Full Version</title>
            <style>
            .btn {
              background: #34bdd9;
              background-image: -webkit-linear-gradient(top, #34bdd9, #2bb8af);
              background-image: -moz-linear-gradient(top, #34bdd9, #2bb8af);
              background-image: -ms-linear-gradient(top, #34bdd9, #2bb8af);
              background-image: -o-linear-gradient(top, #34bdd9, #2bb8af);
              background-image: linear-gradient(to bottom, #34bdd9, #2bb8af);
              -webkit-border-radius: 28;
              -moz-border-radius: 28;
              border-radius: 28px;
              font-family: Arial;
              color: #ffffff;
              font-size: 20px;
              padding: 10px 20px 10px 20px;
              text-decoration: none;
            }

            .btn:hover {
              background: #3cb0fd;
              background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
              background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
              background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
              background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
              background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
              text-decoration: none;
            }
            </style>
    </head>
    <body>
    <table align="center" border="0" cellpadding="1" cellspacing="1" height="246" width="932">
            <tbody>
                    <tr>

                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td><center><img src="https://telocomproenusa.com/controlcourier/images/logo.png"></center></td></tr>
                    <tr>
                            <td>
                            <style type="text/css">p { margin-bottom: 0.25cm; line-height: 120%; }
                            </style>

                            <p style="margin-bottom: 0cm; line-height: 100%; text-align: center;"> 
                             Hemos recibido en nuestro almacén el paquete que Pre-alertaste con el numero de tracking :
                            <br>
                            <center><h2>'.$model->traking.'</h2></center>
                            </p>
                            <style type="text/css">p { margin-bottom: 0.25cm; line-height: 120%; }
                            
                            </style>
                            <br>Descripción: '.$prealerta->descripcion.'
                            </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                        <td>
                        <hr><br>
                        <center>'.__('Te lo Compro en Usa').'<br />
                        <span><b>2018 - 2019 | &copy; Te lo Compro en Usa | NIC: xxxxx</b></span></center>
                        </td>
                    </tr>

                    <tr><td>&nbsp;</td></tr>
                    <tr>

                    </tr>
            </tbody>
    </table>

    <p>&nbsp;</p>
    </body>
    </html>


                    ';



            $message->setBody($body,'text/html');//codificar el html de la vista
            $message->from =('logistico@Telocomproenusa.com'); // alias del q envia
            $message->setTo($usuario->correo); // a quien se le envia
            Yii::app()->mail->send($message);
        
        
        }
    
    
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
    $criteria=new CDbCriteria;
    $criteria->order = 'id_traking DESC';
    $dataProvider = new CActiveDataProvider('Traking',array('criteria'=>$criteria,));    
    
//$dataProvider=new CActiveDataProvider('Traking');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Traking('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Traking']))
$model->attributes=$_GET['Traking'];

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
$model=Traking::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='traking-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
