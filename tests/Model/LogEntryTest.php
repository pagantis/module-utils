<?php

namespace Tests\PagaMasTarde\ModuleUtils;

use PHPUnit\Framework\TestCase;
use PagaMasTarde\ModuleUtils\Model\LogEntry;

class LogEntryTest extends TestCase
{
    /**
     * INFO_MESSAGE
     */
    const INFO_MESSAGE = 'Success message';

    /**
     * ERROR_MESSAGE
     */
    const ERROR_MESSAGE = 'Error message';

    /**
     * testInfo
     */
    public function testInfo()
    {
        $logEntry = new LogEntry();
        $logEntry->info(self::INFO_MESSAGE);

        $this->assertEquals(self::INFO_MESSAGE, $logEntry->getMessage());
        $this->assertInstanceOf('PagaMasTarde\ModuleUtils\Model\LogEntry', $logEntry);
    }

    /**
     * testError
     *
     * @throws \ReflectionException
     */
    public function testError()
    {
        $logEntry = new LogEntry();
        $logEntry->error(new \Exception(self::INFO_MESSAGE));
        
        $reflectCreateOrderMethod = new \ReflectionClass('PagaMasTarde\ModuleUtils\Model\LogEntry');
        $property = $reflectCreateOrderMethod->getProperty('message');
        $property->setAccessible(true);
        $this->assertEquals($property->getValue($logEntry), $logEntry->getMessage());
        
        $property = $reflectCreateOrderMethod->getProperty('code');
        $property->setAccessible(true);
        $this->assertEquals($property->getValue($logEntry), $logEntry->getCode());
        
        $property = $reflectCreateOrderMethod->getProperty('line');
        $property->setAccessible(true);
        $this->assertEquals($property->getValue($logEntry), $logEntry->getLine());
        
        $property = $reflectCreateOrderMethod->getProperty('file');
        $property->setAccessible(true);
        $this->assertEquals($property->getValue($logEntry), $logEntry->getFile());
        
        $property = $reflectCreateOrderMethod->getProperty('trace');
        $property->setAccessible(true);
        $this->assertEquals($property->getValue($logEntry), $logEntry->getTrace());

        $this->assertInstanceOf('PagaMasTarde\ModuleUtils\Model\LogEntry', $logEntry);
    }

    /**
     * testToJson
     */
    public function testToJson()
    {
        $logEntry = new LogEntry();
        $logEntry->info(self::INFO_MESSAGE);
        $jsonArray = $logEntry->toJson();

        $this->assertJson($jsonArray);
    }

    /**
     * testJsonSerialize
     */
    public function testJsonSerialize()
    {
        $logEntry = new LogEntry();
        $logEntry->info(self::INFO_MESSAGE);
        $jsonArray = $logEntry->jsonSerialize();

        $this->assertArrayHasKey('message', $jsonArray);
        $this->assertEquals($logEntry->getMessage(), self::INFO_MESSAGE);
    }
}
