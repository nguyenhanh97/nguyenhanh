@extends('templates.admin.master')
@section('main')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Danh sách user</h4>
                    @if(Session::has('msg'))
                    <p class="category success">{{Session::get('msg')}}</p>
                    @endif
                    <a href="{{route('quanli.user.add')}}" class="addtop"><img src="/templates/admin/img/add.png" alt="" /> Thêm</a>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>Ảnh</th>
                        <th>Giới tính</th>
                        <th>Ngày sinh</th>
                        <th>Nơi sống</th>
                        <th>Chức năng</th>
                        </thead>
                        <tbody>
                        @foreach($objUser as $user)
                            @php
                                  $uid = $user->id;
                                  $username = $user->username;
                                  $fullname = $user->fullname;
                                  $picture = $user->picture;
                                  $urlPic = "/public/files/".$picture;
                                  $date = $user->date;
                                  if ($user->sex == 0){
                                  $sex = "Nam";
                                  }else{
                                  $sex ="Nữ";
                                  }
                                  $noisong = $user->live;
                                 $urlEdit = route('quanli.user.edit',$uid);
                                 $urlDel  = route('quanli.user.del',$uid);

                            @endphp
                        <tr>
                            <td>{{$uid}}</td>
                            <td>{{$username}}</td>
                            <td>{{$fullname}}</td>

                            <td><img style="with:40px;height:40px" src="{{$urlPic}}"></td>

                            <td>{{$sex}}</td>
                            <td>{{$date}}</td>
                            <td>{{$noisong}}</td>
                            <td>
                                <a href="{{$urlEdit}}"><img src="/templates/admin/img/edit.gif" alt="" /> Sửa</a> &nbsp;||&nbsp;
                                <a href="{{$urlDel}}" onclick="return confirm('Bạn thật sự muốn xóa')"><img src="/templates/admin/img/del.gif" alt="" /> Xóa</a>
                            </td>
                        </tr>

                        @endforeach
                        </tbody>

                    </table>
                 <div class="wrap-paination">{{$objUser->links()}}</div>

                </div>
            </div>
        </div>

    </div>
@stop
