<?php
/* @var $this AuditFieldController */
/* @var $model AuditField */

$this->breadcrumbs=array(
	'Audit Fields'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#audit-field-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

function mostrarUsuario($id_usuario){
    $usuario = Usuario::model()->find('id_usuario_sistema ='.$id_usuario);
    if(count($usuario)>0){
        return $usuario->usuario;
    }else{
        return Null;
    }
}

$usuarios = Yii::app()->db->createCommand('
            SELECT
                  U.usuario,
                  U.id_usuario_sistema
            FROM audit_field AS A
            LEFT JOIN usuario_sistema AS U ON (A.user_id=U.id_usuario_sistema)
            ORDER BY U.usuario
            ')->queryAll();
?>
<div style="height: 52px"></div>

<span class="ez"><?php echo __('Audit'); ?></span>

<div class="pd-inner">
<p>
    <?php echo __('You may optionally enter a comparison operator'); ?> (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    <?php echo __('or'); ?> <b>=</b>) <?php echo __('at the beginning of each of your search values to specify how the comparison should be done'); ?>.
</p>

<?php echo CHtml::link(__('Advanced Search'),'#',array('class'=>'search-button btn btn-primary')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView', array(
	'id'=>'audit-field-grid',
	'dataProvider'=>$model->search(),
    'type' => 'striped hover',
	'filter'=>$model,
	'columns'=>array(
	        /*
        array(
            'name'=>'user_id',
            'value'=>'mostrarUsuario($data->user_id)',
            'filter'=> CHtml::listData($usuarios, 'id_usuario_sistema', 'usuario')
        ),
        'model_name'=> array(
            'name' => 'model_name',
            'value' => '$data->model_name',
            'filter'=> CHtml::listData(AuditField::model()->findAll(), 'model_name', 'model_name')
        ),
        'field'=> array(
            'name' => 'field',
            'value' => '$data->field',
            'filter'=> CHtml::listData(AuditField::model()->findAll(), 'field', 'field')
        ),
	        */
		'old_value',
		'new_value',
        array(
            'filter'=>CHtml::listData(AuditField::model()->findAll(),'action','action'),
            'name'=>'action',
            'type'=>'raw',
            'value'=>'$data->action',
        ),

        'register',

		array(
            'htmlOptions' => array('nowrap'=>'nowrap'),
            'class'=>'booster.widgets.TbButtonColumn',
            'template'=>'{view}',
		),
	),
));

?>
</div>