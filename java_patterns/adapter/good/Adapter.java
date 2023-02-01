package simple.theory.pattern.adapter.good;

public class Adapter implements Walkable{

    private final Centaur centaur;

    public Adapter(Centaur centaur) {
        this.centaur = centaur;
    }

    @Override
    public String walk() {
        return centaur.gallop();
    }
}
