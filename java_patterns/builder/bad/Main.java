package simple.theory.pattern.builder.bad;

public class Main {
    public static void main(String[] args) {
        TeddyCat firstTeddyCat = new TeddyCat();
        firstTeddyCat.setTeddyCatHead("Fluffy Head");
        firstTeddyCat.setTeddyCatTorso("Fluffy Toros");
        firstTeddyCat.setTeddyCatTail("Fluffy Tail");
        firstTeddyCat.setTeddyCatPaws("Fluffy Paws");
        firstTeddyCat.setTeddyCatFur("Fluffy Fur");

        System.out.println("TeddyCat Make");
        System.out.println("TeddyCat Head Type: " + firstTeddyCat.getTeddyCatHead());
        System.out.println("TeddyCat Torso Type: " + firstTeddyCat.getTeddyCatTorso());
        System.out.println("TeddyCat Tail Type: " + firstTeddyCat.getTeddyCatTail());
        System.out.println("TeddyCat Paws Type: " + firstTeddyCat.getTeddyCatPaws());
        System.out.println("TeddyCat Fur Type: " + firstTeddyCat.getTeddyCatFur());

        TeddyCat secondTeddyCat = new TeddyCat();
        secondTeddyCat.setTeddyCatHead("Sphinx Head");
        secondTeddyCat.setTeddyCatTorso("Sphinx Toros");
        secondTeddyCat.setTeddyCatTail("Sphinx Tail");
        secondTeddyCat.setTeddyCatPaws("Sphinx Paws");
        secondTeddyCat.setTeddyCatFur("");

        System.out.println();
        System.out.println("TeddyCat 2 Make");
        System.out.println("TeddyCat Head Type: " + secondTeddyCat.getTeddyCatHead());
        System.out.println("TeddyCat Torso Type: " + secondTeddyCat.getTeddyCatTorso());
        System.out.println("TeddyCat Tail Type: " + secondTeddyCat.getTeddyCatTail());
        System.out.println("TeddyCat Paws Type: " + secondTeddyCat.getTeddyCatPaws());
        System.out.println("TeddyCat Fur Type: " + secondTeddyCat.getTeddyCatFur());
    }

    // Patern bilder jest używany do zachowania niezmienności procesu wytwarzania obiektu z zachowaniem jego różnorodności.
    // Aktualnie wytwarzamy tylko jeden rodzaj kota ustawiając jego parametry ręcznie.
    // Klient wie wszystko o specyfikacji obiektu - zmiana obiektu wymaga zmiany w kodzie klienta.
    // Złamanie zasady Open/Close.

}
