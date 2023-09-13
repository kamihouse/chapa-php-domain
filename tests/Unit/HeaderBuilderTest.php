<?php

declare(strict_types=1);

namespace Tests\Unit;

use ChapaPhp\Domain\Header;
use ChapaPhp\Domain\HeaderBuilder;
use ChapaPhp\Domain\HeaderKey;
use Tests\TestCase;

/**
 * @internal
 */
final class HeaderBuilderTest extends TestCase
{
    private HeaderBuilder $headerBuilder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->headerBuilder = new HeaderBuilder();
    }

    /**
     * @test
     */
    public function should_be_able_to_create_a_new_header_builder(): void
    {
        $this->assertInstanceOf(HeaderBuilder::class, $this->headerBuilder);
    }

    /**
     * @test
     */
    public function should_be_header_class_to_be_a_target_class(): void
    {
        $this->assertEquals(Header::class, $this->headerBuilder->targetType());
    }

    public static function headerProvider(): iterable
    {
        if (!isset(self::$faker)) {
            self::$faker = \Faker\Factory::create();
        }

        yield HeaderKey::ID->value => [
            'key' => HeaderKey::ID,
            'value' => self::$faker->uuid,
        ];

        yield HeaderKey::CATEGORY->value => [
            'key' => HeaderKey::CATEGORY,
            'value' => self::$faker->word,
        ];

        yield HeaderKey::TYPE->value => [
            'key' => HeaderKey::TYPE,
            'value' => self::$faker->word,
        ];

        yield HeaderKey::VERSION->value => [
            'key' => HeaderKey::VERSION,
            'value' => self::$faker->word,
        ];

        yield HeaderKey::SCHEMA->value => [
            'key' => HeaderKey::SCHEMA,
            'value' => self::$faker->word,
        ];
    }

    /**
     * @test
     *
     * @dataProvider headerProvider
     */
    public function should_be_able_to_build_a_header(HeaderKey $key, string $value): void
    {
        $header = $this->headerBuilder
            ->withKey($key)
            ->withValue($value)
            ->build()
        ;
        $this->assertEquals($key, $header->key());
        $this->assertEquals($value, $header->value());
    }
}
