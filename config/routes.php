<?php
return [
    'user'=>[
        'actions'=>[
            'get'=>[
                'parameters'=>['id']
            ]
        ],
        'controller'=>\Demo\Controller\UserController::class
    ]
];

/**
 *
 * [
 *   'user'=>[
 *      'create'=>[\Demo\Controller\UserController::class, 'createAction']
 *   ]
 *
 * 'user'=>[
 *      'get'=>[
 *          ':id'=>[\Demo\Controller\UserController::class, 'getAction']
 *      ]
 * ]
 *
 * ]
 */