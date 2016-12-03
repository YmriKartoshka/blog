<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Comment;
use yii\web\HttpException;

class CommentController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

	public function actionRead($id = NULL)
	{
		/*if ($id === NULL)
            throw new HttpException(404, 'Not Found');
		$comment = Comment::findAll($id);
        if ($post === NULL)
            throw new HttpException(404, 'Document Does Not Exist');
		if(Yii::$app->user->isGuest)
		{
			return $this->render('postreadguest', array('post' => $post));
		}
		else return $this->render('postread', array('post' => $post));*/
	}
	
	public function actionDelete($id = NULL)
	{
		if ($id === NULL)
            throw new HttpException(404, 'Comment Not Found');
		$comment = Comment::findOne($id);
		if ($comment === NULL)
            throw new HttpException(404, 'Comment Does Not Exist');
		$postid = $comment->post_id;
		$comment->delete();
		Yii::$app->session->setFlash('CommentDeleted');
		Yii::$app->response->redirect(['post/read', 'id' => $postid]);
	}
	
	public function actionCreate($id)
	{
	    $Comment = new Comment;
        if ($id === null)
            throw new HttpException(404, 'Post Not Found');
		$text = (Yii::$app->request->post('comment'));
        $Comment->content = $text['content'];
        if (!($Comment->content === null))
        {
            $Comment->post_id = $id;
            $Comment->author_id = Yii::$app->user->id;
            if ($Comment->save())
                Yii::$app->getResponse()->redirect(['post/read', 'id' => $id]);
        }
        else
            Yii::$app->getResponse()->redirect(['site/index']);
	}
	
	public function actionUpdate($id = NULL)
	{
        if ($id === NULL)
            throw new HttpException(404, 'Comment Not Found');
        $comment = Comment::findOne($id);
        if ($comment === NULL)
            throw new HttpException(404, 'Comment Does Not Exist');
		if ($comment->save())
			Yii::$app->response->redirect(['post/read', 'id' => $comment->post_id, 'id_comment' => $comment->id]);
        else
            throw new HttpException(404, 'Error save Not Found');
	}
}
