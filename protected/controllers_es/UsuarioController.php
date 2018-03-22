<?php

class UsuarioController extends Controller {
  /**
  * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
  * using two-column layout. See 'protected/views/layouts/column2.php'.
  */
  public $layout='//layouts/column2';
  
  /**
  * @return array action filters
  */
  public function filters() {
    return array(
      'accessControl', // perform access control for CRUD operations
    );
  }
  
  /**
  * Specifies the access control rules.
  * This method is used by the 'accessControl' filter.
  * @return array access control rules
  */
//  public function accessRules() {
//    $access = array();
//    if(!Yii::app()->user->isGuest) {
//      $profile=Perfil::model()->find('id_perfil_sistema=?', array(Yii::app()->user->id_perfil_sistema));
//      $profileMenu=PerfilMenu::model()->find('id_perfil_sistema=? AND id_menu_sistema=?', array(Yii::app()->user->id_perfil_sistema, 6));
//      if($profileMenu) {
//        $actions = array();
//        if($profileMenu->crear) $actions[] = 'create';
//        if($profileMenu->modificar) $actions[] = 'update';
//        if($profileMenu->consultar) $actions[] = 'view';
//        if($profileMenu->eliminar) $actions[] = 'delete';
//        if($profileMenu->imprimir) $actions[] = 'index';
//        if($profileMenu->consultar && $profileMenu->eliminar && $profileMenu->modificar) $actions[] = 'admin';
//        if(count($actions) > 0)
//          $access[] = array('allow','actions'=>$actions,'users'=>array(Yii::app()->user->name),);
//      }
//    }
//    $access[] = array('deny');
//    return $access;
//  }
  
  public function accessRules() {
    $access = array();    
    $actions = array();
    $actions[]='validarCedulaUsuario';
    $actions[]='cedulaDisponible';
    $actions[]='findIdentificacion';
    $actions[]='findIdentificacion2';
    $actions[]='findIdentificacion3';
    $actions[]='findCorreo';
    $actions[]='RegistarUsuario';
    $actions[]='RecordarClave';
    $actions[]='RedirectLogin';
    $actions[]='ActivarUsuario';
    $actions[]='update';
    $actions[]='historial';
    $actions[]='rNc';
    if(!Yii::app()->user->isGuest) {
      $profile=Perfil::model()->find('id_perfil_sistema=?', array(Yii::app()->user->id_perfil_sistema));
      $profileMenu=PerfilMenu::model()->find('id_perfil_sistema=? AND id_menu_sistema=?', array(Yii::app()->user->id_perfil_sistema, 6));
      if($profileMenu) {
        if($profileMenu->crear) $actions[] = 'create';
        if($profileMenu->modificar) $actions[] = 'update';
        if($profileMenu->consultar) $actions[] = 'view';
        if($profileMenu->eliminar) $actions[] = 'delete';
        if($profileMenu->imprimir) $actions[] = 'index';
        $actions[]='findJsonProfesor';
        $actions[]='buscarNombreProfesor';
        $actions[]='buscarCedulaProfesor';
        $actions[]='detallarUsuario';
        $actions[]='historial';
        if($profileMenu->consultar && $profileMenu->eliminar && $profileMenu->modificar) $actions[] = 'admin';
        
      }
    }
    if(count($actions) > 0){
        $access[] = array('allow','actions'=>$actions,'users'=>array(Yii::app()->user->name),);
    }
    $access[] = array('deny');
    return $access;
  }
  
  
  /**
  * Displays a particular model.
  * @param integer $id the ID of the model to be displayed
  */
  public function actionView($id) {
//    $transacciones = Transaccion::model()->findAll('id_usuario_sistema ='.$id);  
//    $autorizados = Autorizado::model()->findAll('id_usuario_sistema ='.$id);
//    $beneficiarios = Beneficiario::model()->findAll('id_usuario_sistema ='.$id);
    
    
    $this->render('view',array('model'=>$this->loadModel($id)));
  }
  
