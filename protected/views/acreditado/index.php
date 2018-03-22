<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>



<?php
$this->breadcrumbs=array(
	'Djs',
);

$this->menu=array(
//array('label'=>'Competences','url'=>array('index')),
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
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "scrollX": true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
     
    $('#example tbody')
        .on( 'mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;
 
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        } );

    

} );    
</script>
<span class="ez"><?php echo __('Accreditations'); ?></span>

<div class="pd-inner">

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo __('Competition List'); ?></div>
                <div class="panel-body">
                    
                    <div class="table-responsive">

                        <table style="" id="example" class="table" cellspacing="0">
                            <thead>
                                <tr>
                                    <td><center><strong><?php echo __('ID user'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Document Type'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Documentation'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Name and Last Name'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Email'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Purchase Detail'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('General Result'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('QR code'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Validate'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Detail purchases'); ?></strong></center></td>
                                    <td><center><strong><?php echo __('Status'); ?></strong></center></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $usuarios = Usuario::model()->findAll('estatus = 1'); ?>
                                <?php
                                foreach ($usuarios as $usuario){
                                    $pagos = Pago::model()->findAll('id_copetencia = 47 AND id_usuario ='.$usuario->id_usuario_sistema);
                                    if($pagos){
                                        
                                        $pagos = Pago::model()->findAll('id_usuario ='.$usuario->id_usuario_sistema);
                                            $countAcreditado = 0;
                                            if($pagos){
                                                foreach ($pagos as $pago){
                                                    if($pago->acreditado == 1){
                                                        $countAcreditado++;
                                                    }
                                                }
                                                $calcular = 0;
                                                if(count($pagos) == $countAcreditado){
                                                    $calcular = 1;
                                                }else{
                                                   $calcular = 0;
                                                }
                                            }
                                        
                                        
                                        if($calcular == 0){
                                            echo "<tr>";
                                        }else{
                                            if($usuario->acreditado == '0'){
                                                echo '<tr class="warning">';
                                            }else{
                                                echo '<tr class="success">';
                                            }
                                            
                                        }
                                ?>
                                    <td><center><?php echo $usuario->id_usuario_sistema; ?></center></td>
                                    <td>
                                        <center>
                                            <?php
                                                if($usuario->tipo_documento == 1){
                                                    echo "National ID";
                                                }
                                                if($usuario->tipo_documento == 2){
                                                    echo "Driver License";
                                                }
                                                if($usuario->tipo_documento == 3){
                                                    echo "National ID";
                                                }
                                                if($usuario->tipo_documento == 4){
                                                    echo "Cédula de Extranjería";
                                                }
                                                if($usuario->tipo_documento == 5){
                                                    echo "Tarjeta de Identidad";
                                                }
                                                if($usuario->tipo_documento == 6){
                                                    echo "Registro CivilD";
                                                }
                                            ?>
                                        </center>
                                    </td>
                                    <td><center><?php echo $usuario->cedula; ?></center></td>
                                    <td><center><?php echo $usuario->primer_nombre." ".$usuario->primer_apellido; ?></center></td>
                                    <td><center><?php echo $usuario->correo; ?></center></td>
                                    <td>
                                        <center>
                                            <?php 
                                            $pagos = Pago::model()->findAll('id_usuario ='.$usuario->id_usuario_sistema.' AND id_copetencia = 47');
                                            echo "<br><ul>";
                                            foreach ($pagos as $pago){
                                                if($pago->id_tipo_pago == 1){
                                                    $tipoPago = __('Competitor Pass').": ID Pay ".$pago->id_pago;
                                                }
                                                $musica_validada = 1;
                                                if($pago->id_tipo_pago == 2){
                                                    $categoria = $pago->idInscripcion->idCategoria->categoria;
                                                    $tipoPago = __('Purchase Category').": ID Pay ".$pago->id_pago;
                                                    //$musica_validada = $pago->idInscripcion->musica_validada;
                                                    //====================================================================//
                                                    // Validar Musica
                                                    //====================================================================//
                                                    
                                                    
                                                    
                                                    
                                                }
                                                if($musica_validada == 0){
                                                    ?><font color="red"><?php
                                                }
                                                ?>
                                                <li><?php echo $tipoPago; ?></li>
                                                <?php
                                                $pagoDetalles = PagoDetalle::model()->findAll('id_pago ='.$pago->id_pago);
                                                if($pagoDetalles){
                                                    echo "<br><ul>";
                                                    foreach ($pagoDetalles as $pagoDetalle){
                                                        ?>
                                                        <li><?php echo $pagoDetalle->idUsuario->correo; ?></li>
                                                        <?php
                                                    }
                                                    echo "</ul><br>";
                                                }
                                                
                                            }
                                            echo "</ul>";
                                            if($musica_validada == 0){
                                                ?></font><?php
                                            }
                                            ?>
                                                        
                                            
                                        </center>
                                    </td>
                                    
                                    
                                    <td>
                                        <center>
                                            
                                            <?php 
                                            $pagos = Pago::model()->findAll('id_usuario ='.$usuario->id_usuario_sistema);
                                            $countEstatus = 0;
                                            if($pagos){
                                                foreach ($pagos as $pago){
                                                     if($pago->id_pago_estatus == 2){
                                                         $countEstatus++;
                                                     }
                                                }
                                                ?>

                                                <?php
                                                $disable = 0;
                                                if($musica_validada != 0){
                                                    if(count($pagos) == $countEstatus){
                                                        $disable = 1;
                                                        ?>
                                                        <span class="glyphicon glyphicon-ok"></span>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <span class="glyphicon glyphicon-remove"></span>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                    <?php
                                                }
                                            }else{
                                                echo "-";
                                            }
                                            ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <div class="form-group">
                                                <?php 
                                                if($usuario->acreditado == '0'){
                                                    $usuario->acreditado = NULL;
                                                }
                                                if($disable == 1){
                                                    ?><input value="<?php echo $usuario->acreditado; ?>" id="FranquiciadoDesembolso<?php echo $usuario->id_usuario_sistema; ?>" class="span5 form-control" type="text" value="" name="FranquiciadoDesembolso<?php echo $usuario->id_usuario_sistema; ?>" placeholder="<?php echo __('QR code'); ?>" maxlength="20"><?php
                                                }else{
                                                    ?><input value="<?php echo $usuario->acreditado; ?>" disabled="disabled" id="FranquiciadoDesembolso<?php echo $usuario->id_usuario_sistema; ?>" class="span5 form-control" type="text" value="" name="FranquiciadoDesembolso<?php echo $usuario->id_usuario_sistema; ?>" placeholder="<?php echo __('QR code'); ?>" maxlength="20"><?php
                                                }
                                                ?>
                                            <!--<label class="control-label" for="FranquiciadoDesembolso_monto">Monto</label>-->
                                            
                                            </div>  
                                        </center>
                                    </td>
                                    <td>
                                        <?php
                                        $pagos = Pago::model()->findAll('id_usuario ='.$usuario->id_usuario_sistema);
                                        if($pagos){ ?>
                                        <center>
                                            <?php 
                                                if($disable == 1){
                                            ?>
                                            <a title="Validar" onclick="validar(<?php echo $usuario->id_usuario_sistema; ?>, 1)">
                                                <span title="<?php echo __('Validate'); ?>" onclick="validar(<?php echo $usuario->id_usuario_sistema; ?>, 1)" class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                                            </a>
                                            
                                            <?php 
                                                }else{
                                            ?> 
                                                <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                                            
                                            <?php 
                                                }
                                            ?>        
                                        </center>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <center>
                                            <a data-toggle="modal" data-target="#myModal" style=" cursor: pointer;" title="Detail" onclick="detalleCompra(<?php echo $usuario->id_usuario_sistema; ?>)">
                                                <span title="Detail" onclick="detalleCompra(<?php echo $usuario->id_usuario_sistema; ?>)" class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                            </a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php
                                            
                                            if($calcular == 1){
                                                echo "Acreditado";
                                            }else{
                                                echo "Por acreditar";
                                            }
                                            ?>
                                        </center>
                                    </td>
                                </tr>
                                <?php
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

<!-- Modal -->
<?php $this->beginWidget(
    'booster.widgets.TbModal',
    array('id' => 'myModal')
); ?>

    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4><?php echo __('Purchase details'); ?></h4>
    </div>

    <div class="modal-body">
        <div id="okRegistro">
            <div class="container-fluid">
                <div id="contenidoTablaCompras"></div>
            </div>
        </div>
    </div>
    <div class="modal-footer">

        <?php $this->widget(
            'booster.widgets.TbButton',
            array(
                'id'=>'bt_cancelar',
                'label' => 'Close',
                'url' => '#',
                'htmlOptions' => array('data-dismiss' => 'modal'),
            )
        ); ?>
    </div>
<?php $this->endWidget(); ?>




<script>
function validar(id_usuario, accion){

    var mensaje;
    var qr = $('#FranquiciadoDesembolso'+id_usuario).val();
    
    if(qr){
        if(accion  == 1){
            var opcion = confirm("¿Realmente desea acreditar?");
        }else{
            var opcion = confirm("¿Realmente desea eliminar la acreditación?");
        }
        if (opcion == true) {
            $.post("<?php echo Yii::app()->createUrl('acreditado/acreditar') ?>",{ id_usuario:id_usuario, accion:accion, qr:qr },
            function(data){
                location.reload();
            });
        } else {
    //        mensaje = "Has clickado Cancelar";
        }
    }else{
        alert('You must enter the QR code');
    }
}    

function detalleCompra(id_usuario){
    //alert("aqui :"+id_usuario);
    //contenidoTablaCompras
    $.post("<?php echo Yii::app()->createUrl('pago/detallePago') ?>",{ id_usuario:id_usuario },
    function(data){
        $('#contenidoTablaCompras').html(data);
    });
}

function actualizarRonda(id_inscripcion, ronda){
//    alert(id_inscripcion);
    $.post("<?php echo Yii::app()->createUrl('inscripcion/ronda') ?>",{ 
        ronda:ronda,
        id_inscripcion:id_inscripcion
    },
    function(data){
        
    });
}
</script>