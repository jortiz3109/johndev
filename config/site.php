<?php
return [
    'title' => env('SITE_TITLE', 'Laravel'),
    'social' => [
        'github' => [
            'link' => env('SITE_SOCIAL_GITHUB_LINK'),
            'text' => env('SITE_SOCIAL_GITHUB_TEXT')
        ],
        'twitter' => [
            'link' => env('SITE_SOCIAL_TWITTER_LINK'),
            'text' => env('SITE_SOCIAL_TWITTER_TEXT')
        ],
        'linkedin' => [
            'link' => env('SITE_SOCIAL_LINKEDIN_LINK'),
            'text' => env('SITE_SOCIAL_LINKEDIN_TEXT')
        ],
    ]
];