  /**
  * Creates a new model.
  * If creation is successful, the browser will be redirected to the 'view' page.
  */
  public function actionCreate() {
    $model=new Usuario;
    
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
    
    if(isset($_POST['Usuario'])) {
        
        //====================================================================//
        //  Registrar Foto
        //====================================================================//

        if (!empty($_POST['Usuario']['img']))
        {
//                die('aqui1');
            $filename = "";
            $foto = $_POST['Usuario']['img'];
            $foto = str_replace('data:image/png;base64,', '', $foto);
            $foto = str_replace(' ', '+', $foto);
            $data_foto = base64_decode($foto);
            $filename = $_POST['Usuario']['cedula'].'.png';
            $filepath = YiiBase::getPathOfAlias("webroot").'/images/usuario/'.$filename;
            $writeToDisk = file_put_contents($filepath, $data_foto); 


        }  
        
        
      $model->attributes=$_POST['Usuario'];
      $model->img = '../images/usuario/'.$filename;
      $textFilesErrors = '';
      if($model->contrasena != '') {
        if($model->contrasena == $_POST['repeat']) {
          $model->contrasena = $model->hashPassword($model->contrasena);
          $model->fecha_registro = date('Y-m-d');
          $model->direccion_ip = $model->getRealIP();
          $model->id_registrador = Yii::app()->user->id_usuario_sistema;
          if($model->save())
            $this->redirect(array('view','id'=>$model->id_usuario_sistema));
          else $model->contrasena = '';
        } else {
          $model->validate();
          $model->addError('contrasena','Las contraseñas no coincidió con la contraseña de verificación.');
          $model->contrasena = '';
        }
      } else {
        $model->validate();
        $model->addError('contrasena','Contraseña no puede ser nulo.');
        $model->contrasena = '';
      }
      $date = new Date();
      if($model->fecha_nacimiento) $model->fecha_nacimiento = $date->convertDateEsToEn($model->fecha_nacimiento);
    }
    
    $this->render('create',array('model'=>$model,));
  }
  public function actionRegistarUsuario() {
    $model=new Usuario;
    $model->tipo_documento = $_POST['tipo_documento'];
    $model->cedula = $_POST['identificacion'];
    $model->primer_nombre = $_POST['Usuario_primer_nombre'];
    $model->primer_apellido = $_POST['Usuario_primer_apellido'];
    $model->correo = $_POST['Usuario_correo'];
    $model->usuario = $_POST['Usuario_correo'];
    $model->dia = $_POST['dia'];
    $model->mes = $_POST['mes'];
    $model->anio = $_POST['anio'];
    $model->fecha_nacimiento = $_POST['anio']."-".$_POST['mes']."-".$_POST['dia'];
    $model->codigo_pais = $_POST['pais'];
    $model->ciudad = $_POST['ciudad'];
    $model->sexo = $_POST['sexo'];
    $model->contrasena = $model->hashPassword($_POST['clave']);
    $model->tlf_personal = $_POST['tlf'];
    $model->tipo_usuario = $_POST['tipo_usuario'];
    $model->id_perfil_sistema = 2;
    $model->estatus = 0;
    $model->estatus_contrasena = 1;
    $model->img = 'defaul.png';
    //===========================//
    // Seguridad
    $model->fecha_registro = date('Y-m-d H:i:s');
    
    
    if($model->save()){
        
        $usuario = base64_encode($model->id_usuario_sistema);
        $message = new YiiMailMessage;        
        
        $message->subject = 'Activación Cuenta de WIN - Online Competition System';
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
		<tr><td><center><img src="http://www.appwin.net/images/logo.png"></center></td></tr>
		<tr>
			<td>
			<style type="text/css">p { margin-bottom: 0.25cm; line-height: 120%; }
			</style>
                        
			<p style="margin-bottom: 0cm; line-height: 100%; text-align: center;"> 
                        Queremos darte la más cálida bienvenida y enviarte un saludo de felicitación por ingresar al mundo de WIN - Online Competition System
                        <br>
                        Desde ahora puedes contar con nosotros!
                        </p>
			<style type="text/css">p { margin-bottom: 0.25cm; line-height: 120%; }
			</style>
			<br>
                        <center>Para Activar tu cuenta da click en el boton de abajo.</p></center>

			<p style="margin-bottom: 0cm; line-height: 100%; text-align: center;">
                       	<br><a class="btn" href="http://www.appwin.net/usuario/activarUsuario?i='.$usuario.'">Activar usuario</a>
                        </p>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
                    <td>
                    <hr><br>
                    <center>WIN - Online Competition System<br />
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
</html>
        

                ';
        

        
        $message->setBody($body,'text/html');//codificar el html de la vista
        $message->from =('apartadovirtual@ipostel.gob.ve'); // alias del q envia
        $message->setTo($_POST['Usuario_correo']); // a quien se le envia
        Yii::app()->mail->send($message);
        
        ?>
        <div id="" style="" class="alert alert-success">
            <b>Te hemos enviado un correo electrónico para la activación de tu cuenta.</b>
            <hr>
        </div>
        <?php
    }else{
        print_r($model->getErrors());
    }
    /*
    tipo_documento:tipo_documento, 
    identificacion:identificacion, 
    Usuario_primer_nombre:Usuario_primer_nombre, 
    Usuario_primer_apellido:Usuario_primer_apellido, 
    Usuario_correo:Usuario_correo, 
    clave:clave
     */
  }
  
