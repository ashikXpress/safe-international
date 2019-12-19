<?php

namespace App\Http\Controllers\Admin;

use App\Model\GalleryItem;
use App\Model\News;
use App\Model\Say;
use App\Model\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        $data = [
            'slider' => Slider::count(),
            'news' => News::count(),
            'says' => Say::count(),
            'gallery' => GalleryItem::count(),
        ];
        return view('admin.dashboard', compact('data'));
    }
}
