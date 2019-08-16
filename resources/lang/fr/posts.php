<?php

return [

    'header'  => 'Des postes',
    'empty'   => [
        'description' => 'Aucun article n\'a été trouvé, commencez par',
        'action'      => 'ajouter un nouveau message',
    ],
    'search'  => [
        'input' => 'Chercher',
        'empty' => 'Aucun article ne correspond aux critères de recherche donnés.',
    ],
    'details' => [
        'published' => 'Publié',
        'draft'     => 'Brouillon',
        'updated'   => 'Mis à jour',
    ],
    'forms'   => [
        'editor'   => [
            'title'  => 'Titre',
            'body'   => 'Raconte ton histoire ...',
            'link'   => 'Coller ou saisir un lien ...',
            'html'   => [
                'label'       => 'HTML incorporé',
                'placeholder' => 'Collez votre code HTML ici',
            ],
            'images' => [
                'featured' => [
                    'title'       => 'Légende de l\'image principale',
                    'placeholder' => 'Ajouter une légende pour votre image',
                ],
                'picker'   => [
                    'greeting'    => 'S\'il vous plaît',
                    'action'      => 'télécharger',
                    'item'        => 'une image',
                    'operator'    => 'ou',
                    'unsplash'    => 'recherche Unsplash',
                    'key'         => 'Veuillez configurer votre clé API Unsplash.',
                    'placeholder' => 'Rechercher des photos haute résolution gratuites',
                    'clear'       => [
                        'action'      => 'Retirer',
                        'description' => 'l\'image sélectionnée',
                    ],
                    'caption'     => [
                        'by' => 'photo par',
                        'on' => 'sur',
                    ],
                    'search'      => [
                        'empty' => 'Nous n\'avons trouvé aucune correspondance.',
                    ],
                    'uploader'    => [
                        'label'   => 'Ajouter une image',
                        'caption' => [
                            'placeholder' => 'Tapez la légende pour l\'image (facultatif)',
                        ],
                        'layout'  => [
                            'default' => 'Mise en page par défaut',
                            'wide'    => 'Image large',
                        ],
                    ],
                ],
            ],
        ],
        'image'    => [
            'header' => 'L\'image sélectionnée',
        ],
        'publish'  => [
            'header'  => 'Date de publication (m/j/a h:m)',
            'subtext' => [
                'details'  => 'La planification des messages utilise un format horaire de 24 heures et utilise le',
                'timezone' => 'fuseau horaire',
            ],
        ],
        'seo'      => [
            'header'    => 'SEO & Social',
            'meta'      => 'Meta Description',
            'facebook'  => [
                'title'       => [
                    'label'       => 'Titre de l\'encart Facebook',
                    'placeholder' => 'Titre sur l\'encart Facebook',
                ],
                'description' => [
                    'label'       => 'Description de l\'encart Facebook',
                    'placeholder' => 'Description de l\'encart Facebook',
                ],
            ],
            'twitter'   => [
                'title'       => [
                    'label'       => 'Titre de l\'encart Twitter',
                    'placeholder' => 'Titre de l\'encart Twitter',
                ],
                'description' => [
                    'label'       => 'Description de l\'encart Twitter',
                    'placeholder' => 'Description de l\'encart Twitter',
                ],
            ],
            'canonical' => [
                'label'       => 'Canonique',
                'placeholder' => 'URL canonique de la source originale',
            ],
        ],
        'settings' => [
            'header'  => 'Réglages généraux',
            'slug'    => [
                'label'       => 'Limace',
                'placeholder' => 'une-limace-unique',
            ],
            'summary' => [
                'label'       => 'Résumé',
                'placeholder' => 'Un exemple de résumé...',
            ],
            'topic'   => [
                'label' => 'Sujet',
            ],
            'tags'    => [
                'label' => 'Mots clés',
            ],
        ],
    ],
    'delete'  => [
        'header'  => 'Effacer',
        'warning' => 'Les messages vont être supprimés définitivement. Êtes-vous sûr ?',
    ],

];
