<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_calculo_a')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_calculo_a),array('view','id'=>$data->id_calculo_a)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calculo_a')); ?>:</b>
	<?php echo CHtml::encode($data->calculo_a); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>