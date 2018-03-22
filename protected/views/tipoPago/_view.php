<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_pago')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_pago),array('view','id'=>$data->id_tipo_pago)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_pago')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_pago); ?>
	<br />


</div>