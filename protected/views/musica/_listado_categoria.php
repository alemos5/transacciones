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
<span class="ez">
    <?php echo __('Validate music: '); ?> / <?php echo __('Competition: '); ?> : <?php echo $competencia->competencia; ?>
    <div class="pull-right "  >
        <a class="btn btn-default" href="javascript:window.history.go(-1);">
            <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;&nbsp;<?php echo __('To return'); ?>
        </a>
    </div>
</span>

<div class="pd-inner">

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('List of Categories: '); ?></div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="row-border hover order-column" cellspacing="0">
                            <thead>
                                <tr>
                                    <td style=" width: 13%;"><center><strong><?php echo __('Competition'); ?></strong></center></td>
                                    <td style=" width: 13%;"><center><strong><?php echo __('Block'); ?></strong></center></td>
                                    <td style=" width: 15%;"><center><strong><?php echo __('ID Category'); ?></strong></center></td>
                                    <td style=" width: 15%;"><center><strong><?php echo __('Category'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Number of Registrations'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Validated'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('For validating'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Detail'); ?></strong></center></td>
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
                                        <td><center><?php echo $categoria->id_categoria; ?></center></td>
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
                                                  $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND musica_validada = 1  AND acreditado = 1');
                                                  echo count($inscripciones);  
                                            ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                            <?php 
                                                  $inscripciones = Inscripcion::model()->findAll('id_copetencia ='.$competencia->id_copetencia.' AND id_categoria ='.$categoria->id_categoria.' AND musica_validada = 0 ');
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