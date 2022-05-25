<?php

namespace App\Http\Livewire\Admin\Seller\Product\ProductLogo;

use App\Models\Logo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductLogo extends Component
{
    use WithFileUploads;

    public $images;
    public $coverId = null;
    public $photo;
    public $productId;

    public function mount($id){
      $images = Logo::where('product_id',$id)->first();
      $this->productId = $id;
      $this->images = $images;
      
    }
    public function imageStore(){
        
        //  if (!is_null($this->photo)) {      
            // foreach($this->photo as $image){
            $fileName = $this->photo->store('/','logos');
            DB::table('logos')->insert([
                'product_id' => $this->productId,
                'logo'=> $fileName

            ]);
            // }
            $this->dispatchBrowserEvent('selectCover', ['message' => ' لوگو محصول با موفقیت اضافه  شد','action'=>'success']);
            (new \App\Models\Log)->storeLog($this->productId,'لوگو  محصول','ایجاد');
            return redirect(route('user.editProductLogo',$this->productId));

        // }

   
            // $this->dispatchBrowserEvent('selectCover', ['message' => 'مشکلی وجود دارد','action'=>'error']);
            // (new \App\Models\Log)->storeLog($this->productId,'خطا عکس  محصول','ایجاد');
            // return redirect(route('user.editProductImage',$this->productId));
           
    }
    public function removeConfirmation($id){
        $this->removeId = $id;
        $this->dispatchBrowserEvent('show-imageDelete');
    }
    public function removeimage(){
        $prov = Logo::with('product')->findOrFail($this->removeId);
        $delete = $prov->delete();
        Storage::disk('logos')->delete($prov->logo);
        if($delete){
            $this->dispatchBrowserEvent('hide-imageDelete', ['message' => ' لوگو محصول با موفقیت حذف  شد','action'=>'success']);
            (new \App\Models\Log)->storeLog( $prov->product->name,'حذف لوگو ','حذف');
            return redirect(route('user.editProductLogo',$prov->product_id));

           }else{
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-imageDelete', ['message' => 'مشکلی وجود دارد','action'=>'error']);
            (new \App\Models\Log)->storeLog( $prov->product->name,'خطا حذف لوگو ','حذف');
            return redirect(route('user.editProductLogo',$prov->product_id));

           }

    }
    public function render()
    {
        return view('livewire.admin.seller.product.product-logo.product-logo')->layout('layouts.admin.app');
    
    }
}
