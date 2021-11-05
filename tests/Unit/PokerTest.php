<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\PokerController;
use Illuminate\Support\Collection;

class PokerTest extends TestCase
{
    public function test_poker()
    {
        $this->assertTrue(true);
        $poker = PokerController::index([2,3,4,5,6], 5);
        $this->assertEquals($poker, [2,3,4,5,6]);

        $poker = PokerController::index([14,5,4,2,3], 5);
        $this->assertEquals($poker, [1,2,3,4,5]);

        $poker = PokerController::index([7,7,12,11,3,4,14],5);
        $this->assertEquals($poker, [7,7,12,11,3,4,14]);

        $poker = PokerController::index([7,3,2], 5);
        $this->assertEquals($poker, [7,3,2]);
    }
}
