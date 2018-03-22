<?php

class OrganizacionRondaController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'calcular', 'final', 'semifinal', 'eliminatoria', 'admin', 'listadoInscripcion','ReporteOEFinal'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionListadoInscripcion($id_copetencia = Null, $id_categoria = Null)
    {
//    echo var_dump($_GET); die();
        $id_copetencia = $_GET['idc'];
        $id_categoria = $_GET['idca_'];
        //$dataProvider=new CActiveDataProvider('Dj');
        $this->render('_listado_inscripcion', array(
            'id_copetencia' => $id_copetencia, 'id_categoria' => $id_categoria
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new OrganizacionRonda;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['OrganizacionRonda'])) {
            $model->attributes = $_POST['OrganizacionRonda'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_organizacion_ronda));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    function actionCalcular()
    {


        function conversorSegundosHoras($tiempo_en_segundos)
        {
            $horas = floor($tiempo_en_segundos / 3600);
            $minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);
            $segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);

            $hora_texto = "";
            if ($horas > 0) {
                $hora_texto .= $horas . "h ";
            }

            if ($minutos > 0) {
                $hora_texto .= $minutos . "m ";
            }

            if ($segundos > 0) {
                $hora_texto .= $segundos . "s";
            }

            return $hora_texto;
        }

        $OrganizacionRonda_id_competencia = $_POST['OrganizacionRonda_id_competencia'];
        $OrganizacionRonda_capacidad_max_categoria = $_POST['OrganizacionRonda_capacidad_max_categoria'];
        $OrganizacionRonda_fecha_inicio = $_POST['OrganizacionRonda_fecha_inicio'];
        $yw1 = $_POST['yw1'];
        $OrganizacionRonda_fecha_final = $_POST['OrganizacionRonda_fecha_final'];
        $yw3 = $_POST['yw3'];
        $yw4 = $_POST['yw4'];


        $categorias = CompetenciaCategoria::model()->findAll('id_copetencia =' . $OrganizacionRonda_id_competencia);
        $primerValor = 0;
        $segundoValor = 0;
        $ecuacion1 = 0;

        $criteria = new CDbCriteria;
        $criteria->select = 'id_categoria, count(*) AS count';
        $criteria->addCondition('`id_copetencia` =' . $OrganizacionRonda_id_competencia . ' AND acreditado = 1 group by `id_categoria` HAVING count >= ' . $OrganizacionRonda_capacidad_max_categoria . ';');
        $inscripcionGroups = Inscripcion::model()->findAll($criteria);
        $primerValor = count($inscripcionGroups);

        $validacion = "";
        if ($OrganizacionRonda_capacidad_max_categoria == 5) {
            $validacion = "count < '.$OrganizacionRonda_capacidad_max_categoria.';";
        } else {
            if ($OrganizacionRonda_capacidad_max_categoria == 15) {
                $validacion = "count > 5 AND count <'.$OrganizacionRonda_capacidad_max_categoria.';";
            } else {
                $validacion = "count > 15 AND count <'.$OrganizacionRonda_capacidad_max_categoria.';";
            }
        }
        $criteria = new CDbCriteria;
        $criteria->select = 'id_categoria, count(*) AS count';
        $criteria->addCondition('`id_copetencia` =' . $OrganizacionRonda_id_competencia . ' AND acreditado = 1 group by `id_categoria` HAVING ' . $validacion);


        $inscripcionGroupsSegundos = Inscripcion::model()->findAll();
        //echo "Aqui";

        //======================================================================================//
        // Segundo Factor
        //======================================================================================//


        $segundoValor = 0;
