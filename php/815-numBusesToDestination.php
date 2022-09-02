<?php

// 815. Bus Routes

// You are given an array routes representing bus routes where routes[i] is a bus route that the ith bus repeats forever.

//     For example, if routes[0] = [1, 5, 7], this means that the 0th bus travels in the sequence 1 -> 5 -> 7 -> 1 -> 5 -> 7 -> 1 -> ... forever.

// You will start at the bus stop source (You are not on any bus initially), and you want to go to the bus stop target. You can travel between bus stops by buses only.

// Return the least number of buses you must take to travel from source to target. Return -1 if it is not possible.


class Solution {

    /**
     * @param Integer[][] $routes
     * @param Integer $source
     * @param Integer $target
     * @return Integer
     */
    function numBusesToDestination($routes, $source, $target) {

        if($source == $target) return 0;

        $bus_stops = [];
        $countRoutes = count($routes);

        for($i = 0; $i < $countRoutes; $i++) {
            $countStops = count($routes[$i]);
            for($j = 0; $j < $countStops; $j++) {
                $bus_stops[$routes[$i][$j]][] = $i;
            }
        }

        $to_visit = []; //queue
        $buses = [];

        foreach($bus_stops[$source] as $bus) {
            foreach($routes[$bus] as $route) {
                $to_visit[] = [$route, 1];
            }
            $buses[$bus] = true;
        }

        while(!empty($to_visit)) {
            $tmp = array_shift($to_visit);
            $route = $tmp[0];
            $amount = $tmp[1];

            if($route == $target) return $amount;

            foreach($bus_stops[$route] as $bus) {
                if(!isset($buses[$bus])){
                    $buses[$bus] = true;
                    foreach($routes[$bus] as $x) {
                        $to_visit[] = [$x, $amount + 1];
                    }
                }
            }
        }

        return -1;
    }
}

$routes = [[1,2,7],[3,6,7]]; $source = 1; $target = 6;
// $routes =[[0, 1, 2], [0, 3, 4], [2, 5, 6], [4, 7, 6]]; $source = 0; $target = 7;

$solution = new Solution();

print_r($solution->numBusesToDestination( $routes, $source, $target ), false);