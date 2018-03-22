<head>
    <!--=====================-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <!--=====================-->
    
    <script>

        $(window).ready(function(){

            $("body").animate({ scrollTop: $(document).height()}, 1000);    

        });

    </script>
    
    
</head>

<?php
$this->breadcrumbs=array(
	'Historial usuarios',
);

$this->menu=array(
array('label'=>'Crear Usuario','url'=>array('create')),
array('label'=>'Administrar Usuario','url'=>array('admin')),
);
?>
<span class="ez">Historial</span>
<!--<a href="#abajo">Ir a la parte de abajo</a>-->
<div class="pd-inner">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Competencias Activas</div>
                <div class="panel-body">
                    <?php 
                        $this->widget('booster.widgets.TbGridView',array(
                        'id'=>'participante-grid',
                        'dataProvider'=>$model->participanteActivo(1),
//                        'filter'=>$model,
                        'columns'=>array(
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>'Competencia',
                                  'name'=>'id_copetencia',
                                  'type'=>'raw',
                                  'value'=>'$data->idCompetencia->competencia',
                                ), 
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>'Descripción',
                                  'name'=>'id_copetencia',
                                  'type'=>'raw',
                                  'value'=>'$data->idCompetencia->descripcion',
                                ), 
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>'Lugar del evento',
                                  'name'=>'id_copetencia',
                                  'type'=>'raw',
                                  'value'=>'$data->idCompetencia->direccion',
                                ), 
                            
                        ),
                        )); 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Historial de Competencias</div>
                <div class="panel-body">
                    <?php 
                        $this->widget('booster.widgets.TbGridView',array(
                        'id'=>'participante-grid',
                        'dataProvider'=>$model->participanteActivo(),
//                        'filter'=>$model,
                        'columns'=>array(
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>'Competencia',
                                  'name'=>'id_copetencia',
                                  'type'=>'raw',
                                  'value'=>'$data->idCompetencia->competencia',
                                ), 
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>'Descripción',
                                  'name'=>'id_copetencia',
                                  'type'=>'raw',
                                  'value'=>'$data->idCompetencia->descripcion',
                                ), 
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>'Lugar del evento',
                                  'name'=>'id_copetencia',
                                  'type'=>'raw',
                                  'value'=>'$data->idCompetencia->direccion',
                                ), 
                            
                        ),
                        )); 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Historial de Pagos</div>
                <div class="panel-body">
                    <div class="col-sm-12 col-md-12">
                    <!--<center><h4>Pase de Competidor</h4></center>-->
                    <hr>
                    <?php 
                    function tipoPago($tipo_pago){
                        
                        if($tipo_pago == 1){
                            $tipoPago = "Pase de Competidor";
                        }
                        if($tipo_pago == 2){
                            $tipoPago = "Inscripción de categoría";
                        }else{
                            $tipoPago = "Pase de Competidor";
                        }
                        return $tipoPago;
                    }
                    
                    function competencia($idPago){
                        if($idPago){
                            $Pago = Pago::model()->find('id_pago ='.$idPago);
                            if($Pago->id_copetencia){
                                $competencia = Competencia::model()->find('id_copetencia ='.$Pago->id_copetencia);
                                return $competencia->competencia;
                            }else{
                                if($Pago->id_categoria){
                                    $categoria = Categoria::model()->find('id_categoria ='.$Pago->id_categoria);
                                    return $categoria->competenciaCategorias->idCopetencia->competencia;
                                }else{
                                    if($Pago->id_inscripcion){
                                        $inscripcion = Inscripcion::model()->find('id_inscripcion ='.$Pago->id_inscripcion);
                                        return $inscripcion->idCopetencia->competencia;
                                    }
                                }
                            }
                        }else{
                            echo "-";
                        }
                    }
                    
                    
                    
                    function categoria($idPago){
                        if($idPago){
                            $Pago = Pago::model()->find('id_pago ='.$idPago);
                            if($Pago->id_tipo_pago == 1){
                                echo "-"; 
                            }
//                            if($Pago->id_copetencia){
//                                $competencia = Competencia::model()->find('id_copetencia ='.$Pago->id_copetencia);
//                                return $competencia->competencia;
//                            }else{
                                if($Pago->id_categoria){
                                    $categoria = Categoria::model()->find('id_categoria ='.$Pago->id_categoria);
                                    return $categoria->competenciaCategorias->idCopetencia->competencia;
                                }else{
                                    if($Pago->id_inscripcion){
                                        $inscripcion = Inscripcion::model()->find('id_inscripcion ='.$Pago->id_inscripcion);
                                        return $inscripcion->idCategoria->categoria;
                                    }
                                }
//                            }
                        }else{
                            echo "-";
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
                    
                    function boton($idPago){
                        return "{view}" ;
                    }
                    
                    
                    function editarInscripcion($idPago){
                        $Pago = Pago::model()->find('id_pago ='.$idPago);
                        $tipo_pago = $Pago->id_tipo_pago;
                        if($tipo_pago == 1){
                            $tipoPago = NULL;
                        }
                        if($tipo_pago == 2){
                            $tipoPago = '<a class="view" href="'.Yii::app()->request->baseUrl.'/inscripcion/update/'.$Pago->id_inscripcion.'" data-toggle="tooltip" title="" data-original-title="Ver">
                            <i class="glyphicon glyphicon-music"></i>
                            </a>';
                            
                        }else{
                            $tipoPago = NULL;
                        }
                        return $tipoPago;
                    }
                    function detallarInscripcion($idPago){
                        $Pago = Pago::model()->find('id_pago ='.$idPago);
                        $tipo_pago = $Pago->id_tipo_pago;
                        if($tipo_pago == 1){
                            $tipoPago = NULL;
                        }
                        if($tipo_pago == 2){
                            $tipoPago = '<a class="view" href="'.Yii::app()->request->baseUrl.'/inscripcion/'.$Pago->id_inscripcion.'" data-toggle="tooltip" title="" data-original-title="Ver">
                            <i class="glyphicon glyphicon-volume-up"></i>
                            </a>';
                            
                        }else{
                            $tipoPago = NULL;
                        }
                        return $tipoPago;
                    }
                    
                    $boton = array(
                                    'class'=>'booster.widgets.TbButtonColumn',
                                    'template'=>'{update}',
                                    'buttons'=>array(
                                        'update' => array(
                                            'url'=>'Yii::app()->createUrl("inscripcion/update/".$data->idPago->id_inscripcion)',
//                                            'options' => array( 'title'=>'Ver', 'class' => 'glyphicon glyphicon-pencil'),
                                            'visible'=>'Yii::app()->user->id_perfil_sistema!=9',
                                        ),
                                    ),
                                );
                    $this->widget('booster.widgets.TbGridView',array(
                    'id'=>'pago-grid',
                    'dataProvider'=>$pago->participanteLista(1),
//                    'filter'=>$pago,
                    'columns'=>array(
//                                    'id_pago',
//                                    'id_tipo_pago',
//                                    'id_copetencia',
//                                    'id_categoria',    
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>'Tipo de pago',
                                  'name'=>'id_tipo_pago',
                                  'type'=>'raw',
                                  'value'=>'tipoPago($data->id_tipo_pago)',
                                ),
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>'Competencia',
                                  'name'=>'id_pago',
                                  'type'=>'raw',
                                  'value'=>'competencia($data->id_pago)',
                                ), 
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>'Categoría',
                                  'name'=>'id_pago',
                                  'type'=>'raw',
                                  'value'=>'categoria($data->id_pago)',
                                ), 
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>'Comprado para',
                                  'name'=>'id_usuario',
                                  'type'=>'raw',
                                  'value'=>'$data->idUsuario->usuario',
                                ), 
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>'Comprado por',
                                  'name'=>'id_usuario_registro',
                                  'type'=>'raw',
                                  'value'=>'$data->idUsuarioRegistro->usuario',
                                ), 
