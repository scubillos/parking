package com.parking.testmodules.backend;

import com.parking.basetestclasses.BaseTestApiRest;
import com.parking.models.reservations.ResponseReservations;
import com.parking.models.user.ResponseUser;
import io.qameta.allure.Description;
import io.qameta.allure.Step;
import io.qameta.allure.restassured.AllureRestAssured;
import io.restassured.RestAssured;
import io.restassured.response.Response;
import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.Test;

public class ReservationsTest extends BaseTestApiRest {

    private String baseUrl = "http://localhost:8000/";
    private String apiReservations = "/api/reservations";
    private String apiReservation = "/api/reservation";


    @Test
    @DisplayName("Reservation list")
    @Description("This test check the list of reservations present")
    public void checkListReservations() {
        Response response = RestAssured.given().baseUri(baseUrl)
                .filter(new AllureRestAssured())
                .when()
                .get(apiReservations);
        checkStatusCode(200, response.getStatusCode());
        response.then().log().all();
        ResponseReservations dataItem = response.body().as(ResponseReservations.class);
    }

    @Test
    @DisplayName("Reservation list")
    @Description("This test check the list of reservations present")
    public void testOne() {
        Response response = RestAssured.given().baseUri("https://reqres.in")
                .filter(new AllureRestAssured())
                .when()
                .get("/api/users/2");
        checkStatusCode(200, response.getStatusCode());
        response.then().log().all();
        ResponseUser dataItem = response.body().as(ResponseUser.class);
        System.out.println();
    }

    @Test
    @DisplayName("Reservation list")
    @Description("This test check the list of reservations present")
    public void checkReservation() {
        RestAssured.given().baseUri(baseUrl)
                .filter(new AllureRestAssured())
                .when().body("{\"plat_number\":\"MPX967\",\"schedule_day\":\"2023-03-18\",\"location_id\":1,\"schedule\":\"morning\"}")
                .put(apiReservation)
                .then()
                .statusCode(200)
                .log()
                .all();
    }

    @Step("Check status code {0} expected vs {1} currently")
    public void checkStatusCode(int expectedStatus, int currentlyResult) {
        softAssertions.assertThat(expectedStatus)
                .as("The expected result status should be: " + currentlyResult)
                .isEqualTo(currentlyResult);
    }

    @Step("Check string values {0} expected vs {1} currently")
    public void checkStringValues(String expectedStatus, String currentlyResult) {
        softAssertions.assertThat(expectedStatus)
                .as("The expected result status should be: " + currentlyResult)
                .isEqualToIgnoringCase(currentlyResult);
    }

}
