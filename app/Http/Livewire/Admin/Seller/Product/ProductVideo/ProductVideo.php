<?php

namespace App\Http\Livewire\Admin\Seller\Product\ProductVideo;

use App\Models\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductVideo extends Component
{
    use WithFileUploads;

    public $images;
    public $coverId = null;
    public $video;
    public $productId;

    public function mount($id){
      $images = Video::where('product_id',$id)->first();
      $this->productId = $id;
      $this->images = $images;
      
    }

    public function imageStore(){
      
        // $this->validate([
        //     'photo' => 'image', 
        //     'photo' => 'max:'.auth()->user()->vendor->package->packageHistories->images-$this->images->count()
        // ],[
        //     'photo.image' => 'فقط عکس آپلود کنید',
        //     'photo.max' => 'شما مجاز به آپلود این تعداد عکس نیستید',
 
        // ]);
        //  if (!is_null($this->photo)) {      
            // foreach($this->photo as $image){
            $fileName = $this->video->store('/','videos');
            DB::table('videos')->insert([
                'product_id' => $this->productId,
                'video'=> $fileName

            ]);
            // }
            $this->dispatchBrowserEvent('selectCover', ['message' => ' ویدیو محصول با موفقیت اضافه  شد','action'=>'success']);
            (new \App\Models\Log)->storeLog($this->productId,'ویدیو  محصول','ایجاد');
            return redirect(route('user.editProductvideo',$this->productId));

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
        $prov = Video::with('product')->findOrFail($this->removeId);
        $delete = $prov->delete();
        Storage::disk('videos')->delete($prov->video);
        if($delete){
            $this->dispatchBrowserEvent('hide-imageDelete', ['message' => ' ویدیو محصول با موفقیت حذف  شد','action'=>'success']);
            (new \App\Models\Log)->storeLog( $prov->product->name,'حذف ویدیو ','حذف');
            return redirect(route('user.editProductvideo',$prov->product_id));

           }else{
            $this->resetInputForm();
            $this->resetValidation();
            $this->dispatchBrowserEvent('hide-imageDelete', ['message' => 'مشکلی وجود دارد','action'=>'error']);
            (new \App\Models\Log)->storeLog( $prov->product->name,'خطا حذف ویدیو ','حذف');
            return redirect(route('user.editProductvideo',$prov->product_id));

           }

    }

    public function render()
    {
        return view('livewire.admin.seller.product.product-video.product-video')->layout('layouts.admin.app');
    }
}
