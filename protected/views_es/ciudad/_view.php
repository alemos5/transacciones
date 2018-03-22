<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_ciudad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_ciudad),array('view','id'=>$data->id_ciudad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_pais')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>