<?php

namespace Application\services\Printer;

class MarkdownParser extends MarkdownContract
{
    protected $parser;

    public function __construct()
    {
        $this->parser = new Parsedown();
    }

    public function parse($text): string
    {
        $this->parser->setSafeMode(true); // 转入不信任的输入，避免 XSS 攻击
        return $this->parser->text($text);
    }
}
