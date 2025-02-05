<?php

return [
    'attribute_templates'   => [
        'title' => ':name attribute templates',
    ],
    'create'                => [
        'success'   => 'Attribute Template \':name\' created.',
        'title'     => 'New Attribute Template',
    ],
    'destroy'               => [
        'success'   => 'Attribute Template \':name\' removed.',
    ],
    'edit'                  => [
        'success'   => 'Attribute Template \':name\' updated.',
        'title'     => 'Edit Attribute Template :name',
    ],
    'fields'                => [
        'attribute_template'    => 'Parent Attribute Template',
        'attributes'            => 'Attributes',
        'name'                  => 'Name',
    ],
    'hints'                 => [
        'automatic'                 => 'Attributes automatically applied from the :link Attribute Template.',
        'entity_type'               => 'If set, creating a new entity of this type will automatically have this attribute template applied to it.',
        'parent_attribute_template' => 'This attribute template can be a child of another attribute template. When applying this attribute template, it and all of its parents will be applied.',
    ],
    'index'                 => [
        'add'       => 'New Attribute Template',
        'header'    => 'Attribute Templates of :name',
        'title'     => 'Attribute Templates',
    ],
    'placeholders'          => [
        'attribute_template'    => 'Choose an attribute template',
        'name'                  => 'Name of the Attribute Template',
    ],
    'show'                  => [
        'tabs'  => [
            'attribute_templates'   => 'Attribute Templates',
            'attributes'            => 'Attributes',
        ],
        'title' => 'Attribute Template :name',
    ],
];
