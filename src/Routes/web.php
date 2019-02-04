<?php
Route::get('/projects', 'ProjectsController@index')->name('projects.index');
Route::get('/projects/view/{id}', 'ProjectsController@detail')->name('projects.detail');
Route::get('/projects/add', 'Admin\ProjectsController@add')->name('projects.add');
Route::get('/projects/edit/{id}', 'Admin\ProjectsController@edit')->name('projects.edit');
Route::post('/projects/update/{id}', 'Admin\ProjectsController@update')->name('projects.update');
Route::post('/projects/add', 'Admin\ProjectsController@store')->name('projects.store');
Route::get('/projects/management', 'Admin\ProjectsController@management')->name('projects.management');

Route::get('/projects/view/{id}/manage', 'Admin\ProjectsController@manage')->name('projects.manage');
Route::get('/projects/view/{id}/manage/details', 'Admin\ProjectsController@details')->name('projects.manage.details');

Route::get('/projects/view/{id}/manage/commits', 'Admin\ProjectsController@commits')->name('projects.manage.commits');
Route::post('/projects/view/{id}/manage/commits/comment', 'Admin\CommitsController@addComment')->name('projects.manage.commits.comments.add');
Route::post('/projects/view/{id}/manage/commits/preview', 'Admin\CommitsController@addPreview')->name('projects.manage.commits.previews.add');

Route::get('/projects/view/{id}/manage/requests', 'Admin\ProjectsController@requests')->name('projects.manage.requests');
Route::get('/projects/view/{id}/manage/issues', 'Admin\ProjectsController@issues')->name('projects.manage.issues');

Route::get('/projects/view/{id}/manage/actions', 'Admin\ProjectsController@actions')->name('projects.manage.actions');
Route::post('/projects/view/{id}/manage/actions/sync', 'Admin\ProjectsController@sync')->name('projects.manage.actions.sync');
