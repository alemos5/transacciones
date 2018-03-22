<?php

class SiteController extends Controller {
  /**
   * Declares class-based actions.
   */

  public function actions() {
    return array(
      // captcha action renders the CAPTCHA image displayed on the contact page
      'captcha'=>array(
	'class'=>'CCaptchaAction',
	'backColor'=>0xFFFFFF,
	'foreColor'=>0xA81E4E,
      ),
      // page action renders "static" pages stored under 'protected/views/site/pages'
      // They can be accessed via: index.php?r=site/page&view=FileName
      'page'=>array(
	'class'=>'CViewAction',
      ),
    );
  }
  public function actionConstruccio() {
    $this->render('pagina_construccion');
  }

  /**
   * This is the default 'index' action that is invoked
   * when an action is not explicitly requested by users.
   */
  public function actionIndex() {
    // renders the view file 'protected/views/site/index.php'
    // using the default layout 'protected/views/layouts/main.php'
    if(Yii::app()->user->isGuest) {
        $this->redirect('site/'.Yii::app()->params['loginUrl']);
    }
    
//    $m=Usuario::model()->find(Yii::app()->user->id_usuario_sistema);
    
    $usaurio=Usuario::model()->find("id_usuario_sistema =".Yii::app()->user->id_usuario_sistema);
    if($usaurio->estatus_contrasena == 0){
        header("Location: ".Yii::app()->baseUrl ."/usuario/update/".Yii::app()->user->id_usuario_sistema);
    }else{
        if(Yii::app()->user->id_perfil_sistema == 3){
            header("Location: ".Yii::app()->baseUrl ."/franquiciado/index/");
        }else{
            if(Yii::app()->user->id_perfil_sistema == 6){
                header("Location: ".Yii::app()->baseUrl ."/acreditado/index");
            }else{
                if(Yii::app()->user->id_perfil_sistema=='7'){
                    header("Location: ".Yii::app()->baseUrl ."/clientes/admin");
                }else{
                    $this->render('index');
                }
            }
        }
    }
  }

  /**
   * This is the action to handle external exceptions.
   */
  public function actionError() {
    if($error=Yii::app()->errorHandler->error) {
      if(Yii::app()->request->isAjaxRequest)
	echo $error['message'];
      else
	$this->render('error', $error);
    }
  }

  /**
   * Displays the contact page
   */
  public function actionContact() {
    $model=new ContactForm;
    if(isset($_POST['ContactForm'])) {
      $model->attributes=$_POST['ContactForm'];
      if($model->validate()) {
	$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
	$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
	$headers="From: $name <{$model->email}>\r\n".
	  "Reply-To: {$model->email}\r\n".
	  "MIME-Version: 1.0\r\n".
	  "Content-Type: text/plain; charset=UTF-8";
	mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
	Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
	$this->refresh();
      }
    }
    $this->render('contact',array('model'=>$model));
  }

