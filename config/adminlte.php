<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '<b>Admin</b>LTE',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#661-authentication-views-classes
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#662-admin-panel-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#67-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#68-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#69-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'admin/home',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#610-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#611-menu
    |
    */

    'menu' => [
        [
            'text' => 'blog',
            'url' => 'admin/blog',
            'can' => 'manage-blog',
        ],
        [
            'text' => 'Quiz',
            'icon' => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'Package Type',
                    'url' => 'admin/package-types',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Travel Purpose',
                    'url' => 'admin/travel-purposes',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Personal Style',
                    'url' => 'admin/personal-style',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Styled',
                    'url' => 'admin/styled',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Body type',
                    'url' => 'admin/body-type',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Sizing guides',
                    'url' => 'admin/sizing-guides',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Sizing type',
                    'url' => 'admin/sizing-type',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Sizing categories',
                    'url' => 'admin/sizing-categories',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Costs',
                    'url' => 'admin/costs',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Clothes categories',
                    'url' => 'admin/clothes-categories',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
            ],
        ],
        [
            'text' => 'Orders',
            'icon' => 'fas fa-fw fa-list',
            'submenu' => [
                [
                    'text' => 'Partnership',
                    'url' => 'admin/partnerships',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Orders',
                    'url' => 'admin/orders',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Contact Form',
                    'url' => 'admin/contact-form',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Q&A Form',
                    'url' => 'admin/qa-forms',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Subscribes',
                    'url' => 'admin/subscribes',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
//                [
//                    'text'        => 'Complains',
//                    'url'         => 'admin/complains',
//                    'icon'        => 'far fa-fw fa-circle nav-icon',
//                ],
                [
                    'text' => 'Beta Form',
                    'url' => 'admin/beta-forms',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Join Club Form',
                    'url' => 'admin/join-club',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
            ],
        ],
        [
            'text' => 'Show room',
            'icon' => 'fas fa-fw fa-list',
            'submenu' => [
                [
                    'text' => 'Show Room',
                    'url' => 'admin/collections',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Show Room Product',
                    'url' => 'admin/show-room-products',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Show Room Likes',
                    'url' => 'admin/show-room-like',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
            ],
        ],
        [
            'text' => 'Products',
            'icon' => 'fas fa-fw fa-list',
            'submenu' => [
                [
                    'text' => 'Products Category',
                    'url' => 'admin/product-categories',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Products',
                    'url' => 'admin/products',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
            ],
        ],
        [
            'text' => 'Travel Stories',
            'icon' => 'fas fa-fw fa-list',
            'submenu' => [
                [
                    'text' => 'Travel Stories',
                    'url' => 'admin/travel-stories',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Story style',
                    'url' => 'admin/story-styles',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
            ],
        ],
        [
            'text' => 'Settings',
            'icon' => 'fas fa-fw fa-list',
            'submenu' => [
                [
                    'text' => 'Genders',
                    'url' => 'admin/genders',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Cities',
                    'url' => 'admin/cities',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Colors',
                    'url' => 'admin/colors',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Sizes',
                    'url' => 'admin/sizing',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Box',
                    'url' => 'admin/boxs',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Founders',
                    'url' => 'admin/founders',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Documents',
                    'url' => 'admin/documents',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
            ],
        ],
//        [
//            'text'        => 'Complain Types',
//            'url'         => 'admin/complain-types',
//            'icon'        => 'fas fa-fw fa-angry',
//        ],
        [
            'text' => 'Shopping page',
            'icon' => 'fas fa-fw fa-list',
            'submenu' => [
                [
                    'text' => 'Destination',
                    'url' => 'admin/destinations',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Destination Story',
                    'url' => 'admin/destination-stories',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Sub Destination',
                    'url' => 'admin/sub-destinations',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
            ],
        ],
        [
            'text' => 'Q&A',
            'url' => 'admin/qas',
            'icon' => 'fas fa-fw fa-question',
        ],
        [
            'text' => 'Countries',
            'url' => 'admin/countries',
            'icon' => 'fas fa-fw fa-globe',
        ],
        [
            'text' => 'Boutiques',
            'url' => 'admin/boutiques',
            'icon' => 'fas fa-fw fa-globe',
        ],
        [
            'text' => 'Home page Settings',
            'url' => 'admin/web-settings',
            'icon' => 'far fa-fw fa-user',
        ],
        [
            'text' => 'Preferences',
            'icon' => 'fas fa-fw fa-list',
            'submenu' => [
                [
                    'text' => 'Measurement',
                    'url' => 'admin/measurements',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
                [
                    'text' => 'Age',
                    'url' => 'admin/ages',
                    'icon' => 'far fa-fw fa-circle nav-icon',
                ],
//                [
//                    'text' => 'Feet',
//                    'url' => 'admin/feets',
//                    'icon' => 'far fa-fw fa-circle nav-icon',
//                ],
                [
                    'text' => 'Height',
                    'icon' => 'fas fa-fw fa-list',
                    'submenu' => [
                        [
                            'text' => 'Heights',
                            'url' => 'admin/heights',
                            'icon' => 'far fa-fw fa-circle nav-icon',
                        ],
                    ],
                    ]
                ],
            ],
            [
                'text' => 'Users',
                'icon' => 'fas fa-fw fa-list',
                'submenu' => [
                    [
                        'text' => 'Users',
                        'url' => 'admin/users',
                        'icon' => 'far fa-fw fa-circle nav-icon',
                    ],
                    [
                        'text' => 'User Address',
                        'url' => 'admin/user-address',
                        'icon' => 'far fa-fw fa-circle nav-icon',
                    ],
                    [
                        'text' => 'User Preference',
                        'url' => 'admin/user-settings',
                        'icon' => 'far fa-fw fa-circle nav-icon',
                    ],
                ],
            ],
            ['header' => 'account_settings'],
            [
                'text' => 'profile',
                'url' => 'admin/profile',
                'icon' => 'fas fa-fw fa-user',
            ],
            [
                'text' => 'change_password',
                'url' => 'admin/edit-profile',
                'icon' => 'fas fa-fw fa-lock',
            ],
            [
                'text' => 'Logout',
                'url' => 'admin/logout',
                'icon' => 'fas fa-fw fa-power-off',
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Menu Filters
        |--------------------------------------------------------------------------
        |
        | Here we can modify the menu filters of the admin panel.
        |
        | For more detailed instructions you can look here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/#612-menu-filters
        |
        */

        'filters' => [
            JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
            JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
            JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
            JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
            JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
            JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
            JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
        ],

        /*
        |--------------------------------------------------------------------------
        | Plugins Initialization
        |--------------------------------------------------------------------------
        |
        | Here we can modify the plugins used inside the admin panel.
        |
        | For more detailed instructions you can look here:
        | https://github.com/jeroennoten/Laravel-AdminLTE/#613-plugins
        |
        */

        'plugins' => [
            'Datatables' => [
                'active' => true,
                'files' => [
                    [
                        'type' => 'js',
                        'asset' => false,
                        'location' => 'https://code.jquery.com/jquery-3.4.1.js',
                    ],
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js',
                    ],
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js',
                    ],
                    [
                        'type' => 'css',
                        'asset' => false,
                        'location' => 'https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css',
                    ],
                ],
            ],
            'Select2' => [
                'active' => true,
                'files' => [
                    [
                        'type' => 'js',
                        'asset' => false,
                        'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                    ],
                    [
                        'type' => 'css',
                        'asset' => false,
                        'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                    ],
                ],
            ],
            'Summernote' => [
                'active' => true,
                'files' => [
                    [
                        'type' => 'js',
                        'asset' => false,
                        'location' => 'https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js',
                    ],
                    [
                        'type' => 'css',
                        'asset' => false,
                        'location' => 'https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css',
                    ],
                ],
            ],
            'MyScript' => [
                'active' => true,
                'files' => [
                    [
                        'type' => 'js',
                        'asset' => true,
                        'location' => 'js/data.js',
                    ],
                ],
            ],
            'Chartjs' => [
                'active' => false,
                'files' => [
                    [
                        'type' => 'js',
                        'asset' => false,
                        'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                    ],
                ],
            ],

            'InputFIleJs' => [
                'active' => true,
                'files' => [
                    [
                        'type' => 'js',
                        'asset' => false,
                        'location' => 'https://cdnjs.cloudflare.com/ajax/libs/bs-custom-file-input/1.3.4/bs-custom-file-input.min.js',
                    ],
                ],
            ],
            'Validation' => [
                'active' => false,
                'files' => [
                    [
                        'type' => 'js',
                        'asset' => false,
                        'location' => '//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js',
                    ],
                ],
            ],
            'Sweetalert2' => [
                'active' => false,
                'files' => [
                    [
                        'type' => 'js',
                        'asset' => false,
                        'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                    ],
                ],
            ],
            'Pace' => [
                'active' => false,
                'files' => [
                    [
                        'type' => 'css',
                        'asset' => false,
                        'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                    ],
                    [
                        'type' => 'js',
                        'asset' => false,
                        'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                    ],
                ],
            ],
        ],
    ];
