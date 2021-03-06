<?php

$finder = Symfony\Component\Finder\Finder::create()
    ->in([
        __DIR__ . '/app',
        __DIR__ . '/tests',
    ])
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR2'                               => true,
        'array_syntax'                        => ['syntax' => 'short'],
        'ordered_imports'                     => ['sort_algorithm' => 'alpha'],
        'no_unused_imports'                   => true,
        'no_whitespace_before_comma_in_array' => true,
        'not_operator_with_successor_space'   => true,
        'trailing_comma_in_multiline'         => true,
        'phpdoc_scalar'                       => true,
        'unary_operator_spaces'               => true,
        'binary_operator_spaces'              => [
            'operators' => [
                '=>' => 'align_single_space_minimal',
            ],
        ],
        'blank_line_before_statement'         => [
            'statements' => ['continue', 'declare', 'return', 'throw', 'try'],
        ],
        'phpdoc_separation'                   => true,
        'phpdoc_align'                        => true,
        'phpdoc_order'                        => true,
        'phpdoc_single_line_var_spacing'      => true,
        'phpdoc_var_without_name'             => true,
        'class_attributes_separation'         => [
            'elements' => [
                'method'  => 'one',
            ],
        ],
        'method_argument_space'               => [
            'keep_multiple_spaces_after_comma' => true,
        ],
        'trim_array_spaces'                   => true,
    ])
    ->setFinder($finder);
