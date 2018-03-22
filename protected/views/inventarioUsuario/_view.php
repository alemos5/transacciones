<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idinventario_usuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idinventario_usuario),array('view','id'=>$data->idinventario_usuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_sistema')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_sistema); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->code_cliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producto')); ?>:</b>
	<?php echo CHtml::encode($data->producto); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('peso')); ?>:</b>
    <?php echo CHtml::encode($data->peso); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('distribuidor')); ?>:</b>
    <?php echo CHtml::encode($data->distribuidor); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('precio')); ?>:</b>
    <?php echo CHtml::encode($data->precio); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
    <?php echo CHtml::encode($data->cantidad); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
    <?php echo CHtml::encode($data->descripcion); ?>
    <br />

	<?php /*

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_registrador')); ?>:</b>
	<?php echo CHtml::encode($data->id_registrador); ?>
	<br />
         * 
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_modificador')); ?>:</b>
	<?php echo CHtml::encode($data->id_modificador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_modificacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_modificacion); ?>
	<br />

	*/ ?>

</div>