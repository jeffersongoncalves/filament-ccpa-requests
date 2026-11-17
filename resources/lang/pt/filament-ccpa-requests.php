<?php

return [
    'resource' => [
        'label' => 'Pedido do consumidor',
        'plural_label' => 'Pedidos de consumidores',
    ],

    'fields' => [
        'type' => 'Direito',
        'status' => 'Estado',
        'requester_name' => 'Requerente',
        'requester_email' => 'E-mail do requerente',
        'details' => 'Detalhes',
        'response' => 'Resposta',
        'reason' => 'Motivo',
        'extension_reason' => 'Porque é que o pedido precisa de mais tempo',
        'subject' => 'Consumidor',
        'subject_type' => 'Modelo do consumidor',
        'subject_id' => 'ID do consumidor',
        'verified' => 'Verificado',
        'due_at' => 'Prazo',
        'verified_at' => 'Verificado em',
        'completed_at' => 'Encerrado em',
        'created_at' => 'Recebido em',
    ],

    'type' => [
        'know' => 'Saber (§1798.110)',
        'delete' => 'Apagar (§1798.105)',
        'correct' => 'Corrigir (§1798.106)',
    ],

    'status' => [
        'pending' => 'Pendente',
        'completed' => 'Concluído',
        'rejected' => 'Recusado',
    ],

    'filters' => [
        'overdue' => 'Em atraso',
    ],

    'actions' => [
        'acknowledge' => [
            'label' => 'Confirmar receção',
            'description' => 'Confirme a receção no prazo de 10 dias úteis e explique como vai verificar e responder ao pedido (Regulamento §7021).',
            'success' => 'Receção confirmada.',
        ],
        'verify' => [
            'label' => 'Verificar identidade',
            'description' => 'Confirme quem é o requerente e associe o pedido ao respetivo registo. Nada é exportado nem apagado antes disso.',
            'not_found' => 'Nenhum registo encontrado para este consumidor.',
            'success' => 'Identidade verificada.',
        ],
        'fulfil' => [
            'label' => 'Executar',
            'description' => [
                'know' => 'Exporta todas as informações pessoais declaradas do consumidor para um ficheiro JSON.',
                'delete' => 'Desidentifica todos os registos do consumidor. Não é possível anular.',
            ],
            'success' => 'Pedido executado.',
        ],
        'complete' => [
            'label' => 'Concluir',
            'description' => 'Este direito é tratado manualmente: registe a resposta dada ao consumidor.',
            'success' => 'Pedido concluído.',
        ],
        'reject' => [
            'label' => 'Recusar',
            'success' => 'Pedido recusado.',
        ],
        'extend' => [
            'label' => 'Prorrogar por 45 dias',
            'description' => 'Uma única vez, nos primeiros 45 dias, quando razoavelmente necessário. Indique o motivo ao consumidor (Cal. Civ. Code §1798.130(a)(2)(A)).',
            'success' => 'Prazo prorrogado.',
        ],
        'download' => [
            'label' => 'Descarregar exportação',
        ],
    ],
];
