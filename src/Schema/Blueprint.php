<?php namespace Schema;

use Illuminate\Database\Schema\Blueprint as LaravelBlueprint;

class Blueprint extends LaravelBlueprint {

	public function raw($column, $ctype)
	{
		return $this->addColumn('raw', $column, compact('ctype'));
	}
}