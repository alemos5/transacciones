<?php
$this->breadcrumbs=array(
	'Subscription',
);

$this->menu=array(
//array('label'=>'Crear Inscripción','url'=>array('create')),
//array('label'=>'Administrar Inscripción','url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Query QR'); ?></span>

<div class="pd-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">

                <label class="control-label required" for="Usuario_tipo_documento">
                    <?php echo __('Code QR'); ?>:
                    <span class="required">*</span>
                </label>
                <div class="col-sm-12 bootstrap-timepicker input-group">
                    <input  style=" width: 100%;" id="code_qr" class="form-control" type="text" placeholder="<?php echo __('Code QR'); ?>" name="code_qr" maxlength="15" size="45">
                    <label onclick="findQR()" class="input-group-addon btn btn-primary" style="width: 10%;">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        <?php echo __('Search'); ?>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div id="resultado"></div>
</div>

<script>

    function findQR() {
        var code_qr = $('#code_qr').val();
        $.post("<?php echo Yii::app()->createUrl('inscripcion/findQR') ?>",
        {
            code_qr:code_qr
        },
        function(data){
            $('#resultado').html(data);
        });
    }
    function findIdentificacion() {
        var tipo_documento = $('#tipo_documento').val();
        var identificacion = $('#usuarioBusqueda').val();
        var code_qr = $('#code_qr').val();

        $.post("<?php echo Yii::app()->createUrl('inscripcion/findIdentificacion') ?>",
        {
            tipo_documento:tipo_documento,
            identificacion:identificacion,
            code_qr:code_qr,
        },
        function(data){
            if(data!='1') {
                $('#resultado').html(data);
            }else{
                findQR();
            }
        });
    }
</script>