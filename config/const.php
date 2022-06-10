<?php

    return [

        'FRONT' => [
            'LIST_PER_PAGE' => 20,
        ],
        'ADMIN' => [
            'LIST_PER_PAGE' => 10,
        ],

        'DELETE_FLG_OFF' => 0,
        'DELETE_FLG_ON' => 1,

        'PICKUP_NO_AUTHER' => 9999,
        'PICKUP_NO_CATEGORY' => 9999,

        'ARTICLE' => [
            'ARTICLE_STATUS' => [
                'BLOG_WRITING' => 0,
                'BLOG_PRIVATE' => 1,
                'BLOG_RELEASE' => 2,
                'NEWS_PRIVATE' => 3,
                'NEWS_RELEASE' => 4,
            ],
        ],
        
        'AUTHER' => [
            'STATUS_NAME' => [
                0 => '公開中',
                1 => '非公開',
                2 => '準備中',
            ],

            'STATUS' => [
                'RELEASE' => 0,
                'PRIVATE' => 1,
                'COMING_SOON' => 2,
            ],
        ],
        
        'CATEGORY' => [
            'STATUS_NAME' => [
                0 => '公開中',
                1 => '非公開',
                2 => '準備中',
            ],

            'STATUS' => [
                'RELEASE' => 0,
                'PRIVATE' => 1,
                'COMING_SOON' => 2,
            ],
        ],
    ]

?>