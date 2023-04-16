<?php

namespace App\Http\Controllers;

use App\Blogs;
use App\BlogCats;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request) {
        $blogs = new Blogs();
        $someblogs = $blogs->getSomeBlogs(3);

        return view('home.home', [
            'someblogs' => $someblogs
        ]);
    }

    public function next(Request $request) {
    
        $type = $request->input('type');
        switch ($type) {
            case 'order':
                $title = 'Đăng ký thành công';
                $content = 'Chúng tôi sẽ gọi lại để xác nhận thông tin';
                $backlink = "home";
            break;
            case 'updateorder':
                $title = 'Update order thành công';
                $content = 'Update order thành công...';
                $backlink = "ctrOrderList";
            break;
            case 'deleteorder':
                $title = 'Delete order thành công';
                $content = 'Delete order thành công...';
                $backlink = "ctrOrderList";
            break;
            case 'blog':
                $title = 'Đặt món thành công';
                $content = 'Đặt món thành công, chúng tôi sẽ gọi lại để xác nhận thông tin';
                $backlink = "home";
            break;
            case 'updateblog':
                $title = 'Update blog thành công';
                $content = 'Update blog thành công...';
                $backlink = "ctrBlogList";
            break;
            case 'deleteblog':
                $title = 'Delete blog thành công';
                $content = 'Delete blog thành công...';
                $backlink = "ctrBlogList";
            break;
            case 'deleteuser':
                $title = 'Delete user thành công';
                $content = 'Delete user thành công...';
                $backlink = "ctrUserList";
            break;
            default:
                $title = '';
                $content = '';
        }

        return view('home.next', [
            'title' => $title,
            'content' => $content,
            'backlink' => $backlink
        ]);

    }

}
