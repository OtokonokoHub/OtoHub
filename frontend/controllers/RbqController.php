<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class RbqController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new \common\models\Post;
        $model->content = 'test';
        $model->hasImage = 0;
        $model->save();
        var_dump($model->getErrors());exit;
        return $this->render('index');
    }

}
