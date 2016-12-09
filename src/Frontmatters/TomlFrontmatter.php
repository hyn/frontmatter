<?php

namespace Hyn\Frontmatter\Frontmatters;

use Yosymfony\Toml\Toml;

class TomlFrontmatter extends Frontmatter
{
    const TOKEN = '+++';

    public function parseMeta()
    {
        $this->meta = Toml::parse($this->meta);
    }
}
