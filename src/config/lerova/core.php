<?php

return [

    'version' => config('lerova.version', 'v1.1.0'),

    'meta' =>
        [
            'author' => config('lerova.meta.author', 'smartgate AG'),
        ],

    'user' =>
        [
            'avatar' => config('lerova.user.avatar', 'https://www.gravatar.com/avatar/?s=500&d=mm'),
        ],

    'modules' =>
        [
            'blog' => config('lerova.modules.blog', false),
            'gallery' => config('lerova.modules.gallery', false),
            'about' => config('lerova.modules.about', false),
            'members' => config('lerova.modules.members', false),
            'notifications' => config('lerova.modules.notifications', false),
        ],

    'settings' =>
        [
            'general' => config('lerova.settings.general', false),
            'company' => config('lerova.settings.company', false),
            'contact_form' => config('lerova.settings.contact_form', false),

            'pages' => config('lerova.settings.pages', false),
            'metadata' => config('lerova.settings.metadata', false),

            'social_medias' => config('lerova.settings.social_medias', false),
            'links' => config('lerova.settings.links', false),

            'legal' => config('lerova.settings.legal', false),
            'imprint' => config('lerova.settings.imprint', false),
            'privacy' => config('lerova.settings.privacy', false),
        ],

    'pages' =>
    [
        'type' => config('lerova.pages.type', 'website'),
        'language' => config('lerova.pages.language', 'de_DE'),
        'description' => config('lerova.pages.descritpion', 'Cupcake ipsum dolor sit amet bonbon sweet cupcake. Bonbon pudding marshmallow cupcake ice cream.'),
        'image' => config('lerova.pages.image', 'https://ucarecdn.com/ca56f6b0-c660-4628-b492-e6a968ae468e/'),
    ],


    'blog' =>
        [
            'language' => config('lerova.blog.language', 'de_DE'),
            'title_max' => config('lerova.blog.title_max', 60),
            'teaser_max' => config('lerova.blog.title_max', 300),
        ],


    'uploadcare' =>
        [
            'image_ratio' => config('lerova.uploadcare.image_ratio', '4:3'),
            'image_shrink' => config('lerova.uploadcare.image_shrink', '2500x2500'),
        ],


    'imperavi' => [

        'alignment' => config('lerova.imperavi.alignment', ''),
        'clips' => config('lerova.imperavi.clips', ''),
        'fontcolor' => config('lerova.imperavi.fontcolor', ''),
        'fontfamily' => config('lerova.imperavi.fontfamily', ''),
        'fontsize' => config('lerova.imperavi.fontsize', ''),
        'fullscreen' => config('lerova.imperavi.fullscreen', ''),
        'inlinestyle' => config('lerova.imperavi.inlinestyle', ''),
        'properties' => config('lerova.imperavi.properties', ''),
        'source' => config('lerova.imperavi.source', ''),
        'table' => config('lerova.imperavi.table', ''),
        'uploadcare' => config('lerova.imperavi.uploadcare', ''),
        'imagemanager' => config('lerova.imperavi.imagemanager', ''),
    ],

];