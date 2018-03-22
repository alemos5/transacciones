<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_forma_pago')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_forma_pago),array('view','id'=>$data->id_forma_pago)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('forma_pago')); ?>:</b>
	<?php echo CHtml::encode($data->forma_pago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>