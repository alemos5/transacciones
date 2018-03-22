<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_perfil_sistema')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_perfil_sistema),array('view','id'=>$data->id_perfil_sistema)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>