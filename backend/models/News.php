<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property string $id
 * @property string $title
 * @property string $content
 *  * @property string $title_en
 * @property string $content_en
 * @property string $create_date
 * @property int $status
 * @property string $poster
 * @property int $show
 * @property string $keyword
 * @property string $description
 * @property string $topic
 * @property string $sort
 * @property string $short
 * @property string $short_en
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title','title_en'], 'required'],
            [['content','content_en', 'description'], 'string'],
            [['create_date'], 'safe'],
            [['status', 'show', 'sort'], 'integer'],
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
            'content' => Yii::t('app','Content').'(en)',
            'title_en' =>Yii::t('app','Title').'(en)',
            'content_en' => Yii::t('app','Content'),
            'create_date' => Yii::t('app','Create Date'),
            'poster' =>Yii::t('app','Poster'),
            'status' =>Yii::t('app','Status'),
            'show' => Yii::t('app','Show'),
            'keyword' => Yii::t('app','Keyword'),
            'description' => Yii::t('app','Description'),
            'topic' => Yii::t('app','Topic'),
            'sort' => Yii::t('app','Sort'),
            'short' => Yii::t('app','Short'),
            'short_en' => Yii::t('app','Short').'(en)',
        ];
    }
}
