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

    

} );    
</script>
<?php
$this->breadcrumbs=array(
	'Organizacion Rondas',
);

$this->menu=array(
array('label'=>'Create OrganizacionRonda','url'=>array('create')),
array('label'=>'Manage OrganizacionRonda','url'=>array('admin')),
array('label'=>'Final','url'=>array('organizacionRonda/final')),
array('label'=>'Semifinal','url'=>array('organizacionRonda/semifinal')),
array('label'=>'Play off','url'=>array('organizacionRonda/eliminatoria')),
);
?>

<span class="ez"><?php echo __('Event organization: Semifinal'); ?></span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    )); 
    
//    echo var_dump($dataProvider);
    
    ?>
    
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Categorías</div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="row-border hover order-column" cellspacing="0">
                            <thead>
                                <tr>
                                    <td><center><strong>Competencia</strong></center></td>
                                    <td><center><strong>Bloque</strong></center></td>
                                    <td><center><strong>Categorías</strong></center></td>
                                    <td><center><strong>Cantidad de Inscripciones</strong></center></td>
                                    <td><center><strong>Validados</strong></center></td>
                                    <td><center><strong>Por validar</strong></center></td>
                                    <td><center><strong>Detallar</strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $competencia = Competencia::model()->find('id_copetencia = 47');
                                $categorias = CompetenciaCategoria::model()->findAll('id_copetencia ='.$competencia->id_copetencia);
                                foreach ($categorias as $categoria){
                                    $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND acreditado = 1');
                                    if($inscripciones){
                                    if(count($inscripciones) > 5 &&  count($inscripciones) <= $cantidad){
                                    
                                    ?>
                                    <tr>
                                        <td><?php echo $categoria->idCopetencia->competencia; ?></td>
                                        <td><?php echo $categoria->idCategoria->idBloque->bloque; ?></td>
                                        <td><?php echo $categoria->idCategoria->categoria; ?></td>
                                        <td>
                                            <center>
                                            <?php 
                                                $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria);
                                                echo count($inscripciones);
                                            ?>
                                            </center>
                                        </td>
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
                                            <?php 
                                                  $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND acreditado = 0');
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
                                }
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

