<div>
    <nav aria-label="خرده نان" class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">تخفیف</li>
        </ol>
    </nav>
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-9 box-margin height-card">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 box-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-2"> لیست تخفیف</h4>
                                        {{-- <button type="button" class="btn btn-danger mb-2 mr-2" style="float:left;margin-top:-37px;"><i class="fa fa-refresh"></i> سطل زباله</button> --}}
                                        {{-- <button type="button" class="btn btn-success mb-2 mr-2" style="float:left;margin-top:-37px;" wire:click.prevent="add()" ><i class="fa fa-plus-square"></i> افزودن</button> --}}
                                        {{-- <button type="button" class="btn btn-primary mb-2 mr-2" style="float:left;margin-top:-37px;"><i class="fa fa-file-excel-o"></i> خروجی اکسل</button> --}}

                                        <hr>
                                        <table id="datatable-buttons"
                                            class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    
                                                    <th> کد تخفیف</th>
                                                    <th>درصد تخفیف</th>
                                                    <th> وضعیت</th>
                                                    <th>عملیات</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @forelse($discounts as $prov)
                                                    <tr>
                                                       
                                                        <td>{{ $prov->code }}</td>
                                                        <td>{{ $prov->percentage }}</td>
                                                        <td>
                                                            <div class="form-group" style="width:50%;">
                                                                <select class="custom-select" aria-label="Default select example" wire:change="changeActivate({{$prov}},event.target.value)">
                                                                <option value="0" {{$prov->isActive==0 ?'selected':''}}>غیرفعال</option>
                                                                <option value="1" {{$prov->isActive==1 ?'selected':''}}>فعال</option>
                                                              </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href=""
                                                                wire:click.prevent="edit({{ $prov }})"
                                                                style="font-size:20px;"><i class="fa fa-edit"
                                                                    style="color:#04a9f5;"></i></a>
                                                           {{-- <a href=""
                                                                wire:click.prevent="removeConfirmation({{ $prov->id }})"
                                                                style="font-size:20px;"><i class="fa fa-trash"
                                                                    style="color:#dc3545;"></i></a>--}}
                                                        </td>
                                                    @empty
                                                        <td align="center" colspan="5"
                                                            style="background-color:#e1e1e1;">داده ای وجود ندارد</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <div class="d-flex align-items-center justify-content-center">
                                            {{-- {{$provinces->links()}} --}}
                                        </div>
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->

                    </div>
                </div>

                <div class="col-12 col-lg-3 box-margin height-card">
                    <div class="card card-body">
                        <h4 class="card-title">{{ $editStatus ? 'ویرایش تخفیف' : 'تخفیف جدید' }} </h4>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form wire:submit.prevent="{{ $editStatus ? 'update' : 'store' }}">
                                     {{-- <div class="form-group col-md-12">
                                        <label for="package_id"> پکیج</label>
                                        <select class="custom-select  @error('package_id') is-invalid @enderror"
                                            id="capackage_idtegory" wire:model="state.package_id">
                                            <option selected>انتخاب کنید</option>
                                            @forelse($packages as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @empty
                                                <option>دسته بندی وجود ندارد</option>
                                            @endforelse
                                        </select>
                                        @error('package_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>--}}
                                    <div class="form-group col-md-12">
                                        <label for="code">کد تخفیف</label>
                                        <input type="text" wire:model="state.code"
                                            class="form-control @error('code') is-invalid @enderror" id="code"
                                            placeholder=" کد تخفیف">
                                        @error('code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="percentage">درصد تخفیف</label>
                                        <input type="number" wire:model="state.percentage"
                                            class="form-control @error('percentage') is-invalid @enderror"
                                            id="percentage" placeholder="درصد تخفیف">
                                        @error('percentage')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">ذخیره</button>
                                    <button type="button" class="btn btn-secondary {{ $editStatus ? '' : 'd-none' }}"
                                        wire:click.prevent="changeStatus">لغو</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row-->

        </div>
    </div>
    @include('livewire.admin.advertises.delete')

    @push('styles')
        <link rel="stylesheet" href="{{ asset('admin/css/default-assets/datatables.bootstrap4.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/default-assets/responsive.bootstrap4.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/default-assets/buttons.bootstrap4.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/default-assets/select.bootstrap4.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/default-assets/notification.css') }}">
        <style>
            .custom-select.is-invalid, .was-validated .custom-select:invalid{
              background: none !important;
         }
            @media only screen and (max-width: 767px) {
                .status-semat {
                    display: none !important;
                }

            }

            .la-ball-beat,
            .la-ball-beat>div {
                position: relative;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            .la-ball-beat {
                display: block;
                font-size: 0;
                color: #fff;
            }

            .la-ball-beat.la-dark {
                color: #333;
            }

            .la-ball-beat>div {
                display: inline-block;
                float: none;
                background-color: currentColor;
                border: 0 solid currentColor;
            }

            .la-ball-beat {
                width: 54px;
                height: 18px;
            }

            .la-ball-beat>div {
                width: 10px;
                height: 10px;
                margin: 4px;
                border-radius: 100%;
                -webkit-animation: ball-beat .7s -.15s infinite linear;
                -moz-animation: ball-beat .7s -.15s infinite linear;
                -o-animation: ball-beat .7s -.15s infinite linear;
                animation: ball-beat .7s -.15s infinite linear;
            }

            .la-ball-beat>div:nth-child(2n-1) {
                -webkit-animation-delay: -.5s;
                -moz-animation-delay: -.5s;
                -o-animation-delay: -.5s;
                animation-delay: -.5s;
            }

            .la-ball-beat.la-sm {
                width: 26px;
                height: 8px;
            }

            .la-ball-beat.la-sm>div {
                width: 4px;
                height: 4px;
                margin: 2px;
            }

            .la-ball-beat.la-2x {
                width: 108px;
                height: 36px;
            }

            .la-ball-beat.la-2x>div {
                width: 20px;
                height: 20px;
                margin: 8px;
            }

            .la-ball-beat.la-3x {
                width: 162px;
                height: 54px;
            }

            .la-ball-beat.la-3x>div {
                width: 30px;
                height: 30px;
                margin: 12px;
            }

            /*
     * Animation
     */
            @-webkit-keyframes ball-beat {
                50% {
                    opacity: .2;
                    -webkit-transform: scale(.75);
                    transform: scale(.75);
                }

                100% {
                    opacity: 1;
                    -webkit-transform: scale(1);
                    transform: scale(1);
                }
            }

            @-moz-keyframes ball-beat {
                50% {
                    opacity: .2;
                    -moz-transform: scale(.75);
                    transform: scale(.75);
                }

                100% {
                    opacity: 1;
                    -moz-transform: scale(1);
                    transform: scale(1);
                }
            }

            @-o-keyframes ball-beat {
                50% {
                    opacity: .2;
                    -o-transform: scale(.75);
                    transform: scale(.75);
                }

                100% {
                    opacity: 1;
                    -o-transform: scale(1);
                    transform: scale(1);
                }
            }

            @keyframes ball-beat {
                50% {
                    opacity: .2;
                    -webkit-transform: scale(.75);
                    -moz-transform: scale(.75);
                    -o-transform: scale(.75);
                    transform: scale(.75);
                }

                100% {
                    opacity: 1;
                    -webkit-transform: scale(1);
                    -moz-transform: scale(1);
                    -o-transform: scale(1);
                    transform: scale(1);
                }
            }
        </style>
    @endpush
    @push('scripts')
        <script>
            $(document).ready(function() {

                toastr.options = {

                    "progressBar": true,
                    "positionClass": "toast-bottom-right",

                }
                window.addEventListener('showNew', event => {
                   
                    if (event.detail['action'] == 'success') {
                        toastr.success(event.detail.message, 'عملیات موفق!')
                    } else {
                        toastr.error(event.detail.message, 'عملیات ناموفق!')
                    }
                })
                window.addEventListener('hidedelete', event => {
                    $('#delete').modal('hide')
                    if (event.detail['action'] == 'success') {
                        toastr.success(event.detail.message, 'عملیات موفق!')
                    } else {
                        toastr.error(event.detail.message, 'عملیات ناموفق!')
                    }
                })
            })
            window.addEventListener('showNew', event => {
                $('#add').modal('show')
            })
            window.addEventListener('showDelete', event => {
                $('#delete').modal('show')
            })
        </script>
        <!-- These plugins only need for the run this page -->
        <script src="/admin/js/default-assets/jquery.datatables.min.js"></script>
        <script src="/admin/js/default-assets/datatables.bootstrap4.js"></script>
        <script src="/admin/js/default-assets/datatable-responsive.min.js"></script>
        <script src="/admin/js/default-assets/responsive.bootstrap4.min.js"></script>
        <script src="/admin/js/default-assets/datatable-button.min.js"></script>
        <script src="/admin/js/default-assets/button.bootstrap4.min.js"></script>
        <script src="/admin/js/default-assets/button.html5.min.js"></script>
        <script src="/admin/js/default-assets/button.flash.min.js"></script>
        <script src="/admin/js/default-assets/button.print.min.js"></script>
        <script src="/admin/js/default-assets/datatables.keytable.min.js"></script>
        <script src="/admin/js/default-assets/datatables.select.min.js"></script>
        <script src="/admin/js/default-assets/demo.datatable-init.js"></script>
        <script src="/admin/js/default-assets/bootstrap-growl.js"></script>
        {{-- <script src="/admin/js/default-assets/notification-active.js"></script> --}}
        <script src="/admin/js/MaxLength.min.js"></script>
    @endpush
</div>
