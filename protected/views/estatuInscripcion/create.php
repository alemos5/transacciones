<?php
$this->breadcrumbs=array(
	'Subscription status'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List  Subscription Status','url'=>array('index')),
array('label'=>'Manage  Subscription Status','url'=>array('admin')),
);
?>

<h1>Create  Subscription Status</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>