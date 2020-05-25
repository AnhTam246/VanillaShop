@extends('admin.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2>Danh sách Khách hàng</h2>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên Đăng Nhập</th>                  
                            <th>Số ĐT</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Điểm</th>                                                  
                            <th>Xóa</th>                          
                        </tr>
                    </thead>
                    <tbody>
                         @foreach($customer as $cust)
                        <tr class="odd gradeX" align="center">
                            <td>{{$cust->cust_id}}</td>
                            <td>{{$cust->cust_name}}</td>  
                            <td>{{$cust->cust_tel}}</td>                            
                            <td>{{$cust->cust_email}}</td>
                            <td>{{$cust->cust_add}}</td>
                            <td>{{$cust->cust_mark}}</td>                                                    
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/customer/delete/{{$cust->cust_id}}">Xóa</a></td>                           
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>       
        </div>
      
    </div>
@endsection