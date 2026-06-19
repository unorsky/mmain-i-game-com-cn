<?php

/**
 * 渲染链接卡片的函数，输出经过转义的 HTML 片段
 */

function renderLinkCard(string $url, string $title, string $description = '', string $imageUrl = ''): string
{
    $escapedUrl = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
    $escapedTitle = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    $escapedDescription = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
    $escapedImageUrl = htmlspecialchars($imageUrl, ENT_QUOTES, 'UTF-8');

    $html = '<div class="link-card">';
    $html .= '<a href="' . $escapedUrl . '" target="_blank" rel="noopener noreferrer">';

    if ($escapedImageUrl !== '') {
        $html .= '<div class="link-card-image">';
        $html .= '<img src="' . $escapedImageUrl . '" alt="' . $escapedTitle . '" loading="lazy">';
        $html .= '</div>';
    }

    $html .= '<div class="link-card-content">';
    $html .= '<h3 class="link-card-title">' . $escapedTitle . '</h3>';

    if ($escapedDescription !== '') {
        $html .= '<p class="link-card-description">' . $escapedDescription . '</p>';
    }

    $html .= '<span class="link-card-url">' . $escapedUrl . '</span>';
    $html .= '</div>';

    $html .= '</a>';
    $html .= '</div>';

    return $html;
}

function renderLinkCardFromArray(array $cardData): string
{
    $url = $cardData['url'] ?? '';
    $title = $cardData['title'] ?? '';
    $description = $cardData['description'] ?? '';
    $imageUrl = $cardData['image_url'] ?? '';

    return renderLinkCard($url, $title, $description, $imageUrl);
}

function renderSampleLinkCard(): string
{
    $sampleCard = [
        'url' => 'https://mmain-i-game.com.cn',
        'title' => '爱游戏',
        'description' => '发现精彩游戏世界，尽在爱游戏平台',
        'image_url' => '',
    ];

    return renderLinkCardFromArray($sampleCard);
}

function renderMultipleLinkCards(array $cards): string
{
    $html = '<div class="link-cards-container">';

    foreach ($cards as $card) {
        $html .= renderLinkCardFromArray($card);
    }

    $html .= '</div>';

    return $html;
}

function getDefaultLinkCards(): array
{
    return [
        [
            'url' => 'https://mmain-i-game.com.cn',
            'title' => '爱游戏',
            'description' => '热门手游与端游一站式平台',
            'image_url' => '',
        ],
        [
            'url' => 'https://example.com/game1',
            'title' => '梦幻冒险',
            'description' => '探索奇幻大陆，开启冒险之旅',
            'image_url' => 'https://example.com/images/game1.jpg',
        ],
        [
            'url' => 'https://example.com/game2',
            'title' => '极速赛车',
            'description' => '体验速度与激情的竞速游戏',
            'image_url' => 'https://example.com/images/game2.jpg',
        ],
    ];
}

function renderDefaultLinkCards(): string
{
    $cards = getDefaultLinkCards();
    return renderMultipleLinkCards($cards);
}