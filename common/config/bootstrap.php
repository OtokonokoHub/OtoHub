<?php
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');

yii\base\Event::on("yii\web\User", yii\web\User::EVENT_AFTER_LOGIN, function($event){
    Yii::$app->session->set('nick', $event->identity->nick);
});