<?php

function longestCommonPrefix($strs) {
    // if array strs is only one
    if (count($strs) == 1) {
        return $strs[0];
    }

    $firstStr = $strs[0];
    $firstStrLength = strlen($firstStr);
    //remove first str
    array_shift($strs);

    $result = "";
    for ($i = 0; $i < $firstStrLength; $i++) {
        // check, if now letter in loop, exists in all string in array strs?
        $check = false;
        foreach ($strs as $str) {
            if (isset($str[$i]) && $firstStr[$i] === $str[$i]) {
                $check = true;
            } else {
                $check = false;
                break;
            }
        }
        
        // if now, in loop progress, check is 'false', the break loop
        if ($check == false) break;

        $result .= $firstStr[$i];
    }

    return $result;
}

/**
 * Status: Accepted
 * Runtime: 13 ms - Beats 25.93% of users with PHP
 * Memory: 19.79 MB - Beats 91.26% of users with PHP
 *
 * Submited: Mar 18, 2024 10:42
 * Link: https://leetcode.com/problems/longest-common-prefix/submissions/1206855445
 */
