<?php
$this->breadcrumbs=array(
	'Clientes',
);

if(Yii::app()->user->id_perfil_sistema=='1' || Yii::app()->user->id_perfil_sistema=='2' ){
    $this->menu=array(
        array('label'=>'Crear Clientes','url'=>array('create')),
        array('label'=>'Administrar Clientes','url'=>array('admin')),
    );
}else{
    $this->menu=array(
        //array('label'=>'Crear Clientes','url'=>array('create')),
        array('label'=>'Administrar Clientes','url'=>array('admin')),
    );
}
?>

<span  class="ez">Clientes</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>