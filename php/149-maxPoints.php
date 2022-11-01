<?php

// 149. Max Points on a Line

// Given an array of points where points[i] = [xi, yi] 
// represents a point on the X-Y plane, 
// return the maximum number of points that lie on the same straight line.

class Solution {

    /**
     * @param int[][] $points
     * @return Integer
     */
    function maxPoints($points) {
        $countPoints = count($points);

        if($countPoints == 1) return 1;

        $result = [];

        for($i = 0; $i < $countPoints - 1; $i++) {
            for($j = $i + 1; $j < $countPoints; $j++) {

                if($points[$i][0] == $points[$j][0]) {
                    $key = 'INF '.strval($points[$i][0]);
                } else {
                    $Xa = $points[$i][0];
                    $Ya = $points[$i][1];

                    $Xb = $points[$j][0];
                    $Yb = $points[$j][1];

                    $Yba = $Yb - $Ya;
                    $Xba = $Xb - $Xa;

                    $coef1 = $Yba / $Xba;

                    $coef2 = (0 - $coef1) * $Xa + $Ya;

                    $key = strval($coef1).' '.strval($coef2);
                }
                

                

                if(array_key_exists($key, $result)) {
                    if(!in_array($points[$i], $result[$key])) {
                        $result[$key][] = $points[$i];    
                    }

                    if(!in_array($points[$j], $result[$key])) {
                        $result[$key][] = $points[$j];    
                    }
                } else {
                    $result[$key][] = $points[$i];
                    $result[$key][] = $points[$j];
                }
            }
        }

        $max = PHP_INT_MIN;
        foreach($result as $res) {
            if(count($res) > $max) $max = count($res);
        }

        return $max;
    }
}

// $points = [[1,1],[2,2],[3,3]];
$points = [[1,1],[3,2],[5,3],[4,1],[2,3],[1,4]];

$solution = new Solution();

print_r($solution->maxPoints( $points ), false);