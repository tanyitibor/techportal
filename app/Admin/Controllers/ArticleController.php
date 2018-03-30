<?php

namespace App\Admin\Controllers;

use App\Article;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Controllers\ModelForm;

class ArticleController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Articles');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Edit Article');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('Create Article');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Article::class, function (Grid $grid) {
            $grid->model()->orderBy('updated_at', 'desc');

            $grid->id('ID');

            $grid->column('url')->display(function () {
                return $this->url();
            });

            $grid->columns('title', 'slug', 'author.name');

            $grid->column('is_published')->display(function () {
                if ($this->is_published == 1) {
                    return 'Published';
                }

                return 'Unpublished';
            });

            $grid->tags()->display(function ($tags) {
                $tags = array_map(function ($tag) {
                    return $tag['name'];
                }, $tags);

                return implode(', ', $tags);
            });

            $grid->created_at()->sortable();
            $grid->updated_at()->sortable();
            $grid->published_at()->sortable();

            $grid->filter(function ($filter) {
                $filter->like('title');

                $filter->in('author_id', 'Author')
                    ->multipleSelect(Administrator::all()->pluck('name', 'id'));

                $filter->equal('is_published', 'Publshed')
                    ->select([
                        0 => 'Unpublished',
                        1 => 'Published',
                    ]);

                $filter->where(function ($query) {
                    $query->whereHas('tags', function ($query) {
                        $query->whereIn('id', $this->input);
                    });
                }, 'Tag')->multipleSelect(\App\Tag::all()->pluck('name', 'id'));

                $filter->between('created_at', 'Created Time')->datetime();
                $filter->between('updated_at', 'Updated Time')->datetime();
                $filter->between('published_at', 'Published Time')->datetime();
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Article::class, function (Form $form) {
            $form->display('id', 'ID')->with(function ($id) {
                return '<span id="article-id">' . $id . '</span>';
            });

            $form->text('title')
                ->rules('required|string|between:10,100');

            $form->text('prev_text', 'Preview Text')
                ->rules('required|string|between:10,255');

            $form->image('prev_img', 'Preview Image')
                ->rules('required|image|between:20,2000')
                ->fit(700)->uniqueName();

            $form->simplemde('body')
                ->rules('required|string|between:200,16000');

            $form->multipleSelect('tags')
                ->rules('required|exists:tags,id')
                ->options(\App\Tag::all()->pluck('name', 'id'));

            $form->radio('is_published')->options([
                0 => 'Unpublished',
                1 => 'Published',
            ])->default(0);

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
            $form->display('published_at', 'Published At');
        });
    }
}
