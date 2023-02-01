package simple.theory.pattern.builder.good;

public class TeddyCatMaker {

    private final TeddyCatBuilder teddyCatBuilder;

    public TeddyCatMaker(TeddyCatBuilder teddyCatBuilder){
        this.teddyCatBuilder = teddyCatBuilder;
    }

    public TeddyCat getTeddyCat(){
        return this.teddyCatBuilder.getTeddyCat();
    }

    public void makeTeddyCat(){
        this.teddyCatBuilder.buildTeddyCatHead();
        this.teddyCatBuilder.buildTeddyCatTorso();
        this.teddyCatBuilder.buildTeddyCatTail();
        this.teddyCatBuilder.buildTeddyCatPaws();
        this.teddyCatBuilder.buildTeddyCatFur();
    }



}
