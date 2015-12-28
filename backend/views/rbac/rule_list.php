<?php 
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'columns'      => [
        ['class' => 'yii\grid\checkboxcolumn'],
        'name',
        'description:ntext',
        [
            'class'    => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'buttons'  => [
                'view' => function($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('yii', 'View'),
                        'aria-label' => Yii::t('yii', 'View'),
                        'data-pjax' => '0',
                        'data-target' => '#view-modal',
                        'data-toggle' => 'modal',
                        'class' => 'view-button',
                        'data-url' => \yii\helpers\Url::to(['rbac/view', 'user_type' => \Yii::$app->request->get('user_type'), 'id' => $key]),
                    ];
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', "javascript:void;", $options);
                },
                'delete' => function ($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('yii', 'Delete'),
                        'aria-label' => Yii::t('yii', 'Delete'),
                        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                        'data-method' => 'post',
                        'data-pjax' => '0',
                    ];
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', Url::to(['rbac/permission-delete', 'id' => $model->name, 'user_type' => \Yii::$app->request->get('user_type')]), $options);
                },
            ],
        ],
    ],
]); 
?>