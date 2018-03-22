<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<?php
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
<span class="ez">Acreditaciones</span>

<div class="pd-inner">

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Competencia</div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="row-border hover order-column" cellspacing="0">
                            <thead>
                                <tr>
                                    <td><center><strong>Competencia</strong></center></td>
                                    <td><center><strong>Descripción</strong></center></td>
                                    <td><center><strong>Fecha del Evento</strong></center></td>
                                    <td><center><strong>Categorías</strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $competencias = Competencia::model()->findAll('estatus = 1');
                                foreach ($competencias as $competencia){
                                    ?>
                                    <tr>
                                        <td><?php echo $competencia->competencia; ?></td>
                                        <td><?php echo $competencia->descripcion; ?></td>
                                        <td><?php echo $competencia->fecha_copetencia; ?></td>
                                        <td>
                                            <center>
                                            <a href="listadoCategoria?idc=<?php echo $competencia->id_copetencia; ?>">
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