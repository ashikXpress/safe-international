<?php

namespace App\Http\Controllers\Admin;

use App\Model\Menu;
use App\Model\SubMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageContentController extends Controller
{
    public function menuContent() {
        $menus = Menu::orderBy('sort')->get();

        return view('admin.page_content.menu_content', compact('menus'));
    }

    public function menuContentDetails(Menu $menu) {
        return view('admin.page_content.menu_content_details', compact('menu'));
    }

    public function menuContentSave(Menu $menu, Request $request) {
        $menu->content = $request->text_content;
        $menu->save();

        return redirect()->route('menu_content')->with('message', 'Content Save Successfully.');
    }

    public function subMenuContent() {
        $menus = Menu::orderBy('sort')->with('subMenus')->get();

        return view('admin.page_content.sub_menu_content', compact('menus'));
    }

    public function subMenuContentDetails(SubMenu $submenu) {
        return view('admin.page_content.sub_menu_content_details', compact('submenu'));
    }

    public function subMenuContentSave(SubMenu $submenu, Request $request) {
        $submenu->content = $request->text_content;
        $submenu->save();

        return redirect()->route('submenu_content')->with('message', 'Content Save Successfully.');
    }
}
