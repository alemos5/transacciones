

<?php
$this->breadcrumbs=array(
	'Juezs',
);

$this->menu=array(
array('label'=>'Create Judge','url'=>array('create')),
);
?>

<span class="ez"><?php echo __('Judge'); ?></span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
    

        
         
        
        
</div>

