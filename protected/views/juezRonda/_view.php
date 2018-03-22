<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_juez_ronda')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_juez_ronda),array('view','id'=>$data->id_juez_ronda)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_juez')); ?>:</b>
	<?php echo CHtml::encode($data->id_juez); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ronda')); ?>:</b>
	<?php echo CHtml::encode($data->id_ronda); ?>
	<br />


</div>