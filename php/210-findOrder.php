<?php

// 210

// There are a total of numCourses courses you have to take, labeled from 0 to numCourses - 1. 
// You are given an array prerequisites where prerequisites[i] = [ai, bi] 
// indicates that you must take course bi first if you want to take course ai.

//     For example, the pair [0, 1], indicates that to take course 0 you have to first take course 1.

// Return the ordering of courses you should take to finish all courses. 
// If there are many valid answers, return any of them. 
// If it is impossible to finish all courses, return an empty array.

class Solution {

    private array $gray = [];
    private array $black = [];
    private array $pre = [];
    private array $stack = [];
    private bool $infLoop = false;

    private function dfs(int $node): void {

        if($this->infLoop) return;

        if(( !isset($this->pre[$node]) || count($this->pre[$node]) == 0)) {
            $this->black[] = $node;
            $this->stack[] = $node;

            $grayPosition = array_search($node, $this->gray);
            if($grayPosition !== false) {
                unset($this->gray[$grayPosition]);
            }
            return;
        }
        $this->gray[] = $node;
        for($i = 0; $i < count($this->pre[$node]); $i++) {
            $blackPosition = array_search($this->pre[$node][$i], $this->black);
            $grayPosition = array_search($this->pre[$node][$i], $this->gray);

            if(($blackPosition === false) && ($grayPosition === false)) $this->dfs($this->pre[$node][$i]);

            if($grayPosition !== false) {
                $this->infLoop = true;
                return;
            }
        }

        $this->black[] = $node;
        $this->stack[] = $node;
        $grayPosition = array_search($node, $this->gray);
        if($grayPosition !== false) {
            unset($this->gray[$grayPosition]);
        }
    }

    /**
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @return Integer[]
     */
    function findOrder($numCourses, $prerequisites) {
        $countPrerequisites = count($prerequisites);

        if($countPrerequisites == 0) {
            $result = [];
            for($i = 0; $i < $numCourses; $i++) {
                array_unshift($result, $i);
            }
            return $result;
        }

        $this->pre = [];
        $this->gray = [];
        $this->black = [];
        $maxCourse = -1;
        for($i = 0; $i < $countPrerequisites; $i++) {
            $this->pre[$prerequisites[$i][0]][] = $prerequisites[$i][1];
            $maxCourse = max($maxCourse, $prerequisites[$i][0]);
        }

        for($i =0; $i < $numCourses; $i++) {
            if(!array_key_exists($i, $this->pre)) $this->pre[$i] = [];
        }

        for($i =0; $i < $numCourses; $i++) {
            if(!in_array($i, $this->stack)) $this->dfs($i);
        }
        

        if($this->infLoop) {
            return [];
        } else {
            if(count($this->stack) < $numCourses) {
                for($i =0; $i < $numCourses; $i++) {
                    if(!in_array($i, $this->stack)) array_push($this->stack, $i);
                }
            };

            if(count($this->stack) > $numCourses) {
                $this->stack = array_slice($this->stack, 0, $numCourses);
            }

            return $this->stack;
        }
    }
}

// $numCourses = 2; $prerequisites = [[1,0]];
// $numCourses = 4; $prerequisites = [[1,0],[2,0],[3,1],[3,2]];
// $numCourses = 1; $prerequisites = [];
// $numCourses = 2; $prerequisites = [[0, 1]];
// $numCourses = 2; $prerequisites = [[0, 1], [1, 0]];
// $numCourses = 3; $prerequisites = [[1, 0]];
$numCourses = 7; $prerequisites = [[1,0],[0,3],[0,2],[3,2],[2,5],[4,5],[5,6],[2,4]];

$solution = new Solution();

print_r($solution->findOrder( $numCourses, $prerequisites ), false);