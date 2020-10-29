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
        $arr = [
            ['Новости', 'news'],
            ['Мероприятия', 'events'],
            ['Вакансии', 'vacancies'],
            ['Программы', 'programs'],
            ['Участники AstanaHub', 'astanahub_members'],
            ['Корпоративные инновации', 'corp_innovations'],
            ['Hubspace', 'hubspace'],
            ['R&D', 'randd'],
            ['База знаний', 'resources'],
            ['SmartStore', 'smart_store'],
            ['Технологические лабораторий', 'laboratories'],
            ['Гранты', 'grants'],
            ['Заявки', 'applications'],
            ['Настройка форм', 'forms']
        ];

        foreach ($arr as $item) {
            \App\Module::create([
                'name' => $item[0],
                'slug' => $item[1]
            ]);
        }


    }
}
