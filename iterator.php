<?php


class BasketballTeamIterator implements Iterator, Countable {

    private $level = 0;
    private $teamteamMembers = [];

    public function __construct (teamPlayer $player) {
        $this->addTeam($player);
        $this->level = 0;
    }

    protected function addTeam (teamPlayer $player): void {
        foreach ($player->getSubordinates() as $teamMember) {
            array_push($this->teamteamMembers, $teamMember);
            $this->addTeam($teamMember);
        }
    }

    public function current (): teamPlayer {
        return $this->teamMembers[$this->level];
    }

    public function next (): void {
        ++$this->level;
    }

    public function key (): int {
        return $this->level;
    }

    public function valid (): bool {
        return isset($this->teamMembers[$this->level]);
    }

    public function rewind (): void {
        $this->level = 0;
    }

    public function count (): int {
        return count($this->teamMembers);
    }
}