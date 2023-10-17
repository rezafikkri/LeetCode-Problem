<?php

enum Bracket: string
{
    case Round = '()';
    case Curly = '{}';
    case Square = '[]';
}

function isOpenBracket($openB) {
    foreach (Bracket::cases() as $bracket) {
        if (Bracket::tryFrom($openB . $bracket[1])) return true;
    }
    return false;
}

class Solution {
    /**
     * @param String $s
     * @return Boolean
     */
    function isValid(string $s): bool {
        $countS = strlen($s);

        // if length of $s is odd, then invalid
        if ($countS % 2 != 0) return false;

        // if first combination ex. {}[](), then
        if (Bracket::tryFrom($s[0] . $s[1])) {
            // if opening bracket not closed by correct closing bracket in correct order
            for ($i = 0; $i < $countS; $i += 2) {
                if (!Bracket::tryFrom($s[$i] . $s[$i + 1])) return false;
            }
        }
        // if second combination ex. {[()]}, then
        else if (Bracket::tryFrom($s[0] . $s[-1])) {
            $dividing = $countS / 2;
            for ($i = 0; $i < $dividing; $i++) {
                // if opening bracket not closed by correct closing bracket in correct order
                if (!Bracket::tryFrom($s[$i] . $s[($countS - 1) - $i])) return false;
            }
        } else {
            return false;
        }
 
        return true;
    }
}

$obj = new Solution;
var_dump($obj->isValid("{[())}"));

// var_dump(Bracket::tryFrom('()'));
/*
7
1 = 6
2 = 

({[()]})
*/
