<?php
$this->breadcrumbs=array(
	'Estados',
);

$this->menu=array(
array('label'=>'Create State','url'=>array('create')),
array('label'=>'Manage State','url'=>array('admin')),
);
?>

<span class="ez">State</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>
