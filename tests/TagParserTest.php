<?php

namespace Tests;

use App\TagParser;
use PHPUnit\Framework\TestCase;


class TagParserTest extends TestCase
{
    public function test_it_parses_a_comma_separated_list_of_tags()
    {
        $parser = new TagParser;

        $result = $parser->parse('personal');
        $expected = ['personal'];

        $this->assertSame($expected, $result);

    }
}