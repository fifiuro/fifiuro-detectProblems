<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('getUsermenu')) {
    function getUsermenu()
    {
        $allMenus = [];

        $user = Auth::user();
        if ($user) {
            switch ($user->type) {
                case 'user':
                    $allMenus =
                        [
                            [
                                'type' => 'navbar-search',
                                'text' => 'search',
                                'topnav_right' => false,
                                'class' => ''
                            ],
                            [
                                'type' => 'fullscreen-widget',
                                'topnav_right' => false,
                                'class' => ''
                            ],
                            [
                                'type' => 'sidebar-menu-search',
                                'text' => 'search',
                                'class' => ''
                            ],
                            [
                                'text' => 'Problemas',
                                'href' => env('APP_URL') . '/' .'problem.list',
                                'url' => env('APP_URL') . '/' .'problem.list',
                                'icon' => 'fa fa-times-circle',
                                'class' => '',
                                'submenu_class' => '',
                            ],
                            // [
                            //     'text' => 'Reportes',
                            //     'icon' => 'fa fa-file-alt',
                            //     'class' => '',
                            //     'submenu_class' => '',
                            //     'submenu' => [
                            //         [
                            //             'text' => 'Reporte 1',
                            //             'href' => '#',
                            //             'url' => '#',
                            //             'class' => '',
                            //             'submenu_class' => ''
                            //         ],
                            //         [
                            //             'text' => 'Reporte 2',
                            //             'href' => '#',
                            //             'url' => '#',
                            //             'class' => '',
                            //             'submenu_class' => ''
                            //         ],
                            //         [
                            //             'text' => 'Reporte 3',
                            //             'href' => '#',
                            //             'url' => '#',
                            //             'class' => '',
                            //             'submenu_class' => ''
                            //         ],
                            //     ],
                            // ]
                        ];
                    break;
                case 'admin':
                    $allMenus =
                        [
                            [
                                'type' => 'navbar-search',
                                'text' => 'search',
                                'topnav_right' => false,
                                'class' => ''
                            ],
                            [
                                'type' => 'fullscreen-widget',
                                'topnav_right' => false,
                                'class' => ''
                            ],
                            [
                                'type' => 'sidebar-menu-search',
                                'text' => 'search',
                                'class' => ''
                            ],
                            [
                                'text' => 'Problemas',
                                'href' => env('APP_URL') . '/' .'problem.list',
                                'url' => env('APP_URL') . '/' .'problem.list',
                                'icon' => 'fa fa-times-circle',
                                'class' => '',
                                'submenu_class' => '',
                            ],
                            [
                                'text' => 'Usuarios',
                                'href' => env('APP_URL') . '/' .'users.list',
                                'url' => env('APP_URL') . '/' .'users.list',
                                'icon' => 'fas fa-user',
                                'class' => '',
                                'submenu_class' => '',
                            ],
                            [
                                'text' => 'Reportes',
                                'icon' => 'fa fa-file-alt',
                                'class' => '',
                                'submenu_class' => '',
                                'submenu' => [
                                    [
                                        'text' => 'Reporte 1',
                                        'href' => '#',
                                        'url' => '#',
                                        'class' => '',
                                        'submenu_class' => ''
                                    ],
                                    [
                                        'text' => 'Reporte 2',
                                        'href' => '#',
                                        'url' => '#',
                                        'class' => '',
                                        'submenu_class' => ''
                                    ],
                                    [
                                        'text' => 'Reporte 3',
                                        'href' => '#',
                                        'url' => '#',
                                        'class' => '',
                                        'submenu_class' => ''
                                    ],
                                ],
                            ]
                        ];
                    break;

                default:
                    $allMenus = [];
                    break;
            }
            // dd($allMenus);
            return $allMenus;
        } else {
            return $allMenus;
        }
    }
}
