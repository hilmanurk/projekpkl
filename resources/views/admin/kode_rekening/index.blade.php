@extends('admin.admin_master')
@section('admin')

<!-- header area -->
@include('admin.header')
<!-- / header area --> 

<!-- sidebar area -->
@include('admin.sidebar')
<!-- /sidebar Area-->

<div class="content_wrapper">
    <!--middle content wrapper-->

    @if(Session::has('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ session::get('error')}}</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="middle_content_wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Kode Rekening Sekolah Wilayah Semarang</h3>
                    <a href="{{ url('admin/kode_rekening/create') }}" class="btn btn-primary float-end">Tambah Rekening</a>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Kabupaten/Kota</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Jenjang</th> 
                                        <th>Kode Rekening</th> 
                                        <th>Keterangan</th> 
                                        <th>Aksi</th>
                                    </tr>
                                </thead> 
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div><!--/middle content wrapper-->
</div><!--/ content wrapper -->

@endsection