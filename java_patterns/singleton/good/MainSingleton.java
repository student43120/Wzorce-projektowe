package simple.theory.pattern.singleton.good;

import simple.theory.pattern.singleton.good.CounterSingleton;

public class MainSingleton {
    public static void main(String[] args) {
        CounterSingleton counterSingleton = CounterSingleton.getInstance();
        CounterSingleton counterSingleton2 = CounterSingleton.getInstance();
        int myValue = counterSingleton.getCurrentValue();
        int myValue2 = counterSingleton2.getCurrentValue();
        int i = 0;
        System.out.println(i + ": Value from counter = " + myValue);
        System.out.println(i + ": Value from counter2 = " + myValue2);
        counterSingleton.add();
        i = i + 1;
        myValue = counterSingleton.getCurrentValue();
        myValue2 = counterSingleton2.getCurrentValue();
        System.out.println(i + ": Value + 1 to counter = " + myValue);
        System.out.println(i + ": Value from counter2 = " + myValue2);
        counterSingleton2.add();
        i = i + 1;
        myValue = counterSingleton.getCurrentValue();
        myValue2 = counterSingleton2.getCurrentValue();
        System.out.println(i + ": Value + 1 to counter2 = " + myValue2);
        System.out.println(i + ": Value from counter = " + myValue);
        counterSingleton.add();
        i = i + 1;
        myValue = counterSingleton.getCurrentValue();
        myValue2 = counterSingleton2.getCurrentValue();
        System.out.println(i + ": Value + 1 to counter = " + myValue);
        System.out.println(i + ": Value from counter2 = " + myValue2);
    }
}
