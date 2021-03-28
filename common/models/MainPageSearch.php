<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MainPage;

/**
 * MainPageSearch represents the model behind the search form of `common\models\MainPage`.
 */
class MainPageSearch extends MainPage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['header_title', 'header_subtitle', 'header_desc', 'name_company', 'site', 'address', 'phone', 'email_contact', 'email_footer', 'advantages', 'title', 'description', 'keywords'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = MainPage::find();

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
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'header_title', $this->header_title])
            ->andFilterWhere(['like', 'header_subtitle', $this->header_subtitle])
            ->andFilterWhere(['like', 'header_desc', $this->header_desc])
            ->andFilterWhere(['like', 'name_company', $this->name_company])
            ->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email_contact', $this->email_contact])
            ->andFilterWhere(['like', 'email_footer', $this->email_footer])
            ->andFilterWhere(['like', 'advantages', $this->advantages])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'keywords', $this->keywords]);

        return $dataProvider;
    }
}
