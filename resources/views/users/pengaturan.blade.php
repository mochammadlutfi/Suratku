@extends('layouts/master')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="block block-rounded block-transparent bg-gd-sea">
                <div class="block-content">
                    <div class="py-20 text-center">
                        <h1 class="font-w700 text-white mb-10">Pengaturan</h1>
                        <h2 class="h4 font-w400 text-white-op">Ubah Profil</h2>
                    </div>
                </div>
            </div>
            <!-- Default Elements -->
            <div class="content-heading pt-5">
                <div class="dropdown float-right">
                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" id="ecom-products-filter-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        All
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ecom-products-filter-drop">
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-star text-warning mr-5"></i>Top Sellers
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-warning text-danger mr-5"></i>Out of Stock
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item active" href="javascript:void(0)">
                            <i class="fa fa-fw fa-circle-o text-info mr-5"></i>All
                        </a>
                    </div>
                </div>
                <div class="dropdown float-right mr-5">
                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" id="ecom-products-category-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ecom-products-category-drop">
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-gamepad mr-5"></i>Video Games
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-desktop mr-5"></i>Electronics
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-mobile-phone mr-5"></i>Mobile Phones
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-home mr-5"></i>House
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-soccer-ball-o mr-5"></i>Hobby
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-car mr-5"></i>Auto - Moto
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-users mr-5"></i>Kids
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-heartbeat mr-5"></i>Health
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="fa fa-fw fa-black-tie mr-5"></i>Fashion
                        </a>
                    </div>
                </div>
                
            </div>
            <div class="block block-rounded">
                <div class="block-content">
                    <form action="{{route('user.pengaturan')}}" method = "post">
                        @csrf
                        <div class = "row justify-content-center">
                            <div class = "col-md-10">

                                <div class="form-group row {{ $errors->has('nik') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukan NIK" value ="{{ $user->nik }}">
                                            <label for="no_indeks">NIK</label>
                                        </div>
                                        @if ($errors->has('nik'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('nik') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('nama') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap" value="{{$user->nama}}">
                                            <label for="nama">Nama Lengkap</label>
                                        </div>
                                        @if ($errors->has('nama'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('nama') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('username') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username" value="{{$user->username}}">
                                            <label for="nama">Username</label>
                                        </div>
                                        @if ($errors->has('username'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('email') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Alamat Email" value="{{$user->email}}">
                                            <label for="email">Alamat Email</label>
                                        </div>
                                        @if ($errors->has('email'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row {{ $errors->has('no_hp') ? ' is-invalid' : '' }}">
                                    <div class="col-md-12">
                                        <div class="form-material form-material-primary ">
                                            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukan No. Handphone" value="{{$user->no_hp}}">
                                            <label for="no_hp">No. Handphone</label>
                                        </div>
                                        @if ($errors->has('no_hp'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('no_hp') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-alt-primary">Perbaharui</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
@stop

@push('scripts')
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
@endpush
