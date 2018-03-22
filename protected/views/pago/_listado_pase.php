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
     
//    $('#example tbody')
//        .on( 'mouseenter', 'td', function () {
//            var colIdx = table.cell(this).index().column;
// 
//            $( table.cells().nodes() ).removeClass( 'highlight' );
//            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
//        } );

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
	'Payments',
);

//$this->menu=array(
//array('label'=>'Competitor pass','url'=>array('listadoPase')),
//array('label'=>'Administrar Pagos','url'=>array('admin')),
//);

$pagosPases = Pago::model()->findAll('id_tipo_pago = 1 AND id_copetencia = 47');

?>


<span class="ez"><?php echo __('Payments: Competitor pass'); ?></span>

<div class="pd-inner">
   <div class="row">
        <div class="col-sm-12 col-md-12">
            
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('List of passes'); ?></div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style=" width: 100%;" id="example" class="table table-hover" cellspacing="0">
                            <thead>
                                <tr>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Payment ID'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Payment type'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Payment Status'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Action'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Competition'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Payment Registration Date'); ?></strong></center></td>
                                    <td style=" width: 40%;"><center><strong><?php echo __('Payment Date'); ?></strong></center></td>
                                    <td style=" width: 40%;"><center><strong><?php echo __('Amount payable'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Type of Documentation'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Documentation'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Name and Last Name'); ?></strong></center></td>
                                    <td style=" width: 10%;"><center><strong><?php echo __('Buyer'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Bought for'); ?></strong></center></td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                               foreach ($pagosPases as $pagoPase){
                                   $usuario = Usuario::model()->find('id_usuario_sistema ='.$pagoPase->id_usuario_pagador);
                                   ?>
                                <?php 
                                if($pagoPase->id_pago_estatus == 1){ echo '<tr>'; } 
                                if($pagoPase->id_pago_estatus == 2){ echo '<tr class="success">'; }  
                                if($pagoPase->id_pago_estatus == 3){ echo '<tr class="danger">'; }  
                                if($pagoPase->id_pago_estatus == 4){ echo '<tr class="warning">'; }  
                                ?>
                                
                                
                                    <td><center><?php echo $pagoPase->id_pago; ?></center></td>
                                    <td><center><?php if($pagoPase->id_tipo_pago == 1){ echo __("Competitor Pass"); }else{ echo __("Category Inscription"); } ?></center></td>
                                    <td>
                                        <center>
                                            <?php 
                                            if($pagoPase->id_pago_estatus == 1){ echo __('For paying'); }
                                            if($pagoPase->id_pago_estatus == 2){ echo __('Confirmed'); }
                                            if($pagoPase->id_pago_estatus == 3){ echo __('Rejected'); }
                                            if($pagoPase->id_pago_estatus == 4){ echo __('On hold'); }
                                            ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <div class="btn-group">
                                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                <?php echo __('Action'); ?> <span class="caret"></span>
                                              </button>

                                              <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a style=" cursor: pointer;" onclick="validarPago(<?php echo $pagoPase->id_pago; ?>, '1')">
                                                        <?php echo __('For paying'); ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a style=" cursor: pointer;" onclick="validarPago(<?php echo $pagoPase->id_pago; ?>, '2')">
                                                        <?php echo __('Confirm'); ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a style=" cursor: pointer;" onclick="validarPago(<?php echo $pagoPase->id_pago; ?>, '3')">
                                                        <?php echo __('To refuse'); ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a style=" cursor: pointer;" onclick="validarPago(<?php echo $pagoPase->id_pago; ?>, '4')">
                                                        <?php echo __('On hold'); ?>
                                                    </a>
                                                </li>
                                              </ul>
                                            </div>
                                        </center>
                                    </td>
                                    <td><center><?php echo $pagoPase->idCompetencia->competencia; ?></center></td>
                                    <td><center><?php echo $pagoPase->fecha_pago; ?></center></td>
                                    <td><center><?php echo $pagoPase->fecha_pagado; ?></center></td>
                                    <td><center><?php echo $pagoPase->costo_pagar; ?></center></td>
                                    <td>
                                        <center>
                                            <?php 
                                                if($usuario->tipo_documento == 1){
                                                   echo 'National ID';
                                                }
                                                if($usuario->tipo_documento == 2){
                                                    echo __('Driver License');
                                                }
                                                if($usuario->tipo_documento == 3){
                                                    echo 'Cedula de Extranjería';
                                                }
                                                if($usuario->tipo_documento == 4){
                                                    echo __('Passport');
                                                }
                                                if($usuario->tipo_documento == 5){
                                                    echo 'Tarjeta de Identidad';
                                                }
                                                if($usuario->tipo_documento == 6){
                                                    echo 'Registro Civil';
                                                }
                                            ?>
                                        </center>
                                    </td>
                                    <td><center><?php echo $usuario->cedula; ?></center></td>
                                    <td><center><?php echo $usuario->primer_nombre." ".$usuario->primer_apellido; ?></center></td>
                                    <td><center><?php echo $usuario->correo; ?></center></td>
                                    <td>
                                        <UL>
                                            
                                        
                                        <?php
                                        $pagosDetalles = PagoDetalle::model()->findAll('id_pago ='.$pagoPase->id_pago);
                                        foreach ($pagosDetalles as $pagoDetalle){
                                            ?><li><?php echo $pagoDetalle->idUsuario->correo; ?></li><?php
                                        }
                                        ?>
                                        </UL>
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

<script>
function validarPago(id_pago, accion){
    //alert(id_pago+' / '+accion);
    var mensaje;
    var opcion = confirm("<?php echo __('Do you really want to validate the selected payment?'); ?>");
    if (opcion == true) {
        $.post("<?php echo Yii::app()->createUrl('pago/validarPago') ?>",{ id_pago:id_pago, accion:accion },
        function(data){
//             location.reload(true);
        });
//        location.reload();
//        location.reload(true);
    }  
}    
</script>