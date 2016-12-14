<?php

namespace Hyn\Frontmatter\Tests;

use cebe\markdown\Markdown;
use Hyn\Contracts\Frontmatter;
use Hyn\Frontmatter\Parser;
use PHPUnit\Framework\TestCase as Test;

abstract class TestCase extends Test
{
    /**
     * @var Frontmatter
     */
    protected $frontmatter;

    /**
     * @var Parser
     */
    protected $parser;

    /**
     * @var string
     */
    protected $file;

    /**
     * @var string
     */
    protected $contents;

    protected function setUp()
    {
        parent::setUp();

        $this->parser = new Parser(new Markdown());

        if ($this->frontmatter) {
            $this->parser->setFrontmatter($this->frontmatter);
        }

        if ($this->file && file_exists($this->file)) {
            $this->contents = $this->parser->parse(file_get_contents($this->file));
        }
    }

    /**
     * @test
     */
    public function can_find_content()
    {
        $this->assertEquals("<p>content</p>\n", $this->contents['html']);
    }

    /**
     * @test
     */
    public function can_find_meta()
    {
        $this->assertEquals(basename($this->file), $this->contents['meta']['name']);
    }
}
