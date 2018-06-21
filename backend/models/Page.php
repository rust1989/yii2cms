<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property string $id
 * @property string $content
 * @property string $create_date
 * @property int $status
 * @property string $poster
 * @property string $kind
 * @property int $show
 * @property string $keyword
 * @property string $description
 * @property string $topic
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content','content_en', 'description'], 'string'],
            [['create_date'], 'safe'],
            [['status', 'show'], 'integer'],
            [['poster', 'keyword', 'topic'], 'string', 'max' => 255],
            [['kind'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'content_en' => 'Content',
            'create_date' => 'Create Date',
            'status' => 'Status',
            'poster' => 'Poster',
            'kind' => 'Kind',
            'show' => 'Show',
            'keyword' => 'Keyword',
            'description' => 'Description',
            'topic' => 'Topic',
        ];
    }
}
