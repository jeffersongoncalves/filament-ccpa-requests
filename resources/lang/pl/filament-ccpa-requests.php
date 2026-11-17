<?php

return [
    'resource' => [
        'label' => 'Wniosek konsumenta',
        'plural_label' => 'Wnioski konsumentów',
    ],

    'fields' => [
        'type' => 'Prawo',
        'status' => 'Status',
        'requester_name' => 'Wnioskodawca',
        'requester_email' => 'E-mail wnioskodawcy',
        'details' => 'Szczegóły',
        'response' => 'Odpowiedź',
        'reason' => 'Powód',
        'extension_reason' => 'Dlaczego żądanie wymaga więcej czasu',
        'subject' => 'Konsument',
        'subject_type' => 'Model konsumenta',
        'subject_id' => 'ID konsumenta',
        'verified' => 'Zweryfikowano',
        'due_at' => 'Termin',
        'verified_at' => 'Zweryfikowano dnia',
        'completed_at' => 'Zamknięto',
        'created_at' => 'Otrzymano',
    ],

    'type' => [
        'know' => 'Dostęp do informacji (§1798.110)',
        'delete' => 'Usunięcie (§1798.105)',
        'correct' => 'Sprostowanie (§1798.106)',
    ],

    'status' => [
        'pending' => 'Oczekujące',
        'completed' => 'Zrealizowane',
        'rejected' => 'Odrzucony',
    ],

    'filters' => [
        'overdue' => 'Po terminie',
    ],

    'actions' => [
        'acknowledge' => [
            'label' => 'Potwierdź otrzymanie',
            'description' => 'Potwierdź otrzymanie w ciągu 10 dni roboczych i wyjaśnij, jak zweryfikujesz wniosek i na niego odpowiesz (Rozporządzenie §7021).',
            'success' => 'Potwierdzono otrzymanie.',
        ],
        'verify' => [
            'label' => 'Zweryfikuj tożsamość',
            'description' => 'Potwierdź, kim jest wnioskodawca, i powiąż wniosek z jego rekordem. Wcześniej nic nie jest eksportowane ani usuwane.',
            'not_found' => 'Nie znaleziono rekordu tego konsumenta.',
            'success' => 'Tożsamość zweryfikowana.',
        ],
        'fulfil' => [
            'label' => 'Zrealizuj',
            'description' => [
                'know' => 'Eksportuje wszystkie zadeklarowane dane osobowe konsumenta do pliku JSON.',
                'delete' => 'Deidentyfikuje wszystkie rekordy konsumenta. Tej operacji nie można cofnąć.',
            ],
            'success' => 'Żądanie zrealizowane.',
        ],
        'complete' => [
            'label' => 'Zakończ',
            'description' => 'To prawo realizuje się ręcznie: zapisz odpowiedź udzieloną konsumentowi.',
            'success' => 'Żądanie zakończone.',
        ],
        'reject' => [
            'label' => 'Odrzuć',
            'success' => 'Wniosek odrzucony.',
        ],
        'extend' => [
            'label' => 'Przedłuż o 45 dni',
            'description' => 'Jednorazowo, w ciągu pierwszych 45 dni, gdy jest to rozsądnie konieczne. Podaj konsumentowi powód (Cal. Civ. Code §1798.130(a)(2)(A)).',
            'success' => 'Termin przedłużony.',
        ],
        'download' => [
            'label' => 'Pobierz eksport',
        ],
    ],
];
