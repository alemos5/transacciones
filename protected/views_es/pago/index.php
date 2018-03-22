<?php
$this->breadcrumbs=array(
	'Pagos',
);

$this->menu=array(
//array('label'=>'Reportar Pago','url'=>array('create')),
//array('label'=>'Administrar Pagos','url'=>array('admin')),
);
?>


<span class="ez">Pagos Reportados: Pase Competidor</span>

<div class="pd-inner">
    <?php 
    
    function validar($id_competencia, $id_categoria){
    if($id_competencia){
        $competencia = Competencia::model()->find('id_copetencia ='.$id_competencia);
        return $competencia->competencia;
    }else{
        $categoria = Categoria::model()->find('id_categoria ='.$id_categoria);
        return $categoria->categoria;
    }
    }
    function validarTipo($id_competencia, $id_categoria){
        if($id_competencia){
            return "Competencia";
        }else{
            return "Categoría";
        }
    }
    
    $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>