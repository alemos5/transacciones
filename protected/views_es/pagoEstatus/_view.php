<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_pago_estatus')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pago_estatus),array('view','id'=>$data->id_pago_estatus)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pago_estatus')); ?>:</b>
	<?php echo CHtml::encode($data->pago_estatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>