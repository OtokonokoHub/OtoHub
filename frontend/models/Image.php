<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property string $path
 * @property string $type
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path', 'type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'type' => 'Type',
        ];
    }

    public function getPost()
    {
        return $this->hasOne(Post::className(),['id' => 'post_id'])
            ->viaTable('post_image',['image_id' => 'id']);
    }

    /**
     * @param UploadedFile $file
     */
    public function createFromUploadFile($file)
    {
        $this->type = 'local_file';
        $folder = 'uploads/images/'.date('Y/m/d/');
        if(!is_dir($folder)){
            mkdir($folder,0776,true);
        }
        $this->path = $folder . Yii::$app->security->generateRandomString().'.'.$file->extension;
        $file->saveAs($this->path);
        $this->save();
    }
}
