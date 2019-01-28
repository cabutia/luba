<?php
Route::get('/projects', 'ProjectsController@index')->name('projects.index');
Route::get('/projects/view/{id}', 'ProjectsController@detail')->name('projects.detail');
