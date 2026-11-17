<?php

return [
    'resource' => [
        'label' => 'Isteʼmolchi soʻrovi',
        'plural_label' => 'Isteʼmolchi soʻrovlari',
    ],

    'fields' => [
        'type' => 'Huquq',
        'status' => 'Holat',
        'requester_name' => 'So\'rovchi',
        'requester_email' => 'So\'rovchining e-pochtasi',
        'details' => 'Tafsilotlar',
        'response' => 'Javob',
        'reason' => 'Sabab',
        'extension_reason' => 'So\'rovga nima uchun ko\'proq vaqt kerak',
        'subject' => 'Isteʼmolchi',
        'subject_type' => 'Isteʼmolchi modeli',
        'subject_id' => 'Isteʼmolchi ID',
        'verified' => 'Tasdiqlangan',
        'due_at' => 'Muddat',
        'verified_at' => 'Tasdiqlangan vaqt',
        'completed_at' => 'Yopilgan vaqt',
        'created_at' => 'Qabul qilingan vaqt',
    ],

    'type' => [
        'know' => 'Bilish (§1798.110)',
        'delete' => 'Oʻchirish (§1798.105)',
        'correct' => 'Tuzatish (§1798.106)',
    ],

    'status' => [
        'pending' => 'Kutilmoqda',
        'completed' => 'Bajarildi',
        'rejected' => 'Rad etildi',
    ],

    'filters' => [
        'overdue' => 'Muddati o\'tgan',
    ],

    'actions' => [
        'acknowledge' => [
            'label' => 'Qabul qilinganini tasdiqlash',
            'description' => 'Qabul qilinganini 10 ish kuni ichida tasdiqlang va soʻrovni qanday tekshirib, javob berishingizni tushuntiring (Qoidalar §7021).',
            'success' => 'Qabul tasdiqlandi.',
        ],
        'verify' => [
            'label' => 'Shaxsni tasdiqlash',
            'description' => 'Soʻrovchining kimligini tasdiqlang va soʻrovni uning yozuviga bogʻlang. Bundan oldin hech narsa eksport qilinmaydi yoki oʻchirilmaydi.',
            'not_found' => 'Bu isteʼmolchi uchun yozuv topilmadi.',
            'success' => 'Shaxs tasdiqlandi.',
        ],
        'fulfil' => [
            'label' => 'Bajarish',
            'description' => [
                'know' => 'Isteʼmolchining eʼlon qilingan barcha shaxsiy maʼlumotlarini JSON fayliga eksport qiladi.',
                'delete' => 'Isteʼmolchining barcha yozuvlarini shaxssizlashtiradi. Buni bekor qilib boʻlmaydi.',
            ],
            'success' => 'So\'rov bajarildi.',
        ],
        'complete' => [
            'label' => 'Yakunlash',
            'description' => 'Bu huquqqa qoʻlda javob beriladi: isteʼmolchiga bergan javobingizni qayd eting.',
            'success' => 'So\'rov yakunlandi.',
        ],
        'reject' => [
            'label' => 'Rad etish',
            'success' => 'Soʻrov rad etildi.',
        ],
        'extend' => [
            'label' => '45 kunga uzaytirish',
            'description' => 'Faqat bir marta, dastlabki 45 kun ichida, oqilona zarur boʻlganda. Sababini isteʼmolchiga ayting (Cal. Civ. Code §1798.130(a)(2)(A)).',
            'success' => 'Muddat uzaytirildi.',
        ],
        'download' => [
            'label' => 'Eksportni yuklab olish',
        ],
    ],
];
