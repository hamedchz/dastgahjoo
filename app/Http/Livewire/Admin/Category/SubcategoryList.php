<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class SubcategoryList extends Component
{
    use WithPagination,AuthorizesRequests;

    public $paginationTheme = 'bootstrap';
    public $subcategory;
    public $editStatus = false;
    public $category;
    public $state =[];
    public $editcategory;
    public $categoryId = null;
    public $removeId = null;


    public function mount($id){
        
        $category = Category::where('parent',$id)->orderBy('id','desc')->get();
        $this->subcategory = $category;
        $this->categoryId = $id;
    }
    
    public function changeStatus(Category $category,$value){
        
        $update = $category->update([
             'isActive' => $value
         ]);
         if($update){
             (new \App\Models\Log)->storeLog($category->title,' ویرایش وضعیت زیر دسته بندی','ویرایش');
             $this->dispatchBrowserEvent('hide-editCategory',['message'=>'دسته بندی با موفقیت ویرایش شد', 'action'=>'success']);
 
         }else{
             (new \App\Models\Log)->storeLog($category->title,'خطا ویرایش وضعیت زیر دسته بندی','ویرایش ');
             $this->dispatchBrowserEvent('hide-editCategory',['message'=>'مشکلی وجود دارد', 'action'=>'error']);
         }
     }
    
     public function addNew($id){
        $this->reset();
        $this->mount($id);
        $this->editStatus = false;
        $this->dispatchBrowserEvent('show-editCategory');
    }
    public function edit(Category $category){
        
        $this->category = $category;
        $this->state = $category->toArray();
        $this->editStatus = true;
        $this->dispatchBrowserEvent('show-editCategory');

    }
    public function update(){
        $validateData = Validator::make($this->state,
        [
            'title' => 'required',
            'description' => 'required',
            'metaDescription' => 'required|max:160',
            'metaTitle' => 'required|max:60',
        ],
        [
            'title.required' =>  'این فیلد نمیتواند خالی باشد',
            'description.required' =>  'این فیلد نمیتواند خالی باشد',
            'metaDescription.required' =>  'این فیلد نمیتواند خالی باشد',
            'metaDescription.max' =>  'تعداد کاراکترها زیاد است',
            'metaTitle.required' =>  'این فیلد نمیتواند خالی باشد',
            'metaTitle.max' =>  'تعداد کاراکترها زیاد است',
      
        ])->validate();
        $this->category->slug = null;
         $update = $this->category->update($validateData);
        if($update){
            $this->resetValidation();
            (new \App\Models\Log)->storeLog($this->category->title,' ویرایش زیر دسته بندی','ویرایش');
            $this->dispatchBrowserEvent('hide-editCategory',['message'=>'دسته بندی با موفقیت ویرایش شد', 'action'=>'success']);
            return redirect()->to('dashboard/subcategories-list/'.$this->category->parent);

        }else{
            $this->resetValidation();
            (new \App\Models\Log)->storeLog($this->category->title,'خطا ویرایش زیر دسته بندی','ویرایش ');
            $this->dispatchBrowserEvent('hide-editCategory',['message'=>'مشکلی وجود دارد', 'action'=>'error']);
            return redirect()->to('dashboard/subcategories-list/'.$this->category->parent);
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

    public function store(){
        $validateData = Validator::make($this->state,
        [
            'title' => 'required',
            'description' => 'required',
            'metaDescription' => 'required|max:160',
            'metaTitle' => 'required|max:60',
            'slug' => 'required|unique:categories',

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
        $validateData['parent'] = $this->categoryId;
        $validateData['slug'] = $this->slugify($validateData['slug']);
        $save = Category::create($validateData);
        if($save){
            $this->resetValidation();
            (new \App\Models\Log)->storeLog($this->state['title'],' ایجاد زیر دسته بندی','ایجاد');
            $this->dispatchBrowserEvent('hide-editCategory',['message'=>'دسته بندی با موفقیت ایجاد شد', 'action'=>'success']);
            return redirect()->to('dashboard/subcategories-list/'.$this->categoryId);
        }else{
            $this->resetValidation();
            (new \App\Models\Log)->storeLog($this->state['title'],'خطا ایجاد زیر دسته بندی','ایجاد ');
            $this->dispatchBrowserEvent('hide-editCategory',['message'=>'مشکلی وجود دارد', 'action'=>'error']);
            return redirect()->to('dashboard/subcategories-list/'.$this->categoryId);


        }
    }
    public function removeConfirmation($id){
        $this->removeId = $id;
        $this->dispatchBrowserEvent('show-deleteCategory');
    }
    public function removeCategory(){
        $cat = Category::findOrFail($this->removeId);
        $delete = $cat->delete();
        if($delete){
            (new \App\Models\Log)->storeLog($cat->title,'حذف زیر دسته بندی','حذف');
            $this->dispatchBrowserEvent('hide-deleteCategory',['message'=>'دسته بندی با موفقیت حذف شد', 'action'=>'success']);
            return redirect()->to('dashboard/subcategories-list/'.$cat->parent);

        }else{
            (new \App\Models\Log)->storeLog($cat->title,'خطا حذف زیر دسته بندی','حذف');
            $this->dispatchBrowserEvent('hide-deleteCategory',['message'=>'مشکلی وجود دارد', 'action'=>'error']);
            return redirect()->to('dashboard/subcategories-list/'.$cat->parent);


        }
    }
    public function render()
    {
        $this->authorize('category',Category::class);
        return view('livewire.admin.category.subcategory-list')->layout('layouts.admin.app');
    }
}
