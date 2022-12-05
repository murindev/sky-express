<?php

namespace App\Admin\Controllers;

use App\Models\PersonalContacts;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PersonalContactsController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header(trans('admin.index'))
            ->description(trans('admin.description'))
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header(trans('admin.detail'))
            ->description(trans('admin.description'))
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header(trans('admin.edit'))
            ->description(trans('admin.description'))
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header(trans('admin.create'))
            ->description(trans('admin.description'))
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PersonalContacts);

        $grid->id('ID');
        $grid->order('order');
        $grid->active('active');
        $grid->user_id('user_id');
        $grid->fio('fio');
        $grid->organisation('organisation');
        $grid->phone('phone');
        $grid->country_id('country_id');
        $grid->city_id('city_id');
        $grid->zip('zip');
        $grid->street('street');
        $grid->building('building');
        $grid->office('office');
        $grid->info('info');
        $grid->created_at(trans('admin.created_at'));
        $grid->updated_at(trans('admin.updated_at'));

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
        $show = new Show(PersonalContacts::findOrFail($id));

        $show->id('ID');
        $show->order('order');
        $show->active('active');
        $show->user_id('user_id');
        $show->fio('fio');
        $show->organisation('organisation');
        $show->phone('phone');
        $show->country_id('country_id');
        $show->city_id('city_id');
        $show->zip('zip');
        $show->street('street');
        $show->building('building');
        $show->office('office');
        $show->info('info');
        $show->created_at(trans('admin.created_at'));
        $show->updated_at(trans('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PersonalContacts);

        $form->display('ID');
        $form->text('order', 'order');
        $form->text('active', 'active');
        $form->text('user_id', 'user_id');
        $form->text('fio', 'fio');
        $form->text('organisation', 'organisation');
        $form->text('phone', 'phone');
        $form->text('country_id', 'country_id');
        $form->text('city_id', 'city_id');
        $form->text('zip', 'zip');
        $form->text('street', 'street');
        $form->text('building', 'building');
        $form->text('office', 'office');
        $form->text('info', 'info');
        $form->display(trans('admin.created_at'));
        $form->display(trans('admin.updated_at'));

        return $form;
    }
}
