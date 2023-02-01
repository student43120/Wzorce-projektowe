// SINGLETON
// def. dana klasa będzie miała tylko i wyłącznie jedną instancję obiektu,
// i gwarantuje globalny punkt dostępu do tej instancji.
//
// Jest określany jako antywzorzec ponieważ używa obiektów statycznych.
//
//


package simple.theory.pattern.singleton.good;

public class CounterSingleton {
    private volatile static CounterSingleton uniqueInstance = new CounterSingleton();
    private int currentValue;

    private CounterSingleton() {
        currentValue = getCurrentValue();
    }

    public static synchronized CounterSingleton getInstance() {
        if (uniqueInstance == null) {
            synchronized (CounterSingleton.class) {
                if (uniqueInstance == null) {
                    uniqueInstance = new CounterSingleton();
                }
            }
        }
        return uniqueInstance;
    }

    public int getCurrentValue() {
        return currentValue;
    }

    public void add() {
        currentValue = currentValue + 1;
    }

}
