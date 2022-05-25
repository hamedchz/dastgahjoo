<?php

namespace App\Http\Livewire\Admin\Seller\Product\ProductImages;

use App\Models\Images;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductImages extends Component
{
    use WithFileUploads;

    public $images;
    public $coverId = null;
    public $photo;
    public $productId;

    public function mount($id){
      $images = Images::where('product_id',$id)->get();
      $coverId = Images::where('product_id',$id)->where('isCover',1)->first();
      $this->coverId = $coverId;
      $this->productId = $id;
      $this->images = $images;
      
    }

    public function imageStore(){
      
        $this->validate([
            'photo.*' => 'image', 
            'photo' => 'max:'.auth()->user()->vendor->package->packageHistories->images-$this->images->count()
        ],[
            'photo.image' => 'فقط عکس آپلود کنید',
            'photo.max' => 'شما مجاز به آپلود این تعداد عکس نیستید',
 
        ]);
        //  if (!is_null($this->photo)) {      
            foreach($this->photo as $image){
            $fileName = $image->store('/','products');
            DB::table('images')->insert([
                'product_id' => $this->productId,
                'image'=> $fileName

            ]);
            }
            $this->dispatchBrowserEvent('selectCover', ['message' => ' عکس محصول با موفقیت اضافه  شد','action'=>'success']);
            (new \App\Models\Log)->storeLog($this->productId,'عکس  محصول','ایجاد');
            return redirect(route('user.editProductImage',$this->productId));

        // }

   
            // $this->dispatchBrowserEvent('selectCover', ['message' => 'مشکلی وجود دارد','action'=>'error']);
            // (new \App\Models\Log)->storeLog($this->productId,'خطا عکس  محصول','ایجاد');
            // return redirect(route('user.editProductImage',$this->productId));
           
    }
    public function checkCover($id){
        $images = Images::with('product')->findOrFail($id);
        $store = $images->update([
            'isCover' => 1
        ]);

        
        if($store){
            $this->dispatchBrowserEvent('selectCover', ['message' => 'محصول با موفقیت ویرایش  شد','action'=>'success']);
            (new \App\Models\Log)->storeLog($images->product->name,'ویرایش  محصول','ویرایش');
            return redirect(route('user.editProductImage',$images->product_id));
           }else{
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('selectCover', ['message' => 'مشکلی وجود دارد','action'=>'error']);
            (new \App\Models\Log)->storeLog($images->product->name,'خطا ویرایش  محصول','ویرایش');
            return redirect(route('user.editProductImage',$images->product_id));
           }
        
    }
    public function cancelCover($id){
        $images = Images::with('product')->findOrFail($id);
        $store = $images->update([
            'isCover' => 0
        ]);

        
        if($store){
            $this->dispatchBrowserEvent('selectCover', ['message' => 'محصول با موفقیت ویرایش  شد','action'=>'success']);
            (new \App\Models\Log)->storeLog($images->product->name,'ویرایش  محصول','ویرایش');
            return redirect(route('user.editProductImage',$images->product_id));
           }else{
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('selectCover', ['message' => 'مشکلی وجود دارد','action'=>'error']);
            (new \App\Models\Log)->storeLog($images->product->name,'خطا ویرایش  محصول','ویرایش');
            return redirect(route('user.editProductImage',$images->product_id));
           }

        
    }
    public function removeConfirmation($id){
        $this->removeId = $id;
        $this->dispatchBrowserEvent('show-imageDelete');
    }
    public function removeimage(){
        $prov = Images::with('product')->findOrFail($this->removeId);
        $delete = $prov->delete();
        Storage::disk('products')->delete($prov->image);
        if($delete){
            $this->dispatchBrowserEvent('hide-imageDelete', ['message' => ' عکس محصول با موفقیت حذف  شد','action'=>'success']);
            (new \App\Models\Log)->storeLog( $prov->product->name,'حذف عکس ','حذف');
            return redirect(route('user.editProductImage',$prov->product_id));

           }else{
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-imageDelete', ['message' => 'مشکلی وجود دارد','action'=>'error']);
            (new \App\Models\Log)->storeLog( $prov->product->name,'خطا حذف عکس ','حذف');
            return redirect(route('user.editProductImage',$prov->product_id));

           }

    }
    public function render()
    {
        return view('livewire.admin.seller.product.product-images.product-images')->layout('layouts.admin.app');
    }
}
