<?php

return [
    'resource' => [
        'label' => 'Verbraucheranfrage',
        'plural_label' => 'Verbraucheranfragen',
    ],

    'fields' => [
        'type' => 'Recht',
        'status' => 'Status',
        'requester_name' => 'Antragsteller',
        'requester_email' => 'E-Mail des Antragstellers',
        'details' => 'Details',
        'response' => 'Antwort',
        'reason' => 'Grund',
        'extension_reason' => 'Warum die Anfrage mehr Zeit braucht',
        'subject' => 'Verbraucher',
        'subject_type' => 'Verbraucher-Model',
        'subject_id' => 'Verbraucher-ID',
        'verified' => 'Verifiziert',
        'due_at' => 'Fällig',
        'verified_at' => 'Verifiziert am',
        'completed_at' => 'Abgeschlossen am',
        'created_at' => 'Eingegangen am',
    ],

    'type' => [
        'know' => 'Auskunft (§1798.110)',
        'delete' => 'Löschung (§1798.105)',
        'correct' => 'Berichtigung (§1798.106)',
    ],

    'status' => [
        'pending' => 'Offen',
        'completed' => 'Erledigt',
        'rejected' => 'Abgelehnt',
    ],

    'filters' => [
        'overdue' => 'Überfällig',
    ],

    'actions' => [
        'acknowledge' => [
            'label' => 'Eingang bestätigen',
            'description' => 'Bestätigen Sie den Eingang innerhalb von 10 Werktagen und erklären Sie, wie Sie die Anfrage prüfen und beantworten werden (Verordnung §7021).',
            'success' => 'Eingang bestätigt.',
        ],
        'verify' => [
            'label' => 'Identität prüfen',
            'description' => 'Bestätigen Sie, wer die anfragende Person ist, und verknüpfen Sie die Anfrage mit ihrem Datensatz. Vorher wird nichts exportiert oder gelöscht.',
            'not_found' => 'Für diesen Verbraucher wurde kein Datensatz gefunden.',
            'success' => 'Identität geprüft.',
        ],
        'fulfil' => [
            'label' => 'Ausführen',
            'description' => [
                'know' => 'Exportiert alle deklarierten personenbezogenen Informationen des Verbrauchers in eine JSON-Datei.',
                'delete' => 'De-identifiziert alle Datensätze des Verbrauchers. Das kann nicht rückgängig gemacht werden.',
            ],
            'success' => 'Anfrage ausgeführt.',
        ],
        'complete' => [
            'label' => 'Abschließen',
            'description' => 'Dieses Recht wird manuell beantwortet: Halten Sie die Antwort fest, die Sie dem Verbraucher gegeben haben.',
            'success' => 'Anfrage abgeschlossen.',
        ],
        'reject' => [
            'label' => 'Ablehnen',
            'success' => 'Anfrage abgelehnt.',
        ],
        'extend' => [
            'label' => 'Um 45 Tage verlängern',
            'description' => 'Einmalig, innerhalb der ersten 45 Tage, wenn vernünftigerweise erforderlich. Teilen Sie dem Verbraucher den Grund mit (Cal. Civ. Code §1798.130(a)(2)(A)).',
            'success' => 'Frist verlängert.',
        ],
        'download' => [
            'label' => 'Export herunterladen',
        ],
    ],
];
