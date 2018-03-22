<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_email')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_email),array('view','id'=>$data->id_email)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->code_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_email')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_orden')); ?>:</b>
	<?php echo CHtml::encode($data->id_orden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mensaje')); ?>:</b>
	<?php echo CHtml::encode($data->mensaje); ?>
	<br />


</div>