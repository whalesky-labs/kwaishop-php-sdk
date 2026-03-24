<?php

declare(strict_types=1);

$header = <<<'EOF'
This file is part of KwaiShopSDK.

@link     https://github.com/westng/kwaishop-php-sdk
@document https://github.com/westng/kwaishop-php-sdk
@contact  westng
@license  https://github.com/westng/kwaishop-php-sdk/blob/main/LICENSE
EOF;

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->name('*.php');

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        'blank_line_after_opening_tag' => true,
        'declare_strict_types' => true,
        'header_comment' => [
            'comment_type' => 'PHPDoc',
            'header' => $header,
            'location' => 'after_declare_strict',
            'separate' => 'both',
        ],
        'no_closing_tag' => true,
        'no_superfluous_phpdoc_tags' => true,
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'single_quote' => true,
        'strict_param' => true,
    ])
    ->setFinder($finder);
