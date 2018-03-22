

<?php
$this->pageTitle=Yii::app()->name;
$this->menu=array(
array('label'=>__('My Profile'),'url'=>array('/usuario/'.Yii::app()->user->id_usuario_sistema)),
array('label'=>__('Mis datos'),'url'=>array('/usuario/ordenPersonal')),
);
?>

<div class="pd-inner" style="padding-top: 70px">
	<center>
		
		
<?php 
$usuario = Usuario::model()->find('id_usuario_sistema ='.Yii::app()->user->id_usuario_sistema);
$usuario = $usuario->primer_nombre." ".$usuario->primer_apellido;  
$this->beginWidget(
    'booster.widgets.TbJumbotron',
    array(
        'heading' => 'Te damos la Bienvenida, <span class="user glyphicon glyphicon-user"></span> '.$usuario.'.',
        'htmlOptions' => array('class'=>'hero-unit'),
        'encodeHeading' => false,
    )
); ?>
     
    <h4>Por favor seleccione las opciones que usted dispone en el men&uacute; principal.</h4>
 
    <p><?php /* $this->widget(
            'booster.widgets.TbButton',
            array(
                'context' => 'primary',
                'size' => 'large',
                'label' => 'Learn more',
            )
        ); */ ?></p>
 
<?php $this->endWidget(); ?>
</center>
</div>