//                                'id_usuario',
//                                'id_usuario_registro',
//                                'id_pase_estatus',
                                array(
                                  'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                  'header' =>'Estatus',
                                  'name'=>'id_pago',
                                  'type'=>'raw',
                                  'value'=>'estatusPago($data->id_pago)',
                                ), //
                                array(
                                    'class'=>'booster.widgets.TbButtonColumn',
                                    'template'=>'{view}',
                                    'buttons'=>array(
                                        'view' => array(
                                            'url'=>'Yii::app()->createUrl("pago/".$data->id_pago)',
                                            'visible'=>'Yii::app()->user->id_perfil_sistema!=9',
                                        ), 
                                    ),
                                ), 
                                array(
                                  'header' =>FALSE,
                                  'name'=>'id_pago',
                                  'type'=>'raw',
                                  'value'=>'editarInscripcion($data->id_pago)',
                                ),
                                array(
                                  'header' =>FALSE,
                                  'name'=>'id_pago',
                                  'type'=>'raw',
                                  'value'=>'detallarInscripcion($data->id_pago)',
                                ),
                                
//                                array(
//                                  'filter'=>CHtml::listData(Categoria::model()->findAll(),'id_categoria','categoria'),
//                                  'name'=>'id_categoria',
//                                  'type'=>'raw',
//                                  'value'=>'$data->idCompetencia->competencia',
//                                ),
//                                    'id_usuario',
//                                    'id_usuario_pagador',
                                    /*
                                    'costo_pagar',
                                    'costo_pagado',
                                    'id_forma_pago',
                                    'referencia',
                                    'img',
                                    'descripcion',
                                    */
