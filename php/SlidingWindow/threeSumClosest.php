<?php
class Solution {

/**
 * @param int[] $nums
 * @param int $target
 * @return int
 */
    function threeSumClosest($nums, $target) {
        $arrayLength = count($nums);
        sort($nums);
        $result = 0;
        $min = abs($nums[$arrayLength - 3] + $nums[$arrayLength - 2] + $nums[$arrayLength - 1] - $target);

        for ( $i = 0; $i<$arrayLength; $i++ ) {
            $leftPointer = $i + 1;
            $rightPointer = $arrayLength - 1;

            while( $leftPointer < $rightPointer) {
                $sum = $nums[$i] + $nums[$leftPointer] + $nums[$rightPointer];
                $diff = abs($sum - $target);
                if($sum == $target) {
                    return $target;
                } elseif($sum < $target) {
                    $leftPointer++;
                } else {
                    $rightPointer--;
                };
                if ($diff > $min) continue;
                $min = $diff;
                $result = $sum;
            }
        }

        return $result;
        
    }
}

$nums = [-1,2,1,-4];
//$nums = [-323,160,628,336,392,-216,-711,-406,12,-905,422,-705,-248,-924,558,527,-954,-516,549,332,-122,371,-730,-799,695,-983,-199,-158,734,-45,649,728,573,-303,197,52,-939,512,282,83,807,940,-925,-882,-812,-96,452,-814,-719,-161,28,473,-941,322,656,597,766,553,624,-637,-236,-106,-809,-372,531,-649,-180,-115,741,447,614,-873,-170,-81,181,-182,38,900,-761,654,-584,-277,-746,358,270,-505,-205,239,-532,-30,-142,985,556,928,-36,-284,491,-453,-371,-55,266,-860,-507,6,-961,-833,243,115,412,720,537,186,971,-354,154,-172,147,-716,528,-123,183,9,-269,-457,860,18,-460,297,631,742,-948,81,872,817,692,-311,-673,306,-918,-262,185,-953,64,-538,411,1000,423,-137,593,955,-589,-943,-751,-919,517,587,-34,-624,-479,572,151,249,-43,827,112,163,-362,655,-684,174,963,-274,179,-109,98,835,-949,389,-420,579,209,8,961,-396,-6,972,-897,-341,903,819,700,663,899,-3,-463,626,-923,-830,-459,798,-380,-89,94,-552,515,723,-128,716,602,-260,853,976,-178,824,-211,-913,589,882,-827,35,1,932,683,55,-407,-987,809,451,526,320,237,499,-546,316,-600,-842,489,-992,100,-134,923,765,-511,774,-876,679,814,-256,-130,337,-348,-718,431,327,402,-197,-741,355,495,330,-836,-501,-861,935,268,292,-399,583,-597,790,830,-426,-225,-80,-933,-969,-432,-893,837,167,395,-240,-350,26,126,508,-10,737,596,574,433,652,-212,109,-290,-204,-722,937,409,140,909,815,342,283,-810,-859,-590,429,-793,-74,-154,-91,-50,-411,647,-25,-660,-528,-191,-790,-315,354,610,-452,79];

$target = 1;

$solution = new Solution();

print_r($solution->threeSumClosest($nums, $target))."\n";
