<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_clientes_subcliente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_clientes_subcliente),array('view','id'=>$data->id_clientes_subcliente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->idClientes->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code_cliente_padre')); ?>:</b>
	<?php echo CHtml::encode($data->code_cliente_padre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code_cliente_hijo')); ?>:</b>
	<?php echo CHtml::encode($data->code_cliente_hijo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code_padre_hijo')); ?>:</b>
	<?php echo CHtml::encode($data->code_padre_hijo); ?>
	<br />


	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcioon')); ?>:</b>
	<?php echo CHtml::encode($data->descripcioon); ?>
	<br />

	*/ ?>

</div>