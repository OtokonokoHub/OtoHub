<?php 
use yii\grid\GridView;
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
            ],
        ],
    ],
]); 
?>