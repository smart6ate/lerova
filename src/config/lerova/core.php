<?php

return [

    'version' => config('lerova.version', 'v1.1.11'),

    'meta' =>
        [
            'author' => config('lerova.meta.author', 'Lerova CMS'),
        ],

    'user' =>
        [
            'avatar' => config('lerova.user.avatar', 'https://www.gravatar.com/avatar/?s=500&d=mm'),
        ],


    'pages' =>
        [
            'type' => config('lerova.pages.type', 'website'),
            'language' => config('lerova.pages.language', 'de_DE'),
            'description' => config('lerova.pages.descritpion', 'Cupcake ipsum dolor sit amet bonbon sweet cupcake. Bonbon pudding marshmallow cupcake ice cream.'),
            'image' => config('lerova.pages.image', 'https://ucarecdn.com/ca56f6b0-c660-4628-b492-e6a968ae468e/'),

            'image_ratio' => config('lerova.pages.image_ratio', '4:3'),
            'image_shrink' => config('lerova.pages.image_shrink', '2500x2500'),

        ],


    'blog' =>
        [

            'language' => config('lerova.blog.language', 'de_DE'),
            'title_max' => config('lerova.blog.title_max', 60),
            'teaser_max' => config('lerova.blog.title_max', 300),

            'image_ratio' => config('lerova.blog.image_ratio', '4:3'),
            'image_shrink' => config('lerova.blog.image_shrink', '2500x2500'),

        ],


    'members' =>
        [
            'image_ratio' => config('lerova.members.image_ratio', ''),
            'image_shrink' => config('lerova.members.image_shrink', '2500x2500'),
        ],

    'about' =>
        [
            'image_ratio' => config('lerova.about.image_ratio', ''),
            'image_shrink' => config('lerova.about.image_shrink', '2500x2500'),

        ],


    'form' =>
        [
            'image_ratio' => config('lerova.form.image_ratio', ''),
            'image_shrink' => config('lerova.form.image_shrink', '2500x2500'),

        ],

    'imprint' =>
        [
            'image_ratio' => config('lerova.imprint.image_ratio', ''),
            'image_shrink' => config('lerova.imprint.image_shrink', '2500x2500'),

        ],

    'privacy' =>
        [
            'image_ratio' => config('lerova.privacy.image_ratio', ''),
            'image_shrink' => config('lerova.privacy.image_shrink', '2500x2500'),

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