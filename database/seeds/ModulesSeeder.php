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
            ]
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
