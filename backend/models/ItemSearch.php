<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PostSearch represents the model behind the search form about `common\models\Post`.
 */
trait ItemSearch
{
    public function rules()
    {
        return [
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['name', 'rule_name', 'description'], 'string'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = parent::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'name' => $this->name,
            'type' => $this->type,
            'rule_name' => $this->rule_name,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);
        $query->andWhere(['type' => $this->type]);

        return $dataProvider;
    }

}
