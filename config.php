<?php

// Save all data dashboard 
$dashboardConfig = [
    'title' => 'Staff Overview Dashboard',
    'subtitle' => 'Real-time workforce monitoring',
    'company' => 'MyLUNAS DEX System',
    'year' => date('Y'),
    'current_date' => date('l, j F Y'),
    
    // Cards data
    'cards' => [
        [
            'id' => 'total-staff',
            'title' => 'Total LUNAS Staff',
            'value' => 248,
            'subtitle' => 'Active personnel',
            'icon' => 'user',
            'icon_type' => 'fas', 
            'color' => '#3b82f6',
            'bar_width' => 100
        ],
        [
            'id' => 'on-leave',
            'title' => 'Total On Leave',
            'value' => 18,
            'subtitle' => 'Approved leave',
            'icon' => 'calendar-alt',
            'icon_type' => 'far',
            'color' => '#f59e0b',
            'bar_width' => 72
        ],
        [
            'id' => 'mc',
            'title' => 'Total on MC',
            'value' => 12,
            'subtitle' => 'Medical certificate',
            'icon' => 'medkit',
            'icon_type' => 'fas',
            'color' => '#ef4444',
            'bar_width' => 48
        ],
        [
            'id' => 'subcontractor',
            'title' => 'Total Subcontractor at Yard',
            'value' => 156,
            'subtitle' => 'Active contractors',
            'icon' => 'hard-hat',
            'icon_type' => 'fas',
            'color' => '#a855f7',
            'bar_width' => 85
        ],
        [
            'id' => 'lcs1',
            'title' => 'Onboard LCS1',
            'value' => 34,
            'subtitle' => 'LCS1 deployment',
            'icon' => 'ship',
            'icon_type' => 'fas',
            'color' => '#06b6d4',
            'bar_width' => 68
        ],
        [
            'id' => 'lcs2',
            'title' => 'Onboard LCS2',
            'value' => 31,
            'subtitle' => 'LCS2 deployment',
            'icon' => 'ship',
            'icon_type' => 'fas',
            'color' => '#191bac',
            'bar_width' => 62
        ],
        [
            'id' => 'lcs3',
            'title' => 'Onboard LCS3',
            'value' => 28,
            'subtitle' => 'LCS3 deployment',
            'icon' => 'ship',
            'icon_type' => 'fas',
            'color' => '#10b981',
            'bar_width' => 56
        ],
        [
            'id' => 'lcs4',
            'title' => 'Onboard LCS4',
            'value' => 36,
            'subtitle' => 'LCS4 deployment',
            'icon' => 'ship',
            'icon_type' => 'fas',
            'color' => '#ec4899',
            'bar_width' => 72
        ],
        [
            'id' => 'lcs5',
            'title' => 'Onboard LCS5',
            'value' => 29,
            'subtitle' => 'LCS5 deployment',
            'icon' => 'ship',
            'icon_type' => 'fas',
            'color' => '#14b81c',
            'bar_width' => 58
        ],
        [
            'id' => 'kdjebat',
            'title' => 'KD Jebat',
            'value' => 42,
            'subtitle' => 'KD Jebat deployment',
            'icon' => 'anchor',
            'icon_type' => 'fas',
            'color' => '#f5f916',
            'bar_width' => 84
        ]
    ]
];

?>