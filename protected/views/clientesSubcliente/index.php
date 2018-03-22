<?php
$this->breadcrumbs=array(
	'Clientes Subclientes',
);

$this->menu=array(
array('label'=>'Create Subcliente','url'=>array('create')),
array('label'=>'Manage Subcliente','url'=>array('admin')),
);
?>

<span  class="ez">Subclientes</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>
