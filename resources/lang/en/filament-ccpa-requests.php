<?php

return [
    'resource' => [
        'label' => 'Consumer request',
        'plural_label' => 'Consumer requests',
    ],

    'fields' => [
        'type' => 'Right',
        'status' => 'Status',
        'requester_name' => 'Requester',
        'requester_email' => 'Requester email',
        'details' => 'Details',
        'response' => 'Response',
        'reason' => 'Reason',
        'extension_reason' => 'Why the request needs more time',
        'subject' => 'Consumer',
        'subject_type' => 'Consumer model',
        'subject_id' => 'Consumer ID',
        'verified' => 'Verified',
        'due_at' => 'Due',
        'verified_at' => 'Verified at',
        'completed_at' => 'Closed at',
        'created_at' => 'Received at',
    ],

    'type' => [
        'know' => 'Know (§1798.110)',
        'delete' => 'Delete (§1798.105)',
        'correct' => 'Correct (§1798.106)',
    ],

    'status' => [
        'pending' => 'Pending',
        'completed' => 'Completed',
        'rejected' => 'Denied',
    ],

    'filters' => [
        'overdue' => 'Overdue',
    ],

    'actions' => [
        'acknowledge' => [
            'label' => 'Confirm receipt',
            'description' => 'Confirm receipt within 10 business days and explain how you will verify and answer the request (Regulations §7021).',
            'success' => 'Receipt confirmed.',
        ],
        'verify' => [
            'label' => 'Verify identity',
            'description' => 'Confirm who the requester is and link the request to their record. Nothing is exported or deleted before this.',
            'not_found' => 'No record found for this consumer.',
            'success' => 'Identity verified.',
        ],
        'fulfil' => [
            'label' => 'Fulfil',
            'description' => [
                'know' => 'Export every declared piece of personal information of the consumer to a JSON file.',
                'delete' => 'Deidentify every record of the consumer. This cannot be undone.',
            ],
            'success' => 'Request fulfilled.',
        ],
        'complete' => [
            'label' => 'Complete',
            'description' => 'This right is answered by hand: record the answer you gave the consumer.',
            'success' => 'Request completed.',
        ],
        'reject' => [
            'label' => 'Deny',
            'success' => 'Request denied.',
        ],
        'extend' => [
            'label' => 'Extend by 45 days',
            'description' => 'Once, within the first 45 days, when reasonably necessary. Tell the consumer why (Cal. Civ. Code §1798.130(a)(2)(A)).',
            'success' => 'Deadline extended.',
        ],
        'download' => [
            'label' => 'Download export',
        ],
    ],
];
