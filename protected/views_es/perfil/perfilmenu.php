<?php $this->pageTitle=Yii::app()->name.' - Pefil-Menu';
$this->breadcrumbs=array(
  'Pefil-Menu',
);

$this->menu=array(
  array('label'=>'Crear Perfil','url'=>array('create')),
  array('label'=>'Administración de Perfiles','url'=>array('admin')),
);
?>

<div class="form">

  <?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
    'id'=>'perfil-menu-perfilmenu-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // See class documentation of CActiveForm for details on this,
    // you need to use the performAjaxValidation()-method described there.
    'enableAjaxValidation'=>false,
  )); ?>

  <p class="note">Campos con <span class="required">*</span> son requeridos.</p>

  <?php echo $form->errorSummary($model); ?>

  <?php $data = CHtml::listData(Perfil::model()->findAll(), 'id_perfil_sistema', 'nombre');
  echo $form->dropDownListGroup($model,'id_perfil_sistema',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'this.form.submit()'), 'data' => array(''=>'Seleccione...') + $data,), 'labelOptions'=>array('label'=>'Pefil:'))); ?>
  
  <?php $this->widget(
    'booster.widgets.TbGridView',
    array(
      'dataProvider' => $menu,
      'beforeAjaxUpdate'=>'function(id, options){ options.data = {"perfil":"'.$model->id_perfil_sistema.'"}}',
      'columns' => array(
	array('name' => 'menu.nombre', 'header' => 'Nombre'),
	array(
	  'class' => 'booster.widgets.TbToggleColumn',
	  'toggleAction' => 'perfil/toggle',
	  'header' => 'Crear',
	  'name'=>'crear',
	 ),
	array(
	  'class' => 'booster.widgets.TbToggleColumn',
	  'toggleAction' => 'perfil/toggle',
	  'header' => 'Modificar',
	  'name'=>'modificar',
	 ),
	array(
	  'class' => 'booster.widgets.TbToggleColumn',
	  'toggleAction' => 'perfil/toggle',
	  'header' => 'Consultar',
	  'name'=>'consultar',
	 ),
	array(
	  'class' => 'booster.widgets.TbToggleColumn',
	  'toggleAction' => 'perfil/toggle',
	  'header' => 'Eliminar',
	  'name'=>'eliminar',
	 ),
	array(
	  'class' => 'booster.widgets.TbToggleColumn',
	  'toggleAction' => 'perfil/toggle',
	  'header' => 'Imprimir',
	  'name'=>'imprimir',
	 ),
	array(
	  'class'=>'booster.widgets.TbButtonColumn',
	  'header' => 'Eliminar del Perfil',
	  'template'=>'{delete}',
	  'buttons'=>array('delete' =>array('url'=>'Yii::app()->controller->createUrl(\'perfil/perfilmenu\', array(\'delete\'=>1, \'id_perfil_sistema\'=>$data->id_perfil_sistema, \'id_menu_sistema\'=>$data->id_menu_sistema))')),
	 ),
      )
    )
  ); ?>

  <div class="form-actions">
  <?php $this->widget('booster.widgets.TbButton', array(
    'context'=>'primary',
    'label'=>'Añadir Menú al Perfil',
    'htmlOptions'=>array('data-toggle'=>'modal', 'data-target'=>'#MenuPerfil')
  )); ?>
  </div>

  <?php $this->endWidget(); ?>
</div><!-- form -->

<?php $this->beginWidget('booster.widgets.TbModal', array('id'=>'MenuPerfil')) ?>
<div class="modal-header">
  <a class="close" data-dismiss="modal">&times;</a>
  <h4>Menu Perfil</h4>
</div>
<div class="modal-body">
  <?php if($model->id_perfil_sistema) $perfil = $model->id_perfil_sistema;
  else $perfil = 0;
  $data = CHtml::listData(Yii::app()->db->createCommand("SELECT id_menu_sistema, nombre FROM menu_sistema WHERE menu_sistema.id_menu_sistema NOT IN (SELECT perfil_menu.id_menu_sistema FROM perfil_menu WHERE perfil_menu.id_perfil_sistema = ".$perfil.")")->queryAll(), 'id_menu_sistema', 'nombre');
  echo $form->dropDownListGroup($model,'id_menu_sistema', array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data' => array(''=>'Seleccione...') + $data,))); ?>
</div>
<div class="modal-footer">
    <?php $this->widget('booster.widgets.TbButton', array(
	    'context'=>'primary',
	    'label'=>'Guardar',
	    'url'=>'#',
	    'htmlOptions'=>array('data-dismiss'=>'modal', 'onclick'=>'addMenuPerfil()')
    ));
    $this->widget('booster.widgets.TbButton', array(
	    'label'=>'Cerrar',
	    'url'=>'#',
	    'htmlOptions'=>array('data-dismiss'=>'modal')
    ));?>
</div>
<?php $this->endWidget(); ?>

<script type="text/javascript">
function addMenuPerfil()
{
  $.post(
    "<?php Yii::app()->controller->createUrl('perfil/perfilmenu'); ?>",
    {
      'PerfilMenu[id_perfil_sistema]': $('#PerfilMenu_id_perfil_sistema').val(),
      'PerfilMenu[id_menu_sistema]':$('#PerfilMenu_id_menu_sistema').val(),
      'ajax-perfilmenu': 1,
    }
  );
  $.fn.yiiGridView.update($('.grid-view').attr('id'));
}
</script>