package simple.theory.pattern.adapter.bad;

public class Main {

    public static void main(String[] args) {

        Walkable minotaur = new Minotaur(
                "Wojowniku! Na Twojej drodzę staje Minotaur!",
                "Minotaur",100,50);

        // Brak możliwości wywołania metody walk dla centaura,
        // klient może wywołać jedynie metode galop dla tego obiektu, trzeba zmienić kod klienta
        Centaur centaur = new Centaur();

        klientWywolujePrzeciwnikaNaPlansze(minotaur);
        klientWywolujePrzeciwnikaNaPlansze(centaur);
    }

    private static void klientWywolujePrzeciwnikaNaPlansze(Object creature) {
        if (creature instanceof Walkable){
        System.out.println(((Walkable) creature).walk());}
        else {
            System.out.println(((Centaur) creature).gallop());
        }
    }
}
