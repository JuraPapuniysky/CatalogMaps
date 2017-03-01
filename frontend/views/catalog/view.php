<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Catalog */
/* @var  $coordinate \common\models\Coordinate */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Catalogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
        <div class="col-md-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'country.name',
                    'city.name',
                    'address',
                ],
            ]) ?>
        </div>
        <div class="col-md-6">
            <?php
            if($coordinate != false) {
                echo \common\widgets\GoogleMap::widget([
                    'lat' => $coordinate->lat,
                    'lng' => $coordinate->lng,
                    'title' => $model->name,
                ]);
            }?>
        </div>
    </div>
</div>
