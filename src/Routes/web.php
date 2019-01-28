<?php
Route::get('/projects', 'ProjectsController@index')->name('projects.index');
Route::get('/projects/view/{id}', 'ProjectsController@detail')->name('projects.detail');
Route::get('/projects/add', 'Admin\ProjectsController@add')->name('projects.add');
Route::post('/projects/add', 'Admin\ProjectsController@store')->name('projects.store');
