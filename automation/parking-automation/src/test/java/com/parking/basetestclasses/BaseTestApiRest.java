package com.parking.basetestclasses;

import io.restassured.RestAssured;
import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.BeforeEach;

import static io.restassured.RestAssured.*;

import io.restassured.matcher.RestAssuredMatchers.*;
import org.hamcrest.Matchers.*;

public class BaseTestApiRest extends BaseTest {

    @BeforeEach
    public void beforeEach() {

    }

    @AfterEach
    public void afterEach() {

    }
}
