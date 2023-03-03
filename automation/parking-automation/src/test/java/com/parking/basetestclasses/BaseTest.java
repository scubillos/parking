package com.parking.basetestclasses;

import org.assertj.core.api.SoftAssertions;
import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.BeforeEach;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

public class BaseTest {

    private final static Logger logger = LoggerFactory.getLogger(BaseTest.class);
    protected SoftAssertions softAssertions;

    @BeforeEach
    public void beforeAll() {
        logger.info("BeforeAll BaseTest.class");
        softAssertions = new SoftAssertions();
    }

    @AfterEach
    public void afterAll() {
        softAssertions.assertAll();
    }
}
