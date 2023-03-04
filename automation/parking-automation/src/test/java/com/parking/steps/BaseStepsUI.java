package com.parking.steps;

import com.parking.PagesLinks;
import com.parking.basetestclasses.BaseTestSingleUI;
import com.parking.pageobjects.reservation.ReservationPageObject;
import io.qameta.allure.Step;


public class BaseStepsUI extends BaseTestSingleUI {
    @Step("Given a view {0} the system goes to it")
    public void navigateTo(PagesLinks pagesLinks) {
        getWebDriverManager().getWebDriver().get(pagesLinks.getPath());
    }

    @Step("When as a user I watch the reservation view and Then I check the all elements should be present")
    public void checkTheElementIntoTheScreenReservation() {
        ReservationPageObject reservationPO = new ReservationPageObject(getWebDriverManager());

        checkPresentElement("Reservation button", true, reservationPO.isVisibleReservationButton());

        checkText("Reservaciones", reservationPO.getTextReservationButton());
    }

    @Step("The element {0} should be present {1}, expected result {2}")
    private void checkPresentElement(String nameElement, boolean expected, boolean currently) {
        softAssertions.assertThat(expected)
                .as("The " + nameElement + " element should be present")
                .isEqualTo(currently);
    }

    @Step("Validate text expected result {0} actual result {1}")
    public void checkText(String expected, String actual) {
        softAssertions.assertThat(expected)
                .as("The text should be: " + expected)
                .isEqualToIgnoringCase(actual);
    }
}
