@extends('user.index')
@section('content')
    <div class="container pt-5 pb-5">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-12 textoffice">
                        <h2 class="fa fa-home text1">&ensp;CỬA HÀNG VANILLA</h2><br><br>
                        <Address class="fa fa-map-marker-alt text2">&ensp;<b>Địa chỉ:</b> 200 Đường 3/2, Quận 10, Tp.HCM, Việt
                            Nam</Address><br>
                        <p class="fa fa-phone text2">&ensp;<b>Điên thoại:</b> 0967275890</p><br>
                        <p class="fa fa-fax text2">&ensp;<b>Fax:</b> (84-8) 38 210 818</p><br>
                        <p class="fa fa-mail-bulk text2">&ensp;<b>Hộp thư:</b> Vanillashop@gmail.com</p><br>
                        <p>__________________________________</p>
                        <p class="text2"><h4>Cảm ơn bạn đã truy cập https://wwww.vanilla.com.vn. Nếu bạn có bất kỳ yêu cầu
                            hay phản hồi nào, vui lòng liên hệ với chúng tôi qua điện thoại, email, hoặc ghé qua Cửa
                            hàng Vanilla.</h4></p>
                    </div>
                    <div class="col-md-2 col-sm-12 textoffice">
                    </div>
                    <div class="col-md-5 col-sm-12 imgoffice">
                        <div class="container">
                            <div class="row">
                                <div class="content">
                                    <h2 class="big-title-store text-center pb-3 text1"> PHẢN HỒI </h2>
                                    <p class="text text-center text2">Vui lòng sử dụng mẫu dưới đây để gửi bình luận của bạn. chúng tôi sẽ trả lời bạn sớm nhất có thể</p>

                    @if(count($errors)>0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
							{{$err}}
							@endforeach
						</div>
					@endif
					@if(Session::has('thanhcong'))
						<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                    @endif  
                    @if(Session::has('feedback_fail'))
                        <div class="alert alert-danger">{{Session::get('feedback_fail')}}</div>
                    @endif  

                                    <form action="{{route('themphanhoi')}}" method="post" enctype="multipart/form-data" class="phanhoi">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>                                 
                                        <label for="email" class="form-group1">Chủ đề:</label> <br>
                                    
                                        <select name="feedtitle" id="country" class="country" placeholder="Chọn một chủ đề">
                                            <option value="Feedback">Thắc mắc</option>
                                            <option value="services">Phản hồi và đề xuất</option>
                                            <option value="ask">Các thông tin về sản phẩm</option>
                                            <option value="Suggest">Khen ngợi</option>
                                            <option value="Suggest">Khiếu nại</option>
                                        </select>
                                        <br>
                                        <div class="form-group">
                                            <label for="comment">Bình luận:</label>
                                            <textarea name="feedcontent" class="form-control" rows="5" type="text"
                                                id="txtComment" required></textarea>
                                        </div>
                                        <center>
                                           
                                            <button type="submit" class="btn btn-success">Gửi</button>    
                                                &nbsp &nbsp &nbsp
                                            <input type="reset" value="Làm lại" class="btn btn-warning">
                                        </center>

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <hr><br>
                <div class="col-12 headoffice mt-3">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2771.490275014015!2d106.67658399712707!3d10.774567564333154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752edd93a39c27%3A0x5873ff2d08240f8b!2zMjAwIMSQxrDhu51uZyAzIFRow6FuZyAyLCBQaMaw4budbmcgMTIsIFF14bqtbiAxMCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1563959183262!5m2!1svi!2s"
                        width="100%" height="550px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection