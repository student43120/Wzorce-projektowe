package simple.theory.pattern.builder.good;

public class Main {
    public static void main(String[] args) {
        TeddyCatBuilder fluffyStyleTeddyCat = new FluffyTeddyCatBuilder();
        TeddyCatMaker teddyCatMaker = new TeddyCatMaker(fluffyStyleTeddyCat);
        teddyCatMaker.makeTeddyCat();

        TeddyCat firstTeddyCat = teddyCatMaker.getTeddyCat();
        System.out.println("TeddyCat Make");
        System.out.println("TeddyCat Head Type: " + firstTeddyCat.getTeddyCatHead());
        System.out.println("TeddyCat Torso Type: " + firstTeddyCat.getTeddyCatTorso());
        System.out.println("TeddyCat Tail Type: " + firstTeddyCat.getTeddyCatTail());
        System.out.println("TeddyCat Paws Type: " + firstTeddyCat.getTeddyCatPaws());
        System.out.println("TeddyCat Fur Type: " + firstTeddyCat.getTeddyCatFur());

        TeddyCatBuilder sphinxStyleTeddyCat = new SphinxTeddyCatBuilder();
        teddyCatMaker = new TeddyCatMaker(sphinxStyleTeddyCat);
        teddyCatMaker.makeTeddyCat();

        TeddyCat secondTeddyCat = teddyCatMaker.getTeddyCat();
        System.out.println();
        System.out.println("TeddyCat 2 Make");
        System.out.println("TeddyCat Head Type: " + secondTeddyCat.getTeddyCatHead());
        System.out.println("TeddyCat Torso Type: " + secondTeddyCat.getTeddyCatTorso());
        System.out.println("TeddyCat Tail Type: " + secondTeddyCat.getTeddyCatTail());
        System.out.println("TeddyCat Paws Type: " + secondTeddyCat.getTeddyCatPaws());
        System.out.println("TeddyCat Fur Type: " + secondTeddyCat.getTeddyCatFur());
    }

}
