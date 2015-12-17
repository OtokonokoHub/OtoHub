<?php
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');

session_set_save_handler(new common\SessionHandler);
yii\base\Event::on("yii\web\User", yii\web\User::EVENT_AFTER_LOGIN, function($event){
    Yii::$app->session->set('username', $event->identity->username);
});