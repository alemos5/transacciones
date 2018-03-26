<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_moneda')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_moneda),array('view','id'=>$data->id_moneda)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('moneda')); ?>:</b>
	<?php echo CHtml::encode($data->moneda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alias')); ?>:</b>
	<?php echo CHtml::encode($data->alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->idEstatus->estatus_titulo); ?>
	<br />


</div>