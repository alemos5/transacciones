<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<style>
    td.highlight {
        background-color: whitesmoke !important;
    }

    @media all {
        .page-break  { display: none; }
    }

    @media print {
        .page-break  { display: block; page-break-before: always; }
    }
    @media print
    {
        .no-print, .no-print *
        {
            display: none !important;
        }
    }
    .list-group-item{
        margin-top: 0px;
        margin-bottom: 0px;
        padding: 2px 2px 2px 2px ;
    }

</style>
<script>
    $(document).ready( function () {

        var table = $('#example').DataTable( {
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ],
            order: [ 3, 'DESC'],

        });

    } );
</script>


    <?php
$this->breadcrumbs=array(
	'Manifiestos',
);

$this->menu=array(
//array('label'=>'Crear Manifiesto','url'=>array('create')),
//array('label'=>'Administrar Manifiesto','url'=>array('admin')),
);
?>



<?php
//echo $id;
$manifiesto = Manifiesto::model()->find('id_manifiesto ='.$id);
$manifiestosOrdenes = ManifiestoOrdenesBultoLoading::model()->findAll('id_manifiesto ='.$id.' AND id_tipo = 1');


$criteria = new CDbCriteria;
$criteria->select ='t.id_con';
$criteria->condition='id_manifiesto ='.$id.' AND id_tipo = 2';
$criteria->group='t.id_con';
$manifiestosConsolidaciones = ManifiestoOrdenesBultoLoading::model()->findAll($criteria);

function Instruccion($val){
    if($val == 1){
        $status = "Envio Maritimo" ;
    }elseif($val == 2){
        $status = "Envio Aereo";
    }elseif($val == 3){
        $status = "In &amp; Out";
    }
    return $status;
}
?>
    <img style="margin-top: 50px;" class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-foot.png" />
    <br><br>
    <div class="panel panel-primary">
        <div class="panel-heading">Manifiesto: </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item">Manifiesto: <?php echo  $manifiesto->vchar_codigoi_manifiesto; ?> </li>
                            <li class="list-group-item">Id pt: <?php echo $manifiesto->id_manifiesto; ?></li>
                            <li class="list-group-item">Fecha de registro: <?php echo $manifiesto->dt_registro; ?></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item">Courier: <?php echo  $manifiesto->vchar_nombre; ?> </li>
                            <li class="list-group-item">Instrucción: <?php echo Instruccion($manifiesto->id_instruccion); ?></li>
                            <li class="list-group-item">Container: <?php //echo $manifiesto->dt_registro; ?></li>
                        </ul>
                    </div>
                </div>
        </div>
    </div>
    <?php


function cliente($cliente, $tipoBusqueda){
    if($tipoBusqueda == 1){
        $cliente = Clientes::model()->find('code_cliente like "'.$cliente.'"');
    }else{
        $cliente = Clientes::model()->find('id_cliente = '.$cliente);
    }
    return $cliente;
}

function costoConsolidacion($id_con){
    $costo = 0;
    $ordenesConsolidaciones = OrdenesConsolidaciones::model()->findAll('id_con ='.$id_con);
    foreach ($ordenesConsolidaciones as $ordenConsolidacion){
        $costo += $ordenConsolidacion->idOrden->costo;
    }
    return $costo;
}

