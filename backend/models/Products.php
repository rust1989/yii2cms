<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property string $id
 * @property string $title
 * @property string $content
 * @property string $create_date
 * @property int $status
 * @property string $poster
 * @property int $show
 * @property string $keyword
 * @property string $description
 * @property string $topic
 * @property string $sort
 * @property string $short
 * @property string $cid
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title','title_en','cid'], 'required'],
            [['content','content_en','description'], 'string'],
            [['create_date'], 'safe'],
            [['status', 'show', 'sort', 'cid'], 'integer'],
            [['title', 'poster', 'keyword', 'topic', 'short', 'short_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' =>Yii::t('app','Title'),
            'content' => Yii::t('app','Content'),
            'title_en' =>Yii::t('app','Title').'(en)',
            'content_en' => Yii::t('app','Content').'(en)',
            'create_date' => Yii::t('app','Create Date'),
            'poster' =>Yii::t('app','Poster'),
            'status' =>Yii::t('app','Status'),
            'show' => Yii::t('app','Show'),
            'keyword' => Yii::t('app','Keyword'),
            'description' => Yii::t('app','Description'),
            'topic' => Yii::t('app','Topic'),
            'sort' => Yii::t('app','Sort'),
            'short' =>Yii::t('app','Short'),
            'short_en' =>Yii::t('app','Short').'(en)',
            'cid' =>Yii::t('app','Cid'),
        ];
    }
}
