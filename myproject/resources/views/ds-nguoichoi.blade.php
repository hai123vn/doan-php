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
			    $("#nguoichoi-datatable").DataTable({
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
			$(document).on('click', '.xoa-nguoi-choi', function(e) {
            e.preventDefault();
            var th = $(this);
            Swal.fire({
                title: "Bạn có chắc muốn xoá?",
                html: "<div class='text-secondary'>Lưu ý: Người chơi bị xoá có thể khôi phục lại</div>",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xác nhận",
                cancelButtonText: "Huỷ bỏ"
            }).then(function(t) {
                    if (t.value) {
                        Swal.fire("Đã xóa!", "Tệp của bạn đã xóa.", "success")
                        th.parent().submit();
                    }
            })
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
	            <h4 class="header-title">Danh sách người chơi</h4>	       
	            <table id="nguoichoi-datatable" class="table dt-responsive nowrap">
	                <thead>
	                    <tr>
	                        <th>ID</th>
	                        <th>Tên đăng nhập</th>
	                        <th>Mật khẩu</th>
	                        <th>Email</th>
	                        <th>Hình đại diện</th>
	                        <th>Điểm cao nhất</th>
	                        <th>Credit</th>
	                        <th></th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@foreach($dsNguoiChoi as $nguoichoi)
	                		<tr>
	                            <td>{{ $nguoichoi->id }}</td>
	                            <td>{{ $nguoichoi->ten_dang_nhap }}</td>
	                            <td>{{ $nguoichoi->mat_khau }}</td>
	                            <td>{{ $nguoichoi->email }}</td>
	                            <td>{{ $nguoichoi->hinh_dai_dien }}</td>
	                            <td>{{ $nguoichoi->diem_cao_nhat  }}</td>
	                            <td>{{ $nguoichoi->credit }}</td>
	                            <td>
	                                <form action="{{ route('nguoi-choi.remove', ['id' => $nguoichoi->id ]) }}" method="POST">
	                                            {{ csrf_field() }}
	                                            {{ method_field('DELETE') }}   
	                                    <button type="submit" class="btn btn-danger waves-effect waves-light xoa-nguoi-choi"><i class=" mdi mdi-trash-can-outline">Xóa</i></button>
	                                </form>
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

