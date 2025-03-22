<?php

namespace frontend\controllers;

use yii\web\Controller;

class VeterinarioController extends Controller
{
    public $layout = '@frontend/views/veterinario/layouts/main'; // FORZAR EL LAYOUT CORRECTO

    public function actionDashboardVeterinario()
    {
        return $this->render('dashboard-veterinario'); // Renderiza views/admin/dashboard_admin.php
    }
}



