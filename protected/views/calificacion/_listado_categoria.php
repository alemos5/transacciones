<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<?php
//echo "ID: ".$id_copetencia;

if($id_copetencia){
  $competencia = Competencia::model()->find('id_copetencia ='.$id_copetencia);  
}

$this->breadcrumbs=array(
	'Djs',
);

$this->menu=array(
array('label'=>'Competences','url'=>array('index')),
//array('label'=>'Category','url'=>array('index')),
//array('label'=>'Group','url'=>array('index')),
//array('label'=>'Competences','url'=>array('index')),
//array('label'=>'Manage Dj','url'=>array('admin')),
);
?>
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
     
//    $('#example tbody')
//        .on( 'mouseenter', 'td', function () {
//            var colIdx = table.cell(this).index().column;
// 
//            $( table.cells().nodes() ).removeClass( 'highlight' );
//            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
//        } );

    

} );    
</script>
<span class="ez"><?php echo __('Order of Qualifications'); ?> / <?php echo __('Competition');?>: <?php echo $competencia->competencia; ?>
<div class="pull-right "  >
    <a class="btn btn-default" href="javascript:window.history.go(-1);">
        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;&nbsp;<?php echo __('To return'); ?>
    </a>
</div>
</span>
<div class="pd-inner">
    
    
<!--    <table>
    <tr>
        <td>One</td>
        <td>
            <a href="#" class="up">Up</a>
            <a href="#" class="down">Down</a>
        </td>
    </tr>
    <tr>
        <td>Two</td>
        <td>
            <a href="#" class="up">Up</a>
            <a href="#" class="down">Down</a>
        </td>
    </tr>
    <tr>
        <td>Three</td>
        <td>
            <a href="#" class="up">Up</a>
            <a href="#" class="down">Down</a>
        </td>
    </tr>
    <tr>
        <td>Four</td>
        <td>
            <a href="#" class="up">Up</a>
            <a href="#" class="down">Down</a>
        </td>
    </tr>
    <tr>
        <td>Five</td>
        <td>
            <a href="#" class="up">Up</a>
            <a href="#" class="down">Down</a>
        </td>
    </tr>
</table>-->
    
    
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('List of Categories'); ?></div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="row-border hover order-column" cellspacing="0">
                            <thead>
                                <tr>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Competition'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Block'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Category'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Number of Registrations'); ?></strong></center></td>
                                    <!--<td style=" width: 20%;"><center><strong><?php //echo __('Date Record'); ?></strong></center></td>-->
                                    <td style=" width: 10%;"><center><strong><?php echo __('Detail'); ?></strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
//                                $competencia = Competencia::model()->find('id_copetencia = 47');
                                $categorias = CompetenciaCategoria::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' ORDER BY orden ASC');
                                
//                                echo var_dump($categorias);
//                                $temporal = array();
//                                $a = 0;
//                                foreach ($categorias as $categoria){
//                                    $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND acreditado = 1');
//                                    if($inscripciones){
//                                    if(count($inscripciones) <= $cantidad){
//                                        $temporal[$a] = $categoria->id_competencia_categoria;
//                                        $a++;
//                                    }
//                                    }
//                                }
                                
                                //echo var_dump($temporal);
                                $a=0;
                                foreach ($categorias as $categoria){
//                                    
                                    
                                    $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND acreditado = 1');
                                    if($inscripciones){
//                                    if(count($inscripciones) <= $cantidad){
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $categoria->idCopetencia->competencia; ?></td>
                                        <td><?php echo $categoria->idCategoria->idBloque->bloque; ?></td>
                                        <td><?php echo $categoria->idCategoria->categoria; ?></td>
                                        <td>
                                            <center>
                                            <?php 
                                                $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND acreditado = 1');
                                                echo count($inscripciones);
                                            ?>
                                            </center>
                                        </td>
                                        
                                        
                                        <td>
                                            <center>
                                            <a href="listadoInscripcion?idc=<?php echo $categoria->id_copetencia; ?>&idca =<?php echo $categoria->id_categoria; ?>">
                                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                            </a>
                                            </center>
                                        </td>
                                        
                                    </tr>
                                    <?php
                                    $a++;
//                                }
                                 
                                }
                                
                                }
                                ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
</div>

<script>
    function actualizarfecha(id_categoriaCompetencia, anio, mes, dia){
//        alert(id_categoriaCompetencia+' - '+anio+' - '+mes+' - '+dia);
        $.post("<?php echo Yii::app()->createUrl('competenciaCategoria/actualizarFecha') ?>",{ id_categoriaCompetencia:id_categoriaCompetencia, anio:anio, mes:mes, dia:dia },
        function(data){
//            location.reload();
        });
    }
    
    function orden(id_categoriaCompetencia, accion, a, orden_actual){
        

        $.post("<?php echo Yii::app()->createUrl('competenciaCategoria/ordenar') ?>",{ 
            id_categoriaCompetencia:id_categoriaCompetencia, 
            accion:accion, 
            a:a, 
            orden_actual:orden_actual 
        },
        function(data){
//            location.reload();
        });
    }
    
function soloNumeros(e)
{
    var key = window.Event ? e.which : e.keyCode
    return ((key >= 48 && key <= 57) || (key==8))
}    

function guardarOrden(id){
    
    var valor = $('#ordenCategoria'+id).val();
//    var mensaje;
//    var opcion = confirm("¿Realmente desea almacenar el orden indicado?");
//    if(valor != ""){
////        alert(valor+' / '+id);
//        if (opcion == true) {
            $.post("<?php echo Yii::app()->createUrl('competenciaCategoria/Orden') ?>",{ id:id, valor:valor },
            function(data){
                //location.reload();
            });
//        } 
    
    
}
</script>