  /**
  * Updates a particular model.
  * If update is successful, the browser will be redirected to the 'view' page.
  * @param integer $id the ID of the model to be updated
  */
  
    public function actionActivarUsuario(){

//        header("Location: ".Yii::app()->baseUrl.'/');
        
//        function redirect(){
            
//        }
         
//        $prueba = $this;
        //header("Location: /".Yii::app()->baseUrl.'/site/');
//        print_r($this); die();
        
       
        
        $id = base64_decode($_GET['i']); 
        $model=$this->loadModel($id);
        $date = new Date();
        
        $model->attributes=$_POST['Usuario'];
//        $model->fecha_nacimiento = $date->convertDateEsToEn($model->fecha_nacimiento);
        $model->estatus = 1;
        $model->estatus_contrasena = 1;
        if($model->save()){
//            echo "Exitoso";
//           die(header_remove("Location: ".Yii::app()->baseUrl.'/'));
//           exit;
//            $this->redirect('RedirectLogin');
            $this->RedirectLogin();
        }else{
           print_r($model->getErrors()); 
           echo "<br>".$model->fecha_nacimiento;
        }
        //echo Yii::app()->baseUrl . '/images/pdf/contrato.pdf'
       
//        $this->render('_redirec');
//        header('headerName: site/login');
        //header("Location: ".Yii::app()->baseUrl.'/');
        
    }


