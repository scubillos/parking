package com.parking.basetestclasses;

import org.assertj.core.api.SoftAssertions;
import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.BeforeEach;

public class BaseTest {

    protected SoftAssertions softAssertions;

    @BeforeEach
    public void beforeAll() {
        softAssertions = new SoftAssertions();
    }

    @AfterEach
    public void afterAll() {
        softAssertions.assertAll();
    }
}
