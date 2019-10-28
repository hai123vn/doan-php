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
			});
		</script>
        <!-- third party js ends -->
@endsection

@section('main-content')
<div class="row">
	<div class="col-12">
	    <div class="card">
	        <div class="card-body">
	            <h4 class="header-title">Danh sách câu hỏi</h4>	       
	            <table id="linhvuc-datatable" class="table dt-responsive nowrap">
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
	                			<td>{{ $linhvuc->id }}</td>
			                	<td>{{ $linhvuc->ten_linh_vuc }}</td>
			                	<td>{{ $linhvuc->phuong_an_a }}</td>
			                	<td>{{ $linhvuc->phuong_an_b }}</td>
			                	<td>{{ $linhvuc->phuong_an_c }}</td>
			                	<td>{{ $linhvuc->phuong_an_d }}</td>
			                	<td>{{ $linhvuc->dap_an }}</td>
			                	<td>
			                		<button type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-pencil-outline"></i></button>
			                		<button type="button" class="btn btn-purple waves-effect waves-light"><i class="mdi mdi-trash-can-outline"></i></button>
			                		<button type="button" class="btn btn-warning waves-effect waves-light"><i class="fas fa-trash-restore-alt"></i></button>
			                	</td>
	                		</tr>
	                	@endforeach
	                </tbody>
	            </table>
				<a href="{{ route('linh-vuc.them-moi') }}" type="button" class="btn btn-block btn-lg btn-primary waves-effect waves-light">Thêm mới câu hỏi</a>
	        </div> <!-- end card body-->
	    </div> <!-- end card -->
	</div><!-- end col-->
	</div>
@endsection 

