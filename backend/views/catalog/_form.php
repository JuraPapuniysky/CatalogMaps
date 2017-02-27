<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Country;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Catalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_id')->dropDownList(
        ArrayHelper::map(Country::find()->all(), 'id', 'name'),
        ['id' => 'name']
    )
    ?>

    <?php

    echo $form->field($model, 'city_id')->widget(DepDrop::className(),[
        'options' => ['id' => 'city_id'],
        'pluginOptions' => [
            'depends' => ['name'],
            'placeholder' => 'Select...',
            'url' => Url::to(['catalog/cities'])
        ]
    ]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
