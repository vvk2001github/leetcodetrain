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

        for ( $i = 0; $i<$arrayLength - 2; $i++ ) {

            for ( $j = $i+1; $j<$arrayLength - 1; $j++ ) {

                
                for ( $k = $j + 1; $k<$arrayLength; $k++ ) {

                    if( ($nums[$i] + $nums[$j] + $nums[$k]) == 0) {
                        $tmp_result = [];
                        $tmp_result[] = $nums[$i];
                        $tmp_result[] = $nums[$j];
                        $tmp_result[] = $nums[$k];

                        if(!in_array($tmp_result, $result)) $result[] = $tmp_result;

                    }
                }
            }
        }

        return $result;
    }
}

$nums = [-1,0,1,2,-1,-4];

$solution = new Solution();

print_r($solution->threeSum($nums));
