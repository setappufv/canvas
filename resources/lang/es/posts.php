<?php

return [

    'header'  => 'Publicaciones',
    'empty'   => [
        'description' => 'No se encontraron publicaciones, comienza por',
        'action'      => 'añadiendo una nueva publicación',
    ],
    'search'  => [
        'input' => 'Buscar',
        'empty' => 'No hay publicaciones que coincidan con los criterios de búsqueda dados.',
    ],
    'details' => [
        'published' => 'Publicado',
        'draft'     => 'Borrador',
        'updated'   => 'Actualizado',
    ],
    'forms'   => [
        'editor'   => [
            'title'  => 'Título',
            'body'   => 'Cuenta tu historia ...',
            'link'   => 'Pega o escribe un enlace ...',
            'html'   => [
                'label'       => 'Incrustar HTML',
                'placeholder' => 'Pega tu HTML aquí',
            ],
            'images' => [
                'featured' => [
                    'title'       => 'Leyenda de imagen destacada',
                    'placeholder' => 'Añade un título para tu imagen',
                ],
                'picker'   => [
                    'greeting'    => 'Por favor',
                    'action'      => 'subir',
                    'item'        => 'una imagen',
                    'operator'    => 'o',
                    'unsplash'    => 'buscar Unsplash',
                    'key'         => 'Por favor, configure su clave API Unsplash.',
                    'placeholder' => 'Buscar fotos gratis de alta resolución',
                    'clear'       => [
                        'action'      => 'Retirar',
                        'description' => 'la imagen seleccionada',
                    ],
                    'caption'     => [
                        'by' => 'Foto por',
                        'on' => 'en',
                    ],
                    'search'      => [
                        'empty' => 'No pudimos encontrar ninguna coincidencia.',
                    ],
                    'uploader'    => [
                        'label'   => 'Añadir imagen',
                        'caption' => [
                            'placeholder' => 'Escriba el título de la imagen (opcional)',
                        ],
                        'layout'  => [
                            'default' => 'Diseño predeterminado',
                            'wide'    => 'Imagen amplia',
                        ],
                    ],
                ],
            ],
        ],
        'image'    => [
            'header' => 'Foto principal',
        ],
        'publish'  => [
            'header'  => 'Fecha de publicación (m/d/y h:m)',
            'subtext' => [
                'details'  => 'La programación posterior utiliza un formato de tiempo de 24 horas y está utilizando el',
                'timezone' => 'zona horaria',
            ],
        ],
        'seo'      => [
            'header'    => 'SEO y Social',
            'meta'      => 'Metadescripción',
            'facebook'  => [
                'title'       => [
                    'label'       => 'Título de la tarjeta de Facebook',
                    'placeholder' => 'Título en la tarjeta de Facebook',
                ],
                'description' => [
                    'label'       => 'Descripción de la tarjeta de Facebook',
                    'placeholder' => 'Descripción en la tarjeta de Facebook',
                ],
            ],
            'twitter'   => [
                'title'       => [
                    'label'       => 'Titulo de la tarjeta de Twitter',
                    'placeholder' => 'Título en la tarjeta de Twitter',
                ],
                'description' => [
                    'label'       => 'Descripción de la tarjeta de Twitter',
                    'placeholder' => 'Descripción en la tarjeta de Twitter',
                ],
            ],
            'canonical' => [
                'label'       => 'Canónico',
                'placeholder' => 'URL canónica de fuente original',
            ],
        ],
        'settings' => [
            'header'  => 'Configuración general',
            'slug'    => [
                'label'       => 'Etiqueta',
                'placeholder' => 'una-etiqueta-única',
            ],
            'summary' => [
                'label'       => 'Resumen',
                'placeholder' => 'Un resumen descriptivo.',
            ],
            'topic'   => [
                'label' => 'Tema',
            ],
            'tags'    => [
                'label' => 'Etiquetas',
            ],
        ],
    ],
    'delete'  => [
        'header'  => 'Borrar',
        'warning' => 'Las publicaciones eliminadas se irán para siempre. ¿Estás seguro?',
    ],

];
