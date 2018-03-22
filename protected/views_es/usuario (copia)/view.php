<?php $this->breadcrumbs=array(
  'Usuarios'=>array('index'),
  $model->id_usuario_sistema,
);

$this->menu=array(
  array('label'=>'Lista de Usuarios','url'=>array('index')),
  array('label'=>'Crear Usuario','url'=>array('create')),
  array('label'=>'Actualizar Usuario','url'=>array('update','id'=>$model->id_usuario_sistema)),
  array('label'=>'Eliminar Usuario','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario_sistema),'confirm'=>'Estas seguro de eliminar el usuario '.$model->usuario.'?')),
  array('label'=>'Administración de Usuarios','url'=>array('admin')),
);
$estatus = array('Inactivo', 'Activo');
$date = new Date();
$sexo = array('M' => 'Masculino', 'F'=>'Femenino' ); ?>

<h1>Ver Usuario #<?php echo $model->id_usuario_sistema; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
  'data'=>$model,
  'attributes'=>array(
    'cedula',
    'usuario',
    'primer_nombre',
    'segundo_nombre',
    'primer_apellido',
    'segundo_apellido',
    array(
      'label'=>'Perfil Sistema',
      'type'=>'raw',
      'value'=>CHtml::encode($model->idPerfilSistema->nombre),
    ),
    array(
      'label'=>'Fecha de Nacimiento',
      'type'=>'raw',
      'value'=>CHtml::encode($date->convertDateEnToEs($model->fecha_nacimiento)),
    ),
    array(
      'label'=>'Sexo',
      'type'=>'raw',
      'value'=>CHtml::encode($sexo[$model->sexo]),
    ),
    array(
      'label'=>'Estatus',
      'type'=>'raw',
      'value'=>CHtml::encode($estatus[$model->estatus]),
    ),
    array(
      'label'=>'Estatus Contraseña',
      'type'=>'raw',
      'value'=>CHtml::encode($estatus[$model->estatus_contrasena]),
    ),
    'observacion_personal',
  ),
)); ?>