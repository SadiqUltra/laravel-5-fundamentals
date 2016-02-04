<?php


Route::get('tag/{tags}', 'TagsController@show');

Route::get('about', ['middleware' => 'auth', 'uses' => 'PagesController@about']);

Route::get('contact', 'PagesController@contact');

Route::resource('articles', 'ArticlesController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);






/*Route::get('foo', ['middleware' => 'manager', function()
{
	return 'Thsi page may only be viewed by managers';
}]);*/


/*Route::get('foo', 'FooController@foo');


interface BarInterface {}

class Bar implements BarInterface {}

App::bind('BarInterface', 'Bar');

Route::get('bar', function(){
	//$bar = app()->make('BarInterface');
	
	//$bar = app()['BarInterface'];
	
	$bar = app('BarInterface');



	dd($bar);
});

Route::get('bar', function(BarInterface $bar){
	dd($bar);
});
*/
