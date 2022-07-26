<?php
class Solution {

    /**
     * @param int[] $nums
     * @return int[][]
     */
    function threeSum($nums) {
        $arrayLength = count($nums);
        $result = [];
        sort($nums);

        for ( $i = 0; $i<$arrayLength; $i++ ) {
            $curNumber = $nums[$i];
            $leftPointer = $i + 1;
            $rightPointer = $arrayLength - 1;

            while( $leftPointer < $rightPointer) {
                $sum = $curNumber + $nums[$leftPointer] + $nums[$rightPointer];

                if($sum > 0) {
                    --$rightPointer;
                } elseif($sum < 0) {
                    ++$leftPointer;
                } else {
                    $tmp_result = [];
                    $tmp_result[] = $curNumber;
                    $tmp_result[] = $nums[$leftPointer];
                    $tmp_result[] = $nums[$rightPointer];

                    if(!in_array($tmp_result, $result)) $result[] = $tmp_result;

                    ++$leftPointer;

                    while (isset($nums[$leftPointer], $nums[$leftPointer+1]) && $nums[$leftPointer] == $nums[$leftPointer-1])
                    {
                        ++$leftPointer;
                    
                    }

                }

            }
        }

        return $result;
    }
}

//$nums = [-1,0,1,2,-1,-4];
$nums = [0,0,0];

$solution = new Solution();

print_r($solution->threeSum($nums));
