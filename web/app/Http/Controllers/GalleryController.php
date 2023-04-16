<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function gallery_by_cat($cat) {
        $f_cat = 'Sản phẩm';
        switch ($cat) {
            case 'place':
              $f_cat = 'Kiến trúc';
              break;
            case 'fashion':
              $f_cat = 'Thời trang';;
              break;
            case 'event':
              $f_cat = 'Sự kiện';
              break;
            default:
              $f_cat = 'Sản phẩm';
        }

        return view('gallery.gallery', [
            'cat' => $cat,
            'f_cat' => $f_cat
        ]);
    }

}
