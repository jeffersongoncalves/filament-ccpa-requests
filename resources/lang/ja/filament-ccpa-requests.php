<?php

return [
    'resource' => [
        'label' => '消費者リクエスト',
        'plural_label' => '消費者リクエスト',
    ],

    'fields' => [
        'type' => '権利',
        'status' => 'ステータス',
        'requester_name' => '請求者',
        'requester_email' => '請求者のメール',
        'details' => '詳細',
        'response' => '回答',
        'reason' => '理由',
        'extension_reason' => '追加の時間が必要な理由',
        'subject' => '消費者',
        'subject_type' => '消費者モデル',
        'subject_id' => '消費者ID',
        'verified' => '本人確認済み',
        'due_at' => '期限',
        'verified_at' => '本人確認日時',
        'completed_at' => '完了日時',
        'created_at' => '受付日時',
    ],

    'type' => [
        'know' => '開示（§1798.110）',
        'delete' => '削除（§1798.105）',
        'correct' => '訂正（§1798.106）',
    ],

    'status' => [
        'pending' => '保留中',
        'completed' => '完了',
        'rejected' => '拒否',
    ],

    'filters' => [
        'overdue' => '期限切れ',
    ],

    'actions' => [
        'acknowledge' => [
            'label' => '受領を確認',
            'description' => '10営業日以内に受領を確認し、リクエストをどのように確認し回答するかを説明してください（規則 §7021）。',
            'success' => '受領を確認しました。',
        ],
        'verify' => [
            'label' => '本人確認',
            'description' => 'リクエスト者が誰かを確認し、リクエストをそのレコードに紐づけてください。それまでは何もエクスポート・削除されません。',
            'not_found' => 'この消費者のレコードが見つかりません。',
            'success' => '本人確認が完了しました。',
        ],
        'fulfil' => [
            'label' => '対応する',
            'description' => [
                'know' => '消費者について宣言されたすべての個人情報を JSON ファイルにエクスポートします。',
                'delete' => '消費者のすべてのレコードを非識別化します。元に戻すことはできません。',
            ],
            'success' => '請求に対応しました。',
        ],
        'complete' => [
            'label' => '完了にする',
            'description' => 'この権利は手動で対応します。消費者に伝えた回答を記録してください。',
            'success' => '請求を完了しました。',
        ],
        'reject' => [
            'label' => '拒否',
            'success' => 'リクエストを拒否しました。',
        ],
        'extend' => [
            'label' => '45日延長',
            'description' => '最初の45日以内に、合理的に必要な場合に1回だけ。理由を消費者に伝えてください（Cal. Civ. Code §1798.130(a)(2)(A)）。',
            'success' => '期限を延長しました。',
        ],
        'download' => [
            'label' => 'エクスポートをダウンロード',
        ],
    ],
];
