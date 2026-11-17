<?php

return [
    'resource' => [
        'label' => 'Tüketici talebi',
        'plural_label' => 'Tüketici talepleri',
    ],

    'fields' => [
        'type' => 'Hak',
        'status' => 'Durum',
        'requester_name' => 'Başvuran',
        'requester_email' => 'Başvuranın e-postası',
        'details' => 'Ayrıntılar',
        'response' => 'Yanıt',
        'reason' => 'Gerekçe',
        'extension_reason' => 'Talebin neden daha fazla zamana ihtiyacı var',
        'subject' => 'Tüketici',
        'subject_type' => 'Tüketici modeli',
        'subject_id' => 'Tüketici kimliği',
        'verified' => 'Doğrulandı',
        'due_at' => 'Son tarih',
        'verified_at' => 'Doğrulanma',
        'completed_at' => 'Kapanma',
        'created_at' => 'Alınma',
    ],

    'type' => [
        'know' => 'Bilme (§1798.110)',
        'delete' => 'Silme (§1798.105)',
        'correct' => 'Düzeltme (§1798.106)',
    ],

    'status' => [
        'pending' => 'Bekliyor',
        'completed' => 'Tamamlandı',
        'rejected' => 'Reddedildi',
    ],

    'filters' => [
        'overdue' => 'Süresi geçmiş',
    ],

    'actions' => [
        'acknowledge' => [
            'label' => 'Alındığını onayla',
            'description' => 'Alındığını 10 iş günü içinde onaylayın ve talebi nasıl doğrulayıp yanıtlayacağınızı açıklayın (Yönetmelik §7021).',
            'success' => 'Alındı onaylandı.',
        ],
        'verify' => [
            'label' => 'Kimliği doğrula',
            'description' => 'Talep sahibinin kim olduğunu doğrulayın ve talebi kaydına bağlayın. Bundan önce hiçbir şey dışa aktarılmaz veya silinmez.',
            'not_found' => 'Bu tüketici için kayıt bulunamadı.',
            'success' => 'Kimlik doğrulandı.',
        ],
        'fulfil' => [
            'label' => 'Yerine getir',
            'description' => [
                'know' => 'Tüketicinin beyan edilmiş tüm kişisel bilgilerini bir JSON dosyasına aktarır.',
                'delete' => 'Tüketicinin tüm kayıtlarını kimliksizleştirir. Bu işlem geri alınamaz.',
            ],
            'success' => 'Başvuru yerine getirildi.',
        ],
        'complete' => [
            'label' => 'Tamamla',
            'description' => 'Bu hak elle yanıtlanır: tüketiciye verdiğiniz yanıtı kaydedin.',
            'success' => 'Başvuru tamamlandı.',
        ],
        'reject' => [
            'label' => 'Reddet',
            'success' => 'Talep reddedildi.',
        ],
        'extend' => [
            'label' => '45 gün uzat',
            'description' => 'Yalnızca bir kez, ilk 45 gün içinde, makul ölçüde gerekli olduğunda. Nedenini tüketiciye bildirin (Cal. Civ. Code §1798.130(a)(2)(A)).',
            'success' => 'Süre uzatıldı.',
        ],
        'download' => [
            'label' => 'Dışa aktarımı indir',
        ],
    ],
];
