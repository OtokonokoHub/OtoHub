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
        return $this->render('index');
    }

}
