<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_calculo_peso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_calculo_peso),array('view','id'=>$data->id_calculo_peso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calculo_peso')); ?>:</b>
	<?php echo CHtml::encode($data->calculo_peso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>