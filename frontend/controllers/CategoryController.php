<?php

namespace frontend\controllers;

use frontend\models\PostForm;
use Yii;
use common\models\LoginForm;
use frontend\models\SignupForm;
use yii\filters\AccessControl;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;

class CategoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $category = \frontend\models\Category::findOneByAlias(\Yii::$app->request->get('alias'));
        $childs   = $category->getChilds();
        $parent   = $category->getParent();
        echo '<pre>';
        var_dump($category);
        var_dump($parent);
        var_dump($childs);
        /*return $this->render('index',[
        ]);*/
    }
}
