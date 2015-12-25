<?php

namespace backend\controllers;
use yii\web\Response;

class RuleController extends \yii\rest\ActiveController
{
    public $modelClass = "\backend\models\UserRule";

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        return $behaviors;
    }
    public function actions(){
        return [
            'index' => [
                'class' => \yii\rest\IndexAction::className(),
                'modelClass' => $this->modelClass,
                ],
            'create' => [
                'class' => \yii\rest\CreateAction::className(),
                'modelClass' => $this->modelClass,
                ],
            'delete' => [
                'class' => \yii\rest\DeleteAction::className(),
                'modelClass' => $this->modelClass,
                ],
            'update' => [
                'class' => \yii\rest\UpdateAction::className(),
                'modelClass' => $this->modelClass,
                ],
        ];
    }

}
