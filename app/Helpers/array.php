<?php

if (!function_exists('formatForSelect')) {
    /**
     * @param array<mixed> $items
     * @return array<mixed>
     */
    function formatForSelect(array $items): array
    {
        $formattedArray = [];
        foreach ($items as $value => $text) {
            $formattedArray[] = [
                'text' => $text,
                'value' => (string) $value
            ];
        }
        return $formattedArray;
    }
}
