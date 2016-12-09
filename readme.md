# Frontmatter

[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/hyn/frontmatter/license.md)
[![Latest Stable Version](https://img.shields.io/packagist/v/hyn/frontmatter.svg)](https://github.com/hyn/frontmatter)
[![Build Status](https://img.shields.io/travis/hyn/frontmatter/master.svg?maxAge=2592000&style=flat-square)](https://travis-ci.org/hyn/frontmatter)
[![Total Downloads](https://img.shields.io/packagist/dt/hyn/frontmatter.svg)](https://github.com/hyn/frontmatter)
[![Donate](https://img.shields.io/badge/paypal-donate-yellow.svg)](https://paypal.me/luceos)

An easy package to parse any markdown file that includes some kind of meta data (commonly known as frontmatter).

## Installation

```shell
composer require hyn/frontmatter
```

## Usage

The easiest way is using inversion of control, but feel free to instantiate the class the way you see fit:

```php
$parser = new \Hyn\Frontmatter\Parser(new \cebe\markdown\Markdown);

// Uses json per default, but set specifically:
$parser->setFrontmatter(\Hyn\Frontmatter\Frontmatters\JsonFrontmatter::class);
// Use toml:
$parser->setFrontmatter(\Hyn\Frontmatter\Frontmatters\TomlFrontmatter::class);
// Or use yaml:
$parser->setFrontmatter(\Hyn\Frontmatter\Frontmatters\YamlFrontmatter::class);

// And parse the markdown file:
$contents = $parser->parse(file_get_contents('the-file.md'));
// Get meta
$meta = $parser->getMeta();
```