//                    array(
//                    'class'=>'booster.widgets.TbButtonColumn',
//                    ),
                    ),
                    )); 
                    ?>
                    <?php
                        $sumasPagar = Pago::model()->findAll('id_inscripcion is not null AND id_usuario_pagador ='.Yii::app()->user->id_usuario_sistema.' AND id_pago_estatus = 1');
//                            echo var_dump($sumasPagar);
                        $suma = 0;
                        foreach ($sumasPagar as $sumaPaga){
//                                echo $sumaPaga->idCategoria->id_tipo_categoria." = ";
                            $costoTipo = $sumaPaga->costo_pagar;
//                                echo "Competencia =".$sumaPaga->id_copetencia." Tipo =".$sumaPaga->idCategoria->id_tipo_categoria." Costo =".$costoTipo->costo."<hr>";
                            $suma +=$costoTipo;
                        }
//                        echo "Valor: ".$suma;
                        if($suma !=0){
                        ?>
                    <hr>
                        <center>
                            <input type="hidden" id="MontoPagarCategoria" value="<?php echo $suma; ?>">
                            <!--<a href="../pago/pagoPaypal" class="btn btn-default" href="">Pagar</a>-->
                            Pagar todo: &nbsp;&nbsp;<div id="paypal-button-container"></div>
                            <a name="abajo"></a>
                        </center>
                        <?php
                        }
                    ?>
                    </div>
                    
                
            </div>
        </div>
    </div>
</div>
</div>

