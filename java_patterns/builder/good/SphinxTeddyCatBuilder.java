package simple.theory.pattern.builder.good;

public class SphinxTeddyCatBuilder implements TeddyCatBuilder{

    private final TeddyCat teddyCat;

    public SphinxTeddyCatBuilder() {
        this.teddyCat = new TeddyCat();
    }
    @Override
    public void buildTeddyCatHead() {

        teddyCat.setTeddyCatHead("Sphinx Head");

    }

    @Override
    public void buildTeddyCatTorso() {

        teddyCat.setTeddyCatTorso("Sphinx Torso");

    }

    @Override
    public void buildTeddyCatTail() {

        teddyCat.setTeddyCatTail("Sphinx Tail");

    }

    @Override
    public void buildTeddyCatPaws() {

        teddyCat.setTeddyCatPaws("Sphinx Paws");

    }

    @Override
    public void buildTeddyCatFur() {
        teddyCat.setTeddyCatFur("");
    }

    @Override
    public TeddyCat getTeddyCat() {
        return this.teddyCat;
    }
}
