<?php
Route::get('/projects', 'ProjectsController@index')->name('projects.index');
Route::get('/projects/view/{id}', 'ProjectsController@detail')->name('projects.detail');
Route::get('/projects/add', 'Admin\ProjectsController@add')->name('projects.add');
Route::post('/projects/add', 'Admin\ProjectsController@store')->name('projects.store');
Route::get('/projects/management', 'Admin\ProjectsController@management')->name('projects.management');
Route::get('/projects/view/{id}/manage', 'Admin\ProjectsController@manage')->name('projects.manage');
Route::get('/projects/view/{id}/manage/details', 'Admin\ProjectsController@details')->name('projects.manage.details');
Route::get('/projects/view/{id}/manage/actions', 'Admin\ProjectsController@actions')->name('projects.manage.actions');
Route::get('/projects/view/{id}/manage/commits', 'Admin\ProjectsController@commits')->name('projects.manage.commits');
Route::get('/projects/view/{id}/manage/requests', 'Admin\ProjectsController@requests')->name('projects.manage.requests');
Route::get('/projects/view/{id}/manage/issues', 'Admin\ProjectsController@issues')->name('projects.manage.issues');
