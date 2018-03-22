<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_servicio_usuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_servicio_usuario),array('view','id'=>$data->id_servicio_usuario)); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('id_empresa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEmpresa->empresa),array('empresa/'.$data->id_empresa)); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_servicio')); ?>:</b>
	<?php echo CHtml::encode($data->idServicio->servicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('costo_servicio')); ?>:</b>
	<?php echo CHtml::encode($data->costo_servicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('costo_especial')); ?>:</b>
	<?php echo CHtml::encode($data->costo_especial); ?>
	<br />
        
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuario->correo); ?>
	<br />
</div>