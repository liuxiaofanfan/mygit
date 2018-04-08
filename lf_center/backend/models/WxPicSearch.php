<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WxPic;

/**
 * WxPicSearch represents the model behind the search form of `common\models\WxPic`.
 */
class WxPicSearch extends WxPic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'PIC_POS'], 'integer'],
            [['PIC_URL', 'UTIME', 'UADMIN'], 'safe'],
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
        $query = WxPic::find();

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
            'ID' => $this->ID,
            'PIC_POS' => $this->PIC_POS,
            'UTIME' => $this->UTIME,
        ]);

        $query->andFilterWhere(['like', 'PIC_URL', $this->PIC_URL])
            ->andFilterWhere(['like', 'UADMIN', $this->UADMIN]);

        return $dataProvider;
    }
}
