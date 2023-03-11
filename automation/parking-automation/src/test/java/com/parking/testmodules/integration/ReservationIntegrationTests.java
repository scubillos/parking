package com.parking.testmodules.integration;

import com.parking.PagesLinks;
import com.parking.steps.BaseStepsUI;
import io.qameta.allure.Description;
import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.Test;

public class ReservationIntegrationTests extends BaseStepsUI {


    @Test
    @DisplayName("Reservation: Check list of values against service")
    @Description("This test has the target of check the values in the screen are the same against the service")
    public void checkListReservationsService() {
        //Given
        navigateTo(PagesLinks.RESERVATION);

        //When
        getReservationListFromScreen();

        //Then
        compareReservationList();
    }


    @Test
    @DisplayName("Check list of values against service")
    @Description("This test has the target of check the values in the screen are the same against the database")
    public void checkListReservationsDataBase() {

    }
}
