<?php
/* @var $this AuditFieldController */
/* @var $model AuditField */

$this->breadcrumbs=array(
	'Audit Fields'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>__('Back'), 'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('View Audit'); ?> <b>#<?php echo $model->id; ?></b></span>

<div class="pd-inner">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
        'user_id',
		'audit_request_id',
        'model_name',
        'field',
		'old_value',
		'new_value',
		'action',
        array(
            'label' => __("Register"),
            'value' => date("d-m-Y h:m:s", strtotime($model->register)),
        ),
	),
)); ?>
</div>