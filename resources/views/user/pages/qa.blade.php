@extends('user.index')
@section('content')
<div class="container pt-5 pb-5">
    <p><img src="user_asset/images/qa/qa1.jpg" width="100%" alt=""></p>
    <h2 class="title-qa">HỎI ĐÁP CÙNG VANILLA</h2>
    <p>Vanilla sẽ giúp bạn giải đáp các thắc mắc bất kể liên quan đến dịch vụ, sản phẩm hay chính sách mua hàng và đổi trả tại shop. Chúng mình hi vọng bạn có thể tìm câu trả lời cho thắc mắc của mình trong những câu hỏi thường gặp dưới đây. Nếu bạn muốn tìm hiểu thêm nữa, vui lòng liên hệ tư vấn viên hỗ trợ của Vanilla tại <a href="mailto:hotro@vanilla.com">hotro@vanilla.com</a> hoặc số: +84 090 90 90 00</p>
    <div class="title-section-qa">VỀ CÁC SẢN PHẨM</div>
    <div id="accordion">

        <div class="card">
            <div class="card-header">
            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                "Sản phẩm của Vanilla có an toàn không?"
            </a>
            </div>
            <div id="collapseOne" class="collapse show" data-parent="#accordion">
            <div class="card-body">
                <p>Toàn bộ sản phẩm tại Vanilla đều được mua trực tiếp từ store của hãng tại Mỹ nên bạn yên tâm nhé. Nếu phát hiện hàng giả, Vanilla sẽ hoàn tiền 200% giá trị sản phẩm. Bên cạnh đó bạn có thể theo dõi tại Facebook page của Vanilla, tụi mình thường xuyên chia sẻ về quá trình mua hàng tại store kèm hóa đơn để khách hàng có thể yên tâm hơn nhé. Cảm ơn bạn đã tin tưởng Vanilla!  </p>
            </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                 "Tôi có thể mua sản phẩm ở đâu?"
            </a>
            </div>
            <div id="collapseTwo" class="collapse" data-parent="#accordion">
            <div class="card-body">
                <p>Hiện tại Vanilla có 4 shop tại TP. Hồ Chí Minh và Hà Nội. Các bạn có thể tìm địa chỉ liên hệ tại: <a href="#">Link</a></p>
            </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                "Làm sao biết sản phẩm nào tốt và phù hợp cho da mình?"
            </a>
            </div>
            <div id="collapseThree" class="collapse" data-parent="#accordion">
            <div class="card-body">
                <p>Trước khi mua hàng tại Vanilla, bạn có thể tham khảo qua các kiến thức cơ bản tại <a href="#">Trang Tin Làm Đẹp</a> của Vanilla, hoặc tham khảo qua tư vấn của nhân viên tại shop nhé. Trường hợp bạn mua hàng online, vui lòng liên hệ tư vấn trực tiếp qua Facebook hoặc số 09000909009 </p>
            </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="title-section-qa">ĐIỀU KHOẢN MUA HÀNG VÀ ĐỔI TRẢ</div>
        <div id="accordion">

            <div class="card">
                <div class="card-header">
                <a class="card-link" data-toggle="collapse" href="#collapseFour">
                    "Tôi có thể mua hàng từ tỉnh khác không??"
                </a>
                </div>
                <div id="collapseFour" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <p>Có thể, Vinalla nhận giao hàng toàn quốc, phí ship là free cho các đơn hàng từ 500.000Đ, sản phẩm giao tới các tỉnh ngoài TPHCM phí ship giao động từ 25.000Đ - 30.000Đ </p>
                </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                <a class="collapsed card-link" data-toggle="collapse" href="#collapseFive">
                     "Trường hợp nào thì được đổi trả hàng?"
                </a>
                </div>
                <div id="collapseFive" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <p>Các trường hợp có thể đổi trả hàng khi:</p>
                        <p><b>1. Shipper giao sai sản phẩm</b></p>
                        <p><b>2. Thời gian mua hàng trong vòng 7 ngày, sản phẩm chưa qua sử dụng và còn nguyên seal</b></p>
                        <p><b>3. Phát hiện hàng là giả</b></p>
                    
                </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                <a class="collapsed card-link" data-toggle="collapse" href="#collapseSix">
                    "Tôi có thể trả hàng sau khi dùng sản phẩm không?"
                </a>
                </div>
                <div id="collapseSix" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <p>Không thể bạn nhé, vì sản phẩm đã qua sử dụng, khi nhận hàng bạn nhớ check sản phẩm. Trường hợp các bạn sau khi sử dụng và phát hiện là hàng giả, Vinalla cam kết sẽ bồi thường 200% giá trị sản phẩm.</p>
                </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                <a class="collapsed card-link" data-toggle="collapse" href="#collapseSeven">
                    "Làm cách nào để trả hàng và nhận lại tiền?"
                </a>
                </div>
                <div id="collapseSeven" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <p>Trước tiên, bạn chụp lại hình sản phẩm còn nguyên vẹn và báo với Vinilla, nếu đủ điều kiện trả hàng tụi mình sẽ nhanh chóng cho shipper đến nhận hàng lại và hoàn tiền qua chuyển khoản ngân hàng</p> 
                </div>
                </div>
            </div>
        </div>
</div>
@endsection
