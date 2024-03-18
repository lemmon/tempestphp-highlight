<?php

declare(strict_types=1);

namespace Tempest\Highlight\Languages\Php\Patterns;

use Tempest\Highlight\IsPattern;
use Tempest\Highlight\Pattern;
use Tempest\Highlight\PatternTest;
use Tempest\Highlight\Tokens\TokenType;

#[PatternTest(
    input: 'return "hello"',
    output: 'hello',
)]

#[PatternTest(
    input: 'return "hello
    
    world"',
    output: 'hello
    
    world',
)]
final readonly class DoubleQuoteValuePattern implements Pattern
{
    use IsPattern;

    public function getPattern(): string
    {
        return '"(?<match>(\n|.)*?)"';
    }

    public function getTokenType(): TokenType
    {
        return TokenType::VALUE;
    }
}