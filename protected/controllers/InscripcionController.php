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
                'actions' => array('index', 'view','qr','findQR','FindIdentificacion'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'validar', 'orden', 'Ronda', 'OrdenValidado', 'validarMusica', 'eliminarInscripcion', 'eliminarParticipacion'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }

public function actionEliminarInscripcion(){
    $id = $_POST['id_inscripcion'];
    Yii::app()->db->createCommand("DELETE FROM `inscripcion` WHERE `id_inscripcion` =".$id)->query();
    Yii::app()->db->createCommand("DELETE FROM `participante` WHERE `id_inscripcion` =".$id)->query();
    Yii::app()->db->createCommand("DELETE FROM `pago` WHERE `id_inscripcion` =".$id)->query();
    Yii::app()->db->createCommand("DELETE FROM `pago_detalle` WHERE `id_inscripcion` =".$id)->query();
}

public function actionEliminarParticipacion(){
    $id = $_POST['id_participante'];
    $id_usuario = $_POST['id_usuario'];
    $id_inscripcion = $_POST['id_inscripcion'];
    Yii::app()->db->createCommand("DELETE FROM `participante` WHERE `id_participante` =".$id)->query();
    Yii::app()->db->createCommand("DELETE FROM `pago_detalle` WHERE `id_inscripcion` =".$id_inscripcion." AND id_usuario =".$id_usuario)->query();
}


