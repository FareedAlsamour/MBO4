package eindOpdracht;

public class FormuleBereken {

    //recursive method definition
    public static int add(int x, int y)
    {
        if(y==0)
            return x;
        else
            return(1+add(x,y-1));
    }
    public static int multi(int x, int y)
    {
        if(y==0)
            return 0;
        else
            return(x + multi(x,y-1));
    }
    public static int min(int x, int y)
    {
        if(y==0)
            return x;
        else
            return(min(x,y-1)-1);
    }


    static Integer bereken(String formule) {
        int begin = formule.lastIndexOf('(');
        if (begin != -1) {
            int end = formule.indexOf(')', begin);
//            System.out.println(begin);
//            System.out.println(end);
            String newFormule = formule.substring(begin + 1, end);
            System.out.println(newFormule);
            formule = formule.substring(0, begin) + bereken(newFormule) + formule.substring(end + 1);
            System.out.println(formule);
            return bereken(formule);


        } else {
            //geen haakjes meer

            int multiply = formule.indexOf('*');
            int dev = formule.indexOf('/');
            int plus = formule.indexOf('+');
            int min = formule.indexOf('-');

            if (multiply != -1) {
                String first = "";
                String last = "";
                String a = "";
                String operators[] = formule.split("[0-9]+");
                boolean operatorFound = false;
                boolean operatorIsAdd = false;
                int position = formule.indexOf('*');
                ;
                int endPos = position + 1;
                int beginPos = position - 1;
                boolean characterFound = false;

                for (int i = 0; i < operators.length; i++) {
                    if (operators[i].contains("*")) {
                        for (int checker = position + 1; checker < formule.length(); checker++) {
                            if (Character.isDigit(formule.charAt(checker)) && !characterFound) {
                                endPos = checker + 1;
                            } else if (!Character.isDigit(formule.charAt(checker))) {
                                characterFound = true;
                            }
                        }
                        characterFound = false;
                        for (int checker = position - 1; checker >= 0; checker--) {
                            if (Character.isDigit(formule.charAt(checker)) && !characterFound) {
                                beginPos = checker;
                            } else if (!Character.isDigit(formule.charAt(checker))) {
                                characterFound = true;
                            }

                        }

                    }

                }
                a = formule.substring(beginPos, endPos);
                System.out.println("formule is " + formule);
                System.out.println("a is " + a);
                int x = Integer.parseInt(a.substring(0, a.indexOf('*')));
                int y = Integer.parseInt(a.substring(a.indexOf('*') + 1));
                String n = String.valueOf(multi(x, y));
                String newfor = formule.replace(a, n);
                System.out.println(newfor);
                return bereken(newfor);

            }

            if (plus != -1 || min != -1) {
                String first = "";
                String last = "";
                String a = "";

                String operators[] = formule.split("[0-9]+");
                boolean operatorFound = false;
                boolean operatorIsAdd = false;
                int position = 0;
                int endPos = 0;
                int beginPos = 0;
                boolean characterFound = false;
                for (int i = 0; i < operators.length && !operatorFound; i++) {
                    if (operators[i].contains("+") || operators[i].contains("-")) {
                        operatorIsAdd = operators[i].contains("+");

                        if (operatorIsAdd) {
                            position = formule.indexOf('+');
                        } else {
                            position = formule.indexOf('-');
                        }

                        operatorFound = true;
                    }
                }
                for (int checker = position + 1; checker < formule.length(); checker++) {
                    if (Character.isDigit(formule.charAt(checker)) && !characterFound) {
                        endPos = checker + 1;
                    } else if (!Character.isDigit(formule.charAt(checker))) {
                        characterFound = true;
                    }
                }
                characterFound = false;
                for (int checker = position - 1; checker >= 0; checker--) {
                    if (Character.isDigit(formule.charAt(checker)) && !characterFound) {
                        beginPos = checker;
                    } else if (!Character.isDigit(formule.charAt(checker))) {
                        characterFound = true;
                    }

                }

                a = formule.substring(beginPos, endPos);

                System.out.println("formule is " + formule);
                System.out.println("a is " + a);
                System.out.println("end pos is " + endPos);
                System.out.println(" pos is " + position);
                System.out.println("begin pos is " + beginPos);
                String n;
                if (operatorIsAdd) {
                    int x = Integer.parseInt(a.substring(beginPos, position));
//                    Q : WHY WHEN REMOVING +1 THE CODE STILL RUNS WITH NO ERRORS
//                    POSITION STANDS FOR TH INDEX VALUE OF THE OPERATOR & WE WANT TO SUBSTRING WHAT'S AFTER THE OPERATOR EXCLUSIVELY !!
//                     NOTE : REMOVING +1 FROM THE ELSE STATEMENT WOULD THROW US A STACKOVERFLOW ERROR...
                    int y = Integer.parseInt(a.substring(position +1, endPos));
                    n = String.valueOf(add(x, y));
                } else {
                    int x = Integer.parseInt(a.substring(beginPos, position));
                    int y = Integer.parseInt(a.substring(position+1,endPos));
                    n = String.valueOf(min(x, y));
                }
                String newfor = formule.replace(a, n);
                System.out.println(newfor);
                return bereken(newfor);

            }
            int result = 0;
            try {
                result = Integer.parseInt(formule);
            } catch (Exception e) {
                result = 0;
            } finally {
                return result;
            }
        }
    }
}

