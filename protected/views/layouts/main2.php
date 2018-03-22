<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set('display_errors', '0');


/*PARA TRADUCIR MENU SE DEBE AGREGAR LA OPCION A LA SIGUIENTE LISTA*/
__('Home');
__('Credentials');
__('Profile');
__('Menu');
__('User');
__('Assign Profile-Menu');
__('Administrators');
__('State');
__('Municipality');
__('Parish');
__('Country');
__('Blocks');
__('Categories');
__('Types of Categories');
__('Items to Qualify');
__('Items to Qualify by Category');
__('Competition');
__('Category Competition');
__('Type Competition');
__('Qualification');
__('School');
__('Inscription');
__('Participant Inscription');
__('Method of Payment');
__('Payment Report');
__('Inscription Status');
__('Competitor Pass');
__('Reports');
__('Dj');
__('Accreditation');
__('Order list');
__('Validate Music');
__('Backstage');
__('Technical Support');
__('Transactions');
__('Competitor Pass');
__('Franchisee');
__('Authentication');
__('Subscription');

/*PARA TRADUCIR PALABRAS QUE VIENE DE BD */
__('Pending payment');
__('Paid');
__('Rejected');


/****************/
?>
<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- blueprint CSS framework -->
    <!--<link rel="stylesheet" type="text/css" href="<?php /* echo Yii::app()->request->baseUrl; */ ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php /*echo Yii::app()->request->baseUrl; */ ?>/css/print.css" media="print" /> -->
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />    -->
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/gacela.ico">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  </head>
  <body>
      <?php
      
//        if(!Yii::app()->user->isGuest){
//            //Yii::app()->user->img = "defaul.png";
//          
//            header('Location: site/login');
//        }
      
      ?>
<!--	  <div class="<?php if(!Yii::app()->user->isGuest): echo 'none'; else: echo '';  endif ?>" id="barra" align="center">
		<img class="img-responsive" src="<?php if(!Yii::app()->user->isGuest): echo 'images/barra.png'; else: echo '../images/barra.png';  endif ?>" />
	</div>-->
	<div id="layout" class="disable">
		<?php


