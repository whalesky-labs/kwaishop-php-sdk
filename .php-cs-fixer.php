<?php

declare(strict_types=1);

$header = <<<'EOF'
This file is part of KwaiShopSDK.

@link     https://github.com/whalesky-labs/kwaishop-php-sdk
@document https://github.com/whalesky-labs/kwaishop-php-sdk
@contact  westng
@license  https://github.com/whalesky-labs/kwaishop-php-sdk/blob/main/LICENSE
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
        'phpdoc_align' => ['align' => 'left'],
        'phpdoc_indent' => true,
        'phpdoc_line_span' => ['method' => 'single'],
        'phpdoc_no_empty_return' => true,
        'phpdoc_order' => true,
        'phpdoc_return_self_reference' => true,
        'phpdoc_scalar' => true,
        'phpdoc_separation' => true,
        'no_superfluous_phpdoc_tags' => true,
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'phpdoc_trim' => true,
        'phpdoc_trim_consecutive_blank_line_separation' => true,
        'phpdoc_types_order' => [
            'null_adjustment' => 'always_last',
            'sort_algorithm' => 'none',
        ],
        'single_quote' => true,
        'strict_param' => true,
    ])
    ->setFinder($finder);
