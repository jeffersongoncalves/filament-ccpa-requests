<?php

return [
    'resource' => [
        'label' => 'Consumentenverzoek',
        'plural_label' => 'Consumentenverzoeken',
    ],

    'fields' => [
        'type' => 'Recht',
        'status' => 'Status',
        'requester_name' => 'Aanvrager',
        'requester_email' => 'E-mail van de aanvrager',
        'details' => 'Details',
        'response' => 'Antwoord',
        'reason' => 'Reden',
        'extension_reason' => 'Waarom het verzoek meer tijd nodig heeft',
        'subject' => 'Consument',
        'subject_type' => 'Consumentmodel',
        'subject_id' => 'Consument-ID',
        'verified' => 'Geverifieerd',
        'due_at' => 'Uiterste datum',
        'verified_at' => 'Geverifieerd op',
        'completed_at' => 'Afgesloten op',
        'created_at' => 'Ontvangen op',
    ],

    'type' => [
        'know' => 'Inzage (§1798.110)',
        'delete' => 'Verwijdering (§1798.105)',
        'correct' => 'Correctie (§1798.106)',
    ],

    'status' => [
        'pending' => 'In behandeling',
        'completed' => 'Afgehandeld',
        'rejected' => 'Afgewezen',
    ],

    'filters' => [
        'overdue' => 'Te laat',
    ],

    'actions' => [
        'acknowledge' => [
            'label' => 'Ontvangst bevestigen',
            'description' => 'Bevestig de ontvangst binnen 10 werkdagen en leg uit hoe je het verzoek controleert en beantwoordt (Verordening §7021).',
            'success' => 'Ontvangst bevestigd.',
        ],
        'verify' => [
            'label' => 'Identiteit verifiëren',
            'description' => 'Bevestig wie de aanvrager is en koppel het verzoek aan diens record. Daarvoor wordt niets geëxporteerd of verwijderd.',
            'not_found' => 'Geen record gevonden voor deze consument.',
            'success' => 'Identiteit geverifieerd.',
        ],
        'fulfil' => [
            'label' => 'Uitvoeren',
            'description' => [
                'know' => 'Exporteert alle gedeclareerde persoonsgegevens van de consument naar een JSON-bestand.',
                'delete' => 'De-identificeert alle records van de consument. Dit kan niet ongedaan worden gemaakt.',
            ],
            'success' => 'Verzoek uitgevoerd.',
        ],
        'complete' => [
            'label' => 'Afronden',
            'description' => 'Dit recht wordt handmatig afgehandeld: leg het antwoord vast dat je de consument hebt gegeven.',
            'success' => 'Verzoek afgerond.',
        ],
        'reject' => [
            'label' => 'Afwijzen',
            'success' => 'Verzoek afgewezen.',
        ],
        'extend' => [
            'label' => 'Met 45 dagen verlengen',
            'description' => 'Eenmalig, binnen de eerste 45 dagen, als dat redelijkerwijs nodig is. Vertel de consument waarom (Cal. Civ. Code §1798.130(a)(2)(A)).',
            'success' => 'Termijn verlengd.',
        ],
        'download' => [
            'label' => 'Export downloaden',
        ],
    ],
];
