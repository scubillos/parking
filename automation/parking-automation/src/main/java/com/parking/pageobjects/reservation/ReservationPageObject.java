package com.parking.pageobjects.reservation;

import com.beust.ah.A;
import com.parking.drivermanager.WebDriverManager;
import com.parking.models.reservations.viewmodel.Reservation;
import com.parking.pageobjects.BasePageObject;
import org.openqa.selenium.By;
import org.openqa.selenium.TimeoutException;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;

import java.util.Comparator;
import java.util.List;
import java.util.concurrent.atomic.AtomicInteger;
import java.util.stream.Collectors;

public class ReservationPageObject extends BasePageObject {

    private final static String xpathReservationButton = "//button[@class='btn btn-primary ripple-surface']";

    @FindBy(xpath = "//a[@class='router-link-active router-link-exact-active nav-link']")
    private WebElement reservationButton;
    @FindBy(xpath = "//ul[@class='navbar-nav me-auto mb-2 mb-lg-0']/li[2]/a")
    private WebElement profileButton;

    @FindBy(xpath = "//ul[@class='navbar-nav me-auto mb-2 mb-lg-0']/li[3]/a")
    private WebElement helpButton;

    @FindBy(xpath = "//ul[@class='navbar-nav me-auto mb-2 mb-lg-0']/li[4]/a")
    private WebElement closeSession;

    @FindBy(xpath = "//div//h5")
    private WebElement containerTitle;

    @FindBy(xpath = xpathReservationButton)
    private WebElement newReservationButton;

    @FindBy(xpath = "//div[@class='table-responsive']//tbody/tr")
    private List<WebElement> rowsReservation;

    public ReservationPageObject(WebDriverManager webDriverManager) {
        super(webDriverManager);
    }

    public String getTextReservationButton() {
        return getText(reservationButton);
    }

    public String getTextProfileButton() {
        return getText(profileButton);
    }

    public String getTextHelpButton() {
        return getText(helpButton);
    }

    public String getTextCloseSession() {
        return getText(closeSession);
    }

    public String getTextContainerTitle() {
        return getText(containerTitle);
    }

    public String getTextNewReservationButton() {
        return getText(newReservationButton);
    }

    public boolean isPresentNewReservationButton() {
        return isPresent(By.xpath(xpathReservationButton));
    }

    public static void main(String[] args) {
        AtomicInteger atomicInteger = new AtomicInteger(1);
        for (int i = 0; i < 5; i++) {
            System.out.println(atomicInteger.getAndAdd(1));
        }
    }

    public List<Reservation> getListReservation() {
        AtomicInteger atomicInteger = new AtomicInteger(1);

        return rowsReservation.stream()
                .map(webElement -> {
                    List<WebElement> webElementList = getElementsBy(By.xpath(String.format("//div[@class='table-responsive']//tbody/tr[%s]/td", atomicInteger.getAndAdd(1))));
                    return Reservation.builder()
                            .plate(webElementList.size() > 0 ? getText(webElementList.get(0)) : "undefined")
                            .scheduleDay(webElementList.size() > 1 ? getText(webElementList.get(1)) : "undefined")
                            .schedule(webElementList.size() > 2 ? getText(webElementList.get(2)) : "undefined")
                            .location(webElementList.size() > 3 ? getText(webElementList.get(3)) : "undefined")
                            .build();
                })
                .sorted(Comparator.comparing(Reservation::getPlate))
                .collect(Collectors.toList());
    }

}
