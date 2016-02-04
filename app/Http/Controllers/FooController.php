<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\FooRepository;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FooController extends Controller {

	/*private $repository;

	function __construct(FooRepository $repository)
	{
		$this->repository = $repository;
	}*/

	public function foo(FooRepository $repository)
	{
		//$repository = new \App\Repositories\FooRepository();

		return $repository->get();
	}

	

}
