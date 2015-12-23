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
        var_dump(\Yii::$app->request->get('alias'));
        /*return $this->render('index',[
        ]);*/
    }
}
