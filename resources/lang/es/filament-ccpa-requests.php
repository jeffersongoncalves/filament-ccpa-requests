<?php

return [
    'resource' => [
        'label' => 'Solicitud del consumidor',
        'plural_label' => 'Solicitudes de consumidores',
    ],

    'fields' => [
        'type' => 'Derecho',
        'status' => 'Estado',
        'requester_name' => 'Solicitante',
        'requester_email' => 'Correo del solicitante',
        'details' => 'Detalles',
        'response' => 'Respuesta',
        'reason' => 'Motivo',
        'extension_reason' => 'Por qué la solicitud necesita más tiempo',
        'subject' => 'Consumidor',
        'subject_type' => 'Modelo del consumidor',
        'subject_id' => 'ID del consumidor',
        'verified' => 'Verificado',
        'due_at' => 'Plazo',
        'verified_at' => 'Verificado el',
        'completed_at' => 'Cerrado el',
        'created_at' => 'Recibido el',
    ],

    'type' => [
        'know' => 'Saber (§1798.110)',
        'delete' => 'Eliminar (§1798.105)',
        'correct' => 'Corregir (§1798.106)',
    ],

    'status' => [
        'pending' => 'Pendiente',
        'completed' => 'Completada',
        'rejected' => 'Denegada',
    ],

    'filters' => [
        'overdue' => 'Vencidas',
    ],

    'actions' => [
        'acknowledge' => [
            'label' => 'Confirmar recepción',
            'description' => 'Confirma la recepción en un plazo de 10 días hábiles y explica cómo verificarás y responderás la solicitud (Reglamento §7021).',
            'success' => 'Recepción confirmada.',
        ],
        'verify' => [
            'label' => 'Verificar identidad',
            'description' => 'Confirma quién es el solicitante y vincula la solicitud a su registro. Nada se exporta ni se elimina antes de esto.',
            'not_found' => 'No se encontró ningún registro para este consumidor.',
            'success' => 'Identidad verificada.',
        ],
        'fulfil' => [
            'label' => 'Atender',
            'description' => [
                'know' => 'Exporta toda la información personal declarada del consumidor a un archivo JSON.',
                'delete' => 'Desidentifica todos los registros del consumidor. No se puede deshacer.',
            ],
            'success' => 'Solicitud atendida.',
        ],
        'complete' => [
            'label' => 'Completar',
            'description' => 'Este derecho se atiende a mano: registra la respuesta que diste al consumidor.',
            'success' => 'Solicitud completada.',
        ],
        'reject' => [
            'label' => 'Denegar',
            'success' => 'Solicitud denegada.',
        ],
        'extend' => [
            'label' => 'Prorrogar 45 días',
            'description' => 'Una sola vez, dentro de los primeros 45 días, cuando sea razonablemente necesario. Explica el motivo al consumidor (Cal. Civ. Code §1798.130(a)(2)(A)).',
            'success' => 'Plazo prorrogado.',
        ],
        'download' => [
            'label' => 'Descargar exportación',
        ],
    ],
];
