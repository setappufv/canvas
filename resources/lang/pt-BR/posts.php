<?php

return [

    'header'  => 'Postagens',
    'empty'   => [
        'description' => 'Nenhuma postagem foi encontrada, comece por',
        'action'      => 'adicionando uma nova postagem',
    ],
    'search'  => [
        'input' => 'Procurar',
        'empty' => 'Nenhuma postagem corresponde aos critérios de pesquisa fornecidos.',
    ],
    'details' => [
        'published' => 'Publicados',
        'draft'     => 'Esboço, projeto',
        'updated'   => 'Atualizado',
    ],
    'forms'   => [
        'editor'   => [
            'title'  => 'Título',
            'body'   => 'Conte sua história ...',
            'link'   => 'Cole ou digite um link ...',
            'html'   => [
                'label'       => 'Incorporar HTML',
                'placeholder' => 'Cole seu HTML aqui',
            ],
            'images' => [
                'featured' => [
                    'title'       => 'Legenda da imagem em destaque',
                    'placeholder' => 'Adicione uma legenda para sua imagem',
                ],
                'picker'   => [
                    'greeting'    => 'Por favor',
                    'action'      => 'Envio',
                    'item'        => 'uma imagem',
                    'operator'    => 'ou',
                    'unsplash'    => 'pesquisa Unsplash',
                    'key'         => 'Por favor, configure sua chave de API Unsplash.',
                    'placeholder' => 'Pesquise fotos de alta resolução gratuitas',
                    'clear'       => [
                        'action'      => 'Remover',
                        'description' => 'a imagem selecionada',
                    ],
                    'caption'     => [
                        'by' => 'foto por',
                        'on' => 'em',
                    ],
                    'search'      => [
                        'empty' => 'Não foi possível encontrar correspondências.',
                    ],
                    'uploader'    => [
                        'label'   => 'Adicionar imagem',
                        'caption' => [
                            'placeholder' => 'Digite legenda para imagem (opcional)',
                        ],
                        'layout'  => [
                            'default' => 'Layout padrão',
                            'wide'    => 'Imagem ampla',
                        ],
                    ],
                ],
            ],
        ],
        'image'    => [
            'header' => 'Imagem em destaque',
        ],
        'publish'  => [
            'header'  => 'Data de publicação (m/d/a h:m)',
            'subtext' => [
                'details'  => 'O agendamento de postagem usa um formato de horário de 24 horas e está utilizando',
                'timezone' => 'fuso horário',
            ],
        ],
        'seo'      => [
            'header'    => 'SEO e social',
            'meta'      => 'Meta Descrição',
            'facebook'  => [
                'title'       => [
                    'label'       => 'Título do cartão do Facebook',
                    'placeholder' => 'Título no cartão do Facebook',
                ],
                'description' => [
                    'label'       => 'Descrição do cartão do Facebook',
                    'placeholder' => 'Descrição no cartão do Facebook',
                ],
            ],
            'twitter'   => [
                'title'       => [
                    'label'       => 'Título do cartão do Twitter',
                    'placeholder' => 'Título no Twitter Card',
                ],
                'description' => [
                    'label'       => 'Descrição do cartão do Twitter',
                    'placeholder' => 'Descrição no Twitter Card',
                ],
            ],
            'canonical' => [
                'label'       => 'Canônico',
                'placeholder' => 'URL canônico da fonte original',
            ],
        ],
        'settings' => [
            'header'  => 'Configurações Gerais',
            'slug'    => [
                'label'       => 'Lesma',
                'placeholder' => 'uma-lesma-única',
            ],
            'summary' => [
                'label'       => 'Resumo',
                'placeholder' => 'Um resumo descritivo ..',
            ],
            'topic'   => [
                'label' => 'Tópico',
            ],
            'tags'    => [
                'label' => 'Tag',
            ],
        ],
    ],
    'delete'  => [
        'header'  => 'Excluir',
        'warning' => 'As postagens excluídas se foram para sempre. Você tem certeza?',
    ],

];
