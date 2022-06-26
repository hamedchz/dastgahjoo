<!-- Modal -->
<div class="modal fade" wire:ignore.self id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ویرایش کاربر</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form wire:submit.prevent="update">
      <div class="modal-body">
        <div class="row">
          <div class="form-group col-md-6">
            <label for="name">نام </label>
            <input type="text" wire:model.defer="state.name"  id="name" class="form-control @error('name') is-invalid @enderror"  placeholder="نام ">
            @error('name')<div class="invalid-feedback">{{ $message }}</div> @enderror

          </div>
          <div class="form-group col-md-6">
            <label for="email">ایمیل </label>
            <input type="text" wire:model.defer="state.email" id="email" class="form-control @error('email') is-invalid @enderror"  placeholder="ایمیل">
            @error('email')<div class="invalid-feedback">{{ $message }}</div> @enderror

          </div>
          <div class="form-group col-md-6">
            <label for="mobile">موبایل </label>
            <input type="text" wire:model.defer="state.mobile" id="mobile" class="form-control @error('mobile') is-invalid @enderror"  placeholder="موبایل">
            @error('mobile')<div class="invalid-feedback">{{ $message }}</div> @enderror

          </div>
          <div class="form-group col-md-6">
            <label for="password">پسورد جدید</label>
            <input type="text" wire:model.defer="state.password" id="password" class="form-control @error('password') is-invalid @enderror"  placeholder="پسورد">
            @error('password')<div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="file">عکس </label>
            <input type="file" wire:model.defer="photo" id="file" class="form-control @error('file') is-invalid @enderror" >
            @error('file')<div class="invalid-feedback">{{ $message }}</div> @enderror

          </div>
          <div class="form-group col-md-6">
            <label for="about">توضیحات </label>
            <input type="text" wire:model.defer="state.about" id="about" class="form-control @error('about') is-invalid @enderror"  placeholder="توضیحات">
            @error('about')<div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
        <button type="button" class="btn btn-primary">ذخیره</button>
      </div>
    </div>
  </form>
  </div>