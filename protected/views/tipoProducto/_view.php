<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_producto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_producto),array('view','id'=>$data->id_tipo_producto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_producto')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_producto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->idEstatus->estatus_titulo); ?>
	<br />


</div>