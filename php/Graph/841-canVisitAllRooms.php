<?php

// 841. Keys and Rooms

// There are n rooms labeled from 0 to n - 1 and all the rooms are locked except for room 0. 
// Your goal is to visit all the rooms. 
// However, you cannot enter a locked room without having its key.

// When you visit a room, 
// you may find a set of distinct keys in it. 
// Each key has a number on it, denoting which room it unlocks, 
// and you can take all of them with you to unlock the other rooms.

// Given an array rooms where rooms[i] is the set of keys that you can obtain if you visited room i, 
// return true if you can visit all the rooms, or false otherwise.


class Solution {

    /**
     * @param Integer[][] $rooms
     * @return Boolean
     */
    function canVisitAllRooms($rooms) {
        $count_rooms = count($rooms);
        $room_keys = array_fill(0, $count_rooms, 0);
        $room_keys[0] = 1;
        $visited_room = array_fill(0, $count_rooms, 0);
        $rooms_to_visit = new SplQueue();
        $rooms_to_visit->enqueue(0);

        while(!$rooms_to_visit->isEmpty()) {

            $current_room = $rooms_to_visit->dequeue();

            if($room_keys[$current_room] == 0) {
                return false;
            }

            $visited_room[$current_room] = 1;
            $current_room_keys_count = count($rooms[$current_room]);

            for($i =0; $i < $current_room_keys_count; $i++){
                if(!$visited_room[$rooms[$current_room][$i]]) {
                    $rooms_to_visit->enqueue($rooms[$current_room][$i]);
                }
                $room_keys[$rooms[$current_room][$i]] = 1;
            };
            
        }

        $result = array_search(0, $visited_room);
        
        if($result !== false) {
            return false;
        } else {
            return true;
        }
    }
}

$rooms = [[1],[2],[3],[]];
// $rooms = [[1,3],[3,0,1],[2],[0]];
// $rooms = [[4],[3],[],[2,5,7],[1],[],[8,9],[],[],[6]];

$solution = new Solution();

print_r( $solution->canVisitAllRooms($rooms), false);