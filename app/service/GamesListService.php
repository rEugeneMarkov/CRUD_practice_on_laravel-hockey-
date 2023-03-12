<?php

namespace App\Service;

use App\Models\Tournament;

class GamesListService
{
    public $gamesList = [];
    public $tournament;
    public $teams;

    public function create(Tournament $tournament)
    {
        $this->tournament = $tournament;
        $this->teams = $this->createTeamsList($this->tournament->teams);
        $teams = $tournament->teams()->count();

        if ($teams % 2 === 1) {
            $x = 0;
            $rounds = $teams;
        } else {
            $x = $teams;
            $rounds = $teams - 1;
        }
        $k = 1;
        for ($i = 1; $i <= $rounds; $i++) {
            if ($i % 2 == 1) {
                $data[$i][2] = $x;
            } else {
                $data[$i][1] = $x;
            }

            for ($j = 1; $j <= $rounds; $j++) {
                //if ($k == $rounds + 1) $k = 1;
                $k = ($k == $rounds + 1) ? 1 : $k;
                if ($i % 2 == 1) {
                    $data[$i][$j] =  $k;
                    $j++;
                    $k++;
                } else {
                    if ($j == 1) {
                        $data[$i][2] = $k;
                    } else {
                        $data[$i][$j] = $k;
                    }
                    $j++;
                    $k++;
                }
            }
        }
        $k = 1;
        for ($i = $rounds; $i >= 1; $i--) {
            for ($j = $rounds + 1; $j > 2; $j--) {
                //if ($k == $rounds + 1) $k = 1;
                $k = ($k == $rounds + 1) ? 1 : $k;
                if ($i % 2 == 0) {
                    $data[$i][$j] =  $k;
                    $j--;
                    $k++;
                } else {
                    $data[$i][$j] = $k;
                    $k++;
                    $j--;
                }
            }
        }

        $i = 1;
        foreach ($data as $round) {
            ksort($round);
            foreach ($round as $key => $team) {
                if ($key % 2 == 1) {
                    $gamesList[$i]['homeTeam'] = $this->teams[$team];
                } else {
                    $gamesList[$i]['guestTeam'] = $this->teams[$team];
                    if ($gamesList[$i]['guestTeam'] !== 0 && $gamesList[$i]['homeTeam'] !== 0) {
                        $i++;
                    }
                }
            }
        }
        ksort($gamesList);
        $this->gamesList = $gamesList;
        return $this;
    }
    public function createTeamsList($teams)
    {
        foreach ($teams as $key => $value) {
            $teams[$key + 1] = $value;
        }
        $teams[0] = 0;
        $teams = $teams->toarray();
        return $teams;
    }
}