public function actionOrdenValidado()
{
    $id_copetencia = $_POST['id_copetencia'];
    $id_categoria = $_POST['id_categoria'];
    $id_inscripcion = $_POST['id'];
    $valor = $_POST['valor'];
    $validado = $_POST['validado'];
    $todo = $_POST['todo'];
    
    if($todo == 1){
        if($id_inscripcion){
            $model=$this->loadModel($id_inscripcion);
            $model->attributes=$_POST['id'];
            $model->orden = $valor;
            $model->validado = $validado;
            $model->save();
        }
        
    }
    
    if($todo == 2){
        Yii::app()->db->createCommand("UPDATE `inscripcion` SET `validado` = ".$validado." WHERE `id_copetencia` = ".$id_copetencia.";")->query();
    }
    if($todo == 3){
        Yii::app()->db->createCommand("UPDATE `inscripcion` SET `validado` = ".$validado." WHERE `id_copetencia` = ".$id_copetencia." AND id_categoria = ".$id_categoria.";")->query();
    }
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

public function actionOrden()
{
    $id_inscripcion = $_POST['id'];
    $valor = $_POST['valor'];
//    echo "Aqui";
    if($id_inscripcion){
        $model=$this->loadModel($id_inscripcion);
        $model->attributes=$_POST['id'];
        $model->orden = $valor;
        $model->save();
    }
}

public function actionRonda()
{
    $id_inscripcion = $_POST['id_inscripcion'];
    $ronda = $_POST['ronda'];
//    echo $id_inscripcion." / ".$ronda;
//    die();
//    echo "Aqui";
    if($id_inscripcion){
        Yii::app()->db->createCommand("UPDATE `inscripcion` SET ganador = 1, `ronda` = ".$ronda." WHERE `id_inscripcion` = ".$id_inscripcion.";")->query();
    }
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
//        echo var_dump($_POST); die();
        if($_POST['cantidadPermitida']){
            if($_POST['cantidadPermitida'] == 3){
                //=======================================//
                // Es un grupo y solo colocaron a un participante
                //=======================================//
                if($_POST['countRowParticipante'] <= 2){
                    $model->addError('id_usuario',__('You must add more participants'));
                    $this->render('create',array(
                        'model'=>$model, 'id_competencia'=>$id_competencia
                    ));
                    exit;
                }
            }
            if($_POST['cantidadPermitida'] == 2){
                if($_POST['countRowParticipante'] <= 1){
                    $model->addError('id_usuario',__('You must add more participants'));
                    $this->render('create',array(
                        'model'=>$model, 'id_competencia'=>$id_competencia
                    ));
                    exit;
                }
            }
        }
        if($_POST['countRowParticipante'] == 0){
            $model->addError('id_usuario',__('No user has entered'));
            $this->render('create',array(
                'model'=>$model, 'id_competencia'=>$id_competencia
            ));
            exit;
        }else{
        $id_competencia = $_POST['id'];
//        echo var_dump($_POST); die();
//        die($_POST['valorCategoriaController']);
        $model->attributes=$_POST['Inscripcion'];
        $valorAudio = 0;
//        if($model->audio){
//            $rnd = rand(0,9999);  // generate random number between 0-9999
//            $uploadedFile=CUploadedFile::getInstance($model,'audio');
//            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
//            $model->audio = $fileName;
//            $valorAudio = 0; 
//        }else{
//            $model->audio = "audio_defaul.mp3";
//            $valorAudio = 1;
//        }
        $cancion = CUploadedFile::getInstance($model,'audio');
        if($cancion != ""){
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
        
        
        
        $model->id_ciudad = 1;
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
                        
                        $participanteExistente = Participante::model()->findAll('id_usuario = '.$id_usuario_eR.' AND id_categoria ='.$_POST['categoriaSeleccionadaFinal'].' AND id_copetencia ='.$model->id_copetencia);
                        if(count($participanteExistente) == 0){                               
                            $participanteInscripcion = new Participante;
                            $participanteInscripcion->id_inscripcion = $model->id_inscripcion;
                            $participanteInscripcion->id_copetencia = $model->id_copetencia;
                            $participanteInscripcion->id_categoria = $_POST['categoriaSeleccionadaFinal'];
                            $participanteInscripcion->id_usuario = $id_usuario_eR;
                            $participanteInscripcion->id_usuario_registro = Yii::app()->user->id_usuario_sistema;
                            $participanteInscripcion->estatus = 1;	
                            if($participanteInscripcion->save()){
    //                                
                                echo "Registrado<hr>";
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
            if($_POST['cantidadPermitida']){
                if($_POST['cantidadPermitida'] == 3){
                    //=======================================//
                    // Es un grupo y solo colocaron a un participante
                    //=======================================//
                    if($_POST['countRowParticipante'] <= 1){
                        $model->addError('id_usuario',__('You must add more participants'));
                        $this->render('create',array(
                            'model'=>$model, 'id_competencia'=>$id_competencia
                        ));
                        exit;
                    }
                }
                if($_POST['cantidadPermitida'] == 2){
                    if($_POST['countRowParticipante'] <= 1){
                        $model->addError('id_usuario',__('You must add more participants'));
                        $this->render('create',array(
                            'model'=>$model, 'id_competencia'=>$id_competencia
                        ));
                        exit;
                    }
                }
            }
            if($_POST['countRowParticipante'] == 0){
                $model->addError('id_usuario','No user has entered');
                $this->render('create',array(
                    'model'=>$model, 'id_competencia'=>$id_competencia
                ));
                exit;
            }else{
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
//            $model->id_usuario = Yii::app()->user->id_usuario_sistema;
            $model->id_estatu_inscripcion = 1;
            $model->id_categoria = $_POST['categoriaSeleccionadaFinal'];
            $model->id_ciudad = 1;
            if($model->save()){
                //die(YiiBase::getPathOfAlias("webroot").'/images/audio/'.$fileName);
                if($valorAudio != 1 ){
                    $uploadedFile->saveAs(YiiBase::getPathOfAlias("webroot").'/images/audio/'.$fileName);  // image will uplode to rootDirectory/banner/
                }
                
                Participante::model()->deleteAll('id_inscripcion ='.$id);
                PagoDetalle::model()->deleteAll('id_inscripcion ='.$id);
                if($_POST['nextRowParticipante'] > 0) {
                    for($i=0; $i < $_POST['countRowParticipante']; $i++) {
                        $id_usuario_eR = $_POST['id_usuario_eR'.$i];
                        if($id_usuario_eR){
                            
                            $participanteExistente = Participante::model()->findAll('id_usuario ='.$id_usuario_eR.' AND id_categoria ='.$_POST['categoriaSeleccionadaFinal'].' AND id_copetencia ='.$model->id_copetencia);
                            if(count($participanteExistente) == 0){                               
                                $participanteInscripcion = new Participante;
                                $participanteInscripcion->id_inscripcion = $model->id_inscripcion;
                                $participanteInscripcion->id_copetencia = $model->id_copetencia;
                                $participanteInscripcion->id_categoria = $_POST['categoriaSeleccionadaFinal'];
                                $participanteInscripcion->id_usuario = $id_usuario_eR;
                                $participanteInscripcion->id_usuario_registro = $model->id_usuario;
                                $participanteInscripcion->estatus = 1;	

                                $pago = Pago::model()->find('id_inscripcion ='.$model->id_inscripcion);

                                if($participanteInscripcion->save()){
        //                                die("Exitoso");

                                    $pagoDetalle = new PagoDetalle;
                                    $pagoDetalle->id_pago = $pago->id_pago;
                                    $pagoDetalle->id_tipo_pago = 2;
                                    $pagoDetalle->id_inscripcion = $model->id_inscripcion;
                                    $pagoDetalle->id_usuario = $id_usuario_eR;
                                    $pagoDetalle->id_usuario_registro = $model->id_usuario;
                                    $pagoDetalle->items = "Pago de Categoría";
                                    $pagoDetalle->monto = $pago->costo_pagar;	
                                    $pagoDetalle->save();


                                }else{
                                    print_r($participanteInscripcion->getErrors());
                                    die();
                                }
                            }
                        }
                    }
                }
                
                $this->redirect(array('view','id'=>$model->id_inscripcion));
            }
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

public function actionValidar()
{
    $id_inscripcion = $_POST['inscripcion'];
    $accion = $_POST['accion'];
//    echo "Aqui";
    if($id_inscripcion){
        $model=$this->loadModel($id_inscripcion);
        $model->attributes=$_POST['inscripcion'];
        $model->acreditado = $accion;
        $model->save();
    }
}



public function actionValidarMusica()
{
    $id_inscripcion = $_POST['inscripcion'];
    $accion = $_POST['accion'];
//    echo "Aqui";
    if($id_inscripcion){
        $model=$this->loadModel($id_inscripcion);
        $model->attributes=$_POST['inscripcion'];
        $model->musica_validada = $accion;
        if($model->save()){
            
        }else{
            print_r($model->getErrors());
            die();
        }
    }
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

public function actionfindQR()
{
    $datas = Yii::app()->db->createCommand('            
            SELECT I.id_inscripcion,C.categoria,CC.anio,CC.mes,CC.dia,CC.hora,CC.minuto,I.audio
            FROM usuario_sistema AS U
            LEFT JOIN inscripcion AS I ON (I.id_usuario=U.id_usuario_sistema)
            LEFT JOIN categoria AS C ON (C.id_categoria=I.id_categoria)
            LEFT JOIN competencia_categoria as CC ON (CC.id_copetencia=I.id_copetencia and CC.id_categoria=I.id_categoria)
            WHERE U.acreditado="'.$_POST['code_qr'].'"
    ')->queryAll();

    if(count($datas)> 0){

        ?>

        <h3><?php echo __('Participation'); ?></h3>

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo __('Participation Schedule'); ?></div>
                    <div class="panel-body">

                        <div class="table-responsive">

                            <table style=" width: 100%;" id="example" class="table table-hover" cellspacing="0">
                                <thead>
                                <tr class="warning" >
                                    <td><center><strong><?php echo __('Category'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Date'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Hour'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Music'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Participants'); ?></strong></center></td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                foreach ($datas as $data){
                                    echo '<pre>';
                                    print_r($data);
                                    echo '</pre>';

                                    ?>
                                    <tr>
                                        <td><?php echo $data['categoria']; ?></td>
                                        <td class="text-center"><?php echo $data['anio'].'-'.$data['mes'].'-'.$data['dia']; ?></td>
                                        <td class="text-center"><?php echo $data['hora'].':'.$data['minuto']; ?></td>
                                        <td class="text-center"><a href="<?php echo Yii::app()->request->baseUrl; ?>/images/audio/<?php echo $data['audio']; ?>" target="_blank" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-play" aria-hidden="true"></span></a></td>
                                        <td>
                                            <?php
/*
                                            $participantes = Yii::app()->db->createCommand('            
                                                        SELECT U.tipo_documento,U.cedula,U.primer_nombre,U.primer_apellido
                                                        FROM participante AS P
                                                        LEFT JOIN usuario_sistema AS U ON (U.id_usuario_sistema=P.id_usuario)
                                                        WHERE P.id_inscripcion='.$data['id_inscripcion'].'
                                            ')->queryAll();

                                            if(count($participantes)>0){
                                                foreach ($participantes as $participante){
                                                    ?>
                                                    <span class="label label-default"><?php echo ucwords(strtolower($participante['primer_nombre'].' '.$participante['primer_apellido'])); ?></span>
                                                    <?php
                                                }
                                            }
*/
                                            ?>
                                        </td>

                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }else{
        ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label required" for="Usuario_tipo_documento">
                        <?php echo __('Identification'); ?>:
                        <span class="required">*</span>
                    </label>
                    <select id="tipo_documento" class="span5 form-control" placeholder="Tipo Documento" name="tipo_documento">
                        <option value=""><?php echo __('Select...'); ?></option>
                        <option selected="selected" value="1">National ID</option>
                        <option value="2"><?php echo __('Driver license'); ?></option>
                        <option value="3">Cédula de Extranjería</option>
                        <option value="4"><?php echo __('Passport'); ?></option>
                        <option value="5">Tarjeta de Identidad</option>
                        <option value="6">Registro Civil</option>
                    </select>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">

                    <label class="control-label required" for="Usuario_tipo_documento">
                        <?php echo __('Number of Identification'); ?>:
                        <span class="required">*</span>
                    </label>
                    <div class="col-sm-12 bootstrap-timepicker input-group">
                        <input style="width: 100%;" id="usuarioBusqueda" class="form-control" type="text" placeholder="<?php echo __('ID Number'); ?>" name="usuarioBusqueda" maxlength="30" size="45">
                        <label onclick="findIdentificacion()" class="input-group-addon btn btn-primary" style="width: 10%;">
                            <span   class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            <?php echo __('Search'); ?>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

public function actionFindIdentificacion()
{
    $data = Usuario::model()->find("tipo_documento =".$_POST['tipo_documento']." AND cedula = '".$_POST['identificacion']."'");
    if(count($data)> 0){

        $data->acreditado = $_POST['code_qr'];
        $data->save();

        echo 1;
    }else{
        ?>
        <div class="alert alert-danger">
            <b><?php echo __('This user does not exist in our data base.'); ?></b>
        </div>
        <?php
    }
}

public function actionQr()
{
    $this->render('consultaqr',array());
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
