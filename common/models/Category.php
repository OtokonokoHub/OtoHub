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
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'label', 'thumb', 'parent'], 'required'],
            ['alias', 'match', 'pattern' => '/^[a-z-]+$/'],
            [['parent', 'status', 'thumb'], 'integer'],
            [['alias', 'meta_title', 'meta_keywords', 'label'], 'string', 'max' => 64],
            [['meta_description', 'path', 'description'], 'string', 'max' => 255],
            [['alias'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'parent' => 'Parent',
            'label' => 'Label',
            'path' => 'Path',
            'status' => 'Status',
            'thumb' => 'Thumb',
            'description' => 'Description',
        ];
    }
}
