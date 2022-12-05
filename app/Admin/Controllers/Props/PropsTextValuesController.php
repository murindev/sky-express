<?php

namespace App\Admin\Controllers\Props;

use App\Http\Controllers\Controller;
use App\Models\Settings\TextValues;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PropsTextValuesController extends Controller
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
        $grid = new Grid(new TextValues);

        $grid->id('ID');
        $grid->column('title','Заголовок')->editable();
        $grid->column('active','Активность')->switch();
        $grid->column('order','Порядок')->editable();
        $grid->column('slug','slug');
        $grid->column('text','Текст')->textarea();

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
        $show = new Show(TextValues::findOrFail($id));

        $show->id('ID');
        $show->order('order');
        $show->active('active');
        $show->title('title');
        $show->slug('slug');
        $show->text('text');
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
        $form = new Form(new TextValues);

        $form->display('ID');
        $form->text('title', 'Заголовок');
        $form->switch('active', 'Активность')->default(1);
        $form->number('order', 'Порядок')->default(500);
        $form->text('slug', 'slug');
        $form->text('text', 'Текст');

        return $form;
    }
}
