<?php
$this->breadcrumbs=array(
    'Pagos'=>array('index'),
    $model->id_pago,
);

$this->menu=array(
    array('label'=>'Listado de mis pagos reportados','url'=>array('index')),
);

$idPago = $model->id_pago;
$Pago = Pago::model()->find('id_pago ='.$idPago);
if($Pago->id_copetencia){
    $competencia = Competencia::model()->find('id_copetencia ='.$Pago->id_copetencia);
    $gratis = $competencia->gratis;
//                                return $competencia->competencia;
}else{
    if($Pago->id_categoria){
        $categoria = Categoria::model()->find('id_categoria ='.$Pago->id_categoria);
//                                    return $categoria->competenciaCategorias->idCopetencia->competencia;
        $gratis = $categoria->competenciaCategorias->idCopetencia->gratis;
    }else{
        if($Pago->id_inscripcion){
            $inscripcion = Inscripcion::model()->find('id_inscripcion ='.$Pago->id_inscripcion);
//                                        return $inscripcion->idCopetencia->competencia;
            $gratis = $inscripcion->idCopetencia->gratis;
        }
    }
}


?>

<span class="ez">Pagos Reportado: <?php echo $model->id_pago; ?></span>
<input type="hidden" id="idPago" value="<?php echo $model->id_pago; ?>">
<div class="pd-inner">
    <div class="container-fluid">
        <div class="row">
            <div id="DivComprobante" class="col-sm-5">
    <?php
    function validar($id_competencia, $id_categoria){
        if($id_competencia){
            $competencia = Competencia::model()->find('id_copetencia ='.$id_competencia);
            return $competencia->competencia;
        }else{
            $categoria = Categoria::model()->find('id_categoria ='.$id_categoria);
            return $categoria->categoria;
        }
    }
    function validarTipo($id_competencia, $id_categoria){
        if($id_competencia){
            return "Competencia";
        }else{
            return "Categoría";
        }
    }

    function estatusPago($idPago){
        $gratis = 0;
        $Pago = Pago::model()->find('id_pago ='.$idPago);
        if($Pago->id_copetencia){
            $competencia = Competencia::model()->find('id_copetencia ='.$Pago->id_copetencia);
            $gratis = $competencia->gratis;
//                                return $competencia->competencia;
        }else{
            if($Pago->id_categoria){
                $categoria = Categoria::model()->find('id_categoria ='.$Pago->id_categoria);
//                                    return $categoria->competenciaCategorias->idCopetencia->competencia;
                $gratis = $categoria->competenciaCategorias->idCopetencia->gratis;
            }else{
                if($Pago->id_inscripcion){
                    $inscripcion = Inscripcion::model()->find('id_inscripcion ='.$Pago->id_inscripcion);
//                                        return $inscripcion->idCopetencia->competencia;
                    $gratis = $inscripcion->idCopetencia->gratis;
                }
            }
        }

        if($gratis == 1){
            return "Gratis";
        }else{
            $estatusPago = Pago::model()->find('id_pago ='.$idPago);
            return $estatusPago->idPagoEstatus->pago_estatus;
        }
    }

    $this->widget('booster.widgets.TbDetailView',array(
        'type' => 'striped bordered hover',
        'data'=>$model,
        'attributes'=>array(
//    'id_pago',
//    'id_tipo_pago',
            array(
                'label'=>'Tipo de Operación',
                'value'=>$model->idTipoPago->tipo_pago,
            ),
//    array(
//        'label'=>validarTipo($model->id_copetencia, $model->id_categoria),
//        'value'=>validar($model->id_copetencia, $model->id_categoria),
//    ),
            array(
                'label'=>'Estatus del Pago',
                'value'=>estatusPago($model->id_pago),
            ),
//    'id_copetencia',
//    'id_categoria',
//    'id_usuario',
//    'id_usuario_pagador',
//    'costo_pagar',
//    'costo_pagado',
//    'id_forma_pago',
//    'referencia',
//    'img',
//    'descripcion',
        ),
    ));
    if($gratis != 1){
        ?>


        <br>
        <h5>Comprobante</h5>
        <hr>

        <div class="row">
            <?php
            /*
            ?>
            <div class="col-sm-12 col-md-6">
                <img style="" src="../images/pago/<?php echo $model->img; ?>" alt="..." class="img-thumbnail">
            </div>
            <?php
            */
            ?>
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-warning">
                    <div class="panel-heading"> <span onclick="" class="glyphicon glyphicon-list" aria-hidden="true"></span>  Detalle de Factura</div>
                    <div class="panel-body">
                        <div style=" margin-top: 0px;" class="pd-inner">
                            <div id="table-participante2" style="padding: 0 0px 0px 0px;">
                                <div class="row" id="head-table-participante">
                                    <!--<div class="col-xs-4" style="padding: 8px;"><center><strong>Identificación</strong></center></div>-->
                                    <div class="col-xs-6" style="padding: 0px;"><strong>Items</strong></div>
                                    <div class="col-xs-6" style=" text-align: right; padding: 0px;"><strong>Monto</strong></div>
                                </div>
                                <?php
                                $detallesPagos = PagoDetalle::model()->findAll('id_pago ='.$model->id_pago);
                                $acumulado = 0;
                                foreach ($detallesPagos as $detallePago){
                                    ?>
                                    <div class="row" id="head-table-participante">
                                        <!--<div class="col-xs-4" style="padding: 8px;"><center><strong>Identificación</strong></center></div>-->
                                        <div class="col-xs-6" style="padding: 0px;">
                                            <?php echo $detallePago->items; ?>
                                        </div>
                                        <div class="col-xs-6" style=" text-align: right; padding: 0px;">
                                            <?php echo $detallePago->monto; $acumulado = $acumulado+$detallePago->monto; ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>


                        </div>

                    </div>
                    <div class="panel-heading">
                        <div style=" margin-top: 0px;" class="pd-inner">
                            <div class="row">
                                <div  style="">
                                    <b>Total</b>
                                </div>
                                <div style="text-align: right;" >
                                    <label  id="resultadosPago"><b><?php echo number_format($acumulado, 2, '.', ''); ?></b></label>
                                    <input type="hidden" id="MontoPagar" value="<?php echo $acumulado; ?>" >
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php if($model->id_pago_estatus == 1){ ?>

                        <form action = "https://www.paypal.com/cgi-bin/webscr" method = "post" style="text-align: center">

                            <input type = "hidden" name = "cmd" value = "_ext-enter" />
                            <input type = "hidden" name = "redirect_cmd" value = "_xclick" />
                            <input type = "hidden" name = "business" value = " juan@bnf.com.co" />
                            <input type = "hidden" name = "item_name" value = "<?php echo $model->idTipoPago->tipo_pago; ?>" />
                            <input type = "hidden" name = "quantity" value = "1" />
                            <input type = "hidden" name = "amount" value = "<?php echo $acumulado; ?>" />
                            <input type = "hidden" name = "tax_rate" value = "0" />
                            <input type = "hidden" name = "currency_code" value = "USD" />
                            <input type = "hidden" name = "address1" value = "xxxxxxxxxxx">
                            <input type = "hidden" name = "city" value = "yyyyyyyyyy">
                            <input type = "hidden" name = "state" value = "zzzzzzzzzzzz">
                            <input type = "hidden" name = "zip" value = "1111111">
                            <input type = "hidden" name = "on0" value = "Nro de Pago">
                            <input type = "hidden" name = "os0" value = "<?php echo $model->id_pago; ?>">
                            <input type = "hidden" name = "return" value = "http://<?php echo $_SERVER['HTTP_HOST'].Yii::app()->createUrl('pago/ReportePago'); ?>"/>
                            <input type = "hidden" name = "cancel_return" value = "http://<?php echo $_SERVER['HTTP_HOST'].Yii::app()->createUrl('pago/'.$model->id_pago) ?>" />
                            <input type = "hidden" name = "bn" value = "PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest" />
                            <input type = "image" src = "../images/boton-paypal.png" border = "0" width = "200px" name = "submit" alt = "" border = "0"/>

                        </form>

                    <?php } ?>
                    <?php
                    //echo $model->id_pago;
                    ?>
                </div>
            </div>

        </div>

    <?php } ?>


    </div>

        </div>
    </div>
    <br>

</div>