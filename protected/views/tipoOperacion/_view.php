<div class="view">

        <b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_operacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_operacion),array('view','id'=>$data->id_tipo_operacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_operacion')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_operacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion')); ?>:</b>
	<?php echo CHtml::encode($data->observacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php if(CHtml::encode($data->estatus)==1){ echo "Activo"; }else{ echo "Inactivo"; } ?>
	<br />
<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_sistema_reg')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_sistema_reg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_reg')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_reg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_sistema_mod')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_sistema_mod); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_reg')); ?>:</b>
	<?php echo CHtml::encode($data->ip_reg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_mod')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_mod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_mod')); ?>:</b>
	<?php echo CHtml::encode($data->ip_mod); ?>
	<br />

	*/ ?>

</div>