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
	<div class="col-12">
	    <div class="card">
	        <div class="card-body">
	            <h4 class="header-title">Lịch sử mua credit</h4>	       
	            <table id="linhvuc-datatable" class="table dt-responsive nowrap">
	                <thead>
	                    <tr>
	                        <th>ID</th>
	                        <th>Tên người chơi</th>
	                        <th>Gói credit</th>
	                        <th>Credit</th>
                            <td></td>
	                    </tr>
	                </thead>
	                <tbody>
	                	@foreach($dsLichSuMuaCredit as $lichsu)
                        	<tr>
		                        <td>{{ $lichsu->id }}</td>
		                        <td>{{ $lichsu->nguoiChoi->ten_dang_nhap }}</td>
		                        <td>{{ $lichsu->goi_credit_id }}</td>
		                        <td>{{ $lichsu->credit }}</td>
		                        <td>                            
		                          <button type="button" class="btn btn-purple waves-effect waves-light"><i class="mdi mdi-pencil-plus"></i></button>  
		                          <button type="button" class="btn btn-danger waves-effect waves-light"><i class=" mdi mdi-trash-can-outline"></i></button>
		                        </td>
                    		</tr>
                     	@endforeach
	                </tbody>
	            </table>
	        </div> <!-- end card body-->
	    </div> <!-- end card -->
	</div><!-- end col-->
</div>
@endsection 

