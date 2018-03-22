<?php
$this->breadcrumbs=array(
	'Payments',
);

$this->menu=array(
//array('label'=>'Reportar Pago','url'=>array('create')),
//array('label'=>'Administrar Pagos','url'=>array('admin')),
);
?>


<span class="ez">Payments: Competitor pass</span>

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
            return "Competitor";
        }else{
            return "Category";
        }
    }
    
    $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); ?>
</div>