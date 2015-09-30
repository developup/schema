<?php namespace Schema\Grammars;

use Illuminate\Support\Fluent;
use Illuminate\Database\Schema\Grammars\PostgresGrammar as LaravelPostgresGrammar;

class PostgresGrammar extends LaravelPostgresGrammar {

    protected function typeRaw(Fluent $column)
    {
        return $column->ctype;
    }
}