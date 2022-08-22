@props(['type','errorMsg','successMsg'])
{{-- مدال  کوپن تخفیف --}}
<div style="direction:rtl;" wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">کوپن تخفیف</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="checkCoupon">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">کد کوپن:</label>
            <input type="text" class="form-control @error('coupon') is-invalid @enderror" id="recipient-name" wire:model.defer="coupon">
            @error('coupon')<div class="error" style="width: 100%;margin-top: 0.25rem;font-size: 80%;color: #dc3545;">{{ $message }}</div> @enderror
            @if($errorMsg <> null)
            <div  {{ $attributes->merge(['class' => 'mt-2 alert alert-'.$type]) }} role="alert">
              {{$errorMsg}}  
            </div>          
            @if($type == 'success')
            <script>
              setTimeout(() => {
                 $('#exampleModal').modal('hide')
               }, 2000);
             </script>
            @endif
            @endif
           
          </div>
        
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn " style="background: -webkit-linear-gradient(top, #72cf3f, #60bb2d);color:white;">اعمال کوپن تخفیف</button>
      </div>
    </form>
    </div>
  </div>
</div>


