<?php

namespace App\Admin\Controllers\Pages;

use App\Models\Pages\PageAction;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PageActionController extends Controller
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
            ->header(trans('Акции'))
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
        $grid = new Grid(new PageAction);

        $grid->id('ID');
        $grid->column('order','Порядок')->editable();
        $grid->column('active','Вкл/Выкл')->switch();
        $grid->column('slug','Слаг');
        $grid->column('title','Заголовок');

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
        $show = new Show(PageAction::findOrFail($id));

        $show->id('ID');
        $show->order('Порядок');
        $show->active('Вкл/Выкл');
        $show->slug('Слаг');
        $show->meta_title('meta title');
        $show->meta_description('meta description');
        $show->title('Заголовок');
        $show->content('Содержание');
        $show->image('Изображение');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PageAction);

        $form->text('meta_title', 'meta title');
        $form->textarea('meta_description', 'meta description');
        $form->text('slug', 'Слаг');

        $form->display('ID');
        $form->number('order', 'Порядок')->default(500);
        $form->switch('active', 'Вкл/Выкл')->default(1);


        $form->text('title', 'Заголовок');
        $form->summernote('content', 'Содержание');
        $form->image('image', 'Изображение');

        $form->saving(function (Form $form) {
            $form->slug = \Str::slug($form->title);
        });

        return $form;
    }
}
