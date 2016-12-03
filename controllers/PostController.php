<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Post;
use app\models\Comment;
use yii\web\HttpException;

class PostController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

	public function actionRead($id = NULL, $id_comment = NULL)
	{
		if ($id === NULL)
            throw new HttpException(404, 'Not Found');
		$post = new Post;
        $post = $post->getPost($id);
        if ($post === NULL)
            throw new HttpException(404, 'Document Does Not Exist');
		$newcomment = new Comment;
		if (!($id_comment === NULL))
		{
			$newcomment = $newcomment->getComment($id_comment);
			$this->updatecomment($id_comment);
		}
		$comments = new Comment;
		$data = $comments->getCommentOfThisPost($id);
		$newcomment->author_id = Yii::$app->user->id;
		return $this->render('postread', array('post' => $post, 'comments' => $data, 'newcomment' => $newcomment));
	}
	
	public function actionDelete($id = NULL)
	{
		if ($id === NULL)
            throw new HttpException(404, 'Not Found');
		$post = Post::findOne($id);
		if ($post === NULL)
            throw new HttpException(404, 'Document Does Not Exist');
		$post->delete();
		Yii::$app->session->setFlash('PostDeleted');
		Yii::$app->response->redirect(array('site/index'));
	}
	
	public function actionCreate()
	{
		$model = new Post;
		$model->author_id = Yii::$app->user->id;
		if ($model->load(Yii::$app->request->post())) 
		{
			if ($model->save())
				Yii::$app->response->redirect(array('post/read', 'id' => $model->id));
		}
    	return $this->render('postcreate', array('model' => $model, 'pagename' => 'Create news'));
	}
	
	public function actionUpdate($id = NULL)
	{
		if ($id === NULL)
			throw new HttpException(404, 'Not Found');
		$post = Post::findOne($id);
		if ($post === NULL)
			throw new HttpException(404, 'Document Does Not Exist');
		if ($post->load(Yii::$app->request->post()))
		{
			if ($post->save())
				Yii::$app->response->redirect(array('post/read', 'id' => $post->id));
		}
		return $this->render('postcreate', array('model' => $post, 'pagename' => 'Update news'));
	}
	
	private function createcomment($newcomment, $postid)
	{
		$Comment = new Comment;
		$Comment->content = $newcomment->content;
		$Comment->post_id = $postid;
		$Comment->author_id = Yii::$app->user->id;
		if (!($Comment->content === NULL)) 
		{
			$Comment->save();
		}
	}
	
	private function updatecomment($id)
	{
		if (($Comment = Comment::findOne($id)) === null)
            throw new HttpException(404, 'Not Found');
		if ($Comment->load(Yii::$app->request->post()))
		{
			$Comment->save();
			Yii::$app->getResponse()->redirect(array('post/read', 'id' => $Comment->post_id));
		}
	}
}
