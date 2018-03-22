
                        
                            
                           

<!--<input type="text" id="contenidoSelect" >-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.multi-select.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->



<?php
$this->pageTitle=Yii::app()->name;
$this->menu=array(
array('label'=>__('My Profile'),'url'=>array('/usuario/'.Yii::app()->user->id_usuario_sistema)),
array('label'=>__('Ordenes / consolidaciones'),'url'=>array('/usuario/ordenPersonal')),
//array('label'=>__('Consolidaciones'),'url'=>array('/usuario/consolidacionPersonal')),
);
$usuario = Usuario::model()->find('id_usuario_sistema ='.Yii::app()->user->id_usuario_sistema);
$correo = $usuario->correo;
?>
<span class="ez">Mis Datos</span>
<div class="pd-inner">
    <iframe style="width: 100%; border: 0px; height: 1200px;" 
            src="http://telocomproenusa.com/cruz/orders/list_orden.php?email=<?php echo $correo; ?>"></iframe>
</div>