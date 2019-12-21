<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/page/{slug}', 'HomeController@page')->name('page');
Route::get('/project/{type}', 'HomeController@project')->name('project');
Route::get('/project/details/{id}', 'HomeController@projectDetails')->name('project_details');
Route::get('/gallery', 'HomeController@gallery')->name('gallery');
Route::get('clients', 'HomeController@clients')->name('clients');
Route::get('/news', 'HomeController@news')->name('news');
Route::get('/news/{id}', 'HomeController@newsDetails')->name('news_details');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact', 'HomeController@contactPost')->name('contact_post');

Route::get('house-holding-machines-big-corporate-plant','Homecontroller@allMachine')->name('machine.show');
Route::get('house-holding-machines-big-corporate-plant-machine-details/{id}','Homecontroller@machineDetails')->name('machine.details');

Route::middleware('auth')->namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    // Menu Content
    Route::get('/menu_content', 'PageContentController@menuContent')->name('menu_content');
    Route::get('/menu_content_details/{menu}', 'PageContentController@menuContentDetails')->name('menu_content_details');
    Route::post('/menu_content_details/save/{menu}', 'PageContentController@menuContentSave')->name('menu_content_save');

    // Sub Menu Content
    Route::get('/submenu_content', 'PageContentController@subMenuContent')->name('submenu_content');
    Route::get('/submenu_content_details/{submenu}', 'PageContentController@subMenuContentDetails')->name('submenu_content_details');
    Route::post('/submenu_content_details/save/{submenu}', 'PageContentController@subMenuContentSave')->name('submenu_content_save');

    // Project
    Route::get('/project', 'ProjectController@index')->name('admin_all_project');
    Route::get('/project/add', 'ProjectController@add')->name('add_project');
    Route::post('/project/add', 'ProjectController@addPost')->name('add_project_post');
    Route::get('/project/edit/{project}', 'ProjectController@edit')->name('edit_project');
    Route::post('/project/edit/{project}', 'ProjectController@editPost')->name('edit_project_post');
    Route::post('/project/delete', 'ProjectController@delete')->name('delete_project');

    // News
    Route::get('/news', 'NewsController@index')->name('admin_all_news');
    Route::get('/news/add', 'NewsController@add')->name('add_news');
    Route::post('/news/add', 'NewsController@addPost')->name('add_news_post');
    Route::get('/news/edit/{news}', 'NewsController@edit')->name('edit_news');
    Route::post('/news/edit/{news}', 'NewsController@editPost')->name('edit_news_post');
    Route::post('/news/delete', 'NewsController@delete')->name('delete_news');

    // Client Says
    Route::get('/say', 'SayController@index')->name('admin_all_say');
    Route::get('/say/add', 'SayController@add')->name('add_say');
    Route::post('/say/add', 'SayController@addPost')->name('add_say_post');
    Route::get('/say/edit/{say}', 'SayController@edit')->name('edit_say');
    Route::post('/say/edit/{say}', 'SayController@editPost')->name('edit_say_post');
    Route::post('/say/delete', 'SayController@delete')->name('delete_say');

    // Slider
    Route::get('/slider', 'SliderController@index')->name('admin_all_slider');
    Route::get('/slider/add', 'SliderController@add')->name('add_slider');
    Route::post('/slider/add', 'SliderController@addPost')->name('add_slider_post');
    Route::get('/slider/edit/{slider}', 'SliderController@edit')->name('edit_slider');
    Route::post('/slider/edit/{slider}', 'SliderController@editPost')->name('edit_slider_post');
    Route::post('/slider/delete', 'SliderController@delete')->name('delete_slider');

    // Gallery
    Route::get('/gallery', 'GalleryController@index')->name('admin_all_gallery_item');
    Route::get('/gallery/add', 'GalleryController@add')->name('add_gallery_item');
    Route::post('/gallery/add', 'GalleryController@addPost')->name('add_gallery_item_post');
    Route::get('/gallery/edit/{item}', 'GalleryController@edit')->name('edit_gallery_item');
    Route::post('/gallery/edit/{item}', 'GalleryController@editPost')->name('edit_gallery_item_post');
    Route::post('/gallery/delete', 'GalleryController@delete')->name('delete_gallery_item');


    //Team Member
    Route::get('add/team/member','TeamController@addTeamMemberForm')->name('add.team.member.form');
    Route::post('add/team/member','TeamController@addTeamMember')->name('add.team.member');
    Route::get('all/team/member','TeamController@allTeamMember')->name('all.team.member');
    Route::get('team/member/edit/{member}','TeamController@teamMemberEdit')->name('team.member.edit');
    Route::post('team/member/update/{member}','TeamController@teamMemberUpdate')->name('team.member.update');
    Route::post('team/member/delete', 'TeamController@teamMemberDelete')->name('team.member.delete');


    //Client
    Route::get('add/client','ClientController@addClientForm')->name('add.client.form');
    Route::post('add/client','ClientController@addClient')->name('add.client');
    Route::get('edit/client/{client}','ClientController@editClient')->name('edit.client');
    Route::post('update/client/{client}','ClientController@updateClient')->name('update.client');
    Route::post('client/delete','ClientController@deleteClient')->name('delete.client');
    Route::get('all/client','ClientController@allClient')->name('all.client');



    //MMachine
    Route::get('add/machine','MachineController@addMachineForm')->name('add.machine.form');
    Route::post('add/machine','MachineController@addMachine')->name('add.machine');
    Route::get('edit/machine/{machine}','MachineController@editMachine')->name('edit.machine');
    Route::post('update/machine/{machine}','MachineController@updateMachine')->name('update.machine');
    Route::post('machine/delete','MachineController@deleteMachine')->name('delete.machine');
    Route::get('all/machine','MachineController@allMachine')->name('all.machine');

});

