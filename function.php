<?php

// Dashboard all function

// Render card function
function renderCard($card, $index) {
    $delay = $index * 0.07;
    $icon_class = $card['icon_type'] . ' fa-' . $card['icon'];
    $bg_color = hex2rgba($card['color'], 0.1);
    $border_color = hex2rgba($card['color'], 0.2);
    
    $html = '
    <div class="dashboard-card card-glow card-shine" style="animation-delay: ' . $delay . 's;">
        <div class="card-header">
            <div class="card-title-section">
                <p class="card-title">' . htmlspecialchars($card['title']) . '</p>
                <p class="card-subtitle">
                    <i class="' . $icon_class . '"></i> ' . htmlspecialchars($card['subtitle']) . '
                </p>
            </div>
            <div class="card-icon-wrapper" style="background: ' . $bg_color . '; border-color: ' . $border_color . ';">
                <i class="' . $icon_class . '" style="font-size: 20px; color: ' . $card['color'] . ';"></i>
            </div>
        </div>
        <div class="card-value-section">
            <span class="card-value">' . number_format($card['value']) . '</span>
            <span class="card-value-unit">People</span>
        </div>
        <div class="stat-bar">
            <div class="stat-bar-fill" style="width: ' . $card['bar_width'] . '%; background: ' . $card['color'] . ';"></div>
        </div>
    </div>';
    
    return $html;
}

// All render card function
function renderAllCards($cards) {
    $html = '';
    foreach ($cards as $index => $card) {
        $html .= renderCard($card, $index);
    }
    return $html;
}

// Convert hex color to rgba function
function hex2rgba($color, $opacity = false) {
    $default = 'rgb(0,0,0)';
 
    if(empty($color)) return $default;
 
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }
 
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }
 
    $rgb = array_map('hexdec', $hex);
 
    if($opacity !== false){
        if(abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
        $output = 'rgb('.implode(",",$rgb).')';
    }
 
    return $output;
}

function getCurrentDate() {
    return date('l, j F Y');
}

// Value card update function if dynamic
function updateCardValue($cardId, $newValue, &$cards) {
    foreach ($cards as &$card) {
        if ($card['id'] == $cardId) {
            $card['value'] = $newValue;
            return true;
        }
    }
    return false;
}

// Total staff function
function getTotalStaff($cards) {
    $total = 0;
    foreach ($cards as $card) {
        $total += $card['value'];
    }
    return $total;
}

// Average bar width function
function getAverageBarWidth($cards) {
    $total = 0;
    foreach ($cards as $card) {
        $total += $card['bar_width'];
    }
    return round($total / count($cards), 2);
}

?>