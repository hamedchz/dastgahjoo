<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
class CategoryList extends Component
{
    use WithPagination,AuthorizesRequests;

    public $paginationTheme = 'bootstrap';
    public $category;
    public $state = [];
    public $editStatus = false;
    public $removeId  = null;
    public $searchTerm = null;

    public function updatedSearchTerm(){
        $this->resetPage();
    }

    public function addNew(){
        $this->reset();
        $this->editStatus = false;
        $this->dispatchBrowserEvent('show-editCategory');
    }

    public function store(){
        $this->state['slug'] = Str::slug($this->state['slug']);
        $validateData = Validator::make($this->state,
        [
            'title' => 'required',
            'slug' => 'required|unique:categories,slug',
            'description' => 'required',
            'metaDescription' => 'required|max:160',
            'metaTitle' => 'required|max:60',
        ],
        [
            'title.required' =>  'این فیلد نمیتواند خالی باشد',
            'slug.required' =>  'این فیلد نمیتواند خالی باشد',
            'slug.unique' =>  'این نام تکراری است',
            'description.required' =>  'این فیلد نمیتواند خالی باشد',
            'metaDescription.required' =>  'این فیلد نمیتواند خالی باشد',
            'metaDescription.max' =>  'تعداد کاراکترها زیاد است',
            'metaTitle.required' =>  'این فیلد نمیتواند خالی باشد',
            'metaTitle.max' =>  'تعداد کاراکترها زیاد است',
      
        ])->validate();
        // $validateData['slug'] = $this->slugify($validateData['slug']);
        $save = Category::create($validateData);
        if($save){
            $this->resetValidation();
            (new \App\Models\Log)->storeLog($this->state['title'],' ایجاد دسته بندی','ایجاد');
            $this->dispatchBrowserEvent('hide-editCategory',['message'=>'دسته بندی با موفقیت ایجاد شد', 'action'=>'success']);
        }else{
            (new \App\Models\Log)->storeLog($this->state['title'],'خطا ایجاد دسته بندی','ایجاد ');
            $this->dispatchBrowserEvent('hide-editCategory',['message'=>'مشکلی وجود دارد', 'action'=>'error']);

        }
    }

    public static function slugify($text, string $divider = '-')
    {
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, $divider);
        $text = preg_replace('~-+~', $divider, $text);
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }

        return $text;
        }

    public function changeStatus(Category $category,$status){
        $validatData = Validator::make(
            ['status' => $status],
            ['status' => Rule::in(0,1)],
            ['status.in' =>'اطلاعات این فیلد اشتباه است']

        )->validate();
        $update = $category->update([
            'isActive' => $status
        ]);
        $updateSub = $category->parent()->update([
            'isActive' => $status
        ]);
        if($update){
            (new \App\Models\Log)->storeLog($category->title,'تغییر وضعیت دسته بندی','ویرایش ');
            $this->dispatchBrowserEvent('editcategoryStatus',['message'=>'دسته بندی با موفقیت ویرایش شد', 'action'=>'success']);
        }else{
            (new \App\Models\Log)->storeLog($category->title,'خطا تغییر وضعیت دسته بندی','ویرایش ');
            $this->dispatchBrowserEvent('editcategoryStatus',['message'=>'مشکلی وجود دارد', 'action'=>'error']);

        }

    }
    public function editcategory(Category $category){
        $this->editStatus = true;
        $this->category = $category;
        $this->state = $category->toArray();
        $this->dispatchBrowserEvent('show-editCategory');
    }

    public function update(){
        $this->state['slug'] = Str::slug($this->state['slug']);
        $validateData = Validator::make($this->state,
        [
            'title' => 'required',
            'description' => 'required',
            'metaDescription' => 'required|max:160',
            'metaTitle' => 'required|max:60',
            'slug' => ['required', Rule::unique('categories')->ignore($this->category['id'])],

        ],
        [
            'title.required' =>  'این فیلد نمیتواند خالی باشد',
            'description.required' =>  'این فیلد نمیتواند خالی باشد',
            'metaDescription.required' =>  'این فیلد نمیتواند خالی باشد',
            'metaDescription.max' =>  'تعداد کاراکترها زیاد است',
            'metaTitle.required' =>  'این فیلد نمیتواند خالی باشد',
            'metaTitle.max' =>  'تعداد کاراکترها زیاد است',
            'slug.required' =>  'این فیلد نمیتواند خالی باشد',
            'slug.unique' =>  'این نام تکراری است',

      
        ])->validate();
        $this->category->slug = null;
         $update = $this->category->update($validateData);
        if($update){
            $this->resetValidation();
            (new \App\Models\Log)->storeLog($this->category->title,' ویرایش دسته بندی','ویرایش');
            $this->dispatchBrowserEvent('hide-editCategory',['message'=>'دسته بندی با موفقیت ویرایش شد', 'action'=>'success']);
        }else{
            (new \App\Models\Log)->storeLog($this->category->title,'خطا ویرایش دسته بندی','ویرایش ');
            $this->dispatchBrowserEvent('hide-editCategory',['message'=>'مشکلی وجود دارد', 'action'=>'error']);

        }
    }
    public function removeConfirmation($id){
        $this->removeId = $id;
        $this->dispatchBrowserEvent('show-deleteCategory');
    }

    public function removeCategory(){
       
        $cat = Category::findOrFail($this->removeId);
       
        $sub = $cat->parents()->delete();
        // $products = $cat->products()->
        $delete = $cat->delete();
        if($delete){
            (new \App\Models\Log)->storeLog($cat->title,'حذف دسته بندی','حذف');
            $this->dispatchBrowserEvent('hide-deleteCategory',['message'=>'دسته بندی با موفقیت حذف شد', 'action'=>'success']);
        }else{
            (new \App\Models\Log)->storeLog($cat->title,'خطا حذف دسته بندی','حذف');
            $this->dispatchBrowserEvent('hide-deleteCategory',['message'=>'مشکلی وجود دارد', 'action'=>'error']);

        }
    }
    public function updateCategoryPosition($items){
        foreach ($items as $item) {
            Category::find($item['value'])->update(['order_position' => $item['order']]);
        }
        (new \App\Models\Log)->storeLog('تغییر مکان دسته بندی','ویرایش دسته بندی','ویرایش');
        $this->dispatchBrowserEvent('editcategoryStatus',['message'=>'دسته بندی با موفقیت ویرایش شد', 'action'=>'success']);

    }
    public function render()
    {
        $this->authorize('category',Category::class);
        $categories = Category::query()->where('title','Like','%'.$this->searchTerm.'%')->where('parent',0)->orderBy('order_position','asc')->get();
        return view('livewire.admin.category.category-list',['categories'=>$categories])->layout('layouts.admin.app');
    }
}
