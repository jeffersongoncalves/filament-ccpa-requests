<?php

return [
    'resource' => [
        'label' => 'Solicitação do consumidor',
        'plural_label' => 'Solicitações de consumidores',
    ],

    'fields' => [
        'type' => 'Direito',
        'status' => 'Status',
        'requester_name' => 'Solicitante',
        'requester_email' => 'E-mail do solicitante',
        'details' => 'Detalhes',
        'response' => 'Resposta',
        'reason' => 'Motivo',
        'extension_reason' => 'Por que o pedido precisa de mais tempo',
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
        'delete' => 'Excluir (§1798.105)',
        'correct' => 'Corrigir (§1798.106)',
    ],

    'status' => [
        'pending' => 'Pendente',
        'completed' => 'Concluída',
        'rejected' => 'Negada',
    ],

    'filters' => [
        'overdue' => 'Vencidas',
    ],

    'actions' => [
        'acknowledge' => [
            'label' => 'Confirmar recebimento',
            'description' => 'Confirme o recebimento em até 10 dias úteis e explique como você vai verificar e responder a solicitação (Regulamento §7021).',
            'success' => 'Recebimento confirmado.',
        ],
        'verify' => [
            'label' => 'Verificar identidade',
            'description' => 'Confirme quem é o solicitante e vincule a solicitação ao registro dele. Nada é exportado nem excluído antes disso.',
            'not_found' => 'Nenhum registro encontrado para este consumidor.',
            'success' => 'Identidade verificada.',
        ],
        'fulfil' => [
            'label' => 'Atender',
            'description' => [
                'know' => 'Exporta todas as informações pessoais declaradas do consumidor para um arquivo JSON.',
                'delete' => 'Desidentifica todos os registros do consumidor. Isso não pode ser desfeito.',
            ],
            'success' => 'Solicitação atendida.',
        ],
        'complete' => [
            'label' => 'Concluir',
            'description' => 'Este direito é atendido manualmente: registre a resposta que você deu ao consumidor.',
            'success' => 'Solicitação concluída.',
        ],
        'reject' => [
            'label' => 'Negar',
            'success' => 'Solicitação negada.',
        ],
        'extend' => [
            'label' => 'Prorrogar por 45 dias',
            'description' => 'Uma única vez, dentro dos primeiros 45 dias, quando razoavelmente necessário. Informe o motivo ao consumidor (Cal. Civ. Code §1798.130(a)(2)(A)).',
            'success' => 'Prazo prorrogado.',
        ],
        'download' => [
            'label' => 'Baixar exportação',
        ],
    ],
];
