package simple.theory.pattern.builder.good;

public interface TeddyCatBuilder {

    void buildTeddyCatHead();
    void buildTeddyCatTorso();
    void buildTeddyCatTail();
    void buildTeddyCatPaws();

    void buildTeddyCatFur();

    TeddyCat getTeddyCat();
}
