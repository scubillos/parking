package com.parking.pageobjects.reservation;

import com.parking.drivermanager.WebDriverManager;
import com.parking.pageobjects.BasePageObject;
import org.openqa.selenium.TimeoutException;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;

public class ReservationPageObject extends BasePageObject {

    @FindBy(xpath = "//a[@class='router-link-active router-link-exact-active nav-link']")
    private WebElement reservationButton;

    public ReservationPageObject(WebDriverManager webDriverManager) {
        super(webDriverManager);
    }

    public boolean isVisibleReservationButton() {
        try {
            waitVisibilityOf(reservationButton);
            return true;
        } catch (TimeoutException e) {
            return false;
        }
    }

    public String getTextReservationButton() {
        return getText(reservationButton);
    }
}
