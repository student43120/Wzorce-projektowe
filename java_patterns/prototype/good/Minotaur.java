package simple.theory.pattern.prototype.good;

import java.util.List;
import java.util.Random;

public class Minotaur implements Creature{

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

    @Override
    public String getName() {
        return species;
    }

    public int getNumber(){
        Random round = new Random();
        return round.nextInt(attacks.size());
    }

    @Override
    public Creature makeCopy() {
        System.out.println("Tworzony przeciwnik: Minotaur");
        Minotaur minotaurObject;
        try {
            minotaurObject = (Minotaur) super.clone();
        } catch (CloneNotSupportedException e) {
            throw new RuntimeException(e);
        }

        return minotaurObject;
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
}
