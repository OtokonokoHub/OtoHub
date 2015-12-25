<?php

namespace backend\models;

use Yii;

/**
 * PostSearch represents the model behind the search form about `common\models\Post`.
 */
class AdminPermissionSearch extends AdminItem
{
    public $type = \yii\rbac\Item::TYPE_PERMISSION;
    use ItemSearch;
}
