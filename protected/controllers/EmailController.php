<?php

class EmailController extends Controller
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
'actions'=>array('index','view', 'emailTodos'),
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

//====================================================================================================================//
// Envio de todos los email de estatus 0 del tipo 1: Manifiesto->cambio de estatus
//====================================================================================================================//

public function actionEmailTodos(){

$emails = Email::model()->findAll('tipo_email = 1 AND estatus = 0');

    $correo = 0;
    foreach ($emails as $email) {

        $cliente = Clientes::model()->find("code_cliente LIKE '".$email->code_cliente."' ");
        $usuario = $cliente->email;
        $message = new YiiMailMessage;

        $message->subject = __('Te lo Compro en Usa');
        $body = '
        <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body style=" background-color: #E1E1E1; color:#ffffff;line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-bottom:5px;text-align:center">
            <center>
                <table style=" width: 40%;">
                <thead>
                    <tr style="background-color: #FFFFFF;">
                        <td>
                            <br>
                            <center>
                                <img src="https://telocomproenusa.com/transacciones/images/logo.png">
                            </center>
                            <br>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr style="color: #FFF; background-color: #3498DB;">
                        <td>
                            <center>
                                <h1>Cambios de Status</h1>
                            </center>
                            <p style="margin: 20px; line-height: 2;">
                            <center>
                                <h3>Telocomproenusa</h3> 
                                Apreciado cliente: '.$cliente->nombre.'<br>
                                El estado Actual de su paquete ha cambiado,<br>
                                <b>Actualmente:</b><br>
                                '.$email->mensaje.'<br>
                                <b>Estado : '.$email->descripcion.'</b><br>
                                Gracias por elegirnos<br><br>
                                CASILLERO EXPRESS USA
                            </center>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            </center>
    
        </body>
        </html>';

        $message->setBody($body,'text/html');//codificar el html de la vista
        $message->from =('logistico@Telocomproenusa.com'); // alias del q envia
        $message->setTo($usuario); // a quien se le envia
        Yii::app()->mail->send($message);
        Yii::app()->db->createCommand("UPDATE email SET estatus = '1' where id_email =".$email->id_email)->query();
        $correo++;

        echo "<hr>Correo enviado a: ".$usuario;
    }
    echo "<br><hr>Cantidad de correos enviados: ".$correo;
}

//====================================================================================================================//

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
$model=new Email;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Email']))
{
$model->attributes=$_POST['Email'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_email));
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

if(isset($_POST['Email']))
{
$model->attributes=$_POST['Email'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_email));
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
$dataProvider=new CActiveDataProvider('Email');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Email('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Email']))
$model->attributes=$_GET['Email'];

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
$model=Email::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='email-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