//    if($inscripcionGroupsSegundos){
        foreach ($categorias as $categoria) {
//            if($inscripcionGroupsSegundo->idCopetencia->estatus == 1){
            //echo "<hr>".$inscripcionGroupsSegundo->id_categoria." = ";
            $countI = Inscripcion::model()->findAll('id_copetencia = ' . $OrganizacionRonda_id_competencia . ' AND id_categoria =' . $categoria->id_categoria . ' AND acreditado = 1');
//                if($countI->idCopetencia->estatus == 1){
            if ($OrganizacionRonda_capacidad_max_categoria == 5) {
                if (count($countI) < $OrganizacionRonda_capacidad_max_categoria) {
                    //                        echo "<hr>".$inscripcionGroupsSegundo->idCategoria->categoria." = ".count($countI);
                    $segundoValor += count($countI);
                }
            } else {
                if ($OrganizacionRonda_capacidad_max_categoria == 15) {
                    if (count($countI) > 5 && count($countI) < $OrganizacionRonda_capacidad_max_categoria) {
                        //                        echo "<hr>".$inscripcionGroupsSegundo->idCategoria->categoria." = ".count($countI);
                        $segundoValor += count($countI);
                    }
                } else {
                    if (count($countI) > 15) {
                        //                        echo "<hr>".$inscripcionGroupsSegundo->idCategoria->categoria." = ".count($countI);
                        $segundoValor += count($countI);
                    }
                }
            }
//                }
//            }
        }
//    }

        //======================================================================================//

        $ecuacion1 = $OrganizacionRonda_capacidad_max_categoria * ($primerValor) + ($segundoValor);
        $hora = '00:' . date("i:s", strtotime($yw4));
        list($horas, $minutos, $segundos) = explode(':', $hora);
        $hora_en_segundos = ($horas * 3600) + ($minutos * 60) + $segundos;

//    echo $hora_en_segundos.' x '.$ecuacion1;
        $ecuacion2 = $hora_en_segundos * $ecuacion1; //date("i:s", strtotime($yw4)) * $ecuacion1;

        $ecuacion3 = strtotime($OrganizacionRonda_fecha_final . $yw3) - strtotime($OrganizacionRonda_fecha_inicio . $yw1);
//    echo $ecuacion3;
        $ecuacion3 = $ecuacion3 * 60;
