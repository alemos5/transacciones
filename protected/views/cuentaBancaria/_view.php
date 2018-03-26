<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_cuenta_bancaria')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_cuenta_bancaria),array('view','id'=>$data->id_cuenta_bancaria)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alias_cuenta_bancaria')); ?>:</b>
	<?php echo CHtml::encode($data->alias_cuenta_bancaria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_banco')); ?>:</b>
	<?php echo CHtml::encode($data->idBanco->banco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_cunta')); ?>:</b>
	<?php echo CHtml::encode(tipoCuenta($data->tipo_cunta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cbu')); ?>:</b>
	<?php echo CHtml::encode($data->cbu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cuenta')); ?>:</b>
	<?php echo CHtml::encode($data->Cuenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_documento')); ?>:</b>
	<?php echo CHtml::encode(tipoDocumento($data->tipo_documento)); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('documentacion')); ?>:</b>
    <?php echo CHtml::encode($data->documentacion); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
    <?php echo CHtml::encode($data->idEstatus->estatus_titulo); ?>
    <br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('documentacion')); ?>:</b>
	<?php echo CHtml::encode($data->documentacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correo')); ?>:</b>
	<?php echo CHtml::encode($data->correo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('img')); ?>:</b>
	<?php echo CHtml::encode($data->img); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pais')); ?>:</b>
	<?php echo CHtml::encode($data->id_pais); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_registro')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_modificacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_modificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_modificacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_modificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />

	*/ ?>

</div>