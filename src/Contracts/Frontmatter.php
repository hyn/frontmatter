<?php

namespace Hyn\Frontmatter\Contracts;

interface Frontmatter
{
    /**
     * Frontmatter constructor.
     * @param $contents
     */
    public function __construct($contents);

    /**
     * @return bool
     */
    public function hasMeta();

    /**
     * @return array
     */
    public function getMeta();

    /**
     * @return string
     */
    public function getContents();
}
