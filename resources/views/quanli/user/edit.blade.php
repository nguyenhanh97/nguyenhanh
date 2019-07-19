@extends('templates.admin.master')
@section('main')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Sửa user</h4>
                </div>
                <div class="content">
                    <form action="{{route('quanli.user.edit',$id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" value="{{$objuserid->username}}" class="form-control border-input">
                                    <p><span style="color: red">{{$errors->first('username')}}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fullname</label>
                                    <input type="text" name="fullname" value="{{$objuserid->fullname}}" class="form-control border-input">
                                    <p><span style="color: red">{{$errors->first('fullname')}}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" value="{{$objuserid->password}}" class="form-control border-input">
                                    <p><span style="color: red">{{$errors->first('password')}}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Avatar</label>
                                    <input type="file" name="avatar" class="form-control border-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh cũ</label>
                                    <img src="/public/files/{{$objuserid->picture}}" width="120px" alt="" />

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Giới Tính</label>
                                    @php
                                    if ($objuserid->sex == 1){
                                    @endphp
                                    <input type="radio" name="gioitinh" value="0">Nam
                                    <input checked="checked" type="radio" name="gioitinh" value="1">Nữ
                                     @php
                                     }else{
                                     @endphp
                                    <input checked="checked" type="radio" name="gioitinh" value="0">Nam
                                    <input  type="radio" name="gioitinh" value="1">Nữ
                                    @php
                                    }
                                    @endphp
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Ngày Sinh</label>
                                    <input type="date" name="ngaysinh" value="{{$objuserid->date}}" class="form-control border-input">
                                    <p><span style="color: red">{{$errors->first('ngaysinh')}}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nơi Sống</label>
                                    <input type="text" name="noisong" value="{{$objuserid->live}}" class="form-control border-input">
                                    <p><span style="color: red">{{$errors->first('noisong')}}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-info btn-fill btn-wd" value="Thực hiện" />
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>


    </div>

@stop
