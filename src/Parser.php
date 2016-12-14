<?php

namespace Hyn\Frontmatter;

use cebe\markdown\Parser as MarkdownParser;
use Hyn\Frontmatter\Frontmatters\JsonFrontmatter;

class Parser
{
    /**
     * @var MarkdownParser
     */
    protected $markdown;

    /**
     * @var Frontmatter
     */
    protected $frontmatter;

    public function __construct(MarkdownParser $markdown)
    {
        $this->markdown = $markdown;
    }

    /**
     * @param string $frontmatter
     * @return $this
     */
    public function setFrontmatter($frontmatter)
    {
        $this->frontmatter = $frontmatter;

        return $this;
    }

    /**
     * @param string $contents
     * @return array
     */
    public function parse($contents)
    {
        $frontmatter = $this->getFrontmatter($contents);

        if ($frontmatter->hasMeta()) {
            $meta = $frontmatter->getMeta();
            $contents = $frontmatter->getContents();
        } else {
            $meta = array();
        }

        return [
            'markdown' => $contents,
            'meta' => $meta,
            'html' => $this->markdown->parse($contents)
        ];
    }

    /**
     * @param string $contents
     * @return Frontmatter
     */
    protected function getFrontmatter($contents)
    {
        return $this->frontmatter ? new $this->frontmatter($contents) : new JsonFrontmatter($contents);
    }
}
