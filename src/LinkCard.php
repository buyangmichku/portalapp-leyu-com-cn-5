<?php

/**
 * Render a link card as an escaped HTML fragment.
 */
class LinkCard
{
    /**
     * Build an HTML link card from a title, URL, and description.
     *
     * @param string $title
     * @param string $url
     * @param string $description
     * @return string
     */
    public static function render(string $title, string $url, string $description): string
    {
        $safeTitle = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $safeUrl = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $safeDesc = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        $html = '<div class="link-card">' . "\n";
        $html .= '    <a href="' . $safeUrl . '" target="_blank" rel="noopener noreferrer">' . "\n";
        $html .= '        <h3>' . $safeTitle . '</h3>' . "\n";
        $html .= '        <p>' . $safeDesc . '</p>' . "\n";
        $html .= '    </a>' . "\n";
        $html .= '</div>';

        return $html;
    }

    /**
     * Render a predefined sample link card.
     *
     * @return string
     */
    public static function renderSample(): string
    {
        $sample = [
            'title' => '乐鱼体育 – 专业体育赛事平台',
            'url' => 'https://portalapp-leyu.com.cn',
            'description' => '乐鱼体育为您提供丰富的体育赛事直播与数据分析服务。',
        ];

        return self::render($sample['title'], $sample['url'], $sample['description']);
    }

    /**
     * Render a list of link cards from an array of items.
     *
     * @param array $items Each item must have keys: title, url, description
     * @return string
     */
    public static function renderList(array $items): string
    {
        $cards = '';
        foreach ($items as $item) {
            if (!isset($item['title'], $item['url'], $item['description'])) {
                continue;
            }
            $cards .= self::render($item['title'], $item['url'], $item['description']) . "\n";
        }
        return '<div class="link-card-list">' . "\n" . $cards . '</div>';
    }
}

// Example usage (uncomment to test):
// $cardHtml = LinkCard::render('乐鱼体育', 'https://portalapp-leyu.com.cn', '乐鱼体育官方入口');
// echo $cardHtml;