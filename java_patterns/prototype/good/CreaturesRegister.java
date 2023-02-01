package simple.theory.pattern.prototype.good;

import java.util.ArrayList;
import java.util.List;
import java.util.Random;

public class CreaturesRegister {
    List<Creature> listOfCreatures = new ArrayList<>();

    public void addCreature(Creature creature) {
        listOfCreatures.add(creature);
    }

    public List<Creature> getListOfCreatures() {
        return listOfCreatures;
    }

    public Creature getCreature() {
        return listOfCreatures.get(getRandomIndex());
    }

    public int getRandomIndex(){
        Random round = new Random();
        return round.nextInt(listOfCreatures.size());
    }

}
