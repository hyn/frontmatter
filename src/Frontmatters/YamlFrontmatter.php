<?php

namespace Hyn\Frontmatter\Frontmatters;

use Symfony\Component\Yaml\Yaml;

class YamlFrontmatter extends Frontmatter
{
    const TOKEN = '---';

    public function parseMeta()
    {
        $this->meta = Yaml::parse($this->meta);
    }
}
