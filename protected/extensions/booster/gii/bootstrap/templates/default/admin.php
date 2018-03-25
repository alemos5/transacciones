<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Manage',
);\n";
?>

$this->menu=array(
array('label'=>'List <?php echo $this->modelClass; ?>','url'=>array('index')),
array('label'=>'Create <?php echo $this->modelClass; ?>','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span  class="ez">Administración de <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></span>

<div class="pd-inner">
    <?php echo "<?php"; ?> $this->widget('booster.widgets.TbGridView',array(
    'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
    <?php
    $count = 0;
    foreach ($this->tableSchema->columns as $column) {
        if (++$count == 7) {
            echo "\t\t/*\n";
        }
        echo "\t\t'" . $column->name . "',\n";
    }
    if ($count >= 7) {
        echo "\t\t*/\n";
    }
    ?>
    array(
    'class'=>'booster.widgets.TbButtonColumn',
    ),
    ),
    )); ?>
</div>