<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('/Job/index');
});

Route::get('/index', function () {
    return view('/Job/index');
});

Route::get('/about', function () {
    return view('/Job/about-us');
});


Route::get('/blogDetails', function () {
    return view('/Job/blog-post-details');
});

Route::get('/blogPosts', function () {
    return view('/Job/blog-posts');
});

Route::get('/contact', function () {
    return view('/Job/contact');
});

Route::get('/jobDetails', function () {
    return view('/Job/job-details');
});

Route::get('/jobsList', function () {
    return view('/Job/job-listing');
});


Route::get('/team', function () {
    return view('/Job/team');
});

Route::get('/terms', function () {
    return view('/Job/terms');
});

Route::get('/testiMonials', function () {
    return view('/Job/testimonials');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
