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
	'Create',
);\n";
?>

$this->menu=array(
array('label'=>'Listar <?php echo $this->modelClass; ?>','url'=>array('index')),
array('label'=>'Administración de <?php echo $this->modelClass; ?>','url'=>array('admin')),
);
?>

<span  class="ez">Crear <?php echo $this->modelClass; ?></span>

<div class="pd-inner">
    <?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
</div>