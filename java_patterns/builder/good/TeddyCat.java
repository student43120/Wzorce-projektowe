package simple.theory.pattern.builder.good;

public class TeddyCat implements TeddyCatBody {

    private String teddyCatHead;
    private String teddyCatTorso;
    private String teddyCatTail;
    private String teddyCatPaws;
    private String teddyCatFur;

    @Override
    public void setTeddyCatHead(String head) {
        teddyCatHead = head;

    }

    public String getTeddyCatHead() {
        return teddyCatHead;
    }

    @Override
    public void setTeddyCatTorso(String torso) {
        teddyCatTorso = torso;
    }

    public String getTeddyCatTorso() {
        return teddyCatTorso;
    }

    @Override
    public void setTeddyCatTail(String tail) {
        teddyCatTail = tail;
    }

    public String getTeddyCatTail() {
        return teddyCatTail;
    }

    @Override
    public void setTeddyCatPaws(String paws) {
        teddyCatPaws = paws;
    }

    public String getTeddyCatPaws() {
        return teddyCatPaws;
    }

    @Override
    public void setTeddyCatFur(String fur) {
    teddyCatFur = fur;
    }

    public String getTeddyCatFur() {
        return teddyCatFur;
    }

}
