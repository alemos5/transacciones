<?php
$this->breadcrumbs=array(
	'Manifiesto Ordenes Bulto Loadings',
);

$this->menu=array(
array('label'=>'Create ManifiestoOrdenesBultoLoading','url'=>array('create')),
array('label'=>'Manage ManifiestoOrdenesBultoLoading','url'=>array('admin')),
);
?>

<h1>Manifiesto Ordenes Bulto Loadings</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
