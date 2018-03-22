<?php $estatus = array('Inactivo', 'Activo') ?>
<div class="view">
  <b><?php echo CHtml::encode($data->getAttributeLabel('id_menu_sistema')); ?>:</b>
  <?php echo CHtml::link(CHtml::encode($data->id_menu_sistema),array('view','id'=>$data->id_menu_sistema)); ?>
  <br />

  <b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
  <?php echo CHtml::encode($data->nombre); ?>
  <br />

  <b><?php echo CHtml::encode($data->getAttributeLabel('ruta')); ?>:</b>
  <?php echo CHtml::encode($data->ruta); ?>
  <br />

  <b><?php echo CHtml::encode($data->getAttributeLabel('padre')); ?>:</b>
  <?php echo CHtml::encode($data->padreMenu->nombre?$data->padreMenu->nombre:'Sin padre'); ?>
  <br />

  <b><?php echo CHtml::encode($data->getAttributeLabel('nivel')); ?>:</b>
  <?php echo CHtml::encode($data->nivel); ?>
  <br />

  <b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
  <?php echo CHtml::encode($estatus[$data->estatus]); ?>
  <br />
</div>