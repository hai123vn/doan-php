<div class="row">
	<div class="col-12">
	    <div class="card">
	        <div class="card-body">
	            <h4 class="header-title">Danh sách lĩnh vực đã xóa</h4>	       
	            <table id="linhvuc-datatable" class="table dt-responsive nowrap">
	                <thead>
	                    <tr>
	                        <th>ID</th>
	                        <th>Tên lĩnh vực</th>
	                        <th>Thời gian xóa</th>
	                        <th></th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@foreach($trashLinhVuc as $linhvuc)
	                		<tr>
	                			<td>{{ $linhvuc->id }}</td>
			                	<td>{{ $linhvuc->ten_linh_vuc }}</td>
			                	<td>{{ $linhvuc->deleted_at }}</td>
			                	<td>
			                		<a href="{{ route('linh-vuc.restore', ['id' => $linhvuc->id ]) }}" class="btn btn-info waves-effect waves-light" id="luu-thanh-cong">
			                			<i class="fe-chevrouns-up" >Phục Hồi</i>
			                		</a>
			                	</td>
	                		</tr>
	                	@endforeach
	                </tbody>
	            </table>
	        </div> <!-- end card body-->
	    </div> <!-- end card -->
	</div><!-- end col-->