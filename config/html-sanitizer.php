<?php
return [
    'extensions' => ['basic', 'code', 'image', 'list', 'table', 'iframe', 'details', 'extra'],
    'tags' => [
        'a' => ['allowed_hosts' => null, 'allow_mailto' => false],
        'img' => ['allowed_hosts' => null, 'allow_data_uri' => true],
        'iframe' => ['allowed_hosts' => ['youtube.com']],
        'code' => ['allowed_attributes' => ['class']],
    ],
];
