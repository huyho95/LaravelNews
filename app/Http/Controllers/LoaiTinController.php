<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;

class LoaiTinController extends Controller
{
    public function getDanhSach()
    {
        $loaitin = LoaiTin::all();
        return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }

    public function getThem()
    {
        $theloai = TheLoai::all();
        return view('admin.loaitin.them',['theloai'=>$theloai]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'txtCateName' => 'required|unique:LoaiTin,Ten|min:1|max:100',
            'Category' => 'required'
        ],[
            'txtCateName.required' => 'You have not entered the name of type of news yet',
            'txtCateName.unique' => 'The name of type of news have already existed',
            'txtCateName.min' => 'The length of the category name must be from 1 to 100 characters',
            'txtCateName.max' => 'The length of the category name must be from 1 to 100 characters',
            'Category.required' => 'You have not selected a category yet'
        ]);

        $loaitin = new LoaiTin;
        $loaitin->Ten = $request->txtCateName;
        $loaitin->TenKhongDau = changetitle($request->txtCateName);
        $loaitin->idTheLoai = $request->Category;
        $loaitin->save();

        return redirect('admin/loaitin/them')->with('notification','Insert Successfully !!!');
    }

    public function getSua($id)
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::find($id);
        return view('admin.loaitin.sua',['loaitin' => $loaitin,'theloai' => $theloai]);
    }

    public function postSua(Request $request,$id)
    {
        $this->validate($request,
        [
            'Name' => 'required|unique:LoaiTin,Ten|min:1|max:100',
            'Category' => 'required'
        ],[
            'Name.required' => 'You have not entered the name of type of news yet',
            'Name.unique' => 'The name of type of news have already existed',
            'Name.min' => 'The length of the category name must be from 1 to 100 characters',
            'Name.max' => 'The length of the category name must be from 1 to 100 characters',
            'Category.required' => 'You have not selected a category yet'
        ]);

        $loaitin = LoaiTin::find($id);
        $loaitin->Ten = $request->Name;
        $loaitin->TenKhongDau = changetitle($request->Name);
        $loaitin->idTheLoai = $request->Category;
        $loaitin->save();

        return redirect('admin/loaitin/sua/'.$id)->with('notification','Edit Successfully !!!');
    }

    public function getXoa($id)
    {
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();

        return redirect('admin/loaitin/danhsach')->with('notification','Delete Successfully !!!');
    }
}