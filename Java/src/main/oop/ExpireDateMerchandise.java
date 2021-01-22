package oop;

import java.util.Date;

public interface ExpireDateMerchandise {
    boolean notExpiredInDays(int days);

    Date getExpiredDate();

    Date getProductedDate();

}
