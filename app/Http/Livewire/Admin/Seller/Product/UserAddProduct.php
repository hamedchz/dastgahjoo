<?php

namespace App\Http\Livewire\Admin\Seller\Product;

use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Product;
use App\Models\Province;
use App\Models\Vendors;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;


class UserAddProduct extends Component
{

    use WithFileUploads;

    public $subCategory = null;
    public $cities = null;
    public $state = [];
    public $vandor;
    public $logo;
    public $video;

    public function mount(){
        if(Carbon::now() > auth()->user()->vendor->package->packageHistories->endDate || auth()->user()->vendor->isApproved <> 2 || Product::whereBetween('created_at',[auth()->user()->vendor->package->packageHistories->startDate,auth()->user()->vendor->package->packageHistories->endDate])->count() >= auth()->user()->vendor->package->packageHistories->products){
           return abort(401);
        }
    }
    public function addNew(){
        $ValidateData = Validator::make($this->state,[
            'category_id' => 'required',
            'province_id' => 'required',
            'city_id' => 'sometimes',
            'subcategory_id' => 'sometimes',
            'quantity' => 'required',
            'year_of_manufacture' => 'required',
            'price' => 'required',
            'manufacturer' => 'required',
            'model' => 'required',
            'category' => 'required',
            'name' => 'required',
            'type_of_machine' => 'sometimes',
            'isStock' => 'required|in:1,2',
            'isInstallments' => 'required|in:0,1',
            'isSold' => 'required|in:0,1',
            'image.*' => 'image',
            'image' => 'max:'.$this->vendor->package->packageHistories->images,
            'description' => 'sometimes',
            'site_url' => 'sometimes'
        ],[
           'category_id.required' => 'این فیلد نمیتواند خالی باشد',
           'province_id.required' => 'این فیلد نمیتواند خالی باشد',
           'quantity.required' => 'این فیلد نمیتواند خالی باشد',
           'year_of_manufacture.required' => 'این فیلد نمیتواند خالی باشد',
           'price.required' => 'این فیلد نمیتواند خالی باشد',
           'manufacturer.required' => 'این فیلد نمیتواند خالی باشد',
           'model.required' => 'این فیلد نمیتواند خالی باشد',
           'category.required' => 'این فیلد نمیتواند خالی باشد',
           'name.required' => 'این فیلد نمیتواند خالی باشد',
           'type_of_machine.required' => 'این فیلد نمیتواند خالی باشد',
           'isStock.required' => 'این فیلد نمیتواند خالی باشد',
           'isInstallments.required' => 'این فیلد نمیتواند خالی باشد',
           'isSold.required' => 'این فیلد نمیتواند خالی باشد',
           'isStock.in' => 'اطلاعات این فیلد اشتباه است',
           'isInstallments.in' => 'اطلاعات این فیلد اشتباه است',
           'isSold.in' => 'اطلاعات این فیلد اشتباه است',
           'image.image' => 'فقط عکس آپلود کنید',
           'image.mimes' => '  عکس  باید پسوند jpeg,png,jpg باشد ',
           'image.max' => 'شما مجاز به آپلود این تعداد عکس نیستید',


        ])->validate();  
        // $itemNo = Str::random(10);
        $itemNo =  mt_rand(100000, 9999999999);
        $ValidateData['itemNo'] = $itemNo;
        // if(!empty($this->state['subcategory'])){
        //     $ValidateData['category_id'] = $this->state['category'];
        //     $ValidateData['subcategory_id'] = $this->state['subcategory'];
        //     $sub = Category::where('id',$this->state['subcategory'])->first();
        //     $cat = Category::where('id',$this->state['category'])->first();
        //     $ValidateData['slug'] = $cat->slug.'/'.$sub->slug.'/'. $this->slugify($ValidateData['name']);
        // }else{
            $ValidateData['category_id'] = $this->state['category'];
            $cat = Category::where('id',$this->state['category'])->first();
 
            if($this->state['subcategory_id'] <> 0){ 
                $subcat = Category::where('id',$this->state['subcategory_id'])->first();
                $ValidateData['subcategory_id'] = $this->state['subcategory_id'];
                $ValidateData['slug'] = $cat->slug.'/'.$subcat->slug.'/'. Str::slug($ValidateData['name']);
            }else{
                $ValidateData['subcategory_id'] = null;
                $ValidateData['slug'] = $cat->slug.'/'. Str::slug($ValidateData['name']);

            }
        // }
        //$ValidateData['vandor_id'] = $this->vendor->id;
        if(empty($ValidateData['site_url'])){
            $ValidateData['site_url'] = null;
        }
        if(empty($ValidateData['description'])){
            $ValidateData['description'] = null;
        }
        if(empty($ValidateData['city_id'])){
            $ValidateData['city_id'] = null;
        }
        $store = Product::create([
            'category_id' => $ValidateData['category_id'] ,
            'province_id' => $ValidateData['province_id'] ,
            'city_id' => $ValidateData['city_id'] ,
            'subcategory_id' => $ValidateData['subcategory_id'] ,
            'itemNo' => $ValidateData['itemNo'] ,
            'name' => $ValidateData['name'] ,
            'quantity' => $ValidateData['quantity'] ,
            'year_of_manufacture' => $ValidateData['year_of_manufacture'] ,
            'price' => $ValidateData['price'] ,
            'manufacturer' => $ValidateData['manufacturer'] ,
            'model' => $ValidateData['model'] ,
            'type_of_machine' => $ValidateData['type_of_machine'] ,
            'description' => $ValidateData['description'] ,
            'isStock' => $ValidateData['isStock'] ,
            'isInstallments' => $ValidateData['isInstallments'] ,
            'isSold' => $ValidateData['isSold'] ,
            'vendor_id' => $this->vendor->id,
            'slug' => $ValidateData['slug'],
            'site_url' => $ValidateData['site_url']
            
        ]);
        if (!is_null($this->logo)) {
             $fileName = $this->uploadLogo($this->logo);
            DB::table('logos')->insert([
                'product_id' => $store->id,
                'logo'=> $fileName
            ]);
        }
        if (!is_null($this->video)) {
            $fileName = $this->uploadVideo($this->video);
            DB::table('videos')->insert([
                'product_id' => $store->id,
                'video'=> $fileName
  
            ]);
        }

       


        if (!is_null($ValidateData['image'])) {   
            
            foreach($ValidateData['image'] as $image){
                if ($image) {
                    DB::table('images')->insert([
                        'product_id' => $store->id,
                        'image'=> $this->uploadImage($image)
        
                    ]);
                }
            //     $fileName = $this->uploadImage();
            // DB::table('images')->insert([
            //     'product_id' => $store->id,
            //     'image'=> $fileName

            // ]);
            }
        }
        if ($store) {
            
            $this->resetValidation();
            $this->dispatchBrowserEvent('addProduct',['message' => 'محصول با موفقیت فرستاده شد پس از تایید در سایت قرار میگیرد', 'action' => 'success']);
            (new \App\Models\Log)->storeLog($ValidateData['name'],'ایجاد محصول ','ایجاد');
            return redirect(route('user.addProduct'));

        }else{
            
            $this->resetValidation();
            $this->dispatchBrowserEvent('addProduct',['message' => 'مشکلی وجود دارد', 'action' => 'error']);
            (new \App\Models\Log)->storeLog($ValidateData['name'],' خطا در  ایجاد محصول  ','ایجاد');
            return redirect(route('user.addProduct'));

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
      public function uploadImage($image)
      {
        //   $year = now()->year;
        //   $month = now()->month;
        //   $directory = "/storage/images/products/$year/$month";
        //   $directory = "/images/products/$year/$month/";
          $name = time() . '-' . Str::random(15).$image->getClientOriginalName();
          $name = str_replace(' ', '-', $name);
          Image::make($image)->resize(600,600)->insert(public_path('admin/img/watermarknew.png'),'center')->save(public_path("/images/products/" . $name));

        //   $image->storeAs($directory, $name);
          return "/images/products/$name";
      }
      public function uploadVideo($image)
      {
          $year = now()->year;
          $month = now()->month;
        //   $directory = "/storage/images/videos/$year/$month";
          $directory = "/images/videos/$year/$month";
          $name = time() . '-' . Str::random(15).$image->getClientOriginalName();
          $name = str_replace(' ', '-', $name);
          $image->storeAs($directory, $name);
          return "/storage$directory/$name";
      }

      public function uploadLogo($image)
      {
          $year = now()->year;
          $month = now()->month;
        //   $directory = "/storage/images/logos/$year/$month";
          $directory = "/images/logos/$year/$month";
          $name = time() . '-' . Str::random(15).$image->getClientOriginalName();
          $name = str_replace(' ', '-', $name);
          $image->storeAs($directory, $name);
          return "/storage$directory/$name";
      }

    //   public function uploadImage()
    //   {
    //       $year = now()->year;
    //       $month = now()->month;

    //       $directory = "images/products/$year/$month";
    //       $name = time() . '-' . $this->logo->getClientOriginalName();
    //       $name = str_replace(' ', '-', $name);
    //       $this->logo->storeAs($directory, $name);
    //       return "/$directory/$name";
    //   }
    public function changeCategory($id){
        $subcategory = Category::where('parent',$id)->where('isActive',1)->get();
        $this->subCategory = $subcategory;
    }

    public function changeProvince($id){
        $city = City::where('province_id',$id)->get();
        $this->cities = $city;
    }



    public function render()
    {
        $categories = Category::where('isActive',1)->where('parent',0)->get();
        $provinces = Province::all();
        $vendor = Vendors::with('package')->where('user_id',auth()->user()->id)->first();
        $this->vendor = $vendor;
        return view('livewire.admin.seller.product.user-add-product',['categories'=>$categories,'provinces'=>$provinces,'vendor'=>$vendor])->layout('layouts.admin.app');
    }
}
