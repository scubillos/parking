package com.parking;

import com.parking.basetestclasses.BaseTestApiRest;
import io.qameta.allure.restassured.AllureRestAssured;
import io.restassured.RestAssured;
import org.junit.jupiter.api.Test;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

public class TestRest extends BaseTestApiRest {

    private final static Logger logger = LoggerFactory.getLogger(TestRest.class);

    @Test
    public void restTest() {
        RestAssured.given().baseUri("https://reqres.in/")
                .filter(new AllureRestAssured())
                .expect().statusCode(200)
                .when()
                .get("/api/users?page=2")
                .then()
                .log()
                .all();
    }
}
