<?php
$this->breadcrumbs=array(
	'Pagos Paypal',
);

$this->menu=array(
array('label'=>'Reportar Pago','url'=>array('create')),
//array('label'=>'Administrar Pagos','url'=>array('admin')),
);
?>
<span class="ez">Pagos Reportados: Categorías</span>

<div class="pd-inner">
<table class="table table-bordered table-hover">
    <thead style=" background-color: #ccc;">
        <tr>
            <td>
                <center><b>Competencia</b></center>
            </td>
            <td>
                <center><b>Categoría</b></center>
            </td>
            <td>
                <center><b>Fecha de la inscripción</b></center>
            </td>
            <td>
                <center><b>Registrador</b></center>
            </td>
            <td>
                <center><b>Estatus</b></center>
            </td>
            <td>
                <center><b>Pago</b></center>
            </td>
        </tr>
    </thead>
    <tbody>
    <?php
    $participaciones = Participante::model()->findAll('id_usuario ='.Yii::app()->user->id_usuario_sistema.' OR id_usuario_registro ='.Yii::app()->user->id_usuario_sistema);
    foreach ($participaciones as $participacion){
    ?>
        <tr>
            <td>
                <center>
                    <?php 
                    echo $participacion->idCompetencia->competencia;
                    ?>
                </center>
            </td>
            <td>
                <center>
                    <?php 
                    echo $participacion->idCategoria->categoria;
                    ?>
                </center>
            </td>
            <td>
                <center>
                    <?php 
                    echo date('d-m-Y H:i:s',strtotime($participacion->idInscripcion->fecha_inscripcion));
                    ?>
                </center>
            </td>
            <td>
                <center>
                    <?php 
                    
                    if(Yii::app()->user->id_usuario_sistema == $participacion->id_usuario_registro){
                        echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
                    }else{
                        echo "-";
                    }
                    ?>
                </center>
            </td>
            <td>
                <center>
                    <?php 
                    echo $participacion->idInscripcion->idEstatuInscripcion->estatu_inscripcion;
                    ?>
                </center>
            </td>
            <td>
                <center>
                    <?php
                    $fechaInscripcion = $participacion->idInscripcion->fecha_inscripcion;
                    $fechaActual = strtotime(date("2017-10-15 11:59:00"));
                    $tipoCategoria = $participacion->idCategoria->id_tipo_categoria;
                    if($fechaInscripcion <= $fechaActual){
                        // Menor o igual al 2017-10-15
                        if($tipoCategoria == 1){ 
                            //Solista
                            ?>
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="D26MPP6U9KZMA">
                                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                            </form>
                            <?php
                        }else{
                            if($tipoCategoria == 2){
                                //Pareja
                                ?>
                                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                    <input type="hidden" name="cmd" value="_s-xclick">
                                    <input type="hidden" name="hosted_button_id" value="CZCCLB4RU4NCS">
                                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                </form>
                                <?php
                            }else{
                                if($tipoCategoria == 3){
                                    //Grupal
                                    ?>
                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                        <input type="hidden" name="cmd" value="_s-xclick">
                                        <input type="hidden" name="hosted_button_id" value="5KG2SD4HLUTPQ">
                                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                    </form>
                                    <?php
                                }
                            }
                        }
                    }else{
                        //Mayor al 2017-10-15
                        if($tipoCategoria == 1){ 
                            //Solista
                            ?>
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="JVKUTA25DV6C2">
                                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                            </form>
                            <?php
                        }else{
                            if($tipoCategoria == 2){
                                //Pareja
                                ?>
                                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                    <input type="hidden" name="cmd" value="_s-xclick">
                                    <input type="hidden" name="hosted_button_id" value="KNLFQN4LHZEQN">
                                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                </form>
                                <?php
                            }else{
                                if($tipoCategoria == 3){
                                    //Grupal
                                    ?>
                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                        <input type="hidden" name="cmd" value="_s-xclick">
                                        <input type="hidden" name="hosted_button_id" value="2FTCS2RKRYLHU">
                                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                    </form>
                                    <?php
                                }
                            }
                        }
                    }
                    ?>
                </center>
            </td>
        </tr>

    <?php    
    }
    ?>
    </tbody>
</table>
</div>