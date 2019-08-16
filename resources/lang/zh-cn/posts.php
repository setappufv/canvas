<?php

return [

    'header'  => '帖子',
    'empty'   => [
        'description' => '沒有找到帖子，從頭開始',
        'action'      => '添加新帖子',
    ],
    'search'  => [
        'input' => '搜索',
        'empty' => '沒有帖子符合給定的搜索條件。',
    ],
    'details' => [
        'published' => '發布時間',
        'draft'     => '草案',
        'updated'   => '更新',
    ],
    'forms'   => [
        'editor'   => [
            'title'  => '標題',
            'body'   => '講述你的故事......',
            'link'   => '粘貼或輸入鏈接...',
            'html'   => [
                'label'       => '嵌入HTML',
                'placeholder' => '將HTML粘貼到此處',
            ],
            'images' => [
                'featured' => [
                    'title'       => '特色圖片說明',
                    'placeholder' => '為圖片添加標題',
                ],
                'picker'   => [
                    'greeting'    => '請',
                    'action'      => '上載',
                    'item'        => '一個圖像',
                    'operator'    => '要么',
                    'unsplash'    => '搜索Unsplash',
                    'key'         => '請配置您的Unsplash API密鑰。',
                    'placeholder' => '搜索免費的高分辨率照片',
                    'clear'       => [
                        'action'      => '去掉',
                        'description' => '选定的图像',
                    ],
                    'caption'     => [
                        'by' => '拍攝者',
                        'on' => '上',
                    ],
                    'search'      => [
                        'empty' => '我們找不到任何匹配項。',
                    ],
                    'uploader'    => [
                        'label'   => '添加圖片',
                        'caption' => [
                            'placeholder' => '為圖像鍵入標題（可選）',
                        ],
                        'layout'  => [
                            'default' => '默認佈局',
                            'wide'    => '寬圖像',
                        ],
                    ],
                ],
            ],
        ],
        'image'    => [
            'header' => '特色圖片',
        ],
        'publish'  => [
            'header'  => '發布日期（m/d/y h：m）',
            'subtext' => [
                'details'  => '郵政安排使用24小時時間格式並正在使用',
                'timezone' => '時區',
            ],
        ],
        'seo'      => [
            'header'    => 'SEO和社交',
            'meta'      => '元描述',
            'facebook'  => [
                'title'       => [
                    'label'       => '',
                    'placeholder' => 'Facebook Card的標題',
                ],
                'description' => [
                    'label'       => 'Facebook卡描述',
                    'placeholder' => 'Facebook Card中的描述',
                ],
            ],
            'twitter'   => [
                'title'       => [
                    'label'       => 'Twitter卡片標題',
                    'placeholder' => 'Twitter卡片中的標題',
                ],
                'description' => [
                    'label'       => 'Twitter卡描述',
                    'placeholder' => 'Twitter卡中的描述',
                ],
            ],
            'canonical' => [
                'label'       => '典范',
                'placeholder' => '原始来源的规范URL',
            ],
        ],
        'settings' => [
            'header'  => '常規設置',
            'slug'    => [
                'label'       => '金屬塊',
                'placeholder' => '一個唯一的，蛞蝓',
            ],
            'summary' => [
                'label'       => '摘要',
                'placeholder' => '描述性摘要..',
            ],
            'topic'   => [
                'label' => '話題',
            ],
            'tags'    => [
                'label' => '標籤',
            ],
        ],
    ],
    'delete'  => [
        'header'  => '刪除',
        'warning' => '刪除的帖子永遠消失了。你確定嗎？',
    ],

];
