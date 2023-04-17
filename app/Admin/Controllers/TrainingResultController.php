<?php

namespace App\Admin\Controllers;

use App\Models\TrainingResult;
use App\Models\TrainingMenu;
use App\Models\TrainingCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TrainingResultController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'TrainingResult';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new TrainingResult());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('user_id', __('User id'));
        $grid->column('training_menu.name', __('Training menu'));
        $grid->column('weight', __('Weight'));
        $grid->column('rep', __('Rep'));
        $grid->column('date', __('Date'))->sortable();
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function($filter) {
            $filter->equal('user_id', 'User id');
            $filter->like('training_menu.name', 'トレーニングメニュー');
            $filter->between('date', 'Date')->datetime();
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(TrainingResult::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('training_menu.name', __('Training menu name'));
        $show->field('weight', __('Weight'));
        $show->field('rep', __('Rep'));
        $show->field('date', __('Date'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new TrainingResult());

        $form->number('user_id', __('User id'));
        $form->select('training_menu_id', __('Training menu name'))->options(TrainingMenu::all()->pluck('name', 'id'));
        $form->number('weight', __('Weight'));
        $form->number('rep', __('Rep'));
        $form->date('date', __('Date'))->default(date('Y-m-d'));

        return $form;
    }
}