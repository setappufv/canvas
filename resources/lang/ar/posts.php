<?php

return [

    'header'  => 'المشاركات',
    'empty'   => [
        'description' => 'لم يتم العثور على مشاركات ، ابدأ من قبل',
        'action'      => 'إضافة منشور جديد',
    ],
    'search'  => [
        'input' => 'بحث',
        'empty' => 'لا توجد مشاركات مطابقة لمعايير البحث المحددة.',
    ],
    'details' => [
        'published' => 'نشرت',
        'draft'     => 'مشروع',
        'updated'   => 'محدث',
    ],
    'forms'   => [
        'editor'   => [
            'title'  => 'عنوان',
            'body'   => 'اروي قصتك...',
            'link'   => 'الصق أو اكتب الرابط ...',
            'html'   => [
                'label'       => 'تضمين HTML',
                'placeholder' => 'لصق HTML الخاص بك هنا',
            ],
            'images' => [
                'featured' => [
                    'title'       => 'صورة مميزة توضيحية',
                    'placeholder' => 'إضافة تعليق لصورتك',
                ],
                'picker'   => [
                    'greeting'    => 'رجاء',
                    'action'      => 'رفع',
                    'item'        => 'صورة',
                    'operator'    => 'أو',
                    'unsplash'    => 'البحث Unsplash',
                    'key'         => 'يرجى تكوين مفتاح API Unsplash.',
                    'placeholder' => 'ابحث عن صور عالية الدقة مجانًا',
                    'clear'       => [
                        'action'      => 'إزالة',
                        'description' => 'الصورة المحددة',
                    ],
                    'caption'     => [
                        'by' => 'الصورة من تصوير',
                        'on' => 'على',
                    ],
                    'search'      => [
                        'empty' => 'لم نتمكن من العثور على أي مباريات.',
                    ],
                    'uploader'    => [
                        'label'   => 'إضافة صورة',
                        'caption' => [
                            'placeholder' => 'اكتب التسمية التوضيحية للصورة (اختياري)',
                        ],
                        'layout'  => [
                            'default' => 'التخطيط الافتراضي',
                            'wide'    => 'صورة واسعة',
                        ],
                    ],
                ],
            ],
        ],
        'image'    => [
            'header' => 'صورة مميزة',
        ],
        'publish'  => [
            'header'  => 'تاريخ النشر (م / د / س: م)',
            'subtext' => [
                'details'  => 'آخر جدولة يستخدم تنسيق الوقت لمدة 24 ساعة ويستخدم',
                'timezone' => 'وحدة زمنية',
            ],
        ],
        'seo'      => [
            'header'    => 'كبار المسئولين الاقتصاديين والاجتماعية',
            'meta'      => 'ميتا الوصف',
            'facebook'  => [
                'title'       => [
                    'label'       => 'عنوان بطاقة فيسبوك',
                    'placeholder' => 'العنوان في بطاقة فيسبوك',
                ],
                'description' => [
                    'label'       => 'وصف بطاقة فيسبوك',
                    'placeholder' => 'الوصف في الفيسبوك بطاقة',
                ],
            ],
            'twitter'   => [
                'title'       => [
                    'label'       => 'عنوان بطاقة تويتر',
                    'placeholder' => 'العنوان في بطاقة تويتر',
                ],
                'description' => [
                    'label'       => 'وصف بطاقة تويتر',
                    'placeholder' => 'الوصف في بطاقة تويتر',
                ],
            ],
            'canonical' => [
                'label'       => 'العنوان الأساسي',
                'placeholder' => 'URL الكنسي من المصدر الأصلي',
            ],
        ],
        'settings' => [
            'header'  => 'الاعدادات العامة',
            'slug'    => [
                'label'       => 'سبيكة',
                'placeholder' => 'على بعد فريدة من نوعها سبيكة',
            ],
            'summary' => [
                'label'       => 'ملخص',
                'placeholder' => 'ملخص وصفي ..',
            ],
            'topic'   => [
                'label' => 'موضوع',
            ],
            'tags'    => [
                'label' => 'الكلمات',
            ],
        ],
    ],
    'delete'  => [
        'header'  => 'حذف',
        'warning' => 'اختفت المشاركات المحذوفة إلى الأبد. هل أنت واثق؟',
    ],

];
