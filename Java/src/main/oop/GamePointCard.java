package main.oop;


import oop.VirtualMerchandise;

import java.util.Date;

public class GamePointCard extends main.oop.Merchandise implements VirtualMerchandise, ExpireDateMerchandise {
    @Override
    public boolean notExpiredInDays(int days) {
        return false;
    }

    @Override
    public Date getExpiredDate() {
        return null;
    }

    @Override
    public Date getProductedDate() {
        return null;
    }
}
