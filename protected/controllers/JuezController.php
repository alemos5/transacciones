<?php

class JuezController extends Controller
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
'actions'=>array('create','update', 'ronda', 'calificacion', 'listadoGeneral', 'calificacionInscripcion', 'calificacionPersonal'),
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

public function actionCalificacionInscripcion(){
    
    $count = 20;
    $errores = 0;
    $subtotal = 0;
    for($i=0; $i<= $count; $i++){
        if($_POST['itemsCalificacion'.$i]){
            $calificacion = new Calificacion;
            $calificacion->id_categoria_item_calificacion = $_POST['itemsCalificacion'.$i];
            $calificacion->rango_min = 0;
            $calificacion->rango_max = $_POST['amount'.$i];
            
            //===============================================================//
            // Sumatoria de la calificaion
            //===============================================================//
            $subtotal = $subtotal+$_POST['amount'.$i];
            
            //===============================================================//
            
            $calificacion->id_juez = Yii::app()->user->id_usuario_sistema;
            $calificacion->id_inscripcion = $_POST['inscripcion'];
            $calificacion->fecha_registro = date('Y-m-d H:i:s');
            
            
            
            if($calificacion->save()){

            }else{
                print_r($calificacion->getErrors());
                die();
            }
        }
        if($_POST['error'.$i] || $_POST['error'.$i] != 'false'){
           $errores += $_POST['error'.$i];     
        }
    }
    $total = 0;
    $inscripcion = Inscripcion::model()->findByPk($_POST['inscripcion']);
    $total = $inscripcion->calificacion_final;
    $inscripcion->attributes=$_POST['inscripcion'];
    $inscripcion->calificacion = 1;
    $inscripcion->error = $errores;
    $inscripcion->calificacion_final = $total + $subtotal;
    if($inscripcion->save()){
        $juezInscripcion = new JuezInscripcion;
        $juezInscripcion->id_inscripcion = $_POST['inscripcion'];;
        $juezInscripcion->id_juez = Yii::app()->user->id_usuario_sistema;
        $juezInscripcion->save();
    }else{
        print_r($inscripcion->getErrors());
        die();
    }

    ##ENVIO DE CORREO NOTIFICACION DE PUNTUACION
    $usuariojuez = Usuario::model()->findByPk(Yii::app()->user->id_usuario_sistema);
    $usuario = Usuario::model()->findByPk($inscripcion->id_usuario);

    $message = new YiiMailMessage;

    $message->subject = __('WIN Qualify / Competition  - Online Competition System');


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
		<tr><td><center><img src="http://www.appwin.net/images/logo.png"></center></td></tr>
		<tr>
			<td>
			<style type="text/css">p { margin-bottom: 0.25cm; line-height: 120%; }
			</style>
                        
			<p style="margin-bottom: 0cm; line-height: 100%; text-align: center;"> 
                        '.__('Below we present the summary of the rating assigned by you').'
                        </p>
			<style type="text/css">p { margin-bottom: 0.25cm; line-height: 120%; }
			</style>
			</td>
		</tr>
		<tr>
		    <td>
		    <br>
		    <br>
		        <table style="width: 70%">
		            <tr>
                        <th colspan="2">'.__('SUMMARY').'</th>
                    </tr>
                    <tr>
                        <th style="text-align: right">'.__('Judge').'</th>
                        <td style="text-align: left">'.$usuariojuez->primer_nombre.' '.$usuariojuez->primer_apellido.'</td>
		            </tr>
                    <tr>
                        <th style="text-align: right">'.__('Inscription').'</th>
                        <td style="text-align: left">'.$inscripcion->id_inscripcion.'</td>
                    </tr>
                    <tr>
                        <th style="text-align: right">'.__('Identification').'</th>
                        <td style="text-align: left">'.$usuario->cedula.'</td>
		            </tr>
                    <tr>
                        <th style="text-align: right">'.__('User').'</th>
                        <td style="text-align: left">'.$usuario->primer_nombre.' '.$usuario->primer_apellido.'</td>
		            </tr>
                    <tr>
                        <th style="text-align: right">'.__('Email').'</th>
                        <td style="text-align: left">'.$usuario->correo.'</td>
		            </tr>
		            <tr>
                        <th style="text-align: right">'.__('Qualification').'</th>
                        <td style="text-align: left">'.$inscripcion->calificacion.'</td>
		            </tr>
		            <tr>
                        <th style="text-align: right">'.__('Errors').'</th>
                        <td style="text-align: left">'.$inscripcion->error.'</td>
		            </tr>
		            <tr>
                        <th style="text-align: right">'.__('Final Qualification').'</th>
                        <td style="text-align: left">'.$inscripcion->calificacion_final.'</td>
		            </tr>
                </table>
            </td>
        </tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
                    <td>
                    <hr><br>
                    <center>'.__('WIN - Online Competition System').'<br />
	            <span><b>2017 - 2018 | &copy; WIN | NIC: xxxxx</b></span></center>
                    </td>
                </tr>

		<tr><td>&nbsp;</td></tr>
		<tr>
			
		</tr>
	</tbody>
</table>

<p>&nbsp;</p>
</body>
</html>';


    $message->setBody($body,'text/html');//codificar el html de la vista
    $message->from =('apartadovirtual@ipostel.gob.ve'); // alias del q envia
    $message->setTo($usuariojuez->correo); // a quien se le envia
    Yii::app()->mail->send($message);


}

