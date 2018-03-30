<?php

namespace App\Admin\Controllers;

use App\Featured;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\Cache;

class FeaturedController extends Controller
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

            $content->header('Featured');
            $content->description('Featured articles showing at the site sidebar.');

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

            $content->header('Edit Featured');

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

            $content->header('Add Featured');

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
        return Admin::grid(Featured::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->article()->display(function ($article) {
                return $article['title'];
            });

            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Featured::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->select('article_id', 'Article')->options(
                \App\Article::orderBy('created_at', 'desc')
                    ->pluck('title', 'id')
            );

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');

            $form->saved(function () {
                Cache::forget('featured');
            });
        });
    }
}
