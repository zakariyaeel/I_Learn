import java.math.BigDecimal;
import java.math.RoundingMode;

BigDecimal price = 1.85;
BigDecimal rate = 0.065;
double numCustomers = 100000;

price = price.subtract(price.multiply(rate)).setScale(2,RoundingMode.HALF_UP);
