@extends('layout')

@section('main-content')
<div class="row">
	<div class="col-lg-6">
	    <div class="card">
	        <div class="card-body">
	            <h4 class="mb-3 header-title">Cập nhật lĩnh vực</h4>

	            <form action="{{ route('linh-vuc.update') }}" method="POST">
	            	@csrf
	            	<input type="hidden" name="id" value="{{ $dsLinhVuc->id }}">
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Tên lĩnh vực</label>
	                    <input 
	                    class="form-control" 
	                    value="{{ $dsLinhVuc->ten_linh_vuc }}" 
	                    id="ten_linh_vuc" 
	                    name="ten_linh_vuc" 
	                    placeholder="Tên lĩnh vực">
	                </div>
	                <button type="submit" class="btn btn-primary waves-effect waves-light">Sửa</button>
	            </form>

	        </div> <!-- end card-body-->
	    </div> <!-- end card-->
	</div>
	<!-- end col -->

</div>
@endsection