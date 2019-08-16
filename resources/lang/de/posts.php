<?php

return [

    'header'  => 'Beiträge',
    'empty'   => [
        'description' => 'Es wurden keine Beiträge gefunden. Beginnen Sie mit',
        'action'      => 'Hinzufügen eines neuen Beitrags',
    ],
    'search'  => [
        'input' => 'Suche',
        'empty' => 'Keine Beiträge stimmen mit den angegebenen Suchkriterien überein.',
    ],
    'details' => [
        'published' => 'Veröffentlicht',
        'draft'     => 'Entwurf',
        'updated'   => 'Aktualisierte',
    ],
    'forms'   => [
        'editor'   => [
            'title'  => 'Titel',
            'body'   => 'Erzähl deine Geschichte...',
            'link'   => 'Einfügen oder einen Link eingeben...',
            'html'   => [
                'label'       => 'HTML einbetten',
                'placeholder' => 'Fügen Sie hier Ihren HTML-Code ein',
            ],
            'images' => [
                'featured' => [
                    'title'       => 'Empfohlene Bildunterschrift',
                    'placeholder' => 'Fügen Sie eine Beschriftung für Ihr Bild hinzu',
                ],
                'picker'   => [
                    'greeting'    => 'Bitte',
                    'action'      => 'hochladen',
                    'item'        => 'ein Bild',
                    'operator'    => 'oder',
                    'unsplash'    => 'suche Unsplash',
                    'key'         => 'Bitte konfigurieren Sie Ihren Unsplash API Key.',
                    'placeholder' => 'Suchen Sie nach hochauflösenden Fotos',
                    'clear'       => [
                        'action'      => 'Löschen',
                        'description' => 'das ausgewählte Bild',
                    ],
                    'caption'     => [
                        'by' => 'Foto von',
                        'on' => 'auf',
                    ],
                    'search'      => [
                        'empty' => 'Wir konnten keine Übereinstimmungen finden.',
                    ],
                    'uploader'    => [
                        'label'   => 'Bild hinzufügen',
                        'caption' => [
                            'placeholder' => 'Bildunterschrift eingeben (wahlweise)',
                        ],
                        'layout'  => [
                            'default' => 'Standardlayout',
                            'wide'    => 'Breites Bild',
                        ],
                    ],
                ],
            ],
        ],
        'image'    => [
            'header' => 'Empfohlenes Bild',
        ],
        'publish'  => [
            'header'  => 'Veröffentlichungsdatum (m/t/j h:m)',
            'subtext' => [
                'details'  => 'Die Nachplanung verwendet ein 24-Stunden-Zeitformat und verwendet die',
                'timezone' => 'zeitzone',
            ],
        ],
        'seo'      => [
            'header'    => 'SEO & Soziales',
            'meta'      => 'Meta-Beschreibung',
            'facebook'  => [
                'title'       => [
                    'label'       => 'Facebook-Kartentitel',
                    'placeholder' => 'Titel in der Facebook-Karte',
                ],
                'description' => [
                    'label'       => 'Facebook-Kartenbeschreibung',
                    'placeholder' => 'Beschreibung in der Facebook-Karte',
                ],
            ],
            'twitter'   => [
                'title'       => [
                    'label'       => 'Twitter-Kartentitel',
                    'placeholder' => 'Titel in der Twitter-Karte',
                ],
                'description' => [
                    'label'       => 'Twitter-Kartenbeschreibung',
                    'placeholder' => 'Beschreibung in Twitter Card',
                ],
            ],
            'canonical' => [
                'label'       => 'Kanonisch',
                'placeholder' => 'Kanonische URL der Originalquelle',
            ],
        ],
        'settings' => [
            'header'  => 'Allgemeine Einstellungen',
            'slug'    => [
                'label'       => 'Schnecke',
                'placeholder' => 'eine-einzigartige-schnecke',
            ],
            'summary' => [
                'label'       => 'Zusammenfassung',
                'placeholder' => 'Eine beschreibende Zusammenfassung..',
            ],
            'topic'   => [
                'label' => 'Thema',
            ],
            'tags'    => [
                'label' => 'Stichworte',
            ],
        ],
    ],
    'delete'  => [
        'header'  => 'Löschen',
        'warning' => 'Gelöschte Beiträge sind für immer verschwunden. Bist du sicher?',
    ],

];
