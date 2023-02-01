package simple.theory.pattern.singleton.bad;

import simple.theory.pattern.singleton.bad.Counter;

public class Main {
    public static void main(String[] args) {
        Counter counter = new Counter();
        Counter counter2 = new Counter();
        int myValue = counter.getCurrentValue();
        int myValue2 = counter2.getCurrentValue();
        int i = 0;
        System.out.println(i + ": Value from counter = " + myValue);
        System.out.println(i + ": Value from counter2 = " + myValue2);
        counter.add();
        i = i + 1;
        myValue = counter.getCurrentValue();
        myValue2 = counter2.getCurrentValue();
        System.out.println(i + ": Value + 1 to counter = " + myValue);
        System.out.println(i + ": Value from counter2 = " + myValue2);
        counter2.add();
        i = i + 1;
        myValue = counter.getCurrentValue();
        myValue2 = counter2.getCurrentValue();
        System.out.println(i + ": Value + 1 to counter2 = " + myValue2);
        System.out.println(i + ": Value from counter = " + myValue);
        counter.add();
        i = i + 1;
        myValue = counter.getCurrentValue();
        myValue2 = counter2.getCurrentValue();
        System.out.println(i + ": Value + 1 to counter = " + myValue);
        System.out.println(i + ": Value from counter2 = " + myValue2);
    }
}
