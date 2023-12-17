<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 2/19/21 .
 * Time: 10:40 PM .
 */

return [
    'admin' => [
        'top' =>
            [
                [
                    'name'  => 'Từ khoá',
                    'route' => 'get_backend.keyword.index'
                ],
                [
                    'name'  => 'Danh mục',
                    'route' => 'get_backend.category.index'
                ],
                [
                    'name'  => 'Ql hãng',
                    'route' => 'get_backend.manufacturer.index'
                ],
                [
                    'name'  => 'Sản phẩm',
                    'route' => 'get_backend.product.index'
                ],
                [
                    'name'  => 'Tag',
                    'route' => 'get_backend.tag.index'
                ],
                [
                    'name'  => 'Menu',
                    'route' => 'get_backend.menu.index'
                ],
                [
                    'name'  => 'Bài viết',
                    'route' => 'get_backend.article.index'
                ],
                [
                    'name'  => 'Thành viên',
                    'route' => 'get_backend.user.index'
                ],
                [
                    'name'  => 'Đơn hàng',
                    'route' => 'get_backend.transaction.index'
                ],
                [
                    'name'  => 'Slide',
                    'route' => 'get_backend.slide.index'
                ],

            ]
    ],
    'user'  => [
        [
            'name'  => 'Tổng quan',
            'route' => 'get_user.home',
            'icon'  => 'fa-th-large'
        ],
        [
            'name'  => 'Thông tin',
            'route' => 'get_user.profile',
            'icon'  => 'fa-user',
            'param' =>  true
        ],
        [
            'name'  => 'Đơn hàng',
            'route' => 'get_user.transaction.index',
            'icon'  => 'fa-cart-arrow-down'
        ]
    ]
];
