<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_backstage')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_backstage),array('view','id'=>$data->id_backstage)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('backstage')); ?>:</b>
	<?php echo CHtml::encode($data->backstage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>