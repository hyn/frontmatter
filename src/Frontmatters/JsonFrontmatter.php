<?php

namespace Hyn\Frontmatter\Frontmatters;

class JsonFrontmatter extends Frontmatter
{
    const TOKEN = '{';
    const TOKEN_END = '}';
    const INCLUDE_TOKEN = true;

    public function parseMeta()
    {
        $this->meta = json_decode($this->meta, true);
    }
}
