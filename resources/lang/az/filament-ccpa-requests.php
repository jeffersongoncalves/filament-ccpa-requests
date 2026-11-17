<?php

return [
    'resource' => [
        'label' => 'İstehlakçı sorğusu',
        'plural_label' => 'İstehlakçı sorğuları',
    ],

    'fields' => [
        'type' => 'Hüquq',
        'status' => 'Status',
        'requester_name' => 'Sorğu edən',
        'requester_email' => 'Sorğu edənin e-poçtu',
        'details' => 'Təfərrüatlar',
        'response' => 'Cavab',
        'reason' => 'Səbəb',
        'extension_reason' => 'Sorğunun niyə əlavə vaxta ehtiyacı var',
        'subject' => 'İstehlakçı',
        'subject_type' => 'İstehlakçı modeli',
        'subject_id' => 'İstehlakçı ID-si',
        'verified' => 'Təsdiqlənib',
        'due_at' => 'Son tarix',
        'verified_at' => 'Təsdiqlənmə',
        'completed_at' => 'Bağlanma',
        'created_at' => 'Alınma',
    ],

    'type' => [
        'know' => 'Bilmək (§1798.110)',
        'delete' => 'Silmək (§1798.105)',
        'correct' => 'Düzəltmək (§1798.106)',
    ],

    'status' => [
        'pending' => 'Gözləyir',
        'completed' => 'Tamamlandı',
        'rejected' => 'Rədd edildi',
    ],

    'filters' => [
        'overdue' => 'Gecikmiş',
    ],

    'actions' => [
        'acknowledge' => [
            'label' => 'Qəbulu təsdiqləmək',
            'description' => 'Qəbulu 10 iş günü ərzində təsdiqləyin və sorğunu necə yoxlayıb cavablandıracağınızı izah edin (Qaydalar §7021).',
            'success' => 'Qəbul təsdiqləndi.',
        ],
        'verify' => [
            'label' => 'Kimliyi təsdiqlə',
            'description' => 'Sorğu göndərənin kim olduğunu təsdiqləyin və sorğunu onun qeydinə bağlayın. Bundan əvvəl heç nə ixrac edilmir və silinmir.',
            'not_found' => 'Bu istehlakçı üçün qeyd tapılmadı.',
            'success' => 'Kimlik təsdiqləndi.',
        ],
        'fulfil' => [
            'label' => 'İcra et',
            'description' => [
                'know' => 'İstehlakçının bəyan edilmiş bütün şəxsi məlumatlarını JSON faylına ixrac edir.',
                'delete' => 'İstehlakçının bütün qeydlərini deidentifikasiya edir. Bunu geri qaytarmaq mümkün deyil.',
            ],
            'success' => 'Sorğu icra edildi.',
        ],
        'complete' => [
            'label' => 'Tamamla',
            'description' => 'Bu hüquq əl ilə cavablandırılır: istehlakçıya verdiyiniz cavabı qeyd edin.',
            'success' => 'Sorğu tamamlandı.',
        ],
        'reject' => [
            'label' => 'Rədd etmək',
            'success' => 'Sorğu rədd edildi.',
        ],
        'extend' => [
            'label' => '45 gün uzatmaq',
            'description' => 'Yalnız bir dəfə, ilk 45 gün ərzində, ağlabatan zərurət olduqda. Səbəbi istehlakçıya bildirin (Cal. Civ. Code §1798.130(a)(2)(A)).',
            'success' => 'Müddət uzadıldı.',
        ],
        'download' => [
            'label' => 'İxracı yüklə',
        ],
    ],
];