    public function actionUpdate($id) {
        
//    die('Aqui');    
    $model=$this->loadModel($id);
    $modelImg = $model->img;
    $modelRepeat=$this->loadModel($id);
    $modelRecuperar=$this->loadModel($id);
    
    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);
//    echo var_dump($_POST['Usuario']); die();
    if(isset($_POST['Usuario'])) {
     
//    echo $model->fecha_nacimiento; die();
    //echo $_POST['rclave'];    
    //die("Aqui");    
//        echo var_dump($_POST); die();
    if($_POST['rclave'] == 1){
        $modelRecuperar->attributes=$_POST['Usuario']; 
        
        $clave =  $modelRecuperar->contrasena;
//        $modelRecuperar->fecha_nacimiento = $modelRecuperar->anio."-".$modelRecuperar->mes."-".$modelRecuperar->dia;
        
        $repeat = $_POST['repeat'];
        if($clave == ""){
            $modelRecuperar->addError('contrasena','Debe ingresar valores al campo Contraseña');
        }else{
            if($repeat == ""){
                $modelRecuperar->addError('contrasena','Debe ingresar valores al campo Repetir contraseña');
            }else{
                
                if(stristr($clave, $repeat)){
//                    die('Aqui2');
                    $clave = md5($clave);
//                    $clave = hashPassword($clave);
                    Yii::app()->db->createCommand("UPDATE `usuario_sistema` SET `contrasena` = '".$clave."' WHERE `usuario_sistema`.`id_usuario_sistema` = ".$id.";")->query();
//                    $command = Yii::app()->db->createCommand("UPDATE `wlp`.`usuario_sistema` SET `fecha_nacimiento` = '2017-10-08' WHERE `usuario_sistema`.`id_usuario_sistema` = 9;");
                    
//                       echo "AQUI"; die(); 
// the following line will NOT append WHERE clause to the above SQL
//                    $command->where('id=:id', array(':id'=>$id));
//                    die();
//                    echo $clave."<br>".$repeat; die();
//                    $modelRecuperar->fecha_nacimiento = Null;
//                    $modelRecuperar->contrasena = $clave;
                    
                    
//                    if($modelRecuperar->save()){
                       $this->RedirectLogin();
//                    }else{
//                        echo "Aqui: <br>".print_r($modelRecuperar->getErrors());
//                        die();
//                    }
                }else{
                    $modelRecuperar->addError('repeat','Las contraseñas no coincidió con la contraseña de verificación.');
                }
            }
        }
        $this->render('_recuperarClave',array('model'=>$modelRecuperar,));
        exit;
    }
    
    //====================================================================//
    //  Registrar Foto
    //====================================================================//
        //echo $_POST['img_estatus']; die();
//    if ($_POST['img_estatus'] == 1){  
//        
//        if (!empty($_POST['Usuario']['img']))
//        {
//    //                die('aqui1');
//            $filename = "";
//            $foto = $_POST['Usuario']['img'];
//            $foto = str_replace('data:image/png;base64,', '', $foto);
//            $foto = str_replace(' ', '+', $foto);
//            $data_foto = base64_decode($foto);
//            $filename = $_POST['Usuario']['cedula'].'.png';
//            $filepath = YiiBase::getPathOfAlias("webroot").'/images/usuario/'.$filename;
//            $writeToDisk = file_put_contents($filepath, $data_foto); 
//
//
//        }    
//        
//    }
        $modelRepeat->attributes=$_POST['Usuario'];
        $valorImg=0;
        $rnd = rand(0,9999);  // generate random number between 0-9999
//        die("Img : ".$model->img);
        $uploadedFile=CUploadedFile::getInstance($modelRepeat,'img');
        if (!empty($uploadedFile)){
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $modelRepeat->img = $fileName;
            $valorImg = 1;
        }else{
            $modelRepeat->img = $modelImg;
            $valorImg = 0;
        }
        
//      if ($_POST['img_estatus'] == 1){ 
      if($valorImg == 0){
          Yii::app()->user->img = $modelImg;
      }else{
          Yii::app()->user->img = $modelRepeat->img;
      }
//        $modelRepeat->img = $filename;
        
//      }
//      $modelRepeat->id_perfil_sistema = 1;
      $modelRepeat->estatus_contrasena = 1;
      if($modelRepeat->contrasena == '') {
        $modelRepeat->contrasena = $model->contrasena;
        
        if($modelRepeat->save()){
            if($valorImg == 1){
                $uploadedFile->saveAs(YiiBase::getPathOfAlias("webroot").'/images/usuario/'.$fileName);  // image will uplode to rootDirectory/banner/
            }
            $this->redirect(array('view','id'=>$modelRepeat->id_usuario_sistema));
        
        }else{
        $model = $modelRepeat;}
      } elseif($modelRepeat->contrasena == $_POST['repeat']) {
        $modelRepeat->contrasena = $modelRepeat->hashPassword($modelRepeat->contrasena);
        if($modelRepeat->save())
          $this->redirect(array('view','id'=>$modelRepeat->id_usuario_sistema));
        else
          $model = $modelRepeat;
      } else {
        $modelRepeat->validate();
        $modelRepeat->addError('contrasena','Las contraseñas no coincidió con la contraseña de verificación.');
        $modelRepeat->contrasena = '';
        $model = $modelRepeat;
      }
      $date = new Date();
//      if($model->fecha_nacimiento) $model->fecha_nacimiento = $date->convertDateEsToEn($model->fecha_nacimiento);
    }
    
