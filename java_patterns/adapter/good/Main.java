package simple.theory.pattern.adapter.good;

public class Main {

    public static void main(String[] args) {

        Walkable minotaur = new Minotaur(
                "Wojowniku! Na Twojej drodzę staje Minotaur!",
                "Minotaur",100,50);

        Walkable centaur = new Adapter(new Centaur());

        klientWywolujePrzeciwnikaNaPlansze(minotaur);
        klientWywolujePrzeciwnikaNaPlansze(centaur);
    }

    private static void klientWywolujePrzeciwnikaNaPlansze(Walkable creature) {
        System.out.println(creature.walk());
    }

}
