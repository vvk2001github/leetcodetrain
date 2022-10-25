<?php

// 997. Find the Town Judge

// In a town, there are n people labeled from 1 to n. There is a rumor that one of these people is secretly the town judge.

// If the town judge exists, then:

//     The town judge trusts nobody.
//     Everybody (except for the town judge) trusts the town judge.
//     There is exactly one person that satisfies properties 1 and 2.

// You are given an array trust where trust[i] = [ai, bi] representing that the person labeled ai trusts the person labeled bi.

// Return the label of the town judge if the town judge exists and can be identified, or return -1 otherwise.


class Solution {

    /**
     * @param int $n
     * @param int[][] $trust
     * @return Integer
     */
    function findJudge($n, $trust) {

        $who_trust = array_fill(0, $n, 0);
        $who_is_trusted = array_fill(0, $n, 0);

        foreach($trust as $t) {
            $who_trust[$t[0] - 1] = 1;
            $who_is_trusted[$t[1] - 1]++;
        }

        $result_who_trust = array_search(0, $who_trust);
        $result_who_is_trusted = array_search($n-1, $who_is_trusted);

        if($result_who_trust !== false && $result_who_is_trusted !== false && $result_who_is_trusted == $result_who_trust) {
            return $result_who_trust + 1;
        } else {
            return -1;
        }
    }
}

$n = 3; $trust = [[1,3],[2,3]];

$solution = new Solution();

print_r( $solution->findJudge($n, $trust), false);