import java.util.locale;
import java.text.NumberFormat;
import java.text.NumberFormat.Style;

Locale locale = Locale.FRANCE;

NumberFormat currencyFormat = NumberFormat.getCurrencyInstance(locale);
NumberFormat percentFormat = NumberFormat.getPercentInstance(locale);
NumberFormat compactFormat = NumberFormat.getCompactNumberInstance(locale, Style.SHORT);

percentFormat.setMaximumFractionDigits(2);

String priceTxt = currencyFormat.format(price); // 1.73 (eur)
String percentTxt = percentFormat.format(rate); // 6.5%
String compactTxt = compactFormat.format(numCustomers); // 100 K

