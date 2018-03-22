<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<?php
$this->breadcrumbs=array(
	'Djs',
);

$id_competencia = $_GET['idc'];
//echo $id_competencia; 

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
<span class="ez"><?php echo __('Round'); ?></span>

<div class="pd-inner">

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('Round List'); ?></div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="row-border hover order-column" cellspacing="0">
                            <thead>
                                <tr>
                                    <td><center><strong><?php echo __('Competition'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Round'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Start date'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('final date'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Qualify'); ?></strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                $rondas = OrganizacionRonda::model()->findAll();
                                foreach ($rondas as $ronda){
                                    ?>
                                    <tr>
                                        <td><center><?php echo $ronda->idCompetencia->competencia; ?></center></td>
                                        <td><center><?php echo $ronda->ronda; ?></center></td>
                                        <td><center><?php echo $ronda->fecha_inicio; ?></center></td>
                                        <td><center><?php echo $ronda->fecha_final; ?></center></td>
                                        <td>
                                            <center>
                                                <a href="listadoGeneral?idc=<?php echo $id_competencia; ?>&id_ronda=<?php echo $ronda->id_organizacion_ronda;?>">
                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
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