$costo_total = 0;
$poso_total = 0;
$cantidad_piezas = 0;
?>
    <p class="text-right no-print">
        <button class="btn btn-info" id="tester">Imprimir Campos</button>
    </p>
    <div class="row">
        <div class="col-sm-12 col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">Manifiesto: <?php echo $manifiesto->id_manifiesto; ?>

                </div>

                <div class="panel-body">

                        <table style=" width: 100%;" id="example2" class="table table-hover" cellspacing="0">
                            <thead>
                            <tr>
                                <td style=" width: 10%;"><center><strong># Referencia</strong></center></td>
                                <td style=" width: 10%;"><center><strong>Remitente</strong></center></td>
                                <td style=" width: 10%;"><center><strong>Destinatario</strong></center></td>
                                <td style=" width: 10%;"><center><strong>Fecha</strong></center></td>
                                <td style=" width: 10%;"><center><strong>Declarado</strong></center></td>
                                <td style=" width: 10%;"><center><strong>Peso</strong></center></td>
                                <td style=" width: 10%;"><center><strong>Contiene</strong></center></td>
                                <td style=" width: 10%;"><center><strong>Piezas</strong></center></td>
                                <td class="no-print" style=" width: 10%;"><center><strong>Datos Verificados</strong></center></td>
                                <td class="no-print" style=" width: 10%;"><center><strong>Ultima milla</strong></center></td>
                                <td class="no-print" style=" width: 10%;"><center><strong>Info. Adicional</strong></center></td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($manifiestosOrdenes as $manifiestoOrden) {
                                ?>
                                <tr>
                                    <td>
                                        <center>
                                            <?php
                                            echo "Guía # ".$manifiestoOrden->idOrden->ware_reciept."<br>Tracking # ".$manifiestoOrden->idOrden->tracking;
                                            ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php
                                            echo "CASILLERO EXPRESS 6985 NW 50TH ST 7864617284<br>-Fecha: ".date('d-m-Y');
                                            ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php
                                            if($manifiestoOrden->idOrden->nombre_cliente){
                                                echo $manifiestoOrden->idOrden->nombre_cliente.", ".$manifiestoOrden->idOrden->direccion_cliente;
                                            }else{
                                                $cliente = cliente($manifiestoOrden->idOrden->code_cliente, '1');
                                                echo $cliente->nombre.", ".$cliente->direccion;
                                            }
                                            ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php
                                                echo date("d-m-Y", strtotime($manifiestoOrden->idOrden->fecha));
                                            ?>
                                        </center>
                                    </td>

                                    <td>
                                        <center>
                                            <?php
                                            if($manifiestoOrden->idOrden->costo){
                                                echo "$".$manifiestoOrden->idOrden->costo;
                                            }else{
                                                echo "$0";
                                            }
                                            $costo_total += $manifiestoOrden->idOrden->costo;
                                            ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php
                                            if($manifiestoOrden->idOrden->peso){
                                                echo "Lb: ".$manifiestoOrden->idOrden->peso."<br>";
                                                echo "Kl: ".number_format($manifiestoOrden->idOrden->peso/2.20, 2, '.', '');
                                            }else{
                                                echo "Lb: 0<br>";
                                                echo "Kl: 0";
                                            }
                                            $poso_total += $manifiestoOrden->idOrden->peso;
                                            ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php
                                            echo "<ul><li>".$manifiestoOrden->idOrden->descripcion."</li></ul>";
                                            ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php
                                            echo "1";
                                            $cantidad_piezas += 1;
                                            ?>
                                        </center>
                                    </td>
                                    <td class="no-print">
                                        <center>
                                            <?php
                                            $cliente = cliente($manifiestoOrden->idOrden->code_cliente, '1');
                                            echo "Nombre: ".$cliente->nombre."<br>Dirección: ".$cliente->direccion;
                                            ?>
                                        </center>
                                    </td>
                                    <td class="no-print">
                                        <center>
                                            <button  onclick="tipoUltimaMilla(<?php echo $manifiestoOrden->id_orden; ?>, 1)" data-target='#Modal' data-toggle='modal' type="button" class="btn btn-primary">
                                                <span  onclick="tipoUltimaMilla(<?php echo $manifiestoOrden->id_orden; ?>, 1)" data-target='#Modal' data-toggle='modal' class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Añadir
                                            </button>
                                            <br><br>
                                            <?php
                                            echo $manifiestoOrden->idOrden->ultima_milla;
                                            ?>
                                            <hr>
                                            <label class="control-label" for="Ordenes_nombre_cliente">Estatus particular</label>
                                            <select onchange="estatusParticular(<?php echo $manifiestoOrden->id_orden; ?>, this.value, 1)" class="span5 form-control" name="status_manifiesto" id="status_manifiesto">
                                                <option>Seleccione</option>
                                                <?php
                                                if($manifiestoOrden->idOrden->estatus_manifiesto == 16) {
                                                    ?><option selected="selected" value="16">Entregado en bodega.</option><?php
                                                }else{
                                                    ?><option value="16">Entregado en bodega.</option><?php
                                                }
                                                if($manifiestoOrden->idOrden->estatus_manifiesto == 17) {
                                                    ?><option selected="selected" value="17">Retenida por Aduanas.</option><?php
                                                }else{
                                                    ?><option value="17">Retenida por Aduanas.</option><?php
                                                }
                                                if($manifiestoOrden->idOrden->estatus_manifiesto == 18) {
                                                    ?><option selected="selected" value="18">En espera de pago.</option><?php
                                                }else{
                                                    ?><option value="18">En espera de pago.</option><?php
                                                }
                                                ?>
                                            </select>
                                        </center>
                                    </td>
                                    <td class="no-print">
                                        <center>
                                            <button  onclick="tipoInformacionExtra(<?php echo $manifiestoOrden->id_orden; ?>, 1)" data-target='#Modal2' data-toggle='modal' type="button" class="btn btn-primary">
                                                <span onclick="tipoInformacionExtra(<?php echo $manifiestoOrden->id_orden; ?>, 1)" data-target='#Modal2' data-toggle='modal' class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Añadir
                                            </button>
                                            <br><br>
                                            <?php
                                            echo $manifiestoOrden->idOrden->info_extra;
                                            ?>
                                        </center>
                                    </td>
                                </tr>
                                <?php
                            }

                            foreach ($manifiestosConsolidaciones as $manifiestoConsolidacion){
                                //$ordenesConsolidaciones = OrdenesConsolidaciones::model()->findAll('id_con =' . $manifiestoConsolidacion->id_con);
                                //foreach ($ordenesConsolidaciones as $ordenConsolidacion) {
                                ?>
                                    <tr>
                                        <td>
                                            <center>
                                                <?php
                                                echo "Guía # ".$manifiestoConsolidacion->idConsolidacion->ware_reciept;
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php
                                                echo "CASILLERO EXPRESS 6985 NW 50TH ST 7864617284<br>-Fecha: ".date('d-m-Y');
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php
                                                if($manifiestoConsolidacion->idConsolidacion->cliente_manifiesto){
                                                    echo $manifiestoConsolidacion->idConsolidacion->cliente_manifiesto.", ".$manifiestoConsolidacion->idConsolidacion->direccion;
                                                }else{
                                                    if($manifiestoConsolidacion->idConsolidacion->id_cliente){
                                                        $cliente = cliente($manifiestoConsolidacion->idConsolidacion->id_cliente, '2');
                                                        echo $cliente->nombre.", ".$cliente->direccion;
                                                    }else{
                                                        echo "No posee";
                                                    }

                                                }
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php
                                                echo date("d-m-Y", strtotime($manifiestoConsolidacion->idConsolidacion->fecha));
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php
                                                if(costoConsolidacion($manifiestoConsolidacion->id_con)){
                                                    echo "$".costoConsolidacion($manifiestoConsolidacion->id_con);
                                                }else{
                                                    echo "$0";
                                                }
                                                $costo_total += costoConsolidacion($manifiestoConsolidacion->id_con);
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php
                                                if($manifiestoConsolidacion->idConsolidacion->peso){
                                                    echo "Lb: ".$manifiestoConsolidacion->idConsolidacion->peso."<br>";
                                                    echo "Kl: ".number_format($manifiestoConsolidacion->idConsolidacion->peso/2.20, 2, '.', '');
                                                }else{
                                                    echo "Lb: 0<br>";
                                                    echo "Kl: 0";
                                                }
                                                $poso_total += $manifiestoConsolidacion->idConsolidacion->peso;
                                                ?>
                                            </center>
                                        </td>
                                        <td>
                                            Descripción:<br>
                                            <?php
                                            $ordenesConsolidaciones = OrdenesConsolidaciones::model()->findAll('id_con ='.$manifiestoConsolidacion->id_con);
                                            foreach ($ordenesConsolidaciones as $ordenConsolidacion){
                                                echo "<br>-".$ordenConsolidacion->idOrden->descripcion;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <center>
                                                <?php
                                                echo "1";
                                                $cantidad_piezas += 1;
                                                ?>
                                            </center>
                                        </td>
                                        <td class="no-print">
                                            <center>
                                                <?php
                                                $cliente = cliente($manifiestoOrden->idOrden->code_cliente, '1');
                                                echo "Nombre: ".$cliente->nombre."<br>Dirección: ".$cliente->direccion;
                                                ?>
                                            </center>
                                        </td>
                                        <td class="no-print">
                                            <center>
                                                <button onclick="tipoUltimaMilla(<?php echo $manifiestoConsolidacion->id_con; ?>, 2)" data-target='#Modal' data-toggle='modal' type="button" class="btn btn-primary">
                                                    <span onclick="tipoUltimaMilla(<?php echo $manifiestoConsolidacion->id_con; ?>, 2)" data-target='#Modal' data-toggle='modal' class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Añadir
                                                </button>
                                                <br><br>
                                                <?php
                                                echo $manifiestoConsolidacion->idConsolidacion->ultima_milla;
                                                ?>
                                                <hr>
                                                <label class="control-label" for="Ordenes_nombre_cliente">Estatus particular</label>
                                                <select onchange="estatusParticular(<?php echo $manifiestoConsolidacion->id_con; ?>, this.value, 2)" class="span5 form-control" name="status_manifiesto" id="status_manifiesto">
                                                    <option>Seleccione</option>
                                                    <?php
                                                    if($manifiestoConsolidacion->idConsolidacion->estatus_manifiesto == 16) {
                                                        ?><option selected="selected" value="16">Entregado en bodega.</option><?php
                                                    }else{
                                                        ?><option value="16">Entregado en bodega.</option><?php
                                                    }
                                                    if($manifiestoConsolidacion->idConsolidacion->estatus_manifiesto == 17) {
                                                        ?><option selected="selected" value="17">Retenida por Aduanas.</option><?php
                                                    }else{
                                                        ?><option value="17">Retenida por Aduanas.</option><?php
                                                    }
                                                    if($manifiestoConsolidacion->idConsolidacion->estatus_manifiesto == 18) {
                                                        ?><option selected="selected" value="18">En espera de pago.</option><?php
                                                    }else{
                                                        ?><option value="18">En espera de pago.</option><?php
                                                    }
                                                    ?>
                                                </select>
                                            </center>
                                        </td>
                                        <td class="no-print">
                                            <center>
                                                <button  onclick="tipoInformacionExtra(<?php echo $manifiestoConsolidacion->idConsolidacion->id_con; ?>, 2)" data-target='#Modal2' data-toggle='modal' type="button" class="btn btn-primary">
                                                    <span onclick="tipoInformacionExtra(<?php echo $manifiestoConsolidacion->idConsolidacion->id_con; ?>, 2)" data-target='#Modal2' data-toggle='modal' class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Añadir
                                                </button>
                                                <br><br>
                                                <?php
                                                echo $manifiestoConsolidacion->idConsolidacion->info_extra;
                                                ?>
                                            </center>
                                        </td>
                                    </tr>
                                <?php
                                //}
                            }

                            ?>
                            </tbody>
                        </table>






                </div>
            </div>
        </div>
    </div>

    <ul class="list-group">
        <a href="#" class="list-group-item active">Totales</a>
        <li class="list-group-item">Piezas :<?php echo $cantidad_piezas; ?></li>
        <li class="list-group-item">Total Lbs :<?php echo $poso_total; ?></li>
        <li class="list-group-item">Total Kgs : <?php echo number_format($poso_total/2.20, 2, '.', ''); ?></li>
    </ul>



</div>



<?php $this->beginWidget('booster.widgets.TbModal', array('id'=>'Modal')) ?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Registrar Ultima milla</h4>
</div>

<div class="modal-body">
    <div class="pd-inner">
        <label class="control-label" for="Ordenes_nombre_cliente">Ultima Milla</label>
        <input type="hidden" id="idUltimamilla" value="">
        <input type="hidden" id="tipoUltimaMilla" value="">
        <input class="span5 form-control" maxlength="100" placeholder="ultima milla" name="UltimaMilla" id="UltimaMilla" type="text">
    </div>
</div>

<div class="modal-footer">
    <?php $this->widget('booster.widgets.TbButton', array(
        'context'=>'default',
        'label'=>__('Registrar'),
        'url'=>'#',
        'htmlOptions'=>array('onclick'=>'ultimaMilla()')
    ));?>
    <?php $this->widget('booster.widgets.TbButton', array(
        'context'=>'default',
        'label'=>__('Close'),
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal')
    ));?>
</div>
<?php $this->endWidget(); ?>


<!--============================================================================================-->
<!--
<!--============================================================================================-->


<?php $this->beginWidget('booster.widgets.TbModal', array('id'=>'Modal2')) ?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Info. Adicional</h4>
</div>

<div class="modal-body">
    <div class="pd-inner">
        <label class="control-label" for="Ordenes_nombre_cliente">Información Adicional</label>
        <input type="hidden" id="idInformacionExtra" value="">
        <input type="hidden" id="tipoInformacionExtra" value="">
        <textarea rows="6" cols="50" class="span8 form-control" placeholder="Información Adicional" name="InformacionAdicional" id="InformacionAdicional"></textarea>
    </div>
</div>

<div class="modal-footer">
    <?php $this->widget('booster.widgets.TbButton', array(
        'context'=>'default',
        'label'=>__('Registrar'),
        'url'=>'#',
        'htmlOptions'=>array('onclick'=>'informacionExtra()')
    ));?>
    <?php $this->widget('booster.widgets.TbButton', array(
        'context'=>'default',
        'label'=>__('Close'),
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal')
    ));?>
</div>
<?php $this->endWidget(); ?>

<script>
    $(document).ready(function(){
        $("button#tester").click(function(){
            $("th").removeClass("no-print");
            $("td").removeClass("no-print");
            window.print();
        });
    });
    function tipoUltimaMilla(id, tipo){
        $('#idUltimamilla').val(id);
        $('#tipoUltimaMilla').val(tipo);
    }
    function tipoInformacionExtra(id, tipo){
        $('#idInformacionExtra').val(id);
        $('#tipoInformacionExtra').val(tipo);
    }

    function ultimaMilla(id){
        var ultimaMilla = $('#UltimaMilla').val();
        var id = $('#idUltimamilla').val();
        var tipo = $('#tipoUltimaMilla').val();
        $.post("<?php echo Yii::app()->createUrl('ordenes/ultimaMilla') ?>",{
                id:id,
                tipo:tipo,
                ultimaMilla:ultimaMilla
            },
            function(data){

            }).done(function() {
            location.reload();
        });
    }

    function informacionExtra(id){
        var informacionExtra = $('#InformacionAdicional').val();
        var tipo = $('#tipoInformacionExtra').val();
        var id = $('#idInformacionExtra').val();
        $.post("<?php echo Yii::app()->createUrl('ordenes/informacionExtra') ?>",{
                id:id,
                tipo:tipo,
                informacionExtra:informacionExtra
            },
            function(data){

            }).done(function() {
            location.reload();
        });
    }

    function estatusParticular(id, estatus, tipo){
        $.post("<?php echo Yii::app()->createUrl('ordenes/estatusParticular') ?>",{
                id:id,
                tipo:tipo,
                estatus:estatus
            },
            function(data){

            }).done(function() {
            location.reload();
        });
    }
</script>
