<?php

namespace Tests;

use App\TagParser;
use PHPUnit\Framework\TestCase;


class TagParserTest extends TestCase
{
    protected function setUp(): void
    {
        $this->parser = new TagParser();
    }

    public function test_it_parses_a_single_tag()
    {
        // Arrange (Given)
        // $parser = new TagParser;

        // Act (When)
        $result = $this->parser->parse('personal');
        $expected = ['personal'];

        // Assert (Equal)
        $this->assertSame($expected, $result);

    }

    public function test_it_parses_a_comma_separated_list_of_tag()
    {
        $result = $this->parser->parse('personal, money, family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($expected, $result);
    }

    public function test_it_parses_a_pipe_separated_list_of_tag()
    {
        $result = $this->parser->parse('personal | money | family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($expected, $result);
    }
    
    public function test_spaces_are_optional()
    {
         $result = $this->parser->parse('personal,money,family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($expected, $result);

        $result = $this->parser->parse('personal|money|family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($expected, $result);
    }

}