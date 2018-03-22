<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_acreditado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_acreditado),array('view','id'=>$data->id_acreditado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acreditado')); ?>:</b>
	<?php echo CHtml::encode($data->acreditado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>