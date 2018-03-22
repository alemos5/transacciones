<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_envio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_envio),array('view','id'=>$data->id_tipo_envio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_envio')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_envio); ?>
	<br />

</div>