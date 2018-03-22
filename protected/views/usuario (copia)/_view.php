<div class="view">
  <b><?php echo CHtml::encode($data->getAttributeLabel('cedula')); ?>:</b>
  <?php echo CHtml::link(CHtml::encode($data->cedula),array('view','id'=>$data->id_usuario_sistema)); ?>
  <br />
  
  <b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
  <?php echo CHtml::encode($data->usuario); ?>
  <br />
  
  <b><?php echo CHtml::encode('Nombre de Usuario'); ?>:</b>
  <?php echo CHtml::encode($data->primer_nombre.' '.$data->segundo_nombre.' '.$data->primer_apellido.' '.$data->segundo_apellido); ?>
  <br />
</div>