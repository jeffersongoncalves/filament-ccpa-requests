<?php

return [
    'resource' => [
        'label' => '消费者请求',
        'plural_label' => '消费者请求',
    ],

    'fields' => [
        'type' => '权利',
        'status' => '状态',
        'requester_name' => '请求人',
        'requester_email' => '请求人邮箱',
        'details' => '详情',
        'response' => '答复',
        'reason' => '原因',
        'extension_reason' => '请求需要更多时间的原因',
        'subject' => '消费者',
        'subject_type' => '消费者模型',
        'subject_id' => '消费者 ID',
        'verified' => '已验证',
        'due_at' => '截止日期',
        'verified_at' => '验证时间',
        'completed_at' => '关闭时间',
        'created_at' => '接收时间',
    ],

    'type' => [
        'know' => '知情（§1798.110）',
        'delete' => '删除（§1798.105）',
        'correct' => '更正（§1798.106）',
    ],

    'status' => [
        'pending' => '待处理',
        'completed' => '已完成',
        'rejected' => '已拒绝',
    ],

    'filters' => [
        'overdue' => '已逾期',
    ],

    'actions' => [
        'acknowledge' => [
            'label' => '确认收到',
            'description' => '请在 10 个工作日内确认收到，并说明你将如何核实和答复该请求（法规 §7021）。',
            'success' => '已确认收到。',
        ],
        'verify' => [
            'label' => '验证身份',
            'description' => '请确认请求者的身份，并将请求关联到其记录。在此之前不会导出或删除任何内容。',
            'not_found' => '未找到该消费者的记录。',
            'success' => '身份已验证。',
        ],
        'fulfil' => [
            'label' => '执行',
            'description' => [
                'know' => '将该消费者已声明的全部个人信息导出为 JSON 文件。',
                'delete' => '对该消费者的全部记录去标识化。此操作无法撤销。',
            ],
            'success' => '请求已执行。',
        ],
        'complete' => [
            'label' => '完成',
            'description' => '此项权利需人工处理：请记录你给消费者的答复。',
            'success' => '请求已完成。',
        ],
        'reject' => [
            'label' => '拒绝',
            'success' => '请求已拒绝。',
        ],
        'extend' => [
            'label' => '延长 45 天',
            'description' => '仅限一次，须在最初 45 天内且确有合理必要。请告知消费者原因（Cal. Civ. Code §1798.130(a)(2)(A)）。',
            'success' => '期限已延长。',
        ],
        'download' => [
            'label' => '下载导出文件',
        ],
    ],
];
