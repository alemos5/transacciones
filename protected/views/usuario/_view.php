<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_sistema')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_usuario_sistema),array('view','id'=>$data->id_usuario_sistema)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_documento')); ?>:</b>
	<?php echo CHtml::encode(tipoDocumento($data->tipo_documento)." - ".$data->cedula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primer_nombre')); ?>:</b>
	<?php echo CHtml::encode($data->primer_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primer_apellido')); ?>:</b>
	<?php echo CHtml::encode($data->primer_apellido); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_nacimiento')); ?>:</b>
	<?php echo CHtml::encode(date("d-m-Y", strtotime($data->fecha_nacimiento))); ?>
	<br />
        
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('segundo_apellido')); ?>:</b>
	<?php echo CHtml::encode($data->segundo_apellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_nacimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_nacimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sexo')); ?>:</b>
	<?php echo CHtml::encode($data->sexo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion_personal')); ?>:</b>
	<?php echo CHtml::encode($data->observacion_personal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('a_r')); ?>:</b>
	<?php echo CHtml::encode($data->a_r); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_j')); ?>:</b>
	<?php echo CHtml::encode($data->n_j); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('razon_social')); ?>:</b>
	<?php echo CHtml::encode($data->razon_social); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tlf_habitacion')); ?>:</b>
	<?php echo CHtml::encode($data->tlf_habitacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tlf_personal')); ?>:</b>
	<?php echo CHtml::encode($data->tlf_personal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tlf_personal2')); ?>:</b>
	<?php echo CHtml::encode($data->tlf_personal2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correo')); ?>:</b>
	<?php echo CHtml::encode($data->correo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correo2')); ?>:</b>
	<?php echo CHtml::encode($data->correo2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('autorizacion')); ?>:</b>
	<?php echo CHtml::encode($data->autorizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('img')); ?>:</b>
	<?php echo CHtml::encode($data->img); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contrasena')); ?>:</b>
	<?php echo CHtml::encode($data->contrasena); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_perfil_sistema')); ?>:</b>
	<?php echo CHtml::encode($data->id_perfil_sistema); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_registro')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus_contrasena')); ?>:</b>
	<?php echo CHtml::encode($data->estatus_contrasena); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion_ip')); ?>:</b>
	<?php echo CHtml::encode($data->direccion_ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_registrador')); ?>:</b>
	<?php echo CHtml::encode($data->id_registrador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_sociedad')); ?>:</b>
	<?php echo CHtml::encode($data->id_sociedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('latitud')); ?>:</b>
	<?php echo CHtml::encode($data->latitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('longitud')); ?>:</b>
	<?php echo CHtml::encode($data->longitud); ?>
	<br />

	*/ ?>

</div>