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

    /**
     * Undocumented function
     *
     * @dataProvider tagsProvider
     * @param [type] $input
     * @param [type] $expected
     * @return void
     */
    public function test_it_parse_tags($input, $expected)
    {
        $result = $this->parser->parse($input);

        $this->assertSame($expected, $result);
    }

    // Then we can get rid of all tests behind
    public function tagsProvider()
    {
        return [
            ['personal', ['personal']],
            ['personal, money, family', ['personal', 'money', 'family']],
            ['personal,money,family', ['personal', 'money', 'family']],
            ['personal | money | family', ['personal', 'money', 'family']],
            ['personal|money|family', ['personal', 'money', 'family']],
            ['personal!money!family', ['personal', 'money', 'family']],
        ];
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