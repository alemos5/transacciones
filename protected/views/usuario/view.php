<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id_usuario_sistema,
);

$this->menu=array(
//array('label'=>'Listar Usuarios','url'=>array('index')),
//array('label'=>'Crear Usuario','url'=>array('create')),
array('label'=>__('Update User'),'url'=>array('update','id'=>$model->id_usuario_sistema)),
//array('label'=>'Desactivar Usuario','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario_sistema),'confirm'=>'Are you sure you want to delete this item?')),
//array('label'=>'Administrar Usuarios','url'=>array('admin')),
);
?>

<?php if($model->latitud AND $model->longitud) { ?>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDjnu9FM-PNfYzTqyHK5Rl3-p9TSOPFjAg"></script>
<script>
var map;
function initialize() {
  var marketPosition = new google.maps.LatLng(<?php echo trim($model->latitud) ?>,<?php echo trim($model->longitud) ?>);
  map = new google.maps.Map(document.getElementById('googleMap'), {
    zoom: 15,
    center: marketPosition,
  });
  var marker=new google.maps.Marker({
    position: marketPosition,
  });
  marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

<?php } ?>

<span class="ez"><?php echo __('User'); ?>:</span>
<div class="pd-inner">
    <div class="row">
    <div class="col-sm-4 col-md-12">
        <center>
            <h4><strong><?php echo __('User'); ?>:</strong></h4> <?php echo $model->usuario; ?>
        
        <hr>
        <img class="img-responsive img-thumbnail" style="width:30%;height: auto 400px;" alt="" src="<?php echo '../images/usuario/'.$model->img; ?>">

        
        </center>
    </div>
    </div>
    <br><br>
    <div class="row">
    <div class="col-sm-8 col-md-12">
        <?php 
        
        function tipoDocumento($tipoDocumento){
            if($tipoDocumento == 1){
                $data = 'National ID';
            }
            if($tipoDocumento == 2){
                $data = 'Driver License';
            }
            if($tipoDocumento == 3){
                $data = 'Cedula de Extranjería';
            }
            if($tipoDocumento == 4){
                $data = 'Passport';
            }
            if($tipoDocumento == 5){
                $data = 'Tarjeta de Identidad';
            }
            if($tipoDocumento == 6){
                $data = 'Registro Civil';
            }
            return $data;
        }
        
        
        $this->widget('booster.widgets.TbDetailView',array(
        'type' => 'striped bordered hover',
        'data'=>$model,
        'attributes'=>array(
            
            array(
              'label' => __("Birthday "),
              'value' => date("d-m-Y", strtotime($model->fecha_nacimiento)),
            ),
            array(
              'label' => __('Identification number'),
              'value' => tipoDocumento($model->tipo_documento)." - ".$model->cedula,
            ),
            array(
              'label' => __('Name'),
              'value' => $model->primer_nombre." ".$model->segundo_nombre." ".$model->primer_apellido." ".$model->segundo_apellido,
            ),
            array(
              'label' => __('Email'),
              'value' => $model->correo,
            ),
            array(
              'label' => __('Phone'),
              'value' => $model->tlf_personal,
            ),
//            array(
//              'label' => "Pais ",
//              'value' => $model->idCiudad->idPais->codigo,
//            ),
//            array(
//              'label' => "Ciudad ",
//              'value' => $model->idCiudad->ciudad,
//            ),
//            'sexo',
//            'observacion_personal',
//            'razon_social',
//            'tlf_habitacion',
//            'tlf_personal',
//            'tlf_personal2',
//            'correo',
//            'correo2',
//            'usuario',
//            array(
//              'label' => "Perfil",
//              'value' => $model->idPerfilSistema->nombre,
//            ),

        ),
        )); 
        ?>
    </div>
</div>
    <br>  
    <?php /*
 <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
            <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>&nbsp; Datos Geográficos</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
        
        <div class="panel-body">
            
            <br>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <?php if($model->latitud AND $model->longitud) { ?>
                    <div id="googleMap" style="width:100%;height:380px;"></div>
                    <?php } else echo "El socio no tiene punto geográfico asignado."; ?>
                    <br />
                </div>
            </div>
        </div>
    </div>
  </div>
<!--  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>&nbsp;Transacciones</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row" style="padding: 20px 0 0 0; margin: 20 0 0 0;">
                <div class="col-xs-12">
                  <div style="border: 1px solid #ebebeb; padding: 0 0 10px 0; margin: 0 0 10px 0;">
                    <div class="table table-stripped" id="table-socio-sociedad" style="padding: 0 20px 0 20px;">
                      <div class="row" id="head-socio-sociedad">
                          <div class="col-xs-2" style="padding: 8px;"><strong><center>Transacción</center></strong></div>
                        <div class="col-xs-2" style="padding: 8px;"><strong><center>Estatus</center></strong></div>
                        <div class="col-xs-2" style="padding: 8px;"><strong><center>Numero de Referencia</center></strong></div>
                        <div class="col-xs-2" style="padding: 8px;"><strong><center>Cuenta ipostel</center></strong></div>
                        <div class="col-xs-2" style="padding: 8px;"><strong><center>Fecha</center></strong></div>
                        <div class="col-xs-2" style="padding: 8px;"><strong><center>Comprobante</center></strong></div>
                      </div>
                      <?php  if(isset($transacciones)) {
                      foreach($transacciones as $transaccion) { ?>
                        <div class="row" style="border-top: 1px solid #ddd;" id="sociedad-id-<?php //echo $sociedad->id_sociedad; ?>">
                            <div class="col-xs-2" style="padding: 8px;"><center><?php echo $transaccion->idTipoTransaccion->tipo_transaccion; ?></center></div>
                            <div class="col-xs-2" style="padding: 8px;"><center><?php echo "En conciliación"; //$transaccion->idTipoTransaccion->tipo_transaccion; ?></center></div>
                            <div class="col-xs-2" style="padding: 8px;"><center><?php echo $transaccion->n_referencia; ?></center></div>
                            <div class="col-xs-2" style="padding: 8px;"><center><?php echo $transaccion->idCuentaIpostel->idBanco->banco; ?></center></div>
                            <div class="col-xs-2" style="padding: 8px;"><center><?php echo date("d-m-Y", strtotime($transaccion->fecha_operacion)); ?></center></div>
                            <div class="col-xs-2" style="padding: 8px;"><center><a target="_blank" alt="Comprobante" title="Comprobante" href="..<?php echo $transaccion->img; ?>"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a></center></div>
                        </div>
                      <?php }}else{ echo "Usted no ha realizado ninguna transacción"; } ?>
                    </div>
                  </div>
                </div>
              </div>
              <br>
        </div>
    </div>
  </div>-->
<!--  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp;Autorizado</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row" style="padding: 20px 0 0 0; margin: 20 0 0 0;">
                <div class="col-xs-12">
                  <div style="border: 1px solid #ebebeb; padding: 0 0 10px 0; margin: 0 0 10px 0;">
                    <div class="table table-stripped" id="table-socio-sociedad" style="padding: 0 20px 0 20px;">
                      <div class="row" id="head-socio-sociedad">
                          <div class="col-xs-2" style="padding: 8px;"><strong><center>Identificación</center></strong></div>
                        <div class="col-xs-4" style="padding: 8px;"><strong><center>Nombre</center></strong></div>
                        <div class="col-xs-2" style="padding: 8px;"><strong><center>Sexo</center></strong></div>
                        <div class="col-xs-2" style="padding: 8px;"><strong><center>Fecha de Nacimiento</center></strong></div>
                        <div class="col-xs-2" style="padding: 8px;"><strong><center>Detallar</center></strong></div>
                      </div>
                      <?php  if(isset($autorizados)) {
                      foreach($autorizados as $autorizado) { ?>
                        <div class="row" style="border-top: 1px solid #ddd;" id="">
                            <div class="col-xs-2" style="padding: 8px;"><center><?php echo $autorizado->cedula; ?></center></div>
                            <div class="col-xs-4" style="padding: 8px;"><center><?php echo $autorizado->primer_nombre."&nbsp;".$autorizado->segundo_nombre."&nbsp;".$autorizado->primer_apellido."&nbsp;".$autorizado->segundo_apellido; ?></center></div>
                            <div class="col-xs-2" style="padding: 8px;"><center><?php echo $autorizado->sexo; ?></center></div>
                            <div class="col-xs-2" style="padding: 8px;"><center><?php echo date("d-m-Y", strtotime($autorizado->fecha_nacimiento)); ?></center></div>
                            <div class="col-xs-2" style="padding: 8px;"><center><a target="_blank" alt="Autorizado" title="Autorizado" href="../autorizado/<?php echo $autorizado->id_autorizado; ?>"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></a></center></div>
                        </div>
                      <?php }}else{ echo "Usted no posee autorizado"; } ?>
                    </div>
                  </div>
                </div>
              </div>
              <br>
        </div>
    </div>
  </div>-->
<!--  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Beneficiarios</a>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="row" style="padding: 20px 0 0 0; margin: 20 0 0 0;">
                <div class="col-xs-12">
                  <div style="border: 1px solid #ebebeb; padding: 0 0 10px 0; margin: 0 0 10px 0;">
                    <div class="table table-stripped" id="table-socio-sociedad" style="padding: 0 20px 0 20px;">
                      <div class="row" id="head-socio-sociedad">
                          <div class="col-xs-2" style="padding: 8px;"><strong><center>Identificación</center></strong></div>
                        <div class="col-xs-4" style="padding: 8px;"><strong><center>Nombre</center></strong></div>
                        <div class="col-xs-2" style="padding: 8px;"><strong><center>Sexo</center></strong></div>
                        <div class="col-xs-2" style="padding: 8px;"><strong><center>Fecha de Nacimiento</center></strong></div>
                        <div class="col-xs-2" style="padding: 8px;"><strong><center>Detallar</center></strong></div>
                      </div>
                      <?php  if(isset($beneficiarios)) {
                      foreach($beneficiarios as $beneficiario) { ?>
                        <div class="row" style="border-top: 1px solid #ddd;" id="">
                            <div class="col-xs-2" style="padding: 8px;"><center><?php echo $beneficiario->cedula; ?></center></div>
                            <div class="col-xs-4" style="padding: 8px;"><center><?php echo $beneficiario->primer_nombre."&nbsp;".$beneficiario->segundo_nombre."&nbsp;".$beneficiario->primer_apellido."&nbsp;".$beneficiario->segundo_apellido; ?></center></div>
                            <div class="col-xs-2" style="padding: 8px;"><center><?php echo $beneficiario->sexo; ?></center></div>
                            <div class="col-xs-2" style="padding: 8px;"><center><?php echo date("d-m-Y", strtotime($beneficiario->fecha_nacimiento)); ?></center></div>
                            <div class="col-xs-2" style="padding: 8px;"><center><a target="_blank" alt="Beneficiario" title="Beneficiario" href="../beneficiario/<?php echo $beneficiario->id_beneficiario; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></center></div>
                        </div>
                      <?php }}else{ echo "Usted no posee beneficiarios"; } ?>
                    </div>
                  </div>
                </div>
              </div>
              <br>
        </div>
    </div>
  </div>-->
</div>     
    */?>
</div>