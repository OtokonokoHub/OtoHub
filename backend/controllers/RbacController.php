<?php

namespace backend\controllers;

class RbacController extends \yii\web\Controller
{
    public $_userType;
    public $_authManager;
    public function behaviors()
    {
        return [
            \backend\components\RbacControllerBehavior::className(),
        ];
    }
    public function actions(){
        return [

        ];
    }
    public function actionIndex()
    {
        $searchModel = \Yii::createObject("\backend\models\\".$this->_userType."RoleSearch");
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    public function actionCreate(){
        $role = new \yii\rbac\Role(\Yii::$app->request->post($this->_userType.'Item'));
        $this->_authManager->add($role);
        return $this->redirect(['rbac/index', 'user_type' => $this->_userType]);
    }

    public function actionDelete($id){
        $role = $this->_authManager->getRole($id);
        $this->_authManager->remove($role);
        return $this->redirect(['rbac/index', 'user_type' => $this->_userType]);
    }

    public function actionView($id){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        echo json_encode($this->_authManager->getRole($id));
    }

    public function actionDeleteMulit(){
        $names = \Yii::$app->request->post('selection');
        $result = call_user_func_array(["\backend\models\\".$this->_userType."Item", 'deleteAll'], [['name' => $names, 'type' => \yii\rbac\Item::TYPE_ROLE]]);
        return $this->redirect(['rbac/index', 'user_type' => $this->_userType]);
    }

    public function actionPermissionIndex(){
        $searchModel = \Yii::createObject("\backend\models\\".$this->_userType."PermissionSearch");
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        return $this->renderAjax('rule_list', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    public function actionPermissionCreate(){
        $role = new \yii\rbac\Permission(\Yii::$app->request->post($this->_userType.'Item'));
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        try {
            $result = @$this->_authManager->add($role);
            echo json_encode($result);
        } catch (\Exception $e) {
            echo json_encode($e);
        }
    }

    public function actionPermissionDelete($id){
        $role = $this->_authManager->getPermission($id);
        $this->_authManager->remove($role);
    }

    public function actionPermissionDeleteMulit(){

    }
}
