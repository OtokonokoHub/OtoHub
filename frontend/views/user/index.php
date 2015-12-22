<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PostForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;

$this->title = 'User Index';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <h3>Add new post <a href="#" onclick="$('#post-form').toggle();return false;" style="font-size: 14px">show/hide</a></h3>
    <div class="row">
        <div class="col-lg-12">
            <?php
                $form = ActiveForm::begin([
                    'id' => 'post-form',
                    'action' => ['post/create'],
                    'options' => [
                        'enctype' => 'multipart/form-data',

                    ]
                ]);
            ?>

            <?= $form->field($model, 'content')->textarea() ?>

            <?= FileInput::widget([
                'model' => $model,
                'attribute' => 'images[]',
                'options' => ['multiple' => true],
                'pluginOptions' => ['showUpload' => false],
            ]);
            ?>

            <?= $form->field($model, 'tags')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Post', ['class' => 'btn btn-primary', 'name' => 'post-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
