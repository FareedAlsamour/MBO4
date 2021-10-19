package eindOpdracht2;

public class CharRemover {
//    AUTO REMOVER ; REMOVES EVERY THING EXCEPT FOR LETTERS AND SPACES, NOT THAT USEFUL!
    static String remove(String input){
        StringBuilder output = new StringBuilder();
        for (int i = 0; i < input.length(); i++){
            if (Character.isLetter(input.charAt(i)) || Character.isSpaceChar(input.charAt(i))){
                output.append(input.charAt((i)));
            }
        }
        return output.toString();
    }

//    CONTROLLED REMOVER TAKES UNWANTED CHARS. AS ARGUMENT && RETURN CLEAN TEXT;
    static String remove(char[] unwanted, String input){
        StringBuilder output = new StringBuilder();
        boolean checker = false;
        for (int i = 0; i < input.length(); i++) {
            for (int j = 0; j < unwanted.length && !checker; j++) {
                if (input.charAt(i) != unwanted[j]) {
                    checker = false;
                }
                else {
                    checker = true;
                }
            }
            if (!checker) {
                output.append(input.charAt((i)));
            }

            checker = false;
        }
        return output.toString();
    }
}