//    echo $ecuacion1."<hr>".$OrganizacionRonda_capacidad_max_categoria.' x '.($primerValor).' + '.($segundoValor);
        ?>
        <ul>
            <li><strong>Rule 1:</strong>
                <?php
                echo $OrganizacionRonda_capacidad_max_categoria . " x (" . $primerValor . " + " . $segundoValor . ") = ";
                ?>

                &nbsp;<?php echo $ecuacion1; ?></li>
            <li><strong>Rule 2:</strong>

                &nbsp;<?php if (conversorSegundosHoras($ecuacion2)) {
                    echo conversorSegundosHoras($ecuacion2);
                } else {
                    echo "0";
                } ?></li>
            <li><strong>Rule 3:</strong>&nbsp;<?php
                //echo $OrganizacionRonda_fecha_inicio.' '.$yw1.' - '.$OrganizacionRonda_fecha_final.' '.$yw3."<hr>";
                //        echo $ecuacion2.' / '.$ecuacion3;
                if (conversorSegundosHoras($ecuacion2)) {
                    if ($ecuacion2 > $ecuacion3) {
                        echo "<font color='red'>" . __("It's not possible. You must check the schedule") . "</font>";
                    } else {
                        echo "<font color='green'>" . __('Feasible') . "</font>";
                    }
                } else {
                    echo "0";
                }
                ?></li>
        </ul>
        <?php

    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['OrganizacionRonda'])) {
            $model->attributes = $_POST['OrganizacionRonda'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_organizacion_ronda));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('OrganizacionRonda');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionFinal()
    {
        $dataProvider = new CActiveDataProvider('OrganizacionRonda', array(
            'criteria' => array(
                'condition' => 'id_organizacion_ronda = :id_organizacion_ronda',
                'params' => array(':id_organizacion_ronda' => 1),
            )));

        $cantidad = 5;

        $this->render('_final', array(
            'dataProvider' => $dataProvider, 'cantidad' => $cantidad
        ));
    }

    public function actionSemifinal()
    {
        $dataProvider = new CActiveDataProvider('OrganizacionRonda', array(
            'criteria' => array(
                'condition' => 'id_organizacion_ronda = :id_organizacion_ronda',
                'params' => array(':id_organizacion_ronda' => 2),
            )));

        $cantidad = 15;

        $this->render('_semifinal', array(
            'dataProvider' => $dataProvider, 'cantidad' => $cantidad
        ));
    }

    public function actionEliminatoria()
    {
        $dataProvider = new CActiveDataProvider('OrganizacionRonda', array(
            'criteria' => array(
                'condition' => 'id_organizacion_ronda = :id_organizacion_ronda',
                'params' => array(':id_organizacion_ronda' => 3),
            )));

        $cantidad = 15;

        $this->render('_eliminatoria', array(
            'dataProvider' => $dataProvider, 'cantidad' => $cantidad
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new OrganizacionRonda('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['OrganizacionRonda']))
            $model->attributes = $_GET['OrganizacionRonda'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = OrganizacionRonda::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'organizacion-ronda-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionReporteOEFinal()
    {
/**/
                    $datos = Yii::app()->db->createCommand('            
                        SELECT C.categoria,CC.*, count(I.id_inscripcion) AS inscripciones
                        FROM competencia_categoria AS CC
                        LEFT JOIN categoria AS C ON (CC.id_categoria=C.id_categoria)
                        LEFT JOIN inscripcion AS I ON (I.id_copetencia=47 and CC.id_categoria=I.id_categoria  AND acreditado = 1)
                        WHERE CC.id_copetencia = 47 and I.id_inscripcion IS NOT NULL
                        GROUP BY  C.categoria, CC.id_categoria

                    ')->queryAll();
/**/
                   // $datos = CompetenciaCategoria::model()->findAll('id_copetencia =47 ORDER BY orden ASC');
                    echo '<pre>';
                    print_r($datos);
                    echo '</pre>';
                    die();
                    header('Content-type: application/vnd.ms-excel');
                    header("Content-Disposition: attachment; filename=reporte".date("d-m-Y").".xls");
                    header("Pragma: no-cache");
                    header("Expires: 0");
                    ?>
                    <table cellspacing="0" cellpadding="0" width="100%" border="1">
                        <tr>
                            <th bgcolor="#CCCCCC" style="width:50px; font-weight: bold">id_organizacion_ronda:</th>
                            <th bgcolor="#CCCCCC" style="width:50px; font-weight: bold">id_competencia:</th>
                            <th bgcolor="#CCCCCC" style="width:50px; font-weight: bold">ronda:</th>
                            <th bgcolor="#CCCCCC" style="width:50px; font-weight: bold">capacidad_max_categoria:</th>
                            <th bgcolor="#CCCCCC" style="width:50px; font-weight: bold">fecha_inicio:</th>
                            <th bgcolor="#CCCCCC" style="width:50px; font-weight: bold">hora_inicio:</th>
                            <th bgcolor="#CCCCCC" style="width:50px; font-weight: bold">fecha_final:</th>
                            <th bgcolor="#CCCCCC" style="width:50px; font-weight: bold">hora_final:</th>
                            <th bgcolor="#CCCCCC" style="width:50px; font-weight: bold">duracion_inscripcion:</th>
                            <th bgcolor="#CCCCCC" style="width:50px; font-weight: bold">estatus:</th>
                        </tr>

                        <?php

                            foreach ($datos as $titulo2 => $valor2){
                                echo '<tr>';
                                    echo '<td style="width:50px;" align="center">'.$valor2['id_organizacion_ronda'].'</td>';
                                    echo '<td style="width:50px;" align="center">'.$valor2['id_competencia'].'</td>';
                                    echo '<td style="width:50px;" align="center">'.$valor2['ronda'].'</td>';
                                    echo '<td style="width:50px;" align="center">'.$valor2['capacidad_max_categoria'].'</td>';
                                    echo '<td style="width:50px;" align="center">'.$valor2['fecha_inicio'].'</td>';
                                    echo '<td style="width:50px;" align="center">'.$valor2['hora_inicio'].'</td>';
                                    echo '<td style="width:50px;" align="center">'.$valor2['fecha_final'].'</td>';
                                    echo '<td style="width:50px;" align="center">'.$valor2['hora_final'].'</td>';
                                    echo '<td style="width:50px;" align="center">'.$valor2['duracion_inscripcion'].'</td>';
                                    echo '<td style="width:50px;" align="center">'.$valor2['estatus'].'</td>';
                                echo '</tr>';
                            }


                        ?>
                    </table>

                    <?php
                    Yii::app()->end();

        }
}
