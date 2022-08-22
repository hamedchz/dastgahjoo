<!-- modal tabrik -->
@props(['image'])
<div style="direction:rtl;" class="modal fade" style="width:2880px;" id="congratulation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
           <div class="modal-header border-0" style="position:absolute;z-index:100;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:red;opacity:1;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" style="padding:0 !important;">
        <form>
          <div class="form-group" style="display: flex;flex-direction: column;justify-content: center;align-items: center;margin-bottom:0 !important;">
            <img style="width:100%;height:400px;" src="{{asset($image)}}" alt="congratulation">
            {{-- <label for="recipient-name" class="col-form-label">تبریک</label> --}}
          </div>
        
        </form>
      </div>
    
    </div>
  </div>
</div>