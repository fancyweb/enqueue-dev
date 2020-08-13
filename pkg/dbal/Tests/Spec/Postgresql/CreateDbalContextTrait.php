<?php

namespace Enqueue\Dbal\Tests\Spec\Postgresql;

use Enqueue\Dbal\DbalConnectionFactory;

trait CreateDbalContextTrait
{
    protected function createDbalContext()
    {
        if (false == $env = getenv('POSTGRES_DSN')) {
            $this->markTestSkipped('The POSTGRES_DSN env is not available. Skip tests');
        }

        $factory = new DbalConnectionFactory($env);

        $context = $factory->createContext();

        $context->dropDataBaseTable();

        $context->createDataBaseTable();

        return $context;
    }
}
