import java.time.LocalDate;
import java.time.Month;
import java.time.format.DateTimeFormatter;
import java.util.Locale;
class Main {
    public static void main(String[] args) {
        LocalDate date = LocalDate.of(2025,Month.APRIL,15);
        Locale local = new Locale("en","GB");
        DateTimeFormatter fdate = DateTimeFormatter.ofPattern("dd-MM-yyyy");
        String formatedDate = date.format(fdate);
        
        System.out.println(formatedDate);
    }
}