if(isset(Yii::app()->user->id_perfil_sistema)){
    if(Yii::app()->user->id_perfil_sistema=='1'){


		$menus = Yii::app()->user->buildMenu(); 
		$this->widget(
    'booster.widgets.TbNavbar',
    array(
        'type' => null, // null or 'inverse'
        'collapse' => true, // requires bootstrap-responsive.css
        'fixed' => 'top',
        'fluid' => true,
        'brand'=>'<img style="top: 10px; position: absolute" src="'.Yii::app()->request->baseUrl.'/images/logo-nav.png">',
        'items' => array(
            array(
                'class' => 'booster.widgets.TbMenu',
            	'type' => 'navbar',
                'items' => $menus),
            array(
                'class' => 'booster.widgets.TbMenu',
                'type' => 'navbar',
                'encodeLabel'=> false,
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(
                    array(
                        'label' => '<span style="line-height: 3.6">'.substr(strtoupper(Yii::app()->user->_id),0,20).'...</span>',
                    ),
                    array('label' => '<img src="http://appwin.net/images/idioma/idioma.png" alt="" width="20px">', 'url' => '#','items'=> array(
                        array('label' => '<img src="http://appwin.net/images/idioma/english.png" alt="" width="20px"> English','icon'=>'file','url' => array('/usuario/Idioma/1')),
                        array('label' => '<img src="http://appwin.net/images/idioma/espanol.png" alt="" width="20px"> Español','icon'=>'file','url' => array('/usuario/Idioma/2')),
                        /*array('label' => '<img src="images/idioma/frances.png" alt="" width="20px"> Frances','icon'=>'file','url' => array('/usuario/Idioma/3')),*/
                    )),
                    array('label' => '<span class="user-menu glyphicon glyphicon-user"></span>', 'url' => '#','items'=> array(
                        array('label' => __('My account'),'icon'=>'file','url' => array('/usuario/'.Yii::app()->user->id_usuario_sistema)),
                        array('label' => __('Log out'),'icon'=>'file','url' => array('/site/logout')),
                    )),

                ),
            ),
        ),
    )
);
    }else{
    
        if(Yii::app()->user->id_perfil_sistema=='3'){
            
            
            $menus = Yii::app()->user->buildMenu(); 
		$this->widget(
                'booster.widgets.TbNavbar',
                array(
                    'type' => null, // null or 'inverse'
                    'collapse' => true, // requires bootstrap-responsive.css
                    'fixed' => 'top',
                    'fluid' => true,
                    'brand'=>'<img style="top: 10px; position: absolute" src="'.Yii::app()->request->baseUrl.'/images/logo-nav.png">',
                    'items' => array(
                        array(
                            'class' => 'booster.widgets.TbMenu',
                            'type' => 'navbar',
                            'items' => $menus),            
                        array(
                            'class' => 'booster.widgets.TbMenu',
                            'type' => 'navbar',
                            'encodeLabel'=> false,
                            'htmlOptions' => array('class' => 'pull-right'),
                            'items' => array(
            //                    array('label' => '<span class="user-menu glyphicon glyphicon-user"></span>', 'url' => '#','items'=> array(
            //                                    array('label' => 'Mi cuenta','icon'=>'file','url' => array('/usuario/'.Yii::app()->user->id_usuario_sistema)),
            //                                    array('label' => 'Cerrar sesión','icon'=>'file','url' => array('/site/logout')), 
            //									)),
                                array(
                                    'label' => '<span style="line-height: 3.6">'.substr(strtoupper(Yii::app()->user->_id),0,20).'...</span>',
                                ),
                                array('label' => '<img src="http://appwin.net/images/idioma/idioma.png" alt="" width="20px">', 'url' => '#','items'=> array(
                                    array('label' => '<img src="http://appwin.net/images/idioma/english.png" alt="" width="20px"> English','icon'=>'file','url' => array('/usuario/Idioma/1')),
                                    array('label' => '<img src="http://appwin.net/images/idioma/espanol.png" alt="" width="20px"> Español','icon'=>'file','url' => array('/usuario/Idioma/2')),
                                    /*array('label' => '<img src="images/idioma/frances.png" alt="" width="20px"> Frances','icon'=>'file','url' => array('/usuario/Idioma/3')),*/
                                )),
                                array('label' => '<span class="user-menu glyphicon glyphicon-user"></span>', 'url' => '#','items'=> array(
                                    array('label' => __('My account'),'icon'=>'file','url' => array('/usuario/'.Yii::app()->user->id_usuario_sistema)),
                                    array('label' => __('Log out'),'icon'=>'file','url' => array('/site/logout')),
                                                                                    )),

                            ),
                        ),
                    ),
                )
            );
            
            
            
        }else{
            if(Yii::app()->user->id_perfil_sistema=='7'){
                
                
                $menus = Yii::app()->user->buildMenu(); 
		$this->widget(
                'booster.widgets.TbNavbar',
                array(
                    'type' => null, // null or 'inverse'
                    'collapse' => true, // requires bootstrap-responsive.css
                    'fixed' => 'top',
                    'fluid' => true,
                    'brand'=>'<img style="top: 10px; position: absolute" src="'.Yii::app()->request->baseUrl.'/images/logo-nav.png">',
                    'items' => array(
                        array(
                            'class' => 'booster.widgets.TbMenu',
                            'type' => 'navbar',
                            'items' => $menus),            
                        array(
                            'class' => 'booster.widgets.TbMenu',
                            'type' => 'navbar',
                            'encodeLabel'=> false,
                            'htmlOptions' => array('class' => 'pull-right'),
                            'items' => array(
            //                    array('label' => '<span class="user-menu glyphicon glyphicon-user"></span>', 'url' => '#','items'=> array(
            //                                    array('label' => 'Mi cuenta','icon'=>'file','url' => array('/usuario/'.Yii::app()->user->id_usuario_sistema)),
            //                                    array('label' => 'Cerrar sesión','icon'=>'file','url' => array('/site/logout')), 
            //									)),
                                array(
                                    'label' => '<span style="line-height: 3.6">'.substr(strtoupper(Yii::app()->user->_id),0,20).'...</span>',
                                ),
                                array('label' => '<img src="http://appwin.net/images/idioma/idioma.png" alt="" width="20px">', 'url' => '#','items'=> array(
                                    array('label' => '<img src="http://appwin.net/images/idioma/english.png" alt="" width="20px"> English','icon'=>'file','url' => array('/usuario/Idioma/1')),
                                    array('label' => '<img src="http://appwin.net/images/idioma/espanol.png" alt="" width="20px"> Español','icon'=>'file','url' => array('/usuario/Idioma/2')),
                                    /*array('label' => '<img src="images/idioma/frances.png" alt="" width="20px"> Frances','icon'=>'file','url' => array('/usuario/Idioma/3')),*/
                                )),
                                                array('label' => '<span class="user-menu glyphicon glyphicon-user"></span>', 'url' => '#','items'=> array(
                                                    array('label' => __('My account'),'icon'=>'file','url' => array('/usuario/'.Yii::app()->user->id_usuario_sistema)),
                                                    array('label' => __('Log out'),'icon'=>'file','url' => array('/site/logout')),
                                                                                    )),

                            ),
                        ),
                    ),
                )
            );
                
                
            }else{
            
                $menus = Yii::app()->user->buildMenu(); 
		$this->widget(
                'booster.widgets.TbNavbar',
                array(
                    'type' => null, // null or 'inverse'
                    'collapse' => true, // requires bootstrap-responsive.css
                    'fixed' => 'top',
                    'fluid' => true,
                    'brand'=>'<img style="top: 10px; position: absolute" src="'.Yii::app()->request->baseUrl.'/images/logo-nav.png">',
                    'items' => array(
                        array(
                            'class' => 'booster.widgets.TbMenu',
                            'type' => 'navbar',
                            'items' => $menus),            
                        array(
                            'class' => 'booster.widgets.TbMenu',
                            'type' => 'navbar',
                            'encodeLabel'=> false,
                            'htmlOptions' => array('class' => 'pull-right'),
                            'items' => array(
            //                    array('label' => '<span class="user-menu glyphicon glyphicon-user"></span>', 'url' => '#','items'=> array(
            //                                    array('label' => 'Mi cuenta','icon'=>'file','url' => array('/usuario/'.Yii::app()->user->id_usuario_sistema)),
            //                                    array('label' => 'Cerrar sesión','icon'=>'file','url' => array('/site/logout')), 
            //									)),
                                array(
                                    'label' => '<span style="line-height: 3.6">'.substr(strtoupper(Yii::app()->user->_id),0,20).'...</span>',
                                ),
                                array('label' => '<img src="http://appwin.net/images/idioma/idioma.png" alt="" width="20px">', 'url' => '#','items'=> array(
                                    array('label' => '<img src="http://appwin.net/images/idioma/english.png" alt="" width="20px"> English','icon'=>'file','url' => array('/usuario/Idioma/1')),
                                    array('label' => '<img src="http://appwin.net/images/idioma/espanol.png" alt="" width="20px"> Español','icon'=>'file','url' => array('/usuario/Idioma/2')),
                                    /*array('label' => '<img src="images/idioma/frances.png" alt="" width="20px"> Frances','icon'=>'file','url' => array('/usuario/Idioma/3')),*/
                                )),
                                                array('label' => '<span class="user-menu glyphicon glyphicon-user"></span>', 'url' => '#','items'=> array(
                                                    array('label' => __('My account'),'icon'=>'file','url' => array('/usuario/'.Yii::app()->user->id_usuario_sistema)),
                                                    array('label' => __('Log out'),'icon'=>'file','url' => array('/site/logout')),
                                                                                    )),

                            ),
                        ),
                    ),
                )
            );
        }
        
    }
        
    } 

    }              
                ?>
	</div>	
	
	<?php if(count($this->menu) > 0) { ?>
	
      <div class="<?php if(!Yii::app()->user->isGuest): echo 'container-fluid'; else: echo 'container';  endif ?>" id="page" style="padding-top: 53px">
		<div class="row">
			<div id="layout" class="<?php if(!Yii::app()->user->isGuest): echo 'col-xs-12 col-md-2'; elseif(count($this->menu) > 0): echo 'col-md-12'; else: echo 'disable';  endif ?>">
				
                                <div id="<?php if(!Yii::app()->user->isGuest): echo 'herramienta'; else: echo 'disable';  endif ?>">
                                    <?php
                                        $host= $_SERVER["HTTP_HOST"];
                                        $url= $_SERVER["REQUEST_URI"];
//                                        echo Yii::app()->user->img;
                                        if($url == "site/index" || $url == ""){
//                                            $urlParte = explode("../", Yii::app()->user->img);
                                            $urlParte = "http://".$host."/images/usuario/".Yii::app()->user->img;
                                            ?>
                                            <img style="border-style: solid ; border-width: 2px;  height: 120px; width: 120px;" src="<?php echo $urlParte;?>" alt="..."  class="img-responsive img-circle img-thumbnail">
                                            <br><br>
                                            <?php 
                                                  $usuario = Usuario::model()->find('id_usuario_sistema ='.Yii::app()->user->id_usuario_sistema);  
                                                  echo $usuario->primer_nombre." ".$usuario->primer_apellido;
                                            ?>
                                            <?php
                                        }else{
                                            ?>
                                            <!--<span class="title_2">Operaciones</span>-->
                                            <?php
//                                            $urlParte = explode("../", Yii::app()->user->img);
                                            $urlParte = "http://".$host."/images/usuario/".Yii::app()->user->img;
                                            ?>
                                            <img style="border-style: solid ; border-width: 2px;  height: 120px; width: 120px;" src="<?php echo $urlParte;?>" alt="..."  class="img-responsive img-circle img-thumbnail">
                                            <br><br>
                                            <?php 
                                                  $usuario = Usuario::model()->find('id_usuario_sistema ='.Yii::app()->user->id_usuario_sistema);  
                                                  echo $usuario->primer_nombre." ".$usuario->primer_apellido;
                                            ?>
                                            <?php
                                        }
                                    ?>
                                    
				</div>
				<div class="<?php if(!Yii::app()->user->isGuest): echo 'menu_item'; else: echo 'disable';  endif ?>">
					<?php
                                        

                                        if(Yii::app()->user->id_perfil_sistema=='1'){
					  $this->widget('booster.widgets.TbMenu', array(
						'items'=>$this->menu,
						'type'=>'list',
						'htmlOptions' => array('class' => 'aside'),
					  ));
                                        }else{
                                            
                                            if(Yii::app()->user->id_perfil_sistema=='3'){
                                                
//                                                $this->widget('booster.widgets.TbMenu', array(
//                                                        'items'=>$this->menu,
//                                                        'type'=>'list',
//                                                        'htmlOptions' => array('class' => 'aside'),
//                                                  ));
                                                $this->menu =array(
                                                array('label'=>__('My profile'),'url'=>array('/usuario/update/'.Yii::app()->user->id_usuario_sistema)),
//                                                array('label'=>__('Competence'),'url'=>array('/site/index')),
//                                                array('label'=>__('History'),'url'=>array('/usuario/historial')),
                                                array('label'=>__('List of participants'),'url'=>array('/franquiciado/index')),
                                                array('label'=>__('List of Category'),'url'=>array('/franquiciado/categoria')),
                                                array('label'=>__('Wallet'),'url'=>array('/franquiciado/wallet')),
                                                    
                                                //array('label'=>'Administrar Competencia','url'=>array('admin')),
                                                );
                                                $this->widget('booster.widgets.TbMenu', array(
                                                        'items'=>$this->menu,
                                                        'type'=>'list',
                                                        'htmlOptions' => array('class' => 'aside'),
                                                  ));
                                                
                                            }else{
                                            if(Yii::app()->user->id_perfil_sistema=='7'){
                                                
                                                $this->menu =array(
                                                array('label'=>__('My profile'),'url'=>array('/usuario/update/'.Yii::app()->user->id_usuario_sistema)),
                                                array('label'=>__('Competence'),'url'=>array('/site/index')),
                                                array('label'=>__('History'),'url'=>array('/usuario/historial')),
                                                array('label'=>'Order of Qualifications','url'=>array('/calificacion/orden')),
                                                array('label'=>'Qualify','url'=>array('/juez/calificacion')),
                                                array('label'=>'Positions table','url'=>array('/calificacion/orden')),
                                                    
                                                //array('label'=>'Administrar Competencia','url'=>array('admin')),
                                                );
                                                $this->widget('booster.widgets.TbMenu', array(
                                                        'items'=>$this->menu,
                                                        'type'=>'list',
                                                        'htmlOptions' => array('class' => 'aside'),
                                                  ));
                                                
                                            }else{
                                            
                                                $this->menu =array(
                                                array('label'=>__('My profile'),'url'=>array('/usuario/update/'.Yii::app()->user->id_usuario_sistema)),
                                                array('label'=>__('Competence'),'url'=>array('/site/index')),
                                                array('label'=>__('History'),'url'=>array('/usuario/historial')),
                                                    
                                                //array('label'=>'Administrar Competencia','url'=>array('admin')),
                                                );
                                                $this->widget('booster.widgets.TbMenu', array(
                                                        'items'=>$this->menu,
                                                        'type'=>'list',
                                                        'htmlOptions' => array('class' => 'aside'),
                                                  ));
                                            }
                                            }
                                        }
					  ?>										
				</div>
			</div>
			<div id="layout" class="<?php if(!Yii::app()->user->isGuest): echo 'col-xs-12 col-md-10'; else: echo 'col-md-12';  endif ?>">			
<?php $this->widget('Flashes'); ?>				
<?php echo $content; ?>
			</div>
		</div><!-- class="row" -->
		
		<?php }else { ?>
			<!-- <div class="<?php if(Yii::app()->user->isGuest): echo 'container';  endif ?>" id="page"> -->
			<div class="<?php if(!Yii::app()->user->isGuest): echo 'container-fluid'; else: echo 'container';  endif ?>" id="page">
				<div class="row">
					<div id="layout" class="col-md-12">
<?php $this->widget('Flashes'); ?>						
<?php echo $content; ?>
					</div>
				</div>				
			</div>			
			<?php } ?>   
           
      <div class="clear"></div>      
    
    </div><!-- page -->
    <?php if(!Yii::app()->user->isGuest):
		echo '<div class="back"  id="footer">				
				<div class="center-block">
					<img class="img-responsive" src="'.Yii::app()->request->baseUrl.'/images/logo-foot.png" />				
				</div>
				<p><b>2017 - 2018 | &copy; WIN | NIT: xxxxx</b></span></p>
				<p><a href="'.Yii::app()->request->baseUrl.'/site/construccio">'.__('Use Terms').'</a> > <a href="'.Yii::app()->request->baseUrl.'/site/construccio">'.__("About us").'</a> > <a href="'.Yii::app()->request->baseUrl.'/site/construccio">'.__("Privacy Policies").'</a></p>
			  </div>'; else: 
		echo '<div  id="footer">
				<hr class="soften">
				WIN - '.__('Online Competition System').'<br />
				<span><b>2017 - 2018 | &copy; WIN | NIT: xxxxx</b></span>				
			  </div><!-- footer -->'; endif ?>
  </body>
</html>