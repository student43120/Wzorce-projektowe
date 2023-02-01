package simple.theory.pattern.adapter.good;

import java.util.List;
import java.util.Random;

public class Minotaur implements Walkable{

    String describe;
    String species;
    int live;
    int strength;
    static final List<String> attacks = List.of("Rogi","Kopyta","Ryk");

    String attack;

    public Minotaur(String describe, String species, int live, int strength) {
        this.describe = describe;
        this.species = species;
        this.live = live;
        this.strength = strength;
        this.attack = getAttack();
    }

    public String getAttack() {
        return attacks.get(getNumber());
    }

    public int getNumber(){
        Random round = new Random();
        return round.nextInt(attacks.size());
    }

    @Override
    public String toString() {
        return "MINOTAUR" + '\n' +
                "describe: " + describe + '\n' +
                "species: " + species + '\n' +
                "live: " + live + '\n' +
                "strength: " + strength + '\n' +
                "attack: " + attack;
    }

    @Override
    public String walk() {
        return "Powolne i miarowe kroki rozbrzmiały w pomieszczeniu: tump, ..., tump, ...";
    }
}