  /**
   * Displays the login page
   */
  
  
  public function actionFindIdentificacion2()
  {
      $data = Usuario::model()->find("tipo_documento =".$_POST['tipo_documento']." AND cedula = '".$_POST['identificacion']."'");
      if(count($data)!= 0){
          $id_usuario = $data->id_usuario_sistema;
          ?>
          
          <div class="row">
              <div class="col-md-4">
                  <center>
                    <?php
                        $host= $_SERVER["HTTP_HOST"];
                        $url= $_SERVER["REQUEST_URI"];
                        $urlParte = "http://".$host."/images/usuario/".$data->img;
                    ?>
                    <img style="border-style: solid ; border-width: 2px;  height: 220px; width: 220px;" src="<?php echo $urlParte;?>" alt="..."  class="img-responsive img-circle img-thumbnail">
                  </center>
              </div>
              <div class="col-md-8">
                  <table class="table table-hover">
                      <tr>
                          <td>
                                <center>
                                    <strong>
                                        <?php echo __('Name:'); ?>
                                    </strong>
                                </center>
                          </td>
                          <td>
                              <?php
                              echo $data->primer_nombre." ".$data->primer_apellido;
                              ?>
                          </td>
                      </tr>
                      <tr>
                          <td>
                                <center>
                                    <strong>
                                        <?php echo __('Email:'); ?>
                                    </strong>
                                </center>
                          </td>
                          <td>
                              <?php
                                echo $data->correo;
                              ?>
                          </td>
                      </tr>
                      <tr>
                          <td>
                                <center>
                                    <strong>
                                        <?php echo __('Identification:'); ?>
                                    </strong>
                                </center>
                          </td>
                          <td>
                              <?php
                                echo $data->correo;
                              ?>
                          </td>
                      </tr>
                      <tr>
                          <td>
                                <center>
                                    <strong>
                                        <?php echo __('Number of Identification:'); ?>
                                    </strong>
                                </center>
                          </td>
                          <td>
                              <?php
                              echo $data->cedula;
                              ?>
                          </td>
                      </tr>
                      <tr>
                          <td>
                                <center>
                                    <strong>
                                        <?php echo __('Birthdate:'); ?>
                                    </strong>
                                </center>
                          </td>
                          <td>
                              <?php
                              echo $data->anio."/".$data->mes."/".$data->dia;
                              ?>
                          </td>
                      </tr>
                  </table>
              </div>
          </div>
            <hr>
            <h3><?php echo __('Competitor pass'); ?></h3>
            
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><?php echo __('List of Registrations Registered by the user'); ?></div>
                        <div class="panel-body">

                            <div class="table-responsive">

                                <table style=" width: 100%;" id="example" class="table table-hover" cellspacing="0">
                                    <thead>
                                        <tr class="warning" >
                                            <td><center><strong>ID Pass</strong></center></td>
                                            <td><center><strong><?php echo __('Pass'); ?></strong></center></td>
                                            <td><center><strong><?php echo __('Status'); ?></strong></center></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $pagos = Pago::model()->findAll('id_tipo_pago = 1 AND id_usuario ='.$id_usuario);
                                        foreach ($pagos as $pago){
                                                ?>
                                        <tr>
                                            <td>
                                                <center><?php echo $pago->id_pago; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo __('Pass Competitor'); ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <?php 
                                                    if($pago->id_pago_estatus == 1){ echo __('For paying'); }
                                                    if($pago->id_pago_estatus == 2){ echo __('Confirmed'); }
                                                    if($pago->id_pago_estatus == 3){ echo __('Rejected'); }
                                                    if($pago->id_pago_estatus == 4){ echo __('On hold'); }
                                                    ?>
                                                </center>
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
            
            
            <hr>
            <h3><?php echo __('List of registrations'); ?></h3>
            <br>
            <!--=============================================================================-->
            <!-- 1
            <!--=============================================================================-->
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><?php echo __('List of Registrations Registered by the user'); ?></div>
                        <div class="panel-body">

                            <div class="table-responsive">

                                <table style=" width: 100%;" id="example" class="table table-hover" cellspacing="0">
                                    <thead>
                                        <tr class="warning" >
                                            <td><center><strong>Id registration</strong></center></td>
                                            <td><center><strong><?php echo __('Competition'); ?></strong></center></td>
                                            <td><center><strong><?php echo __('Category'); ?></strong></center></td>
                                            <td><center><strong><?php echo __('Kind'); ?></strong></center></td>
                                            <td><center><strong><?php echo __('Group'); ?></strong></center></td>
                                            <td><center><strong><?php echo __('Participants'); ?></strong></center></td>
                                            <td><center><strong><?php echo __('Audio'); ?></strong></center></td>
                                            <td><center><strong><?php echo __('Validations'); ?></strong></center></td>
                                            <td><center><strong><?php echo __('Round'); ?></strong></center></td>
                                            <td><center><strong><?php echo __('Date of the round'); ?></strong></center></td>
                                            <td><center><strong><?php echo __('Competition time'); ?></strong></center></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $inscripciones = Inscripcion::model()->findAll('id_usuario ='.$id_usuario);
                                            function validacion($tipo){
                                                if($tipo == 1){
                                                    echo "Si";
                                                }
                                                if($tipo == 0){
                                                    echo "No";
                                                }
                                            }
                                            foreach ($inscripciones as $inscripcion){
                                                ?>
                                                <tr>
                                                    <td><center><?php echo $inscripcion->id_inscripcion; ?></center></td>
                                                    <td><center><?php echo $inscripcion->idCopetencia->competencia; ?></center></td>
                                                    <td><center><?php echo $inscripcion->idCategoria->categoria; ?></center></td>
                                                    <td>
                                                        <center>
                                                            <?php
                                                                if($inscripcion->id_competencia_tipo == 1){
                                                                    echo "Solista";
                                                                    $grupo = "-";

                                                                }
                                                                if($inscripcion->id_competencia_tipo == 2){
                                                                    echo "Pareja";
                                                                    $grupo = "-";
                                                                }
                                                                if($inscripcion->id_competencia_tipo == 3){
                                                                    echo "Grupo";
                                                                    $grupo = $inscripcion->grupo;
                                                                }

                                                            ?>
                                                        </center>
                                                    </td>
                                                    <td><center><?php echo $grupo ?></center></td>
                                                    <td>
                                                        <!--<center>-->
                                                            <?php 
                                                            $participantes = Participante::model()->findAll('id_inscripcion ='.$inscripcion->id_inscripcion);
                                                            if(count($participantes) != 0){
                                                                ?><ul><?php
                                                                foreach ($participantes as $participante){
                                                                    ?><li><?php echo $participante->idUsuario->primer_nombre." ".$participante->idUsuario->primer_apellido; ?></li><?php
                                                                }
                                                                ?></ul><?php
                                                            }else{
                                                                echo "<center>0 participantes</center>";
                                                            }
                                                        ?>
                                                        <!--</center>-->
                                                    </td>
                                                    <td><center><?php echo $inscripcion->audio; ?></center></td>
                                                    <td>
                                                        <!--<center>-->
                                                            <ul>
                                                                <li>
                                                                    Acreditado: <?php echo validacion($inscripcion->acreditado); ?>
                                                                </li>
                                                                <li>
                                                                    Validado: <?php echo validacion($inscripcion->validado); ?>
                                                                </li>
                                                                <li>
                                                                    Musica validada: <?php echo validacion($inscripcion->musica_validada); ?>
                                                                </li>
                                                                <li>
                                                                    Orde de Participación: <?php echo $inscripcion->orden; ?>
                                                                </li>
                                                            </ul>
                                                        <!--</center>-->
                                                    </td>
                                                    <td><center>
                                                        <?php 
                                                        if(!$inscripcion->ronda){
                                                            echo __('Round not assigned');
                                                        }else{
                                                             if($inscripcion->ronda == 1){
                                                                 echo __('Final');
                                                             }
                                                             if($inscripcion->ronda == 2){
                                                                 echo __('Semifinal');
                                                             }
                                                             if($inscripcion->ronda == 3){
                                                                 echo __('Play off');
                                                             }
                                                        }
                                                        ?>
                                                    </center></td>
                                                    <td><center>
                                                        <?php 
                                                        if(!$inscripcion->ronda){
                                                            echo __('Round not assigned');
                                                        }else{
                                                            echo $inscripcion->idRonda->fecha_inicio." / ".$inscripcion->idRonda->fecha_final;
                                                            //echo $inscripcion->idRonda->fecha_inicio." / ".$inscripcion->idRonda->fecho_inicio;
                                                        }
                                                        ?>
                                                    </center></td><td><center>
                                                        <?php 
                                                        if(!$inscripcion->ronda){
                                                            echo __('Round not assigned');
                                                        }else{
                                                            $categoria = CompetenciaCategoria::model()->find('id_copetencia = 47 AND id_categoria ='.$inscripcion->id_categoria);
                                                            echo $categoria->hora.":".$categoria->minuto;
                                                        }
                                                        ?>
                                                    </center></td>

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
            
            <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-danger">
                    <div class="panel-heading"><?php echo __('List of Registrations where you participate'); ?></div>
                    <div class="panel-body">

                        <div class="table-responsive">

                            <table style=" width: 100%;" id="example2" class="table table-hover" cellspacing="0">
                                <thead>
                                    <tr class="warning" >
                                        <td><center><strong><?php echo __('Participant ID'); ?></strong></center></td>
                                        <td><center><strong><?php echo __('ID Registration'); ?></strong></center></td>
                                        <td><center><strong><?php echo __('Competition'); ?></strong></center></td>
                                        <td><center><strong><?php echo __('Category'); ?></strong></center></td>
                                        <td><center><strong><?php echo __('Kind'); ?></strong></center></td>
                                        <td><center><strong><?php echo __('Group'); ?></strong></center></td>
                                        <td><center><strong><?php echo __('Competitor'); ?></strong></center></td>
                                        <td><center><strong><?php echo __('Round'); ?></strong></center></td>
                                        <td><center><strong><?php echo __('Date of the round'); ?></strong></center></td>
                                        <td><center><strong><?php echo __('Competition time'); ?></strong></center></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $participantes = Participante::model()->findAll('id_usuario ='.$id_usuario);
                                    foreach ($participantes as $participante){
                                        ?>
                                        <tr>
                                            <td><center><?php echo $participante->id_participante; ?></center></td>
                                            <td><center><?php echo $participante->id_inscripcion; ?></center></td>
                                            <td><center><?php echo $participante->idCompetencia->competencia; ?></center></td>
                                            <td><center><?php echo $participante->idCategoria->categoria; ?></center></td>
                                            <td>
                                                <center>
                                                    <?php
                                                        if($participante->idInscripcion->id_competencia_tipo == 1){
                                                            echo "Solista";
                                                            $grupo = "-";

                                                        }
                                                        if($participante->idInscripcion->id_competencia_tipo == 2){
                                                            echo "Pareja";
                                                            $grupo = "-";
                                                        }
                                                        if($participante->idInscripcion->id_competencia_tipo == 3){
                                                            echo "Grupo";
                                                            $grupo = $participante->idInscripcion->grupo;
                                                        }
                                                    ?>
                                                </center>
                                            </td>
                                            <td><center><?php echo $grupo; ?></center></td>
                                            <td><center><?php echo $participante->idUsuario->primer_nombre." ".$participante->idUsuario->primer_apellido; ?></center></td>
                                            <td><center>
                                                        <?php 
                                                        if(!$inscripcion->ronda){
                                                            echo __('Round not assigned');
                                                        }else{
                                                             if($inscripcion->ronda == 1){
                                                                 echo __('Final');
                                                             }
                                                             if($inscripcion->ronda == 2){
                                                                 echo __('Semifinal');
                                                             }
                                                             if($inscripcion->ronda == 3){
                                                                 echo __('Play off');
                                                             }
                                                        }
                                                        ?>
                                                    </center></td>
                                                    <td><center>
                                                        <?php 
                                                        if(!$inscripcion->ronda){
                                                            echo __('Round not assigned');
                                                        }else{
                                                            echo $inscripcion->idRonda->fecha_inicio." / ".$inscripcion->idRonda->fecha_final;
                                                            //echo $inscripcion->idRonda->fecha_inicio." / ".$inscripcion->idRonda->fecho_inicio;
                                                        }
                                                        ?>
                                                    </center></td><td><center>
                                                        <?php 
                                                        if(!$inscripcion->ronda){
                                                            echo __('Round not assigned');
                                                        }else{
                                                            $categoria = CompetenciaCategoria::model()->find('id_copetencia = 47 AND id_categoria ='.$inscripcion->id_categoria);
                                                            echo $categoria->hora.":".$categoria->minuto;
                                                        }
                                                        ?>
                                                    </center></td>
                                                
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
            <div class="alert alert-danger">
                <b><?php echo __('This user does not exist in our data base.'); ?></b>
            </div>
          <?php
      }
  }
  
  public function actionConsulta(){
      $this->render('consulta',array());
  }
  
  public function actionLogin() {
    $model=new LoginForm;
    $usuario = new Usuario;
    
    // if it is ajax validation request
    if(isset($_POST['ajax']) && $_POST['ajax']==='login-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }

    // collect user input data
    if(isset($_POST['LoginForm'])) {
      //echo $_POST['LoginForm']["estatus_contrasena"];
      $model->attributes=$_POST['LoginForm'];
      // validate user input and redirect to the previous page if valid
      if($model->validate() && $model->login())
            
	$this->redirect(Yii::app()->user->returnUrl);
    }
    // display the login form
    $this->render('login',array('model'=>$model, 'usuario'=>$usuario));
  }

  /**
   * Logs out the current user and redirect to homepage.
   */
  public function actionLogout() {
    Yii::app()->user->logout();
    $this->redirect(Yii::app()->params['loginUrl']);
  }
  
  public function actionIntro() {
    $this->render('intro');
  }
}