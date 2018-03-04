<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LfPmsRole;

/**
 * LfPmsRoleSearch represents the model behind the search form of `common\models\LfPmsRole`.
 */
class LfPmsRoleSearch extends LfPmsRole
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'role_name', 'role_describe'], 'safe'],
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
        $query = LfPmsRole::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'role_id', $this->role_id])
            ->andFilterWhere(['like', 'role_name', $this->role_name])
            ->andFilterWhere(['like', 'role_describe', $this->role_describe]);

        return $dataProvider;
    }
}
