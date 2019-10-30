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
			    $("#goicredit-datatable").DataTable({
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
			});

			$('.xoa-goi-credit').click(function(e) {
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
		</script>
        <!-- third party js ends -->
@endsection

@section('main-content')
<div class="row">
	<div class="col-6">
	    <div class="card">
	        <div class="card-body">
	            <h4 class="header-title">Danh sách gói credit</h4>	       
	            <table id="goicredit-datatable" class="table dt-responsive nowrap">
	                <thead>
	                    <tr>
	                        <th>ID</th>
	                        <th>Tên gói</th>
	                        <th>Credit</th>
	                        <th>Số tiền</th>
	                        <th></th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@foreach($dsGoiCredit as $goicredit)
	                		<tr>
	                			<td>{{ $goicredit->id }}</td>
			                	<td>{{ $goicredit->ten_goi }}</td>
			                	<td>{{ $goicredit->credit }}</td>
			                	<td>{{ $goicredit->so_tien }}</td>
			                	<td>
			                		<form action="{{ route('goi-credit.xoa', ['id' => $goicredit->id ]) }}" method="POST">
			                			@csrf
			                			@method('DELETE')
				                		<a href="{{ route('goi-credit.edit', ['id' => $goicredit->id ]) }}" type="button" class="btn btn-danger waves-effect waves-light"><i class="icon-wrench"></i></a>
				                		
				                		<button type="submit" class="xoa-goi-credit btn btn-danger waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></button>
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
</div>
@endsection 
	
