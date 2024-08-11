@extends('layouts.auth')

@section('contents')
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #F2C98A">
            <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #F2C98A">
                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                    <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                        <a href="{{ route('login')}}" class="py-9 mb-5">
                            <img alt="Logo" src="{{ asset('assets/media/logos/auth.png') }}" class="h-60px" />
                        </a>
                        <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #986923;">Quản Lý Kho Hàng</h1>
                    </div>
                    <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px"
                        style="background-image: url(assets/media/illustrations/sketchy-1/13.png"></div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-lg-row-fluid py-10">
            <div class="d-flex flex-center flex-column flex-column-fluid">
                <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                    
                    <!-- Hiển thị thông báo thành công -->
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Form bắt đầu từ đây -->
                    <form action="{{ route('password.email') }}" method="POST" class="form w-100">
                        @csrf
                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">Quên Mật Khẩu</h1>
                        </div>
                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                            <input class="form-control form-control-lg form-control-solid" type="email" name="email"
                                autocomplete="off" :value="__('email')" />
                            @error('email')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Xác Nhận</span>
                            </button>
                        </div>
                    </form>
                    <!-- Form kết thúc ở đây -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
