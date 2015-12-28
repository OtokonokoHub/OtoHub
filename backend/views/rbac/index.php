<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php \yii\bootstrap\Modal::begin(['id' => 'create-role', 'toggleButton' => [
            'label'  => 'Create Role',
            'class'  => 'btn btn-success',
            'header' => "<h4 class=\"name modal-title\">创建角色</h4>",
            ]]); ?>
            <div class="post-form">
                <?php $form = ActiveForm::begin(['action' => ['rbac/create', 'user_type' => \Yii::$app->request->get('user_type')], 'method' => 'post']); ?>
                <?php $model = \Yii::createObject(get_parent_class($dataProvider->query->modelClass)); ?>
                <?= $form->field($model, 'name')->textInput() ?>
                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        <?php \yii\bootstrap\Modal::end(); ?>
        <?php \yii\bootstrap\Modal::begin(['id' => 'manage-permission', 'toggleButton' => [
            'label'  => 'Manage Permission',
            'class'  => 'btn btn-success',
            'header' => "<h4 class=\"name modal-title\">创建行为</h4>",
            ]]); ?>
            <div class="post-form">
                <?php $form = ActiveForm::begin(['action' => 'javascript:void']); ?>
                <?php $model = \Yii::createObject(get_parent_class($dataProvider->query->modelClass)); ?>
                <?= $form->field($model, 'name')->textInput(['id' => 'permission-name']) ?>
                <?= $form->field($model, 'description')->textarea(['rows' => 6, 'id' => 'permission-description']) ?>
                <div class="form-group">
                    <?= Html::submitButton('Create', ['class' => 'btn btn-success', 'id' => 'create-permission']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
            <div id="permission-list">
                    
            </div>
        <?php \yii\bootstrap\Modal::end(); ?>
    </p>
    <?php \yii\bootstrap\Modal::begin([
        'id' => 'view-modal',
        'header' => "<h4 class=\"name modal-title\"></h4>",
        ]); ?>

    <?php \yii\bootstrap\Modal::end(); ?>
    <?php $form = ActiveForm::begin(['action' => ['rbac/delete-mulit', 'user_type' => \Yii::$app->request->get('user_type')], 'method' => 'post']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\checkboxcolumn'],
            'name',
            'type',
            'description:ntext',
            'rule_name',
            'created_at:datetime',
            'updated_at:datetime',

            [
                'class'    => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons'  => [
                    'view' => function($url, $model, $key) {
                        $options = [
                            'title'       => Yii::t('yii', 'View'),
                            'aria-label'  => Yii::t('yii', 'View'),
                            'data-pjax'   => '0',
                            'data-target' => '#view-modal',
                            'data-toggle' => 'modal',
                            'class'       => 'view-button',
                            'data-url'    => \yii\helpers\Url::to(['rbac/view', 'user_type' => \Yii::$app->request->get('user_type'), 'id' => $key]),
                        ];
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', "javascript:void;", $options);
                    },
                ],
            ],
        ],
    ]); 
    ?>
    <?= Html::submitButton('删除', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>
</div>
<script>
        url = {};
        url['permission_index']  = '<?php echo \yii\helpers\Url::to(['rbac/permission-index', 'user_type' => \Yii::$app->request->get('user_type'), 'per-page' => 5]); ?>';
        url['permission_create'] = '<?php echo \yii\helpers\Url::to(['rbac/permission-create', 'user_type' => \Yii::$app->request->get('user_type')]); ?>';
</script>