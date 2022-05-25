<div>
@push('styles')
<style>
    p, .text {
       color:#fff ;
   } 

   @media (min-width: 992px) {

.top-titr{
 margin-top: 186px;

}}

@media (max-width: 502px) {

 .top-titr{
   margin-top: 80px;
 
 }}
   
 @media (max-width: 767px) {
   .inner-bg {
    padding: 40px 3px 110px 38px; 
 }}

</style>
@endpush
@push('categoriesheader')
@include('layouts.users.partials.underheader')
@endpush
<div class="top-content">
    <div id="overlay"></div>
    <div class="display-align top-titr">
      <div class="col-lg-8 text center-align mx-auto">
        <h1><strong>بازار ماشین آلات مستعمل</strong></h1>
        <div class="description">
          <p><strong>انواع ماشین های دست دوم</strong></p>
        </div>
      </div>
    </div>

    <div class="inner-bg">
      <div class="container">
      <div class="display-align">
        <div class="col-lg-6 center-align mx-auto">
          <div class="machine-category p-0">
            <div class="display-align category-row">
              <div class="col-10 right-align">
                <p>1.
                   <a href="#">ماشین‌های فلزکاری</a>
                  </p>
              </div>
              <div class="col-2 right-align">
                <p>(33493)</p>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <div class="display-align">
        <div class="col-lg-6 center-align mx-auto">
          <div class="machine-category p-0">
            <div class="display-align category-row">
              <div class="col-10 right-align">
                <p>2. 
                <a href="#">ماشین آلات چوب کاری</a></p>
              </div>
              <div class="col-2 right-align">
                <p>(8487)</p>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <div class="display-align">
        <div class="col-lg-6 center-align mx-auto">
          <div class="machine-category p-0">
            <div class="display-align category-row">
              <div class="col-10 right-align">
                <p>3. 
                  <a href="#">ماشین‌های پلاستیک</a></p>
              </div>
              <div class="col-2 right-align">
                <p>(4126)</p>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <div class="display-align">
        <div class="col-lg-6 center-align mx-auto">
          <div class="machine-category p-0">
            <div class="display-align category-row">
              <div class="col-10 right-align">
                <p>4. 
                  <a href="#">ماشین آلات بسته بندی</a></p>
              </div>
              <div class="col-2 right-align">
                <p>(2847)</p>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <div class="display-align">
        <div class="col-lg-6 center-align mx-auto">
          <div class="machine-category p-0">
            <div class="display-align category-row">
              <div class="col-10 right-align">
                <p>5. 
                  <a href="#">ماشین آلات دفع زباله و بازیافت</a></p>
             </div>
              <div class="col-2 right-align">
                <p>(1387)</p>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <div class="display-align">
        <div class="col-lg-6 text center-align mx-auto">
          <div class="machine-category p-0">
            <div class="display-align category-row">
              <div class="col-10 right-align">
                <p>6. 
                  <a href="#">ماشین‌های نساجی</a></p>
            </div>
            <div class="col-2 right-align">
              <p>(329)</p>
            </div>
          </div>
        </div>
      </div>
    </div>
 
    <div class="display-align">
      <div class="col-lg-6 center-align mx-auto">
        <div class="machine-category p-0">
          <div class="display-align category-row">
            <div class="col-10 right-align">
              <p>7. 
                <a href="#">متفرقه</a></p>
               </div>
              <div class="col-2 right-align">
                <p>(1152)</p>
              </div>
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
    </div>
    @push('footer-scripts')
    <div class="parallax-background" >
      <img src="{{asset('frontend/background.jpg')}}" ></div>

    @endpush
</div>
