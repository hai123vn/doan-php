Xin chào <i>{{ $demo->nguoi_nhan }}</i>,
<p> Đây là email được gửi từ cố vấn cấp cao Hoa Kỳ </p>

<p><u>Các giá trị của object:</u></p>

<div>
    <p><b>Nơi sinh:</b>&nbsp;{{ $demo->noi_sinh }}</p>
    <p><b>Năm sinh:</b>&nbsp;{{ $demo->nam_sinh }}</p>
</div>

<p><u>Các giá trị được truyền vào phương thức with():</u></p>

<div>
<p><b>Giá trị 1:</b>&nbsp;{{ $gia_tri_1 }}</p>
<p><b>Giá trị 2:</b>&nbsp;{{ $gia_tri_2 }}</p>
</div>
Trân trọng
</br>
<i>{{ $demo->nguoi_gui }}</i>