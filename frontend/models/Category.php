<?php

namespace common\models;

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
        $data = \Yii::$app->cache->get("category.{$alias}");
        if (empty($data)) {
            $data = parent::findOne(['alias' => $alias])->asArray();
            \Yii::$app->cache->set("category.{$alias}", $data);
        }
        return $data;
    }
}
