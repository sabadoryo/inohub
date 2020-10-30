<?php

use Illuminate\Database\Seeder;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            [
                'name' => 'Роли',
                'slug' => 'organization_roles',
                'is_default' => true,
                'permissions' => [
                    [
                        'name' => 'control',
                        'label' => 'Настройка',
                    ]
                ]
            ],
            [
                'name' => 'Новости',
                'slug' => 'news',
                'is_default' => false,
                'permissions' => [
                    [
                        'name' => 'create_news',
                        'label' => 'Создание'
                    ],
                    [
                        'name' => 'publish_news',
                        'label' => 'Публикация'
                    ],
                ],
            ],
            [
                'name' => 'Мероприятия',
                'slug' => 'events',
                'is_default' => false,
                'permissions' => [
                    [
                        'name' => 'create_event',
                        'label' => 'Создание'
                    ],
                    [
                        'name' => 'publish_event',
                        'label' => 'Публикация'
                    ],
                    [
                        'name' => 'check_event_applications',
                        'label' => 'Обработка заявок'
                    ],
                ],
            ],
            [
                'name' => 'Вакансии',
                'slug' => 'vacancies',
                'is_default' => false,
                'permissions' => [
                    [
                        'name' => 'create_vacancy',
                        'label' => 'Создание'
                    ],
                    [
                        'name' => 'publish_vacancy',
                        'label' => 'Публикация'
                    ],
                    [
                        'name' => 'check_vacancy_applications',
                        'label' => 'Обработка заявок'
                    ],
                ],
            ],
            [
                'name' => 'Программы',
                'slug' => 'programs',
                'is_default' => false,
                'permissions' => [
                    [
                        'name' => 'create_program',
                        'label' => 'Создание'
                    ],
                    [
                        'name' => 'publish_program',
                        'label' => 'Публикация'
                    ],
                    [
                        'name' => 'check_program_applications',
                        'label' => 'Обработка заявок'
                    ],
                ],
            ],
            [
                'name' => 'Корпоративные инновации',
                'slug' => 'corp_innovation',
                'is_default' => false,
                'permissions' => [
                    [
                        'name' => 'check_crop_innovation_applications',
                        'label' => 'Обработка заявок'
                    ],
                ]
            ],
            [
                'name' => 'HubSpace',
                'slug' => 'hub_space',
                'is_default' => false,
                'permissions' => [
                    [
                        'name' => 'check_hub_space_applications',
                        'label' => 'Обработка заявок'
                    ]
                ],
            ],
            [
                'name' => 'R&D центры',
                'slug' => 'r_and_d',
                'is_default' => false,
                'permissions' => [
                    [
                        'name' => 'check_r_and_d_applications',
                        'label' => 'Обработка заявок'
                    ]
                ]
            ],
            [
                'name' => 'База знаний',
                'slug' => 'resources',
                'is_default' => false,
                'permissions' => [
                    [
                        'name' => 'Добавление, изменение и удаление',
                        'label' => 'curd',
                    ]
                ]
            ],
            [
                'name' => 'Smart Store',
                'slug' => 'smart_store',
                'is_default' => false,
                'permissions' => [
                    [
                        'name' => 'smart_store_curd',
                        'label' => 'Обработка заявок',
                    ]
                ]
            ],
            [
                'name' => 'Smart store отправка задачи',
                'slug' => 'smart_store_send_problem',
                'is_default' => false,
                'permissions' => []
            ],
            [
                'name' => 'Smart store отправка решении',
                'slug' => 'smart_store_send_solution',
                'is_default' => false,
                'permissions' => []
            ],
            [
                'name' => 'Технологические лаборатории',
                'slug' => 'teh_laboratories',
                'is_default' => false,
                'permissions' => [
                    [
                        'name' => 'teh_laboratories_crud',
                        'label' => 'Добавление, изменение и удаление'
                    ]
                ],
            ],
            [
                'name' => 'Гранты',
                'slug' => 'grants',
                'is_default' => false,
                'permissions' => [
                    [
                        'name' => 'grants_control',
                        'label' => 'Управление',
                    ]
                ]
            ],
            [
                'name' => 'Участники AstanaHub',
                'slug' => 'astanahub_members',
                'is_default' => false,
                'permissions' => [
                    [
                        'name' => 'astana_hub_members_control',
                        'label' => 'Участники AstanaHub'
                    ]
                ]
            ],
        ];

        foreach ($modules as $module) {
            $m = \App\Module::where('slug', $module['slug'])->first();
            if (!$m) {
                $m = \App\Module::create([
                    'slug' => $module['slug'],
                    'name' => $module['name'],
                    'is_default' => $module['is_default'],
                ]);
            }
            foreach ($module['permissions'] as $permission) {
                $p = $m->permissions()->where('name', $permission['name'])->first();
                if (!$p) {
                    $p = $m->permissions()->create([
                        'name' => $permission['name'],
                        'label' => $permission['label']
                    ]);
                }
            }
        }
    }
}
