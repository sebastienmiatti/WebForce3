<?php

namespace AppBundle;

use cebe\markdown\GithubMarkdown;

class Demo {

    /**
    * @var GithubMarkdown
    */
    private $parser;

    public function __construct(GithubMarkdown $parser)
    {
        $this->parser = $parser;
    }

    public function hello (){
        return $this->parser->parse("**Salut**");
    }
}
