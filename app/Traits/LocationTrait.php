<?php

namespace App\Traits;

use Stevebauman\Location\Facades\Location;

trait LocationTrait
{
	public function getUserLocation($requestIp)
	{
		if ($requestIp === '127.0.0.1' || $requestIp === 'localhost')
		{
			return 'LOCALHOST';  
		}
		
		return Location::get($requestIp);
	}
}