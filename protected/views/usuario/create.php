<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List user','url'=>array('index')),
array('label'=>'Manage User','url'=>array('admin')),
);
?>

<span class="ez">Create new user</span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>