<?php
class Solution {

    /**
     * @param int[] $nums
     * @return int[][]
     */
    function threeSum($nums) {
        $arrayLength = count($nums);
        $result = [];

        for ( $i = 0; $i<$arrayLength; $i++ ) {

            for ( $j = $i+1; $j<$arrayLength; $j++ ) {

                if( $i == $j) continue;
                
                for ( $k = $j + 1; $k<$arrayLength; $k++ ) {
                    if(($i == $k)or($j == $k)) continue;

                    if( ($nums[$i] + $nums[$j] + $nums[$k]) == 0) {
                        $tmp_result = [];
                        $tmp_result[] = $nums[$i];
                        $tmp_result[] = $nums[$j];
                        $tmp_result[] = $nums[$k];
                        
                        sort($tmp_result);

                        $flag = false;

                        foreach($result as $res) {
                            if($res == $tmp_result) {
                                $flag = true;
                                break;
                            }
                        }

                        if(!$flag) $result[] = $tmp_result;

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
