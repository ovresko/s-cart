<?php
#app/Admin/Controller/ShopVendorController.php
namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ShopVendor;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ShopVendorController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header(trans('language.vendor'));
            $content->description(' ');

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

            $content->header(trans('language.vendor'));
            $content->description(' ');

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

            $content->header(trans('language.vendor'));
            $content->description(' ');

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

        $grid = new Grid(new ShopVendor);
        $grid->id('ID')->sortable();
        $grid->name(trans('language.admin.name'))->sortable();
        $grid->phone(trans('language.admin.phone'));
        $grid->email(trans('language.admin.email'));
        $grid->address(trans('language.admin.address'));
        $grid->image(trans('language.admin.image'))->image('', 50);
        $grid->disableRowSelector();
        $grid->disableFilter();
        $grid->tools(function ($tools) {
            $tools->disableRefreshButton();
        });
        $grid->disableExport();
        $grid->actions(function ($actions) {
            $actions->disableView();
        });
        $grid->model()->orderBy('id', 'desc');
        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {

        $form = new Form(new ShopVendor);
        $form->text('name', trans('language.admin.name'))->rules('required');
        $form->email('email', trans('language.admin.email'));
        $form->text('phone', trans('language.admin.phone'));
        $form->textarea('address', trans('language.admin.address'));
        $form->textarea('description', trans('language.admin.description'));
        $form->image('image', trans('language.admin.image'))->uniqueName()->move('vendor')->removable();
        $form->number('sort', trans('language.admin.sort'))->rules('numeric|min:0')->default(0);
        $form->disableViewCheck();
        $form->disableEditingCheck();
        $form->tools(function (Form\Tools $tools) {
            $tools->disableView();
        });
        return $form;
    }

    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }
}
