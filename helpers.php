<?php

function getCountriesList() {

    $countries = [
        [
            'code' => 'KZ',
            'name' => 'Казахстан',
            'cities' => [
                ['code' => 'TSE', 'name' => 'Нур-Султан'],
                ['code' => 'ALA', 'name' => 'Алматы'],
                ['code' => 'CIT', 'name' => 'Шымкент'],
            ],
        ],
        [
            'code' => 'RU',
            'name' => 'Россия',
            'cities' => [
                ['code' => 'MOW', 'name' => 'Москва'],
                ['code' => 'SPB', 'name' => 'Санкт-Петербург'],
            ],
        ],
    ];

    return $countries;
}