    $model->contrasena = ''; 
    $this->render('update',array('model'=>$model,));
  }
  
  /**
  * Deletes a particular model.
  * If deletion is successful, the browser will be redirected to the 'admin' page.
  * @param integer $id the ID of the model to be deleted
  */
  public function actionDelete($id) {
    if(Yii::app()->request->isPostRequest)
    {
      // we only allow deletion via POST request
      $this->loadModel($id)->delete();
      
      // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
      if(!isset($_GET['ajax']))
        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
    else throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
  }
  
  /**
  * Lists all models.
  */
  public function actionIndex() {
    $dataProvider=new CActiveDataProvider('Usuario');
    $this->render('index',array('dataProvider'=>$dataProvider,));
  }
  
  /**
  * Manages all models.
  */
  public function actionAdmin() {
    $model=new Usuario('search');
    $model->unsetAttributes();  // clear any default values
    if(isset($_GET['Usuario']))
      $model->attributes=$_GET['Usuario'];
    
    $this->render('admin',array('model'=>$model,));
  }
  
  /**
  * Returns the data model based on the primary key given in the GET variable.
  * If the data model is not found, an HTTP exception will be raised.
  * @param integer the ID of the model to be loaded
  */
  public function loadModel($id) {
    $model=Usuario::model()->findByPk($id);
    if($model===null)
      throw new CHttpException(404,'The requested page does not exist.');
    return $model;
  }
  
  public function RedirectLogin(){
      header("Location: ".Yii::app()->baseUrl.'/site/login');
  }
  
  /**
  * Performs the AJAX validation.
  * @param CModel the model to be validated
  */
  protected function performAjaxValidation($model) {
    if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }
  
  public function actioncedulaDisponible()
  {
      $data = Usuario::model()->find("cedula = '".$_POST['UsuarioCedula']."'");
      echo count($data);
  }
  public function actionFindIdentificacion()
  {
      $data = Usuario::model()->find("tipo_documento =".$_POST['tipo_documento']." AND cedula = '".$_POST['identificacion']."'");
      echo count($data);
  }
  public function actionFindIdentificacion2()
  {
      $data = Usuario::model()->find("tipo_documento =".$_POST['tipo_documento']." AND cedula = '".$_POST['identificacion']."'");
      if(count($data)!= 0){
          if($_POST['tipo'] == 1){
              $whereTipo = " AND id_copetencia =".$_POST['id'];
          }else{
              $whereTipo = " AND id_categoria =".$_POST['id'];
          }
          $reportePagoUsuario = Pago::model()->findAll('id_usuario ='.$data->id_usuario_sistema.' AND id_tipo_pago ='.$_POST['tipo'].$whereTipo);
          if(count($reportePagoUsuario) >= 1){
              ?>
                <div class="alert alert-success">
                    ¡Ya el usuario posee un pago de pase de competidor <a href="http:<?php echo Yii::app()->baseUrl; ?>/usuario/historial"><b>Detallar</b></a>!
                </div>
              <?php
          }else{
            ?>
        <div class="alert alert-info">
            <input id="id_usuario_e" type="hidden" value="<?php echo $data->id_usuario_sistema; ?>">
            <input id="id_usuario_i" type="hidden" value="<?php echo $data->cedula; ?>">
            <input id="usuario_e" type="hidden" value="<?php echo $data->usuario; ?>">
            <b>Identificación:&nbsp;&nbsp;</b>
                <?php
                    $tipoDocumento = $data->tipo_documento;
                    if($tipoDocumento == 1){
                        $dataTipo = 'Cedula Ciudadanía';
                    }
                    if($tipoDocumento == 2){
                        $dataTipo = 'Licencia de Conducir';
                    }
                    if($tipoDocumento == 3){
                        $dataTipo = 'Cedula de Extranjería';
                    }
                    if($tipoDocumento == 4){
                        $dataTipo = 'Pasaporte';
                    }
                    if($tipoDocumento == 5){
                        $dataTipo = 'Tarjeta de Identidad';
                    }
                    if($tipoDocumento == 6){
                        $dataTipo = 'Registro Civil';
                    }
                    echo $dataTipo." - ".$data->cedula; 
                ?>
            <br>
            <b>Nombre:&nbsp;&nbsp;</b><?php echo $data->primer_nombre; ?><br>
            <b>Apellido:&nbsp;&nbsp;</b><?php echo $data->primer_apellido; ?><br>
            <b>Usuario:&nbsp;&nbsp;</b><?php echo $data->usuario; ?><br>
            <hr>
            <center>
                <button id="btAgregar" style=" display: block;" onclick="addNewParticipante()" type="button" class="btn btn-primary">
                    <span onclick="addNewParticipante()" class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                    Agregar Usuario
                </button>
            </center>
        </div>
            <?php
          }
      }else{
          ?>
            <div class="alert alert-danger">
                <b>¡El usuario no existe en nuestra base de datos!</b>
            </div>
          <?php
      }
      //echo count($data);
  }
  public function actionFindIdentificacion3()
  {
      
    function busca_edad($fecha_nacimiento){
        $dia=date("d");
        $mes=date("m");
        $ano=date("Y");


        $dianaz=date("d",strtotime($fecha_nacimiento));
        $mesnaz=date("m",strtotime($fecha_nacimiento));
        $anonaz=date("Y",strtotime($fecha_nacimiento));


        //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual

        if (($mesnaz == $mes) && ($dianaz > $dia)) {
        $ano=($ano-1); }

        //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual

        if ($mesnaz > $mes) {
        $ano=($ano-1);}

         //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad

        $edad=($ano-$anonaz);


        return $edad;


    }
      
      $edadMin = $_POST['edadMin'];
      $edadMax = $_POST['edadMax'];
//      echo var_dump($_POST); die();
      $data = Usuario::model()->find("tipo_documento =".$_POST['tipo_documento']." AND cedula = '".$_POST['identificacion']."'");
      if(count($data)!= 0){
          if($_POST['tipo'] == 2){
              $whereTipo = " AND id_categoria =".$_POST['id'];
          }
          $reporteParticipante = Participante::model()->findAll('id_categoria = '.$_POST['idCategoria'].' AND id_usuario ='.$data->id_usuario_sistema);
//          if(count($reporteParticipante) >= 1){
              ?>
<!--                <div class="alert alert-success">
                    ¡Ya el usuario ha inscrito para esta categoría!
                </div>-->
              <?php
//          }else{
              $edad = busca_edad($data->fecha_nacimiento);
              
              
//              echo "edad minima: ".$edadMin." edad maxima: ".$edadMax." Edad: ".$edad."<hr>";
              if($edad >= $edadMin){
                  if($edad <= $edadMax){
                      //echo "Entro en rango";
                      
                  }else{
//                      echo "Es mayor a lo indicado";
                    ?>
                    <div class="alert alert-danger">
                        <b>¡El usuario seleccionado cuenta con mas edad a lo permitido en la categoría seleccionada!</b>
                    </div>
                    <?php
                    die();
                  }
              }else{
//                  echo "Es menor a lo indicado";
                  ?>
                    <div class="alert alert-danger">
                        <b>¡El usuario seleccionado cuenta con menos edad a lo permitido en la categoría seleccionada!</b>
                    </div>
                    <?php
                    die();
              }
              
            ?>
        <div class="alert alert-info">
            <input id="id_usuario_e" type="hidden" value="<?php echo $data->id_usuario_sistema; ?>">
            <input id="id_usuario_i" type="hidden" value="<?php echo $data->cedula; ?>">
            <input id="usuario_e" type="hidden" value="<?php echo $data->usuario; ?>">
            <b>Identificación:&nbsp;&nbsp;</b>
                <?php
                    $tipoDocumento = $data->tipo_documento;
                    if($tipoDocumento == 1){
                        $dataTipo = 'Cedula Ciudadanía';
                    }
                    if($tipoDocumento == 2){
                        $dataTipo = 'Licencia de Conducir';
                    }
                    if($tipoDocumento == 3){
                        $dataTipo = 'Cedula de Extranjería';
                    }
                    if($tipoDocumento == 4){
                        $dataTipo = 'Pasaporte';
                    }
                    if($tipoDocumento == 5){
                        $dataTipo = 'Tarjeta de Identidad';
                    }
                    if($tipoDocumento == 6){
                        $dataTipo = 'Registro Civil';
                    }
                    echo $dataTipo." - ".$data->cedula; 
                ?>
            <br>
            <b>Nombre:&nbsp;&nbsp;</b><?php echo $data->primer_nombre; ?><br>
            <b>Apellido:&nbsp;&nbsp;</b><?php echo $data->primer_apellido; ?><br>
            <b>Usuario:&nbsp;&nbsp;</b><?php echo $data->usuario; ?><br>
            <hr>
            <center>
                <button id="btAgregar" style=" display: block;" onclick="addNewParticipante()" type="button" class="btn btn-primary">
                    <span onclick="addNewParticipante()" class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                    Agregar Usuario
                </button>
            </center>
        </div>
            <?php
//          }
      }else{
          ?>
            <div class="alert alert-danger">
                <b>¡El usuario no existe en nuestra base de datos!</b>
            </div>
          <?php
      }
      //echo count($data);
  }
  public function actionFindCorreo()
  {
      $data = Usuario::model()->find("correo = '".$_POST['correo']."'");
      echo count($data);
  }
    
    public function actionRnc()
    {
//        die();
       $id = base64_decode($_GET['i']); 
//       $id = 1;
       //echo $id; //
//       die($id);
       $model=$this->loadModel($id);
       //die($id);
       //$model = Usuario::model()->findByPk($id);
       $this->render('_recuperarClave',array('model'=>$model,));
    }
  
    public function actionRecordarClave()
    {
        $correo = $_POST['correo'];
        $usuario = Usuario::model()->find("correo ='".$correo."'");
        if(count($usuario) == 0){
            ?>
                <div id="" style="" class="alert alert-danger">
                    <b>El correo no existe en nuestra Base de Datos</b>
                    <hr>
                </div>
            <?php
        }else{
        $usuario = base64_encode($usuario->id_usuario_sistema);
        $message = new YiiMailMessage;        
        $message->subject = 'Recuperar cuenta de WIN - Online Competition System';
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
                                    
                                    <br>
                                    </p>
                                    <style type="text/css">p { margin-bottom: 0.25cm; line-height: 120%; }
                                    </style>
                                    <br>
                                    <center>Para registrar tu nueva clave da click en el boton de abajo.</p></center>

                                    <p style="margin-bottom: 0cm; line-height: 100%; text-align: center;">
                                    <br><a class="btn" href="http://www.appwin.net/usuario/rNc?i='.$usuario.'">Recuperar Clave</a>
                                    </p>
                                    </td>
                            </tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr>
                                <td>
                                <hr><br>
                                <center>WIN - Online Competition System<br />
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
            </html>

                ';
        
        $message->setBody($body,'text/html');//codificar el html de la vista
        $message->from =('josearmandomarcano@gmail.com'); // alias del q envia
        $message->setTo($correo); // a quien se le envia
        Yii::app()->mail->send($message);
        
        ?>
        <div id="" style="" class="alert alert-success">
            <b>Te hemos enviado un correo electrónico para la recuperación de tu clave.</b>
            <hr>
        </div>
        <?php
        }
    }
  
    public function actionHistorial(){
        $model=new Participante('participanteActivo');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Participante'])){
            $model->attributes=$_GET['Participante'];
        }

        $pago=new PagoDetalle('participanteLista');
        $pago->unsetAttributes();  // clear any default values
        if(isset($_GET['PagoDetalle'])){
            $pago->attributes=$_GET['PagoDetalle'];
        }
        
        $participante=new Participante('ParticipanteLista');
        $participante->unsetAttributes();  // clear any default values
        if(isset($_GET['Participante'])){
            $participante->attributes=$_GET['Participante'];
        }
        
        
        $this->render('_historial',array('model'=>$model, 'pago'=>$pago, 'participante'=>$participante));
    }
    
    
  public function actionvalidarCedulaUsuario(){
    $date = new Date();
    $data = Usuario::model()->find("cedula = '".$_POST['UsuarioCedula']."'");    $model = new Usuario;
    $model = new Usuario;
    $idUsuario = $data->id_usuario_sistema;
    $model = $this->loadModel($idUsuario);
    $fechaNacimientoBD = $date->convertDateEnToEs($data->fecha_nacimiento);
    if ($fechaNacimientoBD == $_POST['fechaNacimiento']){
      
      if(isset($_POST['UsuarioCedula'])) {
      $model->attributes=$_POST['UsuarioCedula'];
      $model->contrasena = md5($_POST['Usuario_contrasena']);
      $model->fecha_nacimiento = $date->convertDateEnToEs($model->fecha_nacimiento);
      
      if($model->save()){
          ?>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>¡La contraseña fue cambiada satisfactoriamente!</strong><br> 
              Ingrese su nueva Contraseña a partir de este momento
            </div>
          <?php      
        }else{
          ?>
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Ocurrio un problema al actualizar la contraseña!</strong><br> 
            Intentelo nuevamente
          </div>
          <?php
        }
       }else{
        ?>
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Ocurrio un problema al actualizar la contraseña!</strong><br> 
            Intentelo nuevamente
          </div>
        <?php
      }
    }else{
      ?>
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡La fecha de Nacimiento no es correcta!</strong><br> 
        Intentelo nuevamente
      </div>
      <?php
    }
  }
}