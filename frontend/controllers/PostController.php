<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use frontend\models\PostForm;
use yii\web\UploadedFile;

class PostController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['create','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ]
        ];
    }

    public function actionCreate()
    {
        $model = new PostForm();

        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            $model->load($post);
            $model->images = UploadedFile::getInstances($model, 'images');
            if($model->validate()){
                $model->createPost();
            }
        }
    }

    public function actionDelete()
    {

    }

    public function actionList()
    {
        return $this->render('list');
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
