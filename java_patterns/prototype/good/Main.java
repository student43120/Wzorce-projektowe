package simple.theory.pattern.prototype.good;

public class Main {
    public static void main(String[] args) {
        CreaturesRegister creatureMaker = new CreaturesRegister();
        creatureMaker.addCreature(
                new Minotaur(
                        "Wojowniku! Na Twojej drodzę staje Minotaur!",
                        "Minotaur",100,50));
        creatureMaker.addCreature(
                new Kappa("Wojowniku! Na Twojej drodzę staje Kappa!",
                        "Kappa",60,70));
        Creature creature = creatureMaker.getCreature();
        Creature clonedCreature = creature.makeCopy();
        System.out.println("-------------------------------------------------------");
        System.out.println(creature);
        System.out.println("-------------------------------------------------------");
        System.out.println(clonedCreature);
        System.out.println("-------------------------------------------------------");
        System.out.println("Kreatura Hashcode: " + System.identityHashCode(System.identityHashCode(creature)));
        System.out.println("Clone Hashcode: " + System.identityHashCode(System.identityHashCode(clonedCreature)));
        System.out.println("-------------------------------------------------------");
        System.out.println("Lista potworow: ");
        creatureMaker.getListOfCreatures().stream().map(Creature::getName).forEach(System.out::println);
        System.out.println("-------------------------------------------------------");


    }
}
