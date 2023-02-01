package simple.theory.pattern.builder.good;

public class FluffyTeddyCatBuilder implements TeddyCatBuilder {

    private final TeddyCat teddyCat;

    public FluffyTeddyCatBuilder() {
        this.teddyCat = new TeddyCat();
    }

    @Override
    public void buildTeddyCatHead() {

        teddyCat.setTeddyCatHead("Fluffy Head");

    }

    @Override
    public void buildTeddyCatTorso() {

        teddyCat.setTeddyCatTorso("Fluffy Torso");

    }

    @Override
    public void buildTeddyCatTail() {

        teddyCat.setTeddyCatTail("Fluffy Tail");

    }

    @Override
    public void buildTeddyCatPaws() {

        teddyCat.setTeddyCatPaws("Fluffy Paws");

    }

    @Override
    public void buildTeddyCatFur() {
        teddyCat.setTeddyCatFur("Fluffy Fur");
    }

    @Override
    public TeddyCat getTeddyCat() {
        return this.teddyCat;
    }
}
