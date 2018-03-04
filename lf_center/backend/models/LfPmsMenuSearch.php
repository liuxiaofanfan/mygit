<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LfPmsMenu;

/**
 * LfPmsMenuSearch represents the model behind the search form of `common\models\LfPmsMenu`.
 */
class LfPmsMenuSearch extends LfPmsMenu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_id', 'menu_name', 'parent_id', 'target_url'], 'safe'],
            [['menu_level', 'sequence'], 'integer'],
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
        $query = LfPmsMenu::find();

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
        $query->andFilterWhere([
            'menu_level' => $this->menu_level,
            'sequence' => $this->sequence,
        ]);

        $query->andFilterWhere(['like', 'menu_id', $this->menu_id])
            ->andFilterWhere(['like', 'menu_name', $this->menu_name])
            ->andFilterWhere(['like', 'parent_id', $this->parent_id])
            ->andFilterWhere(['like', 'target_url', $this->target_url]);

        return $dataProvider;
    }
}
