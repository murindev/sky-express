<?php

namespace App\Admin\Controllers\UI;

use App\Models\UI\Offices;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class OfficesController extends Controller
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
        $grid = new Grid(new Offices);

        $grid->id('ID');
        $grid->column('order','Порядок')->editable();
        $grid->column('active','Вкл/Выкл')->switch();
        $grid->column('code','Код пункта')->editable();
        $grid->column('zip','zip')->editable();
        $grid->column('city','Город')->editable();
        $grid->column('address','Адрес')->editable();
        $grid->column('phone','Телефон')->editable();
        $grid->column('schedule','Режим работы')->editable();
        $grid->column('schedule_to','Режим работы до')->editable();
        $grid->column('email','Email')->editable();
        $grid->column('lat','широта')->editable();
        $grid->column('lon','долгота')->editable();

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
        $show = new Show(Offices::findOrFail($id));

        $show->id('ID');
        $show->order('Порядок');
        $show->active('Вкл/Выкл');
        $show->code('Код пункта');
        $show->zip('zip');
        $show->city('city');
        $show->address('address');
        $show->phone('phone');
        $show->schedule('schedule');
        $show->email('email');
        $show->lat('lat');
        $show->lon('lon');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Offices);

        $form->display('ID');
        $form->number('order', 'Порядок')->default(500);
        $form->switch('active', 'Вкл/Выкл')->default(1);
        $form->text('code', 'Код пункта');
        $form->text('zip', 'Почтовый индекс');
        $form->text('city', 'Город');
        $form->text('address', 'Адрес');
        $form->text('phone', 'Телефон');
        $form->text('schedule', 'Режим работы');
        $form->text('schedule_to', 'Режим работы до')->default(' ');
        $form->text('email', 'Email');
        $form->text('lat', 'Координаты: широта');
        $form->text('lon', 'Координаты: долгота');

        return $form;
    }
}
