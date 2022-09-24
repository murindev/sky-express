<?php

namespace App\Admin\Controllers\UI;

use App\Models\UI\Slider;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class SliderController extends Controller
{
    use HasResourceActions;

    public $type = [1 => 'header', 2 => 'blocks', 3 => 'Везде'];

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
        $grid = new Grid(new Slider);

        $grid->id('ID');
        $grid->column('order','Порядок')->editable();
        $grid->column('active','Вкл/Выкл')->switch();
        $grid->column('type','Тип')->editable('select', $this->type);
        $grid->btn('Заголовок кнопки');
        $grid->action('Ссылка');
        $grid->column('cite_before','Цитата - начало фразы');
        $grid->column('cite_accent','Цитата - активная часть');
        $grid->column('cite_after','Цитата - завершение фразы');

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
        $show = new Show(Slider::findOrFail($id));

        $show->id('ID');
        $show->order('Порядок');
        $show->active('Вкл/Выкл');
        $show->type('Тип');
        $show->btn('Заголовок кнопки');
        $show->action('Ссылка');
        $show->cite_before('Цитата - начало фразы');
        $show->cite_accent('Цитата - активная часть');
        $show->cite_after('Цитата - завершение фразы');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Slider);

        $form->display('ID');
        $form->number('order', 'Порядок')->default(500);
        $form->switch('active', 'Вкл/Выкл')->default(1);
        $form->select('type', 'Тип')->options($this->type);
        $form->text('btn', 'Заголовок кнопки');
        $form->text('action', 'Ссылка');
        $form->text('cite_before', 'Цитата - начало фразы');
        $form->text('cite_accent', 'Цитата - активная часть');
        $form->text('cite_after', 'Цитата - завершение фразы');
//        $form->display(trans('admin.created_at'));
//        $form->display(trans('admin.updated_at'));

        return $form;
    }
}
