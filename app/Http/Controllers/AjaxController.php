<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;

class AjaxController extends Controller
{
    public function getLoaiTin($idCategory)
    {
        $loaitin = LoaiTin::where('idTheLoai',$idCategory)->get();
        foreach($loaitin as $lt)
        {
            echo "<option value='".$lt->id."'>".$lt->Ten."</option>";
        }
    }
}