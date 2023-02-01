package simple.theory.pattern.prototype.good;

public interface Creature extends Cloneable{

    Creature makeCopy();

    String getAttack();

    String getName();

    String toString();
}
