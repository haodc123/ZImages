<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function index($type) {
        $f_type = 'Sản phẩm';
        switch ($type) {
            case 'place':
              $f_type = 'Dịch vụ Chụp Ảnh Kiến trúc';
              break;
            case 'social':
              $f_type = 'Dịch vụ Media Quảng bá Mạng xã hội';;
              break;
            case 'event':
              $f_type = 'Dịch vụ Quay Video Sự kiện';
              break;
            case 'product':
              $f_type = 'Dịch vụ Chụp Ảnh Sản phẩm';
              break;
            default:
              $f_type = 'Chương trình Khuyến mãi';
        }

        return view('services.info', [
            'type' => $type,
            'f_type' => $f_type
        ]);
    }

}
