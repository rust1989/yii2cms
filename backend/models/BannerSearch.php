<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Banner;

/**
 * BannerSearch represents the model behind the search form of `backend\models\Banner`.
 */
class BannerSearch extends Banner
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'show', 'sort'], 'integer'],
            [['title', 'poster', 'create_date', 'keyword', 'description', 'topic', 'position', 'url'], 'safe'],
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
        $query = Banner::find()->orderBy('sort desc');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        	'pagination' => [
        		'pageSize' =>Yii::$app->params['perpage']
        	],
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
            'status' => $this->status,
            'show' => $this->show,
            'create_date' => $this->create_date,
            'sort' => $this->sort,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'poster', $this->poster])
            ->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'topic', $this->topic])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
