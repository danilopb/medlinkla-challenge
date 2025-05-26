<?php

class FindPoint
{
    public function execute(array $strArr): string {
        $this->validations($strArr);

        $list1 = $this->parseToNumbers($strArr[0]);
        $list2 = $this->parseToNumbers($strArr[1]);

        $intersectionNumbers = $this->getIntersectionNumbers($list1, $list2);

        if (empty($intersectionNumbers)) {
            return 'false';
        }

        sort($intersectionNumbers, SORT_NUMERIC);
        return implode(',', $intersectionNumbers);
    }

    private function validations(array $strArr): void {
        if (count($strArr) !== 2) {
            throw new InvalidArgumentException('Input array must contain exactly 2 elements.');
        }
    }

    private function parseToNumbers(string $stringNumbers): array {
        $numbers = explode(',', $stringNumbers);
        return array_map(function($value) {
            return (int) trim($value);
        }, $numbers);
    }

    private function getIntersectionNumbers(array $numbers1, array $numbers2): array {
        return array_values(array_intersect($numbers1, $numbers2));
    }
}
