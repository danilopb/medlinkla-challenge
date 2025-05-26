<?php

class FindMinimumWindowSubstring
{
    public function execute(array $input): string
    {
        $this->validate($input);

        [$source, $target] = $input;

        $targetFrequency = $this->buildFrequencyMap($target);
        $windowFrequency = [];
        $requiredUniqueChars = count($targetFrequency);
        $formedUniqueChars = 0;

        $left = 0;
        $minLength = PHP_INT_MAX;
        $minSubstring = '';

        $sourceLength = strlen($source);

        for ($right = 0; $right < $sourceLength; $right++) {
            $char = $source[$right];
            $windowFrequency[$char] = ($windowFrequency[$char] ?? 0) + 1;

            if (isset($targetFrequency[$char]) && $windowFrequency[$char] === $targetFrequency[$char]) {
                $formedUniqueChars++;
            }

            while ($left <= $right && $formedUniqueChars === $requiredUniqueChars) {
                $windowSize = $right - $left + 1;
                if ($windowSize < $minLength) {
                    $minLength = $windowSize;
                    $minSubstring = substr($source, $left, $windowSize);
                }

                $leftChar = $source[$left];
                $windowFrequency[$leftChar]--;
                if (isset($targetFrequency[$leftChar]) && $windowFrequency[$leftChar] < $targetFrequency[$leftChar]) {
                    $formedUniqueChars--;
                }

                $left++;
            }
        }

        return $minSubstring;
    }

    private function buildFrequencyMap(string $text): array
    {
        $frequencyMap = [];
        foreach (str_split($text) as $char) {
            $frequencyMap[$char] = ($frequencyMap[$char] ?? 0) + 1;
        }
        return $frequencyMap;
    }

    private function validate(array $input): void
    {
        if (count($input) !== 2) {
            throw new InvalidArgumentException('Input must contain exactly two strings.');
        }

        [$source, $target] = $input;

        if (strlen($source) === 0 || strlen($target) === 0) {
            throw new InvalidArgumentException('Both source and target strings must be non-empty.');
        }

        if (strlen($source) > 50 || strlen($target) > 50) {
            throw new InvalidArgumentException('Both source and target strings must be less than 50 characters.');
        }

        foreach (str_split($target) as $char) {
            if (strpos($source, $char) === false) {
                throw new InvalidArgumentException("Character '{$char}' from target not found in source.");
            }
        }
    }
}