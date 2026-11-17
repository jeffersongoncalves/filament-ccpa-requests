<?php

return [
    'resource' => [
        'label' => 'Richiesta del consumatore',
        'plural_label' => 'Richieste dei consumatori',
    ],

    'fields' => [
        'type' => 'Diritto',
        'status' => 'Stato',
        'requester_name' => 'Richiedente',
        'requester_email' => 'Email del richiedente',
        'details' => 'Dettagli',
        'response' => 'Risposta',
        'reason' => 'Motivo',
        'extension_reason' => 'Perché la richiesta richiede più tempo',
        'subject' => 'Consumatore',
        'subject_type' => 'Modello del consumatore',
        'subject_id' => 'ID del consumatore',
        'verified' => 'Verificato',
        'due_at' => 'Scadenza',
        'verified_at' => 'Verificato il',
        'completed_at' => 'Chiuso il',
        'created_at' => 'Ricevuto il',
    ],

    'type' => [
        'know' => 'Sapere (§1798.110)',
        'delete' => 'Cancellare (§1798.105)',
        'correct' => 'Rettificare (§1798.106)',
    ],

    'status' => [
        'pending' => 'In attesa',
        'completed' => 'Completata',
        'rejected' => 'Respinta',
    ],

    'filters' => [
        'overdue' => 'Scadute',
    ],

    'actions' => [
        'acknowledge' => [
            'label' => 'Conferma ricezione',
            'description' => 'Conferma la ricezione entro 10 giorni lavorativi e spiega come verificherai e risponderai alla richiesta (Regolamento §7021).',
            'success' => 'Ricezione confermata.',
        ],
        'verify' => [
            'label' => 'Verifica identità',
            'description' => 'Conferma chi è il richiedente e collega la richiesta al suo record. Prima di questo non viene esportato né cancellato nulla.',
            'not_found' => 'Nessun record trovato per questo consumatore.',
            'success' => 'Identità verificata.',
        ],
        'fulfil' => [
            'label' => 'Evadi',
            'description' => [
                'know' => 'Esporta tutte le informazioni personali dichiarate del consumatore in un file JSON.',
                'delete' => 'De-identifica tutti i record del consumatore. L\'operazione non può essere annullata.',
            ],
            'success' => 'Richiesta evasa.',
        ],
        'complete' => [
            'label' => 'Completa',
            'description' => 'Questo diritto si gestisce a mano: registra la risposta data al consumatore.',
            'success' => 'Richiesta completata.',
        ],
        'reject' => [
            'label' => 'Respingi',
            'success' => 'Richiesta respinta.',
        ],
        'extend' => [
            'label' => 'Proroga di 45 giorni',
            'description' => 'Una sola volta, entro i primi 45 giorni, quando ragionevolmente necessario. Comunica il motivo al consumatore (Cal. Civ. Code §1798.130(a)(2)(A)).',
            'success' => 'Termine prorogato.',
        ],
        'download' => [
            'label' => 'Scarica esportazione',
        ],
    ],
];
