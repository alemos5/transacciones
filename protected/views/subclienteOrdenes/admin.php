<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<style>
td.highlight {
    background-color: whitesmoke !important;
}    
</style>
    
<script>
$(document).ready( function () {
//    $('#example').DataTable();
    var table = $('#example').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
      });
     
    $('#example tbody')
        .on( 'mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;
 
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        } );

    var table = $('#example2').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
      });
     
    $('#example2 tbody')
        .on( 'mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;
 
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        } );

} );    
</script>

<?php
$this->breadcrumbs=array(
	'Subcliente Ordenes'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List SubclienteOrdenes','url'=>array('index')),
array('label'=>'Create SubclienteOrdenes','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('subcliente-ordenes-grid', {
data: $(this).serialize()
});
return false;
});
");
?>


<span class="ez">Administración de Ordenes por Subclientes</span>
<div class="pd-inner">
<?php 
function imprimir($id_orden){
    echo '<center><a target="_black" class="update" href="http://tracking.telocomproenusa.com/label.php?id='.$id_orden.'" data-toggle="tooltip" title="" data-original-title="Imprimir">
    <i class="glyphicon glyphicon-print"></i>
    </a></center>';
}
function wr($id_orden){
//    echo $id_orden;
    $ordenes = Ordenes::model()->find("id_orden =".$id_orden);
    echo $ordenes->ware_reciept;
}
//$this->widget('booster.widgets.TbGridView',array(
//'id'=>'subcliente-ordenes-grid',
//'dataProvider'=>$model->search(),
//'filter'=>$model,
//'columns'=>array(
//		'id_subcliente_ordenes',
////		'id_cliente',
//                array(
////                  'filter'=>CHtml::listData(Clientes::model()->findAll(),'id_cliente','nombre'),
//                  'name'=>'id_cliente',
//                  'type'=>'raw',
//                  'value'=>'$data->idClientes->nombre',
//                ),
////		'id_subcliente',
////		'orden',
//                array(
////                  'filter'=>CHtml::listData(Clientes::model()->findAll(),'id_cliente','nombre'),
//                  'name'=>'orden',
//                  'type'=>'raw',
//                  'value'=>'wr($data->id_orden)',
//                ),
//                array(
//                  'filter'=>CHtml::listData(Clientes::model()->findAll(),'id_cliente','nombre'),
//                  'name'=>'id_subcliente',
//                  'type'=>'raw',
//                  'value'=>'$data->idSubClientes->nombre',
//                ),
//		'peso',
//		'descripcion',
//                'fecha_registro',
//		/*
//		'costo_global',
//		'courier',
//		'fecha_registro',
//		'estatus',
//		*/
//                array(
//                  'filter'=>false,
//                  'header'=>false,  
//                  'name'=>'id_orden',
//                  'type'=>'raw',
//                  'value'=>'imprimir($data->id_orden)',
//                ),
//                array(
//                    'class'=>'booster.widgets.TbButtonColumn',
//                ),
//),
//    )); ?>
    
<table style=" width: 100%;" id="example" class="table table-hover" cellspacing="0">
    <thead>
        <tr>
            <td style=" width: 10%;"><center><strong>Id Subcliente Ordenes</strong></center></td>
            <td style=" width: 10%;"><center><strong>Cliente</strong></center></td>
            <td style=" width: 10%;"><center><strong>Orden / Consolidación</strong></center></td>
            <td style=" width: 10%;"><center><strong>Subcliente</strong></center></td>
            <td style=" width: 10%;"><center><strong>Peso</strong></center></td>
            <td style=" width: 10%;"><center><strong>Descripción</strong></center></td>
            <td style=" width: 10%;"><center><strong>Fecha de Registro</strong></center></td>
            <td style=" width: 10%;"><center><strong>Imprimir</strong></center></td>
        </tr>
    </thead>
    <tbody>
        <?php
        $subclienteOrdenes = SubclienteOrdenes::model()->findAll();
        foreach ($subclienteOrdenes as $subclienteOrden){
            ?>
            <tr>
                <td><center><?php echo $subclienteOrden->id_subcliente_ordenes; ?></center></td>
                <td><center><?php echo $subclienteOrden->idClientes->nombre; ?></center></td>
                <td><center><?php echo wr($subclienteOrden->id_orden); ?></center></td>
                <td><center><?php echo $subclienteOrden->idSubClientes->nombre; ?></center></td>
                <td><center><?php echo $subclienteOrden->peso; ?></center></td>
                <td><center><?php echo $subclienteOrden->descripcion; ?></center></td>
                <td><center><?php echo $subclienteOrden->fecha_registro; ?></center></td>
                <td><center><?php echo imprimir($subclienteOrden->id_orden); ?></center></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>    
    
</div>


