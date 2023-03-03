package com.parking.basetestclasses;

import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.BeforeEach;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class BaseTestSingleUI extends BaseTest {
    protected WebDriver webDriver;

    @BeforeEach
    public void beforeEach() {
        webDriver = new ChromeDriver();
    }

    public BaseTestSingleUI() {

    }

    @AfterEach
    public void afterEach() {
        webDriver.close();
        webDriver.quit();
    }
}
