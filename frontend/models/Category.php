<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $alias
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property integer $parent
 * @property string $label
 * @property string $path
 * @property integer $status
 * @property integer $thumb
 * @property string $description
 */
class Category extends \common\models\Category
{
    public function validate($attributeNames = null, $clearErrors = true){
        return false;
    }

    public static function findOneByAlias($alias){
        $data = \Yii::$app->cache->get("category.alias.{$alias}");
        if (empty($data)) {
            $data = parent::findOne([
                'alias'  => $alias,
                'status' => 0,
                ]);
            \Yii::$app->cache->set("category.alias.{$alias}", $data);
        }
        else if($data->status != 0){
            $data = null;
        }
        return $data;
    }

    public function getParent(){
        if ($this->parent == 0) {
            return null;
        }
        $data = \Yii::$app->cache->get("category.id.{$this->id}");
        if (empty($data)) {
            $data = parent::findOne([
                'id'     => $this->parent,
                'status' => 0,
                ]);
            \Yii::$app->cache->set("category.id.{$this->id}", $data);
        }
        else if($data->status != 0){
            $data = null;
        }
        return $data;
    }
    public function getChilds(){
        $data = \Yii::$app->cache->get("category.child.{$this->id}");
        if (empty($data)) {
            $data = static::findAll([
                'parent' => $this->id,
            ]);
            \Yii::$app->cache->set("category.child.{$this->id}", $data);
        }
        return $data;
    }
}
