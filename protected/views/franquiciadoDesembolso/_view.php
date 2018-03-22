<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_franquiciado_desembolso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_franquiciado_desembolso),array('view','id'=>$data->id_franquiciado_desembolso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_competencia')); ?>:</b>
	<?php echo CHtml::encode($data->id_competencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_franquiciado')); ?>:</b>
	<?php echo CHtml::encode($data->id_franquiciado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto')); ?>:</b>
	<?php echo CHtml::encode($data->monto); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />

	*/ ?>

</div>