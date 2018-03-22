<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_manifiesto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_manifiesto),array('view','id'=>$data->id_manifiesto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vchar_nombre')); ?>:</b>
	<?php echo CHtml::encode($data->vchar_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vchar_numero')); ?>:</b>
	<?php echo CHtml::encode($data->vchar_numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('float_peso')); ?>:</b>
	<?php echo CHtml::encode($data->float_peso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_instruccion')); ?>:</b>
	<?php echo CHtml::encode($data->id_instruccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dt_registro')); ?>:</b>
	<?php echo CHtml::encode($data->dt_registro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_status')); ?>:</b>
	<?php 
//        echo $data->id_status;
            switch ($data->id_status) {
                case '0':
                    $estado = 'Registrado';
                    $mensaje = 'Su orden esta lista para ser despachado al destino elegido.'.'<br>'.'El proceso de entrega de su orden puede tardar 4 dias habiles, contados desde el dia siguiente despues del pago de su factura.';
                    break;
                case '1':
                    $estado = 'Estatus Inicial';
                    $mensaje = 'Su orden esta lista para ser despachado al destino elegido.'.'<br>'.'El proceso de entrega de su orden puede tardar 4 dias habiles, contados desde el dia siguiente despues del pago de su factura.';
                    break;
                case '10':
                        $estado = 'Paquete listo para el envio.';
                        $mensaje = 'Su orden esta lista para ser despachado al destino elegido.'.'<br>'.'El proceso de entrega de su orden puede tardar 4 dias habiles, contados desde el dia siguiente despues del pago de su factura.';
                        break;

                case '11':
                        $estado = 'Entregado a la aerolinea';
                        $mensaje = 'Su paquete esta en transito, actualmente se encuentra procesando por la aerolinea.';
                        break;

                        case '12':
                        $estado = 'Pais destino';
                        $mensaje = 'Su paquete continua en transito;  se encuentra en el Pais de destino.';
                        break;

                        case '13':
                        $estado = 'Proceso de Aduanas';
                        $mensaje = 'Su paquete esta en transito, ingreso a proceso de Aduanas, esto puede tardar de 1 a 2 dias.';

                        break;

                        case '14':
                        $estado = 'Liberacion de Aduanas';
                        $mensaje = 'Su paquete esta en transito, fue liberado de aduanas sin ninguna novedad.';

                        break;

                        case '15':
                        $estado = 'Procesando para entrega local';
                        $mensaje = 'Su paquete esta en transito, se encuentra en nuestra bodega Bogota y esta en proceso para ser entregado a la trasnportadora terrestre local.';
                        break;

                default:
                        $estado = 'Procesando..';
                        break;
        }
        
            echo $estado; 
        ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ref')); ?>:</b>
	<?php echo CHtml::encode($data->ref); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vchar_comprador')); ?>:</b>
	<?php echo CHtml::encode($data->vchar_comprador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vchar_rif')); ?>:</b>
	<?php echo CHtml::encode($data->vchar_rif); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vchar_direccion')); ?>:</b>
	<?php echo CHtml::encode($data->vchar_direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vchar_telefono')); ?>:</b>
	<?php echo CHtml::encode($data->vchar_telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vchar_atencion')); ?>:</b>
	<?php echo CHtml::encode($data->vchar_atencion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vchar_codigoi_manifiesto')); ?>:</b>
	<?php echo CHtml::encode($data->vchar_codigoi_manifiesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AWB')); ?>:</b>
	<?php echo CHtml::encode($data->AWB); ?>
	<br />

	*/ ?>

</div>