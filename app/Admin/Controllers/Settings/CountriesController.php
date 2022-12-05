<?php

namespace App\Admin\Controllers\Settings;

use App\Models\Settings\Countries;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CountriesController extends Controller
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
        $grid = new Grid(new Countries);

        $grid->id('ID');
        $grid->order('order');
        $grid->active('active');
        $grid->slug('slug');
        $grid->name('name');
        $grid->alpha_short('alpha_short');
        $grid->alpha('alpha');
        $grid->digital('digital');
        $grid->code('code');
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
        $show = new Show(Countries::findOrFail($id));

        $show->id('ID');
        $show->order('order');
        $show->active('active');
        $show->slug('slug');
        $show->name('name');
        $show->alpha_short('alpha_short');
        $show->alpha('alpha');
        $show->digital('digital');
        $show->code('code');
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
        $form = new Form(new Countries);

        $form->display('ID');
        $form->text('order', 'order');
        $form->text('active', 'active');
        $form->text('slug', 'slug');
        $form->text('name', 'name');
        $form->text('alpha_short', 'alpha_short');
        $form->text('alpha', 'alpha');
        $form->text('digital', 'digital');
        $form->text('code', 'code');
        $form->display(trans('admin.created_at'));
        $form->display(trans('admin.updated_at'));

        return $form;
    }
}
