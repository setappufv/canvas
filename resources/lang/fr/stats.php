<?php

return [

    'header'  => 'Statistiques',
    'subtext' => 'Cliquez sur un des billets ci-dessous pour obtenir plus de détails.',
    'empty'   => 'Il n\'y a pas d\'articles publiés pour lesquels les statistiques sont consultables.',
    'views'   => 'Vue(s)',
    'chart'   => [
        'view'  => 'vue',
        'views' => 'Vues (30 jours)',
    ],
    'cards'   => [
        'views'      => [
            'title' => 'Vues (30 jours)',
        ],
        'posts'      => [
            'title' => 'Total des messages',
        ],
        'publishing' => [
            'title'   => 'Édition',
            'details' => [
                'published' => 'Publication(s) publiée(s)',
                'drafts'    => 'Brouillons)',
            ],
        ],
    ],
    'details' => [
        'created'   => 'Créé',
        'published' => 'Publié le',
        'views'     => 'Vues par source de traffic',
        'reading'   => [
            'header' => 'Moyenne du temps de lecture',
            'time'   => 'min',
            'read'   => 'lis',
        ],
        'empty'     => 'Attendre que votre message ait plus de vues avant de montrer ces idées.',
        'referer'   => [
            'other'   => 'Autre',
            'unknown' => 'Les affichages de publication de cette catégorie ne pouvaient pas déterminer de manière fiable un site de provenance i.e. Mode de navigation privée',
        ],
    ],

];
