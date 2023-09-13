<?php

declare(strict_types=1);

namespace Tests;

use Faker\Generator;
use PHPUnit\Framework\TestCase as BaseTestCase;
use ReflectionClass;

abstract class TestCase extends BaseTestCase
{
    protected static Generator $faker;

    /**
     * @template T
     * @template R
     *
     * @param class-string<T> $className
     * @param string          $methodName
     * @param R               $returnValue
     *
     * @return \PHPUnit\Framework\MockObject\MockObject|T
     */
    protected function makeStub($className, $methodName, $returnValue)
    {
        $stub = $this->createMock($className);
        $stub->method($methodName)
            ->willReturn($returnValue)
        ;

        return $stub;
    }

    /**
     * @template T
     *
     * @param class-string<T>|string $className
     */
    protected function reflectClass(string $className): ReflectionClass
    {
        return new ReflectionClass($className);
    }

    /**
     * @template T
     *
     * @param class-string<T>|string $className
     */
    protected function setVisibility(string $className, string $propertyName, bool $visibility)
    {
        $class = $this->reflectClass($className);
        $property = $class->getProperty($propertyName);
        $property->setAccessible($visibility);
    }

    /**
     * @template T
     *
     * @param T      $mock
     * @param string $methodName
     */
    protected function assertMethodCalled($mock, $methodName)
    {
        $mock->expects($this->once())
            ->method($methodName)
        ;
    }

    /**
     * @template T
     *
     * @param T      $mock
     * @param string $methodName
     */
    protected function assertMethodNotCalled($mock, $methodName)
    {
        $mock->expects($this->never())
            ->method($methodName)
        ;
    }
}
