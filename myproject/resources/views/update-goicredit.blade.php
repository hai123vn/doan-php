@extends('layout')

@section('main-content')
<div class="row">
	<div class="col-lg-12">
	    <div class="card">
	        <div class="card-body">
	            <h4 class="mb-3 header-title">Cập nhật gói credit</h4>

	            <form action="{{ route('goi-credit.update') }}" method="POST">
	            	@csrf
	            	<input type="hidden" name="id" value="{{ $dsGoiCredit->id }}">
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Tên gói</label>
	                    <input 
	                    class="form-control" 
	                    value="{{ $dsGoiCredit->ten_goi }}" 
	                    id="ten_goi" 
	                    name="ten_goi" 
	                    placeholder="Tên gói">
	                </div>

	                <div class="form-group">
	                    <label for="exampleInputEmail1">Credit</label>
	                    <input 
	                    class="form-control" 
	                    value="{{ $dsGoiCredit->credit }}" 
	                    id="credit" 
	                    name="credit" 
	                    placeholder="Credit">
	                </div>

	                <div class="form-group">
	                    <label for="exampleInputEmail1">Số tiền</label>
	                    <input 
	                    class="form-control" 
	                    value="{{ $dsGoiCredit->so_tien }}" 
	                    id="so_tien" 
	                    name="so_tien" 
	                    placeholder="Số tiền">
	                </div>
	                <button type="submit" class="btn btn-primary waves-effect waves-light">Cập nhật</button>
	            </form>

	        </div> <!-- end card-body-->
	    </div> <!-- end card-->
	</div>
	<!-- end col -->

</div>
@endsection