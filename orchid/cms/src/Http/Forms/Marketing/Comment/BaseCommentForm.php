<?php

namespace Orchid\CMS\Http\Forms\Marketing\Comment;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Orchid\CMS\Core\Models\Comment;
use Orchid\Platform\Forms\Form;

class BaseCommentForm extends Form
{
    /**
     * @var string
     */
    public $name = 'General Info';

    /**
     * Base Model.
     *
     * @var
     */
    protected $model = Comment::class;

    /**
     * Display Settings App.
     *
     * @param Comment|null $comment
     *
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function get(Comment $comment): View
    {
        return view('cms::container.marketing.comment.info', [
            'comment' => $comment,
            'post'    => $comment->post()->first(),
        ]);
    }

    /**
     * @param Request|null $request
     * @param Comment|null $comment
     *
     * @return mixed|void
     */
    public function persist(Request $request = null, Comment $comment = null)
    {
        $comment->approved = false;
        $comment->fill($request->all());
        $comment->save();
    }

    /**
     * @param Comment $comment
     */
    public function delete(Comment $comment)
    {
        $comment->delete();
    }
}
