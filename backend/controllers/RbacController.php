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
        $role = new \yii\rbac\Role(\Yii::$app->request->post($this->_userType.'Role'));
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
        $result = call_user_func_array(["\backend\models\\".$this->_userType."Role", 'deleteAll'], [['name' => $names]]);
        return $this->redirect(['rbac/index', 'user_type' => $this->_userType]);
    }

    protected function findModel($id)
    {
        if (($model = \backend\models\UserRole::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
