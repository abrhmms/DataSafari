<?php

/** @var yii\web\View $this */

$this->title = 'Panel de Cuidador - Zoológico';
?>

<style>
    .dashboard-cuidador {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background: #f5f5f5;
        font-family: Arial, sans-serif;
        padding: 20px;
    }

    h1 {
        font-size: 28px;
        margin: 0;
    }

    .profile-section {
        background: #ffffff;
        border-radius: 10px;
        padding: 30px;
        margin-top: 20px;
        max-width: 600px;
        width: 100%;
        border: 1px solid #ddd;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .profile-info h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .profile-info p {
        font-size: 16px;
        color: #333;
    }

    .manager-info {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .manager-info img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
        border: 1px solid #ccc;
    }

    .manager-info h3 {
        font-size: 18px;
        color: #444;
    }

    .action-buttons {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .action-buttons a {
        background: #f5f5f5;
        color: #333;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        border: 1px solid #ccc;
        transition: background 0.3s ease;
        font-weight: bold;
    }

    .action-buttons a:hover {
        background: #e0e0e0;
    }
</style>



<div class="dashboard-cuidador">
    <header>
        <h1>Bienvenido al Panel del Cuidador de Animales</h1>
    </header>
    <main>
        <section class="profile-section">
            <div class="profile-info">
                <h2>¡Hola Cuidador!</h2>
                <p>Desde aquí puedes gestionar todas las especies, animales y habitats.</p>
            </div>
                <div class="manager-info">
                    <h3><strong>Cuidador:</strong> <?= Yii::$app->user->identity->username ?></h3>
                </div>
        </section>
    </main>
</div>

<br><br>