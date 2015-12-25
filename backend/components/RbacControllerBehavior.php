<?php
namespace backend\components;

use yii\web\Controller;
use yii\base\Behavior;

class RbacControllerBehavior extends Behavior
{
    // 其它代码

    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => function($event){
                if (!in_array(\Yii::$app->request->get('user_type'), ['user', 'admin', 'User', 'Admin'])) {
                    $event->isValid = false;
                }
                else{
                    $event->sender->_userType = ucfirst(\Yii::$app->request->get('user_type'));
                    $authManagerName = $event->sender->_userType == 'User' ? $event->sender->_userType : '';
                    $event->sender->_authManager = \yii\di\Instance::ensure('auth'.$authManagerName.'Manager', '\yii\rbac\DbManager');
                }
            },
        ];
    }
}