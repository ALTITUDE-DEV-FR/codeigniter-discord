// For CI USERS, add the discord_helper.php in your app directory : app/Helpers/{here}
// For Standalone users, use function or adapt in your project Wordpress, Laravel or others.. | ex: discordMsg('msg', 'chanel') or $this->discordMsg('msg', 'chanel');

/*
* Simple Send : discordMsg('test', 'general');
* Markdown Send : discordMsg('``test``', 'general');
* Full Embed with customs fields : 
 discordEmbed(
        [
            'username'    => 'AndromedeCMS',
            'avatar_url'  => 'https://andromede-cms.com/medias/statics/large/2023-12/txoeclpf0jsz71mg7yph-16-paxtu_59524x-11656e18-39.webp',
            'tts'         => false,
            'file'        => '',
            'content'     => '',
            'embeds'  => [
                'title' => 'title',
                'type'  => 'rich',
                'description' => 'Your content',
                'url' => 'https://altitude-dev.com/fr',
                'timestamp' => date("c", strtotime("now")),
                'color' => hexdec( "3366ff" ),
                'footer' => [
                    'text'      => 'text footer',
                    'icon_url'  => 'https://andromede-cms.com/medias/statics/large/2023-12/txoeclpf0jsz71mg7yph-16-paxtu_59524x-11656e18-39.webp'
                ],
                'thumbnail' => 'https://andromede-cms.com/medias/statics/large/2023-12/txoeclpf0jsz71mg7yph-16-paxtu_59524x-11656e18-39.webp',
                'image'  => 'https://andromede-cms.com/medias/statics/large/2023-12/txoeclpf0jsz71mg7yph-16-paxtu_59524x-11656e18-39.webp',
                'author' => [
                    'authorName' => 'Altitude Dev',
                    'author_uri' => 'https://altitude-dev.com/fr'
                ],
                'fields' => [
                    [
                        "name" => "Field #1 Name",
                        "value" => "Field #1 Value",
                        "inline" => false
                    ],
                    [
                        "name" => "Field #2 Name",
                        "value" => "Field #2 Value",
                        "inline" => true
                    ]
                ]
            ]
        ],'general');
*/


/*
* USAGE EXEMPLE
* Send a full embed notification with 2 fields and icons, thumbnail and more.., dont need line ? use FALSE or ''
* in final line 'general' is the chanel where to send (in your file discord_helper.php, dont forget to copy and past your webhook uri from discordApp)
*/

discordEmbed(
[
    'username'    => 'AndromedeCMS',
    'avatar_url'  => 'https://andromede-cms.com/medias/statics/large/2023-12/txoeclpf0jsz71mg7yph-16-paxtu_59524x-11656e18-39.webp',
    'tts'         => false,
    'file'        => '',
    'content'     => '',
    'embeds'  => [
        'title' => 'title',
        'type'  => 'rich',
        'description' => 'Your content',
        'url' => 'https://altitude-dev.com/fr',
        'timestamp' => date("c", strtotime("now")),
        'color' => hexdec( "3366ff" ),
        'footer' => [
            'text'      => 'text footer',
            'icon_url'  => 'https://andromede-cms.com/medias/statics/large/2023-12/txoeclpf0jsz71mg7yph-16-paxtu_59524x-11656e18-39.webp'
        ],
        'thumbnail' => 'https://andromede-cms.com/medias/statics/large/2023-12/txoeclpf0jsz71mg7yph-16-paxtu_59524x-11656e18-39.webp',
        'image'  => 'https://andromede-cms.com/medias/statics/large/2023-12/txoeclpf0jsz71mg7yph-16-paxtu_59524x-11656e18-39.webp',
        'author' => [
            'authorName' => 'Altitude Dev',
            'author_uri' => 'https://altitude-dev.com/fr'
        ],
        'fields' => [
            [
                "name" => "Field #1 Name",
                "value" => "Field #1 Value",
                "inline" => false
            ],
            [
                "name" => "Field #2 Name",
                "value" => "Field #2 Value",
                "inline" => true
            ]
        ]
    ]
],'general');
