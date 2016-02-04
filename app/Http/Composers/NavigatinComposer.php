<?php namespace App\Http\Composers;

use App\Article;

/**
 * 
 */
 class NavigationComposer extends AnotherClass
 {
 	
 	public function composer($view)
 	{
 		$view->with('latest', Article::latest()->first());
 	}
 } 