<?php

namespace frontend\controllers;

use yii\web\Controller;

class CuidadorController extends Controller
{
    public $layout = '@frontend/views/cuidador/layouts/main'; // FORZAR EL LAYOUT CORRECTO

    public function actionDashboardCuidador()
    {
        return $this->render('dashboard-cuidador'); // Renderiza views/admin/dashboard_admin.php
    }
}



