<?php

namespace App\Http\Controllers\QuanLi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Storage;
use File;
use App\Http\Requests\UserRequest;
class UserController extends Controller{
       public function  __construct(User $muser){
           $this->muser = $muser;
       }

    public function index(){
           $objUser = $this ->muser->getindex();
        return view('quanli.user.index',compact('objUser'));
    }
    public function getadd(){
           return view('quanli.user.add');
    }
    public function postadd(UserRequest $request){
         $username = $request->username;
         $fullname = $request->fullname;
         $password = $request->password;
         $gioitinh = $request->gioitinh;
         $ngaysinh = $request->ngaysinh;
         $noisong  = $request->noisong;
        $file = $request->file('avatar');
        $namepicture = $this->gettenfile($file);

         $item =[
             'username'  => $username,
             'fullname'  => $fullname,
             'password'  => $password,
             'sex'       => $gioitinh,
             'date'      => $ngaysinh,
             'live'      => $noisong,
             'picture'   => $namepicture,
         ];
         $result = $this->muser->add($item);
         if ($result){
             return redirect()->route('quanli.user.index')->with('Thêm user thành công');
         }else{
             return redirect()->route('quanli.user.index')->with('Thêm user thất bại');
         }
    }

    public function getedit($id){
           $objuserid = $this->muser->getuser($id);
           return view('quanli.user.edit',compact('objuserid','id'));
    }
    public function postedit($id,UserRequest $request){
        $objuserid = $this->muser->getuser($id);
        $oldpicture = $objuserid->picture;
        $username = $request->username;
        $fullname = $request->fullname;
        $password = $request->password;
        $gioitinh = $request->gioitinh;
        $ngaysinh = $request->ngaysinh;
        $noisong  = $request->noisong;




        if ($request->hasFile('avatar')){

            $file = $request->file('avatar');
            $namepicture = $this->gettenfile($file);
            $path = 'files/'.$oldpicture;
            File::delete($path);
        }
        else{
            $namepicture = $oldpicture;
        }
        $item =[
            'username'  => $username,
            'fullname'  => $fullname,
            'password'  => $password,
            'sex'       => $gioitinh,
            'date'      => $ngaysinh,
            'live'      => $noisong,
            'picture'   => $namepicture,
        ];
        $result = $this->muser->edit($id,$item);
        if ($result){
            return redirect()->route('quanli.user.index')->with('Sửa user thành công');
        }else{
            return redirect()->route('quanli.user.index')->with('Sửa user thất bại');
        }
    }

    public function del($id){
        $objuserid = $this->muser->getuser($id);
        $oldpicture = $objuserid->picture;
        Storage::delete("/app/files/".$oldpicture);


        $result = $this->muser->del($id);

        if ($result){
            return redirect()->route('quanli.user.index')->with('Xóa user thành công');
        }else{
            return redirect()->route('quanli.user.index')->with('Xóa user thất bại');
        }
    }
    //Hàm upload file
    public function gettenfile($file){

        $namefile = $file->getClientOriginalName();
        $tmp = explode('.',$namefile);
        $duoiFile = end($tmp);
        $tenFileMoi='VNE-'.time().'.'.$duoiFile;
        $file->move('files',$tenFileMoi);
         return $tenFileMoi;
    }
}
