<?php

namespace Hyn\Frontmatter\Tests;

use Hyn\Frontmatter\Frontmatters\YamlFrontmatter;

class YamlTest extends TestCase
{
    protected $frontmatter = YamlFrontmatter::class;
    protected $file = __DIR__ . '/files/yaml.md';
}
