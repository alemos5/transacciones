<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_empresa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEmpresa->empresa),array('empresa/'.$data->id_empresa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_servicio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_servicio),array('view','id'=>$data->id_servicio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('servicio')); ?>:</b>
	<?php echo CHtml::encode($data->servicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_neto')); ?>:</b>
	<?php echo CHtml::encode($data->precio_neto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_sugerido')); ?>:</b>
	<?php echo CHtml::encode($data->precio_sugerido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentaje_ganacia')); ?>:</b>
	<?php echo CHtml::encode($data->porcentaje_ganacia); ?>
	<br />


</div>