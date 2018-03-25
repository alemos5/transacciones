<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn = $this->guessNameColumn($this->tableSchema->columns);
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Update',
);\n";
?>

$this->menu=array(
array('label'=>'Listar <?php echo $this->modelClass; ?>','url'=>array('index')),
array('label'=>'Crear <?php echo $this->modelClass; ?>','url'=>array('create')),
array('label'=>'Detallar <?php echo $this->modelClass; ?>','url'=>array('view','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
array('label'=>'Administración <?php echo $this->modelClass; ?>','url'=>array('admin')),
);
?>

<span  class="ez">Actualizar <?php echo $this->modelClass . " <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></span>

<div class="pd-inner">
    <?php echo "<?php echo \$this->renderPartial('_form',array('model'=>\$model)); ?>"; ?>
</div>
