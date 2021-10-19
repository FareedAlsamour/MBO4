package eindOpdracht2;



public class Opdracht2 {
    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        char[] weg = {'"', '?', '*'};
        String tekst =
                "Dit is een tekst met \" en ** en ?? "+
                        "en allerlei andere niet wenselijke tekens zoals ® etc. ";

        System.out.println(tekst);
        String result0 = CharRemover.remove(tekst);
        String result1 = CharRemover.remove(weg,tekst);
        System.out.println(result0);
        System.out.println(result1);

    }


}