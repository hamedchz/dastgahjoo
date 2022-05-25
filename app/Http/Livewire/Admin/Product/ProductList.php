<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Images;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination,AuthorizesRequests;

    public $paginationTheme = 'bootstrap';
    public $removeId = null;
    public $productInfo= null;
    public $staus= null;
    public $productsImages=[];
   

    public function changeStatus($id,$value){
        $validateData = Validator::make(
            ['value' => $value],
            ['value'=> Rule::in('pending','verified','rejected')],
            ['value.in'=>'اطلاعات اشتباه است']
        )->validate();
        $product = DB::table('products')->where('id',$id)->first();
        $update = DB::table('products')->where('id',$id)->update([
            'status' => trim($value)
        ]);
        if($update){
            (new \App\Models\Log)->storeLog($product->itemNo,'تغییر وضعیت  محصول','ویرایش ');
            $this->dispatchBrowserEvent('editproductstatus',['message'=>'محصول  با موفقیت ویرایش شد', 'action'=>'success']);
        }else{
            (new \App\Models\Log)->storeLog($product->itemNo,'خطا تغییر وضعیت  محصول','ویرایش ');
            $this->dispatchBrowserEvent('editproductstatus',['message'=>'مشکلی وجود دارد', 'action'=>'error']);

        }
      
    }
    public function removalConfirmation($id){
        $this->removeId = $id;
        $this->dispatchBrowserEvent('show-productDelete');
    }
    public function removeProduct(){
        $product = Product::findOrFail($this->removeId);
        $delete = $product->delete();
        $delete = $product->update([
                    'isActive' => 0,
                 ]);
        if($delete){
            (new \App\Models\Log)->storeLog($product->itemNo,' حذف  محصول','حذف ');
            $this->dispatchBrowserEvent('hide-productDelete',['message'=>'محصول  با موفقیت حذف شد', 'action'=>'success']);
        }else{
            (new \App\Models\Log)->storeLog($product->itemNo,'خطا  حذف  محصول','حذف ');
            $this->dispatchBrowserEvent('hide-productDelete',['message'=>'مشکلی وجود دارد', 'action'=>'error']);

        }
    }
    public function getInformation($id){
        $pro = Product::with('category')->with('vendor')->where('id',$id)->first();
        $this->productInfo = $pro;
        $this->dispatchBrowserEvent('show-productInformation');
    }

    public function showImage($id){
        $productsImage = Images::where('product_id',$id)->get();
        $this->productsImages = $productsImage->toArray();
        // foreach($this->productsImages as $image){
        //     dd($image['image']);
        // }
        // dd($this->productsImages);
        // dd($this->productsImages[0]['images']);
        $this->dispatchBrowserEvent('show-productImages');
    }

    // public function removeConfirmation($id){
    //     $this->removeId = $id;
    //     $this->dispatchBrowserEvent('show-productDelete');
    // }
    // public function removeProduct(){
    //     $product = Product::findOrFail($this->removeId);
    //     $delete = $product->update([
    //         'isActive' => 0,
    //     ]);
    //     if($delete){
    //         $this->dispatchBrowserEvent('hideproductDelete',['message' => 'محصول با موفقیت حذف شد','action' => 'success']);
    //         (new \App\Models\Log)->storeLog($product->title,'حذف کردن محصول','حذف ');
    //     }else{
    //         $this->dispatchBrowserEvent('hideproductDelete',['message' => 'مشکلی وجود دارد' , 'action' => 'reject']);
    //         (new \App\Models\Log)->storeLog($product->title,'خطا در حذف کردن محصول','حذف ');
    //     }

    // }
    public function render()
    {
        $this->authorize('products',Product::class);
        $products = Product::with('category')->where('isActive',1)->latest()->paginate(21);
        return view('livewire.admin.product.product-list',['products'=>$products])->layout('layouts.admin.app');
    }
}
