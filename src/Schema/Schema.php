<?php namespace Schema;

use Schema\Grammars\PostgresGrammar;
use Illuminate\Support\Facades\Facade;

class Schema extends Facade
{
    public static function connection($name)
    {
        return static::customGrammar(
            static::$app['db']->connection($name)
        );
    }

    protected static function getFacadeAccessor()
    {
        return static::customGrammar(
            static::$app['db']->connection()
        );
    }

    protected static function customGrammar($connection)
    {
        // Only for PostgresGrammar
        if (get_class($connection) === 'Illuminate\Database\PostgresConnection') {
            $connection->setSchemaGrammar(
                $connection->withTablePrefix(new PostgresGrammar)
            );
        }
        $schema = $connection->getSchemaBuilder();
        $schema->blueprintResolver(function($table, $callback) {
            return new Blueprint($table, $callback);
        });
        return $schema;
    }

}