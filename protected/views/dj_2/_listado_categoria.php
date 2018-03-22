<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<?php
//echo "ID: ".$id_copetencia;

if($id_copetencia){
  $competencia = Competencia::model()->find('id_copetencia ='.$id_copetencia);  


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
     
    $('#example tbody')
        .on( 'mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;
 
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        } );

    

} );    
</script>
<span class="ez">Dj / Competencia: <?php echo $competencia->competencia; ?></span>

<div class="pd-inner">

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
                                    <td><center><strong>Detallar</strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $categorias = CompetenciaCategoria::model()->findAll('id_copetencia ='.$competencia->id_copetencia);
                                foreach ($categorias as $categoria){
                                    ?>
                                    <tr>
                                        <td><?php echo $categoria->idCopetencia->competencia; ?></td>
                                        <td><?php echo $categoria->idCategoria->idBloque->bloque; ?></td>
                                        <td><?php echo $categoria->idCategoria->categoria; ?></td>
                                        <td><center>
                                            <?php 
                                                $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND acreditado = 1');
                                                echo count($inscripciones);
                                            ?>
                                        </center></td>
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
                                ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
</div>
<?php
}else{
    echo "Debe de seleccionar una competencia.";
}
?>