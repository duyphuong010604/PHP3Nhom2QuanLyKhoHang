@extends('layouts.auth')

@section('contents')
<div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #F2C98A">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative"
                    style="background-color: #F2C98A">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                        <!--begin::Content-->
                        <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                            <!--begin::Logo-->
                            <a href="{{ route('login')}}" class="py-9 mb-5">
                                <img alt="Logo" src="{{ asset('assets/media/logos/auth.png') }}" class="h-60px" />
                            </a>
                            <!--end::Logo-->
                            <!--begin::Title-->
                            <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #986923;">Quản Lý Kho Hàng</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <!--end::Description-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Illustration-->
                        <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px"
                            style="background-image: url(assets/media/illustrations/sketchy-1/13.png"></div>
                        <!--end::Illustration-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">
    <!-- Session Status -->

    <form action="{{ route ('password.email')}}" method="POST"  class="form w-100">
                        @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Quên Mật Khẩu</h1>
                                <!--end::Title-->
                                <!--begin::Link-->
                                <!--end::Link-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-lg form-control-solid" type="email" name="email"
                                 autocomplete="off" :value="__('email')"/>
                                 @error('email')
                                 <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                           
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center">
                                <!--begin::Submit button-->
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label">Xác Nhận</span>
                                </button>
                                <!--end::Submit button-->
                                <!--begin::Separator-->

                            </div>
                            <!--end::Actions-->
                        </form>
                        </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <!--end::Footer-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    @endsection