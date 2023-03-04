package com.parking.basetestclasses;

import com.parking.drivermanager.WebDriverManager;
import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.BeforeEach;
import org.openqa.selenium.OutputType;
import org.openqa.selenium.TakesScreenshot;

import java.io.File;
import java.io.InputStream;
import java.nio.file.Files;

public class BaseTestSingleUI extends BaseTest {

    private WebDriverManager webDriverManager;

    @BeforeEach
    public void beforeEach() {
        webDriverManager = new WebDriverManager();
    }

    @AfterEach
    public void afterEach() {
        webDriverManager.closeWebDriver();
    }

    public WebDriverManager getWebDriverManager() {
        return webDriverManager;
    }
}
