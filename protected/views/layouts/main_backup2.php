<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    
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
	  <div class="<?php if(!Yii::app()->user->isGuest): echo 'none'; else: echo '';  endif ?>" id="barra" align="center">
		<img class="img-responsive" src="<?php if(!Yii::app()->user->isGuest): echo 'images/barra.png'; else: echo '../images/barra.png';  endif ?>" />
	</div>
	<div id="layout" class="disable">
		<?php
//if(isset(Yii::app()->user->id_perfil_sistema)){
//    if(Yii::app()->user->id_perfil_sistema=='1'){
//             
//		$menus = Yii::app()->user->buildMenu(); 
//		$this->widget(
//    'booster.widgets.TbNavbar',
//    array(
//        'type' => null, // null or 'inverse'
//        'collapse' => true, // requires bootstrap-responsive.css
//        'fixed' => 'top',
//        'fluid' => true,
//        'brand'=>'<img style="top: 10px; position: absolute" src="'.Yii::app()->request->baseUrl.'/images/logo-nav.png">',
//        'items' => array(
//            array(
//                'class' => 'booster.widgets.TbMenu',
//            	'type' => 'navbar',
//                'items' => $menus),            
//            array(
//                'class' => 'booster.widgets.TbMenu',
//                'type' => 'navbar',
//                'encodeLabel'=> false,
//                'htmlOptions' => array('class' => 'pull-right'),
//                'items' => array(
//                    array('label' => '<span class="user-menu glyphicon glyphicon-user"></span>', 'url' => '#','items'=> array(
//                                    array('label' => 'Configuración','icon'=>'file','url' => '#'),
//                                    array('label' => 'Cerrar sesión','icon'=>'file','url' => array('/site/logout')), 
//									)),                
//                ),
//            ),
//        ),
//    )
//);
//    }else{
//$menus = Yii::app()->user->buildMenu(); 
//		$this->widget(
//    'booster.widgets.TbNavbar',
//    array(
//        'type' => null, // null or 'inverse'
//        'collapse' => true, // requires bootstrap-responsive.css
//        'fixed' => 'top',
//        'fluid' => true,
//        'brand'=>'<img style="top: 10px; position: absolute" src="'.Yii::app()->request->baseUrl.'/images/logo-nav.png">',
//        'items' => array(
//            array(
//                'class' => 'booster.widgets.TbMenu',
//            	'type' => 'navbar',
//                'items' => $menus),            
//            array(
//                'class' => 'booster.widgets.TbMenu',
//                'type' => 'navbar',
//                'encodeLabel'=> false,
//                'htmlOptions' => array('class' => 'pull-right'),
//                'items' => array(
//                    array('label' => '<span class="user-menu glyphicon glyphicon-user"></span>', 'url' => '#','items'=> array(
//                                    array('label' => 'Cerrar sesión','icon'=>'file','url' => array('/site/logout')), 
//									)),                
//                ),
//            ),
//        ),
//    )
//);        
//} }              
                ?>
	</div>	
	
	<?php if(count($this->menu) > 0) { ?>
	
      <div class="<?php if(!Yii::app()->user->isGuest): echo 'container-fluid'; else: echo 'container';  endif ?>" id="page" style="padding-top: 53px">
		<div class="row">
			<div id="layout" class="<?php if(!Yii::app()->user->isGuest): echo 'col-xs-12 col-md-2'; elseif(count($this->menu) > 0): echo 'col-md-12'; else: echo 'disable';  endif ?>">
				<div id="<?php if(!Yii::app()->user->isGuest): echo 'herramienta'; else: echo 'disable';  endif ?>">
					<span class="title_2">Operaciones</span>
				</div>
				<div class="<?php if(!Yii::app()->user->isGuest): echo 'menu_item'; else: echo 'disable';  endif ?>">
					<?php
					  $this->widget('booster.widgets.TbMenu', array(
						'items'=>$this->menu,
						'type'=>'list',
						'htmlOptions' => array('class' => 'aside'),
					  ));
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
				<p><b>2015 - 2016 | Gacela | RIF: G-20008767-6</b></span></p>
				<p><a href="'.Yii::app()->request->baseUrl.'/site/construccio">User Terms</a> > <a href="'.Yii::app()->request->baseUrl.'/site/construccio">About us</a> > <a href="'.Yii::app()->request->baseUrl.'/site/construccio">Privacy policies</a></p>
			  </div>'; else: 
		echo '<div  id="footer">
				<hr class="soften">
				Fondo Nacional de Garant&iacute;as Rec&iacute;procas para la Peque&ntilde;a y Mediana Empresa<br />
				<span><b>2015 - 2016 | FONPYME S.A | RIF: G-20008767-6</b></span>				
			  </div><!-- footer -->'; endif ?>
  </body>
</html>