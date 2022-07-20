<?php

namespace Picsmize\PicsmizeLaravel\Facades;
use Illuminate\Support\Facades\Facade;

class Picsmize extends Facade {
	protected static function getFacadeAccessor() {
		return 'picsmize';
	}
}