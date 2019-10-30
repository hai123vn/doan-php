@extends('layout')

@section('css')
<!-- third party css -->
<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
@endsection
@section('main-content')
<div class="col-lg-6">
	    <div class="card">
	        <div class="card-body">
	            <h4 class="mb-3 header-title">Thêm mới gói credit</h4>

	            <form action="{{ route('goi-credit.xl-them-moi') }}" method="POST">
	            	@csrf
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Tên gói</label>
	                    <input class="form-control" id="ten_goi" name="ten_goi" placeholder="Tên gói">
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Credit</label>
	                    <input class="form-control" id="credit" name="credit" placeholder="Credit">
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Số tiền</label>
	                    <input class="form-control" id="so_tien" name="so_tien" placeholder="Số tiền">
	                </div>
	                <button type="submit" class="btn btn-primary waves-effect waves-light">Thêm</button>
	            </form>

	        </div> <!-- end card-body-->
	    </div> <!-- end card-->

	</div><!-- end col -->
@endsection