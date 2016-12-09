<?php

namespace Hyn\Frontmatter\Tests;

use Hyn\Frontmatter\Frontmatters\JsonFrontmatter;

class JsonTest extends TestCase
{
    protected $frontmatter = JsonFrontmatter::class;
    protected $file = __DIR__ . '/files/json.md';
}
