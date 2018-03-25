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
	'$label',
);\n";
?>

$this->menu=array(
array('label'=>'Crear <?php echo $this->modelClass; ?>','url'=>array('create')),
array('label'=>'Administración de <?php echo $this->modelClass; ?>','url'=>array('admin')),
);
?>

<span  class="ez"><?php echo $label; ?></span>

<div class="pd-inner">
    <?php echo "<?php"; ?> $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>