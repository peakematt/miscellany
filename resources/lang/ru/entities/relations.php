<?php

return [
    'actions'       => [
        'mode-map'      => 'Инструмент исследования связей',
        'mode-table'    => 'Таблица связей',
    ],
    'bulk'          => [
        'delete'    => '{1} Удалена :count связь.|[2,4] Удалено :count связи.|[5,*] Удалено :count связей.',
        'success'   => [
            'editing'           => '{1} Обновлена :count связь.|[2,4] Обновлено :count связи.|[5,*] Обновлено :count связей.',
            'editing_partial'   => '{1} Обновлена :count из :total связей.|[2,*] Обновлено :count из :total связей.',
        ],
    ],
    'connections'   => [
        'map_point'         => 'Точка на карте',
        'mention'           => 'Упоминание',
        'quest_element'     => 'Элемент квеста',
        'timeline_element'  => 'Элемент хронологии',
    ],
    'create'        => [
        'new_title' => 'Новая связь',
        'success'   => 'Связь с объектом ":target" добавлена объекту ":entity".',
        'title'     => 'Новая связь объекта :name',
    ],
    'destroy'       => [
        'success'   => 'Связь объекта ":entity" с объектом ":target" удалена.',
    ],
    'fields'        => [
        'attitude'          => 'Отношение',
        'connection'        => 'Тип связи',
        'is_star'           => 'Закреплена',
        'owner'             => 'Обладатель',
        'relation'          => 'Название',
        'target'            => 'Объект связи',
        'target_relation'   => 'Название у объекта связи',
        'two_way'           => 'Создать зеркальную связь',
    ],
    'helper'        => 'Соединяйте объекты связями, настраивайте отношения и доступ. Также связи можно закрепить в меню объекта.',
    'hints'         => [
        'attitude'          => 'Это необязательное поле можно использовать для сортировки списков.',
        'mirrored'          => [
            'text'  => 'Эта связь зеркальна связи объекта :link.',
            'title' => 'Зеркальная',
        ],
        'target_relation'   => 'Название связи у связанного объекта. Оставьте пустым, чтобы использовать то же название, что и для связи этого объекта.',
        'two_way'           => 'Если сделать связь зеркальной, то такая же связь будет создана для объекта связи. Но, если одну из связей отредактировать, зеркальная не изменится.',
    ],
    'index'         => [
        'add'   => 'Новая связь',
        'title' => 'Связи',
    ],
    'options'       => [
        'mentions'  => 'Связи + связанное + упоминания',
        'related'   => 'Связи + связанное',
        'relations' => 'Связи',
        'show'      => 'Показать',
    ],
    'panels'        => [
        'related'   => 'Связанное',
    ],
    'placeholders'  => [
        'attitude'  => 'От -100 до 100, где 100 это очень позитивное',
        'relation'  => 'Враг, лучший друг, родственник',
        'target'    => 'Выберите объект',
    ],
    'show'          => [
        'title' => 'Связи объекта :name',
    ],
    'teaser'        => 'Усильте кампанию, чтобы открыть режим просмотра связей. Нажмите сюда, чтобы узнать больше об усиленных кампаниях.',
    'types'         => [
        'family_member'         => 'Член семьи',
        'organisation_member'   => 'Член организации',
    ],
    'update'        => [
        'success'   => 'Связь ":target" объекта ":entity" обновлена.',
        'title'     => 'Обновление связи :name',
    ],
];
