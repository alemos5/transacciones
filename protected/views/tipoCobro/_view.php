<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_cobro')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_cobro),array('view','id'=>$data->id_tipo_cobro)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_cobro')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_cobro); ?>
	<br />



</div>