<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_parroquia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_parroquia),array('view','id'=>$data->id_parroquia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_municipio')); ?>:</b>
	<?php echo CHtml::encode($data->id_municipio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>