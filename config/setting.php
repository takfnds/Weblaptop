<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 7/15/21 .
 * Time: 5:32 PM .
 */
return [
    'filter' => [
        'price' => [
            1 => 'Dưới 1 triệu',
            2 => ' 1 - 5 triệu',
            3 => ' 5 - 10 triệu',
            4 => ' 10 - 15 triệu',
            5 => ' 15 - 20 triệu',
            6 => ' trên 20 triệu',
        ],
        'price_extract' => [
            1 => [0, 1],
            2 => [1, 5],
            3 => [5, 10],
            4 => [10, 15],
            5 => [15, 20],
            6 => [20, 0],
        ]
    ]
];
