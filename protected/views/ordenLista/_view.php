<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_orden_lista')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_orden_lista),array('view','id'=>$data->id_orden_lista)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orden_lista')); ?>:</b>
	<?php echo CHtml::encode($data->orden_lista); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>