<?php
/*
 <div class="col-sm-1 middle-border"></div>
                    <div style="border-left: 1px solid #F5F5F5; " class="col-sm-12 col-md-6">
                        <center><h4>Categorías</h4></center>
                        <hr>
                    <?php $this->widget('booster.widgets.TbGridView',array(
                        'id'=>'participante-grid',
                        'dataProvider'=>$participante->ParticipanteLista(),
//                        'filter'=>$participante,
                        'columns'=>array(
                                array(
                                    'filter'=>CHtml::listData(Competencia::model()->findAll(),'id_copetencia','competencia'),
                                    'header' =>'Competencia',
                                    'name'=>'id_competencia',
                                    'type'=>'raw',
                                    'value'=>'$data->idCompetencia->competencia',
                                ), 
                                array(
                                  'filter'=>CHtml::listData(Categoria::model()->findAll(),'id_categoria','categoria'),
                                  'header' =>'Categoría',
                                  'name'=>'id_categoria',
                                  'type'=>'raw',
                                  'value'=>'$data->idCategoria->categoria',
                                ),
                                array(
                                    'class'=>'booster.widgets.TbButtonColumn',
                                    'template'=>'{view}{update}{pagar}',
                                    'buttons'=>array(
                                        'view' => array(
                                            'url'=>'Yii::app()->createUrl("inscripcion/".$data->id_inscripcion)',
                                            'visible'=>'Yii::app()->user->id_perfil_sistema!=9',
                                        ),
                                        'update' => array(
                                            'url'=>'Yii::app()->createUrl("inscripcion/update/".$data->id_inscripcion)',
//                                            'options' => array( 'title'=>'Ver', 'class' => 'glyphicon glyphicon-pencil'),
                                            'visible'=>'Yii::app()->user->id_perfil_sistema!=9',
                                        ), 
                                        'pagar' => array(
                                            'url'=>'Yii::app()->createUrl("pago/pagoPaypal", array())',
                                            'options' => array( 'title'=>'Pagar', 'class' => 'glyphicon glyphicon-shopping-cart'),
                                            'visible'=>'Pagar',
                                        ), 
//                                        'editar' => array(
//                                            'imageUrl'=>false,
//                                            'url'=>'Yii::app()->createUrl("socio/consultor", array("id"=>$data->id_socio))',
//                                            'label' => '',
//                                            'options' => array( 'title'=>'Ver', 'class' => 'glyphicon glyphicon-eye-open'),
//                                            'visible'=>'Yii::app()->user->id_perfil_sistema==9',
//                                           ),
                                    ),
                                ),
//                                        'id_participante',
//                                        'id_inscripcion',
//                                        'id_copetencia',
//                                        'id_categoria',
//                                        'id_usuario',
//                                        'id_usuario_registro',
                                        /*
                                        'estatus',
                                        
//                        array(
//                        'class'=>'booster.widgets.TbButtonColumn',
//                        ),
                        ),
                        )); ?>    
                        
                    </div>
*/
?>

<script>
//    var idPago = $('#idPago').val();
    idPago = 00;
    var total = $('#MontoPagarCategoria').val();
//    alert(total);
    paypal.Button.render({
        
        env: 'production', // sandbox | production

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create
        client: {
            sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
            production: 'AccT3PSiicoe8r9H7zclS4BvAY4kjhH0BxUYxVsSh6uxOSGIEXeLtckkByKtKtsjFuS4ijL7GT7sk9GP' //'<insert production client id>'
        },

        // Show the buyer a 'Pay Now' button in the checkout flow
        commit: true,

        // payment() is called when the button is clicked
        payment: function(data, actions) {
            
            // Make a call to the REST api to create the payment
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: total, currency: 'USD' }
                        }
                    ]
                }
            });
        },

        // onAuthorize() is called when the buyer approves the payment
        onAuthorize: function(data, actions) {

            // Make a call to the REST api to execute the payment
            return actions.payment.execute().then(function() {
                $.post("<?php echo Yii::app()->createUrl('pago/ReportePago') ?>",{ idPago:idPago },function(data){});
                window.alert('Payment Complete! / ¡Pago completado!');
                
            });
        }

    }, '#paypal-button-container');

function prueba(){
    var idPago = 00;
    $.post("<?php echo Yii::app()->createUrl('pago/ReportePago') ?>",{ idPago:idPago },function(data){});
}
</script>
<!--<a onclick="prueba()">Prueba</a>-->