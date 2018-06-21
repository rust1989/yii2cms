<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Products;

/**
 * ProductsSearch represents the model behind the search form of `backend\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'show', 'sort', 'cid'], 'integer'],
            [['title', 'content','title_en', 'content_en', 'create_date', 'poster', 'keyword', 'description', 'topic', 'short', 'short_en'], 'safe'],
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
        $query = Products::find()->orderBy('sort desc');

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
            'create_date' => $this->create_date,
            'status' => $this->status,
            'show' => $this->show,
            'sort' => $this->sort,
            'cid' => $this->cid,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'content_en', $this->content_en])
            ->andFilterWhere(['like', 'poster', $this->poster])
            ->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'topic', $this->topic])
            ->andFilterWhere(['like', 'short', $this->short])
            ->andFilterWhere(['like', 'short_en', $this->short_en]);

        return $dataProvider;
    }
}
