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
	'Franquiciado Desembolsos',
);

$this->menu=array(
array('label'=>'Crear Desembolso Franquiciado ','url'=>array('create')),
array('label'=>'Administrar Desembolso Franquiciado','url'=>array('admin')),
);
?>

<span class="ez">Desembolsos Franquiciado </span>
<div class="pd-inner">
<?php 
//$this->widget('booster.widgets.TbListView',array(
//'dataProvider'=>$dataProvider,
//'itemView'=>'_view',
//)); 
?>
    
    <table style=" width: 100%;" id="example" class="row-border hover order-column" cellspacing="0">
        <thead>
            <tr>
                <td><center><strong><?php echo __('Competition'); ?></strong></center></td>
                <td><center><strong><?php echo __('Applicant'); ?></strong></center></td>
                <td><center><strong><?php echo __('Description'); ?></strong></center></td>
                <td><center><strong><?php echo __('Registration date'); ?></strong></center></td>
                <td><center><strong><?php echo __('Rode'); ?></strong></center></td>
                <td><center><strong><?php echo __('Status'); ?></strong></center></td>
                <td><center><strong><?php echo __('Action'); ?></strong></center></td>
            </tr>
        </thead>
        <tbody>
            <?php $desembolsos = FranquiciadoDesembolso::model()->findAll(); ?>
            <?php
            foreach ($desembolsos as $desembolso){
            ?>
            <tr>
                <td><center><?php echo $desembolso->idCompetencia->competencia; ?></center></td>
                <td><center><?php echo $desembolso->idUsuario->correo; ?></center></td>
                <td><center><?php echo $desembolso->descripcion; ?></center></td>
                <td><center><?php echo $desembolso->fecha_registro; ?></center></td>
                <td>
                    <center>
                        <?php echo $desembolso->monto; ?>
                    </center>
                </td>
                <td>
                    <center>
                        <?php 
                        if($desembolso->estatus == 0){
                            echo __('In validation');
                        }
                        if($desembolso->estatus == 1){
                            echo '<font color="blue">'.__('Validated').'</font>';
                        }
                        if($desembolso->estatus == 2){
                            echo '<font color="green">'.__('Approved').'</font>';
                        }
                        if($desembolso->estatus == 3){
                            echo '<font color="red">'.__('Denied').'</font>';
                        }
                        ?>
                    </center>
                </td>
                <td>
                    <center>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                          </button>

                          <ul class="dropdown-menu" role="menu">
                            <li>
                                <a style=" cursor: pointer;" onclick="validarPago(<?php echo $desembolso->id_franquiciado_desembolso; ?>, '0')">
                                    <?php echo __('In validation'); ?>
                                </a>
                            </li>
                            <li>
                                <a style=" cursor: pointer;" onclick="validarPago(<?php echo $desembolso->id_franquiciado_desembolso; ?>, '1')">
                                    <?php echo __('Validated'); ?>
                                </a>
                            </li>
                            <li>
                                <a style=" cursor: pointer;" onclick="validarPago(<?php echo $desembolso->id_franquiciado_desembolso; ?>, '2')">
                                    <?php echo __('Approved'); ?>
                                </a>
                            </li>
                            <li>
                                <a style=" cursor: pointer;" onclick="validarPago(<?php echo $desembolso->id_franquiciado_desembolso; ?>, '3')">
                                    <?php echo __('Denied'); ?>
                                </a>
                            </li>
                          </ul>
                        </div>
                    </center>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    
</div>

<script>
function validarPago(id_pago, accion){
    //alert(id_pago+' / '+accion);
    var mensaje;
    var opcion = confirm("¿Realmente desea cambiar de estatus el desembolso seleccionado?");
    if (opcion == true) {
        $.post("<?php echo Yii::app()->createUrl('franquiciadoDesembolso/validarDesembolso') ?>",{ id_pago:id_pago, accion:accion },
        function(data){
                location.reload();
        });
    } 
}    
</script>