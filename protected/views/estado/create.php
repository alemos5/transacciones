<?php
$this->breadcrumbs=array(
	'State'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'List State','url'=>array('index')),
array('label'=>'Manage State','url'=>array('admin')),
);
?>

<span class="ez">Create State</span>
<div class="pd-inner">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>