public function actionCalificacion(){
    $this->render('calificacion',array(
    
    ));
}

public function actionRonda(){
    $this->render('ronda',array(
    
    ));
}

public function actionCalificacionPersonal(){
    $calificaciones = Calificacion::model()->findAll('id_juez ='.Yii::app()->user->id_usuario_sistema);
    ?>
    <table id="example3" class="table table-hover">
        <thead>
            <tr>
                <td><center><strong><?php echo __('Competition'); ?></strong></center></td>
                <td><center><strong><?php echo __('Category'); ?></strong></center></td>
                <td><center><strong><?php echo __('Participants'); ?></strong></center></td>
                <td><center><strong><?php echo __('Rating items'); ?></strong></center></td>
                <td><center><strong><?php echo __('Scores'); ?></strong></center></td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($calificaciones as $calificacion){
                
                ?>
                <tr>
                    <td>
                        <center><?php echo $calificacion->idInscripcion->idCopetencia->competencia; ?></center>
                    </td>
                    <td>
                        <center><?php echo $calificacion->idInscripcion->idCategoria->categoria; ?></center>
                    </td>
                    <td>
                        <?php 
                            $participantes = Participante::model()->findAll('id_inscripcion ='.$calificacion->id_inscripcion);
                            if(count($participantes) != 0){
                                ?><ul><?php
                                foreach ($participantes as $participante){
                                    ?><li><?php echo $participante->idUsuario->primer_nombre." ".$participante->idUsuario->primer_apellido; ?></li><?php
                                }
                                ?></ul><?php
                            }else{
                                echo "0 participantes";
                            }
                        ?>
                    </td>
                    <td>
                        <center><?php echo $calificacion->idItems->item_calificacion; ?></center>
                    </td>
                    <td>
                        <center><?php echo $calificacion->rango_max; ?></center>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}

public function actionListadoGeneral($id_copetencia = Null, $id_categoria = Null)
{
//    echo var_dump($_GET); die();
    $id_copetencia = $_GET['idc'];
    $id_categoria = $_GET['idca_'];
    $idInscripcion = $_GET['idInscripcion'];
    $idInscripcionA = $_GET['idInscripcionAnterior'];
    if($idInscripcion){
        $idInscripcionAnterior = $idInscripcion;
        $inscripcion=Inscripcion::model()->findByPk($idInscripcion);
        $inscripcion->attributes=$_POST['idInscripcion'];
        $inscripcion->reproducida = 1;
        if($inscripcion->save()){
            $categoria = $inscripcion->id_categoria;
            $inscripcionTotal = Inscripcion::model()->findAll('id_categoria ='.$categoria);
            $countInscripciones = Inscripcion::model()->findAll('id_categoria ='.$categoria.' AND reproducida = 1');
            if($inscripcionTotal == $countInscripciones){
                Yii::app()->db->createCommand("UPDATE competencia_categoria SET reproducida = 1 WHERE id_copetencia = ".$id_copetencia." AND id_categoria =".$categoria)->query();
            }
        }else{
            print_r($inscripcion->getErrors());
            die();
        }
    }
    if($idInscripcionA){
        $inscripcion=Inscripcion::model()->findByPk($idInscripcionA);
        $inscripcion->attributes=$_POST['idInscripcionAnterior'];
        $inscripcion->reproducida = 0;
        if($inscripcion->save()){
            
        }else{
            print_r("Atras: ".$inscripcion->getErrors());
            die();
        }
    }
    //$dataProvider=new CActiveDataProvider('Dj');
    $categorias = CompetenciaCategoria::model()->findAll('id_copetencia ='.$id_copetencia.' AND reproducida = 0 ORDER BY orden ASC');
    
    $this->render('_listado_general',array(
    'id_copetencia'=>$id_copetencia, 'id_categoria'=>$id_categoria, 'categorias'=>$categorias, 'idInscripcionAnterior'=>$idInscripcionAnterior
    ));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new Juez;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);


//echo var_dump($_POST); die();
if(isset($_POST['Juez']))
{
    $model->attributes=$_POST['Juez'];
    $model->fecha_registro = date('Y-m-d H:i:s');
    if($model->save()){
        
        
        $usuario= Usuario::model()->findByPk($model->id_usuario_sistema);
        $usuario->attributes=$model->id_usuario_sistema;
        $usuario->id_perfil_sistema = 7;
        $usuario->save();        
        
        if (count($_POST['group_id_list'] > 0)){
            
            for($i=0; $i < count($_POST['group_id_list']); $i++) {
                $juezRonda = new JuezRonda;
                $juezRonda->id_juez = $model->id_usuario_sistema;
                $juezRonda->id_ronda = $_POST['group_id_list'][$i];
                if($juezRonda->save()){
//                                die("Exitoso");
                }else{
                    print_r($juezRonda->getErrors());
                    die();
                }
            }
        }
        if (count($_POST['group_id_list2'] > 0)){
            for($i=0; $i < count($_POST['group_id_list2']); $i++) {
                $juezCategoria = new JuezCategoria;
                $juezCategoria->id_juez = $model->id_usuario_sistema;
                $juezCategoria->id_competencia = $model->id_competencia;
                $juezCategoria->id_categoria = $_POST['group_id_list2'][$i];
                if($juezCategoria->save()){
//                                die("Exitoso");
                }else{
                    print_r($juezCategoria->getErrors());
                    die();
                }
            }
        }
        if (count($_POST['group_id_list3'] > 0)){
            for($i=0; $i < count($_POST['group_id_list3']); $i++) {
                $juezItems = new JuezItemCalificacion;
                $juezItems->id_juez = $model->id_usuario_sistema;
                $juezItems->id_item_calificacion = $_POST['group_id_list3'][$i];
                if($juezItems->save()){
//                                die("Exitoso");
                }else{
                    print_r($juezItems->getErrors());
                    die();
                }
            }
        }
        $this->redirect(array('view','id'=>$model->id_juez));
    }
}

$this->render('create',array(
'model'=>$model, 'rondas'=>$rondas
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

    
//    echo count($_POST['group_id_list2']); die();
    
    if(isset($_POST['Juez']))
    {
        $model->attributes=$_POST['Juez'];
        $model->fecha_registro = date('Y-m-d H:i:s');
        if($model->save()){
            
            $usuario= Usuario::model()->findByPk($model->id_usuario_sistema);
            $usuario->attributes=$model->id_usuario_sistema;
            $usuario->id_perfil_sistema = 7;
            $usuario->save(); 
            
            
            if($_POST['group_id_list']){
                
                if (count($_POST['group_id_list'] > 0)){
//                    JuezRonda::model()->deleteAll('id_juez ='.$id);
                    for($i=0; $i < count($_POST['group_id_list']); $i++) {
                        $juezRonda = new JuezRonda;
                        $juezRonda->id_juez = $model->id_juez;
                        $juezRonda->id_ronda = $_POST['group_id_list'][$i];
                        if($juezRonda->save()){
        //                                die("Exitoso");
                        }else{
                            print_r($juezRonda->getErrors());
                            die();
                        }
                    }
                }
            }
            if($_POST['group_id_list2']){
                if (count($_POST['group_id_list2'] > 0)){
//                    JuezCategoria::model()->deleteAll('id_juez ='.$id);
                    for($i=0; $i < count($_POST['group_id_list2']); $i++) {
                        $juezCategoria = new JuezCategoria;
                        $juezCategoria->id_juez = $model->id_juez;
                        $juezCategoria->id_competencia = $model->id_competencia;
                        $juezCategoria->id_categoria = $_POST['group_id_list2'][$i];
                        if($juezCategoria->save()){
        //                                die("Exitoso");
                        }else{
                            print_r($juezCategoria->getErrors());
                            die();
                        }
                    }
                }
            }
            if($_POST['group_id_list3']){
                if (count($_POST['group_id_list3'] > 0)){
//                    JuezItemCalificacion::model()->deleteAll('id_juez ='.$id);
                    for($i=0; $i < count($_POST['group_id_list3']); $i++) {
                        $juezItems = new JuezItemCalificacion;
                        $juezItems->id_juez = $model->id_juez;
                        $juezItems->id_item_calificacion = $_POST['group_id_list3'][$i];
                        if($juezItems->save()){
        //                                die("Exitoso");
                        }else{
                            print_r($juezItems->getErrors());
                            die();
                        }
                    }
                }
            }
            
            $this->redirect(array('view','id'=>$model->id_juez));
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
$dataProvider=new CActiveDataProvider('Juez');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Juez('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Juez']))
$model->attributes=$_GET['Juez'];

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
$model=Juez::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='juez-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
