@extends('layout')

@section('css')
<!-- third party css -->
<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<!-- third party css end -->
@endsection

@section('js')
<!-- third party js -->
        <script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/buttons.flash.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/buttons.print.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>
        <script src="{{asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
		<script type="text/javascript">
			$(document).ready(function() {
			    $("#cauhoi-datatable").DataTable({
			        language: {
			            paginate: {
			                previous: "<i class='mdi mdi-chevron-left'>",
			                next: "<i class='mdi mdi-chevron-right'>"
			            }
			        },
			        drawCallback: function() {
			            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
			        }
			    });

			    $('.xoa-linh-vuc').click(function(e) {
			    	e.preventDefault();// de no dung lai khong phai chuyen page
			    	var th = $(this);
			    	Swal.fire({
			            title: "Are you sure?",
			            text: "You won't be able to revert this!",
			            type: "success",
			            showCancelButton: !0,
			            confirmButtonColor: "#3085d6",
			            cancelButtonColor: "#d33",
			            confirmButtonText: "Yes, delete it!"
			        }).then(function(t) {
			            if(t.value) {
			            	th.parent().submit()
			            }
			        })
			    });
			});
		</script>
        <!-- third party js ends -->
@endsection

@section('main-content')
<div>
	@include('thongbao')
	@include('thongbaoloi')
</div>
<div class="row">
	<div class="col-8">
	    <div class="card">
	        <div class="card-body">
	            <h4 class="header-title">Danh sách câu hỏi</h4>	       
	            <table id="cauhoi-datatable" class="table dt-responsive nowrap">
	                <thead>
	                    <tr>
	                        <th>ID</th>
	                        <th>Nội dung</th>
	                        <th>Lĩnh vực</th>
	                        <th>Phương án A</th>
	                        <th>Phương án B</th>
	                        <th>Phương án C</th>
	                        <th>Phương án D</th>
	                        <th>Đáp án</th>
	                        <th></th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@foreach($dsCauHoi as $cauhoi)
	                		<tr>
	                			<td>{{ $cauhoi->id }}</td>
			                	<td>{{ $cauhoi->noi_dung }}</td>
			                	<td>{{ $cauhoi->linhVuc->ten_linh_vuc}}</td>
			                	<td>{{ $cauhoi->phuong_an_a}}</td>
			                	<td>{{ $cauhoi->phuong_an_b}}</td>
			                	<td>{{ $cauhoi->phuong_an_c}}</td>
			                	<td>{{ $cauhoi->phuong_an_d}}</td>
			                	<td>{{ $cauhoi->dap_an}}</td>
			                	<td>
			                		<form action="{{ route('cau-hoi.xoa', ['id' => $cauhoi->id ]) }}" method="POST">
			                			@csrf
			                			@method('DELETE')
				                		<a href="{{ route('cau-hoi.edit', ['id' => $cauhoi->id ]) }}" type="button" class="btn btn-danger waves-effect waves-light"><i class="icon-wrench"></i></a>	
				                		<button type="submit" class="xoa-cau-hoi btn btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></button>
			                		</form>
			                	</td>			                
	                		</tr>
	                	@endforeach
	                </tbody>
	            </table>
	        </div> <!-- end card body-->
	    </div> <!-- end card -->
	</div><!-- end col-->
	<div class="col-lg-4">
	    <div class="card">
	        <div class="card-body">
	            <h4 class="mb-3 header-title">Thêm mới câu hỏi</h4>

	            <form action="{{ route('cau-hoi.xl-them-moi') }}" method="POST">
	            	@csrf
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Nội dung</label>
	                    <input class="form-control" id="noi_dung" name="noi_dung" required="" placeholder="Nội dung">
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
	                    <input class="form-control" id="phuong_an_a" name="phuong_an_a" required="" placeholder="nội dung">
	                </div>

	                <div class="form-group">
	                    <label for="exampleInputEmail1">Phương án B</label>
	                    <input class="form-control" id="phuong_an_b" name="phuong_an_b" required="" placeholder="nội dung">
	                </div>

	                <div class="form-group">
	                    <label for="exampleInputEmail1">Phương án C</label>
	                    <input class="form-control" id="phuong_an_c" name="phuong_an_c" required="" placeholder="nội dung">
	                </div>

	                <div class="form-group">
	                    <label for="exampleInputEmail1">Phương án D</label>
	                    <input class="form-control" id="phuong_an_d" name="phuong_an_d" required="" placeholder="nội dung">
	                </div>

	                <div class="form-group">
	                    <label for="exampleInputEmail1">Đáp án</label>
	                    <input class="form-control" id="dap_an" name="dap_an" required="" placeholder="nội dung">
	                </div>
	                <button type="submit" class="btn btn-primary waves-effect waves-light">Thêm</button>
	                <button type="submit" class="btn btn-primary waves-effect waves-light">Sửa</button>
	            </form>
	        </div> <!-- end card-body-->
	    </div> <!-- end card-->
	</div><!-- end col -->
</div>
@endsection 

 

