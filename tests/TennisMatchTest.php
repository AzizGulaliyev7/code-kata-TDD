<?php


use App\Player;
use App\TennisMatch;
use PHPUnit\Framework\TestCase;

class TennisMatchTest extends TestCase
{
    /**
     * @test
     * @dataProvider scores
     */
    function it_scores_a_tennis_macht($playerOnePoints, $playerTwoPoints, $score)
    {
        $match = new TennisMatch(
            $payer1 = new Player('Player1'),
            $player2 = new Player('Player2')
        );

        for ($i = 0; $i < $playerOnePoints; $i++) {
            $payer1->score();
        }

        for ($i = 0; $i < $playerTwoPoints; $i++) {
            $player2->score();
        }

        $this->assertEquals($score, $match->score());
    }

    public function scores() {
        return [
            [0,0, 'love-love'],
            [1,0, 'fifteen-love'],
            [1,1, 'fifteen-fifteen'],
            [2,0, 'thirty-love'],
            [2,2, 'thirty-thirty'],
            [3,0, 'forty-love'],
            [3,3, 'deuce'],
            [4,4, 'deuce'],
            [5,5, 'deuce'],
            [4,3, 'Advantage: Player1'],
            [3,4, 'Advantage: Player2'],
            [4,0, 'Winner: Player1'],
            [0,4, 'Winner: Player2'],
        ];
    }
}
