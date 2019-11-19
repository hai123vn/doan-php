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

<div class="col-lg-12">
	    <div class="card">
	        <div class="card-body">
	            <h4 class="mb-3 header-title">Cập nhật câu hỏi</h4>

	            <form action="{{ route('cau-hoi.update') }}" method="POST">
	            	@csrf
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Nội dung</label>
	                    <input class="form-control" value="{{ $CauHoi->noi_dung }}" id="noi_dung" name="noi_dung" required="" placeholder="Nội dung">
	                </div>

	                <div class="form-group">
	                    <label for="exampleInputEmail1">Lĩnh vực</label>
	                    <select id="linh_vuc_id" name="linh_vuc_id" class="form-control">
	                    	<option>Lĩnh vực</option>
	                    	@foreach( $dsLinhVuc as $linhVuc)
	                    	<option value="{{ $linhVuc->id }}">{{ $linhVuc->ten_linh_vuc }}</option>
	                    	@endforeach
	                    </select>
	                </div>

	                <div class="form-group">
	                    <label for="exampleInputEmail1">Phương án A</label>
	                    <input class="form-control" value="{{ $CauHoi->phuong_an_a }}" id="phuong_an_a" name="phuong_an_a" required="" placeholder="nội dung">
	                </div>

	                <div class="form-group">
	                    <label for="exampleInputEmail1">Phương án B</label>
	                    <input class="form-control" value="{{ $CauHoi->phuong_an_b }}" id="phuong_an_b" name="phuong_an_b" required="" placeholder="nội dung">
	                </div>

	                <div class="form-group">
	                    <label for="exampleInputEmail1">Phương án C</label>
	                    <input class="form-control" value="{{ $CauHoi->phuong_an_c }}" id="phuong_an_c" name="phuong_an_c" required="" placeholder="nội dung">
	                </div>

	                <div class="form-group">
	                    <label for="exampleInputEmail1">Phương án D</label>
	                    <input class="form-control" value="{{ $CauHoi->phuong_an_d }}" id="phuong_an_d" name="phuong_an_d" required="" placeholder="nội dung">
	                </div>

	                <div class="form-group">
	                    <label for="exampleInputEmail1">Đáp án</label>
	                    <input class="form-control" value="{{ $CauHoi->dap_an }}" id="dap_an" name="dap_an" required="" placeholder="nội dung">
	                </div>
	                <button type="submit" class="btn btn-primary waves-effect waves-light">Cập nhật
	               </button>
	            </form>
	        </div> <!-- end card-body-->
	    </div> <!-- end card-->
</div><!-- end col -->

@endsection