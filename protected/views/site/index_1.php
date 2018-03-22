<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>

<div class="pd-inner" style="padding-top: 70px">
	<center>
		
		
<?php $this->beginWidget(
    'booster.widgets.TbJumbotron',
    array(
        'heading' => 'Te damos la Bienvenida, <span class="user glyphicon glyphicon-user"></span> '.Yii::app()->user->name.'.',
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
