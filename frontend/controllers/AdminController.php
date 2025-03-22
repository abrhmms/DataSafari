<?php

namespace frontend\controllers;

use yii\web\Controller;

class AdminController extends Controller
{
    public $layout = '@frontend/views/admin/layouts/main'; // FORZAR EL LAYOUT CORRECTO

    public function actionDashboardAdmin()
    {
        return $this->render('dashboard-admin'); // Renderiza views/admin/dashboard_admin.php
    }
}



