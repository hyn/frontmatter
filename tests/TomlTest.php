<?php

namespace Hyn\Frontmatter\Tests;

use Hyn\Frontmatter\Frontmatters\TomlFrontmatter;

class TomlTest extends TestCase
{
    protected $frontmatter = TomlFrontmatter::class;
    protected $file = __DIR__ . '/files/toml.md';
}
