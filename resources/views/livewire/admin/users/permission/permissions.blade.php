<!-- Modal -->
<div class="modal fade" wire:ignore.self id="newPermission" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ویرایش کاربر</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form >
      <div class="modal-body" >
        <div class="row">
          <div  class="form-group col-md-12" wire:ignore>
            <label for="exampleInputEmail12"> دسترسی ها:</label>
            <select class="js-example-basic-multiple col-md-12"  name="states[]" multiple="multiple" style="width: 100%;" wire:model.defer="state.permission">
              
                @foreach($allPermissions as $per)
                  @if(!in_array($per->name,$permissions[0]->permissions()->pluck('name')->toArray()))
                    <option  value="">1</option>
                    <option  value="">2</option>
                    <option  value="">3</option>

                  {{-- @endif
                @foreach --}}
            
          </select>
          </div>
        </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
        <button type="submit" class="btn btn-primary">ویرایش</button>
      </div>
    </div>
  </form>
 
  </div>
  @push('after-scripts')
  <script>

  </script>
  @endpush