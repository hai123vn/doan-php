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
			    $("#linhvuc-datatable").DataTable({
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
	<div class="col-6">
	    <div class="card">
	        <div class="card-body">
	            <h4 class="header-title">Danh sách lĩnh vực</h4>	       
	            <table id="linhvuc-datatable" class="table dt-responsive nowrap">
	                <thead>
	                    <tr>
	                        <th>ID</th>
	                        <th>Tên lĩnh vực</th>
	                        <th></th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@foreach($dsLinhVuc as $linhvuc)
	                		<tr>
	                			<td>{{ $linhvuc->id }}</td>
			                	<td>{{ $linhvuc->ten_linh_vuc }}</td>
			                	<td>
			                		<form action="{{ route('linh-vuc.xoa', ['id' => $linhvuc->id ]) }}" method="POST">
			                			@csrf
			                			@method('DELETE')
				                		<a href="{{ route('linh-vuc.edit', ['id' => $linhvuc->id ]) }}" type="button" class="btn btn-danger waves-effect waves-light"><i class="icon-wrench"></i></a>
				                		
				                		<button type="submit" class="xoa-linh-vuc btn btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></button>
			                		</form>
			                	</td>
			                
	                		</tr>
	                	@endforeach
	                </tbody>
	            </table>
	        </div> <!-- end card body-->
	    </div> <!-- end card -->
	</div><!-- end col-->
	<div class="col-lg-6">
	    <div class="card">
	        <div class="card-body">
	            <h4 class="mb-3 header-title">Thêm mới lĩnh vực</h4>

	            <form action="{{ route('linh-vuc.xl-them-moi') }}" method="POST">
	            	@csrf
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Tên lĩnh vực</label>
	                    <input class="form-control" id="ten_linh_vuc" name="ten_linh_vuc" required="" placeholder="Tên lĩnh vực">
	                </div>
	                <button type="submit" class="btn btn-primary waves-effect waves-light">Thêm</button>
	            </form>
	        </div> <!-- end card-body-->
	    </div> <!-- end card-->
	</div><!-- end col -->
	
	</div>
@endsection 

