<?php
namespace Haunt\Core\Controllers;

use Illuminate\Routing\Controller;

class TestController extends Controller
{
	public function test()
	{
		dd('test');
	}
}
