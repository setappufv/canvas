<?php

namespace Canvas;

class SuffixedNumber
{
    /**
     * Return a number formatted with a suffix.
     *
     * @param int $number
     * @param int $precision
     * @return string
     */
    public static function format(int $number, int $precision = 1): string
    {
        if ($number < 900) {
            $formatted = number_format($number, $precision);
        } elseif ($number < 900000) {
            $formatted = number_format($number / 1000, $precision);
            $suffix = 'K';
        } elseif ($number < 900000000) {
            $formatted = number_format($number / 1000000, $precision);
            $suffix = 'M';
        } elseif ($number < 900000000000) {
            $formatted = number_format($number / 1000000000, $precision);
            $suffix = 'B';
        } else {
            $formatted = number_format($number / 1000000000000, $precision);
            $suffix = 'T';
        }

        if ($precision > 0) {
            $dot_zero = '.'.str_repeat('0', $precision);
            $formatted = str_replace($dot_zero, '', $formatted);
        }

        return sprintf('%s%s', $formatted, $suffix ?? '');
    }
}
