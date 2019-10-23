@extends('layout')

@section('main-content')
<div class="row">
	<div class="col-lg-6">
	    <div class="card">
	        <div class="card-body">
	            <h4 class="mb-3 header-title">Thêm mới lĩnh vực</h4>

	            <form action="{{ route('linh-vuc.xl-them-moi') }}" method="POST">
	            	@csrf
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Tên lĩnh vực</label>
	                    <input class="form-control" id="ten_linh_vuc" name="ten_linh_vuc" placeholder="Tên lĩnh vực">
	                </div>
	                <button type="submit" class="btn btn-primary waves-effect waves-light">Thêm</button>
	            </form>

	        </div> <!-- end card-body-->
	    </div> <!-- end card-->
	</div>
	<!-- end col -->

</div>
@endsection