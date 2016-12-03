<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property integer $id
 * @property string $content
 * @property integer $create_time
 * @property integer $author_id
 * @property integer $post_id
 *
 * @property User $author
 * @property Post $post
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'author_id', 'post_id'], 'required'],
            [['content'], 'string'],
            [['create_time', 'author_id', 'post_id'], 'integer'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author_id' => 'id']],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::class, 'targetAttribute' => ['post_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'create_time' => 'Create Time',
            'author_id' => 'Author ID',
            'post_id' => 'Post ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }

    public function getPosts()
    {
        return $this->hasMany(Post::class, ['id' => 'post_id']);
    }

    public function getComment($id_comment)
    {
        return $this->findOne($id_comment);
    }

    public function getCommentOfThisPost($id)
    {
        return $this->find()->where('post_id = :id', [':id' => $id])->all();
    }

	public function beforeSave($insert)
	{
		if ($this->isNewRecord)
		{
			$this->create_time = time();
		}
		return parent::beforeSave($insert);
	}
}
