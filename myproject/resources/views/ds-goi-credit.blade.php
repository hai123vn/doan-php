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
			                		<button type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-pencil-outline"></i></button>
			                		<button type="button" class="btn btn-purple waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></button>
			                		<button type="button" class="btn btn-warning waves-effect waves-light"><i class="fas fa-trash-restore-alt"></i></button>
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
	                    <input class="form-control" id="ten_linh_vuc" name="ten_linh_vuc" placeholder="Tên lĩnh vực">
	                </div>
	                <button type="submit" class="btn btn-primary waves-effect waves-light">Thêm</button>
	            </form>

	        </div> <!-- end card-body-->
	    </div> <!-- end card-->

	</div><!-- end col -->
	</div>
@endsection 
	
