<?php

return [
    'resource' => [
        'label' => 'Demande du consommateur',
        'plural_label' => 'Demandes des consommateurs',
    ],

    'fields' => [
        'type' => 'Droit',
        'status' => 'Statut',
        'requester_name' => 'Demandeur',
        'requester_email' => 'E-mail du demandeur',
        'details' => 'Détails',
        'response' => 'Réponse',
        'reason' => 'Motif',
        'extension_reason' => 'Pourquoi la demande nécessite plus de temps',
        'subject' => 'Consommateur',
        'subject_type' => 'Modèle du consommateur',
        'subject_id' => 'ID du consommateur',
        'verified' => 'Vérifié',
        'due_at' => 'Échéance',
        'verified_at' => 'Vérifié le',
        'completed_at' => 'Clôturé le',
        'created_at' => 'Reçu le',
    ],

    'type' => [
        'know' => 'Savoir (§1798.110)',
        'delete' => 'Supprimer (§1798.105)',
        'correct' => 'Rectifier (§1798.106)',
    ],

    'status' => [
        'pending' => 'En attente',
        'completed' => 'Traitée',
        'rejected' => 'Refusée',
    ],

    'filters' => [
        'overdue' => 'En retard',
    ],

    'actions' => [
        'acknowledge' => [
            'label' => 'Accuser réception',
            'description' => 'Accusez réception sous 10 jours ouvrés et expliquez comment vous vérifierez la demande et y répondrez (Règlement §7021).',
            'success' => 'Réception confirmée.',
        ],
        'verify' => [
            'label' => 'Vérifier l\'identité',
            'description' => 'Confirmez l\'identité du demandeur et rattachez la demande à son enregistrement. Rien n\'est exporté ni supprimé avant cela.',
            'not_found' => 'Aucun enregistrement trouvé pour ce consommateur.',
            'success' => 'Identité vérifiée.',
        ],
        'fulfil' => [
            'label' => 'Traiter',
            'description' => [
                'know' => 'Exporte toutes les informations personnelles déclarées du consommateur dans un fichier JSON.',
                'delete' => 'Désidentifie tous les enregistrements du consommateur. Cette action est irréversible.',
            ],
            'success' => 'Demande traitée.',
        ],
        'complete' => [
            'label' => 'Clôturer',
            'description' => 'Ce droit est traité manuellement : consignez la réponse donnée au consommateur.',
            'success' => 'Demande clôturée.',
        ],
        'reject' => [
            'label' => 'Refuser',
            'success' => 'Demande refusée.',
        ],
        'extend' => [
            'label' => 'Prolonger de 45 jours',
            'description' => 'Une seule fois, dans les 45 premiers jours, lorsque c\'est raisonnablement nécessaire. Indiquez la raison au consommateur (Cal. Civ. Code §1798.130(a)(2)(A)).',
            'success' => 'Délai prolongé.',
        ],
        'download' => [
            'label' => 'Télécharger l\'export',
        ],
    ],
];
