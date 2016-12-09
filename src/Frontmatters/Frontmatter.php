<?php

namespace Hyn\Frontmatter\Frontmatters;

use Hyn\Frontmatter\Contracts\Frontmatter as Contract;

abstract class Frontmatter implements Contract
{
    const TOKEN = null;
    const TOKEN_END = null;
    const INCLUDE_TOKEN = false;

    /**
     * @var array|bool
     */
    protected $meta;

    /**
     * @var string
     */
    protected $contents;

    /**
     * Frontmatter constructor.
     * @param string $contents
     */
    public function __construct($contents)
    {
        $this->contents = (string)$contents;

        if (static::TOKEN) {
            $this->getRawTokenMeta();
        }

        $this->parseMeta();
    }

    public function getMeta()
    {
        return $this->meta;
    }

    public function hasMeta()
    {
        return $this->meta !== false;
    }

    abstract public function parseMeta();

    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @return bool
     */
    protected function getRawTokenMeta()
    {
        $this->meta = false;

        $rawMeta = array();

        $contents = explode("\n", $this->contents);

        $tokenStart = static::TOKEN;
        $tokenEnd = static::TOKEN_END ? static::TOKEN_END : static::TOKEN;

        foreach($contents as $i => $line) {
            if ($i == 0 && strncmp($line, $tokenStart, strlen($tokenStart)) !== 0) {
                return;
            }

            $rawMeta[] = $line;
            unset($contents[$i]);

            if ($i > 0 && strncmp($line, $tokenEnd, strlen($tokenEnd)) === 0) {
                break;
            }
        }

        if (!static::INCLUDE_TOKEN) {
            array_pop($rawMeta);
            array_shift($rawMeta);
        }

        $this->contents = implode("\n", $contents);

        $this->meta = implode("\n", $rawMeta);
    }
}
