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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin', 'Backend\DashboardController@index')->name('dashboard');
Route::resource('/slider', 'Backend\SliderController');
Route::resource('/AboutUs', 'Backend\AboutUsController');
Route::resource('/OurService', 'Backend\OurSerViceController');
Route::resource('/ClientReview', 'Backend\ClientReviewController');
Route::resource('/NewsUpdates', 'Backend\NewsUpdateController');
Route::resource('/Youtube', 'Backend\YoutubeController');
Route::resource('/AbroadStudy', 'Backend\AbroadStudyController');
Route::resource('/mails', 'Backend\MailController');
Route::resource('/settings', 'Backend\WebsiteContentController');
Route::resource('/users', 'Backend\UserController');
Route::resource('/our_experts', 'Backend\OurExpertsController');
Route::resource('/expert-messages', 'Backend\ExpertMessagesController');
Route::resource('/gallery', 'Backend\GalleryController');
Route::resource('/parteners', 'Backend\PartnersController');


Route::post('review/status/{id}', 'Backend\StatusController@status')->name('review.status');
Route::post('about_us/status', 'Backend\StatusController@about_us')->name('about_us.status');
Route::post('services/status', 'Backend\StatusController@services')->name('services.status');
Route::post('apply_online/status', 'Backend\StatusController@apply_online')->name('apply_online.status');
Route::post('abroad_study/status', 'Backend\StatusController@abroad_study')->name('abroad.status');
Route::post('gallery/status', 'Backend\StatusController@gallery')->name('gallery.status');
Route::post('expert_messages/status', 'Backend\StatusController@expert_messages')->name('message.status');
Route::post('apply_online/status', 'Backend\StatusController@apply')->name('apply_online.status');
Route::post('expert_review/status/{id}', 'Backend\StatusController@expert_review')->name('review.status');






Route::get('/admin/changepassword', 'Auth\ChangePasswordController@index')->name('changepassword-request');
Route::post('/admin/changepassword/store/{id}', 'Auth\ChangePasswordController@store')->name('changepassword-save');




Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
  

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');





Route::get('/', 'Frontend\HomeController@index')->name('welcome');

Route::get('/home/About/{id}', 'Frontend\AboutUsController@show')->name('about.show');
Route::resource('/home/addreview', 'Frontend\ReviewController');
Route::get('/home/Service/{id}', 'Frontend\ServiceController@show')->name('service.show');
Route::get('/home/abroadstudy/{id}', 'Frontend\AbroadStudyController@show')->name('abroad.show');
Route::get('/home/youtube/{id}', 'Frontend\YoutubeController@show')->name('youtube.show');
Route::get('/home/videogallery', 'Frontend\YoutubeController@description')->name('video.show');
Route::get('/home/news/{id}', 'Frontend\NewsUpdateController@show')->name('news.show');
Route::get('/home/messages/{id}', 'Frontend\ExpertsMessagesController@show')->name('messages.show');
Route::get('/home/gallery', 'Frontend\GalleryController@show')->name('gallery.show');


Route::resource('/home/mail/store', 'Frontend\MailController');
