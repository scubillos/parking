package com.parking;

import com.parking.basetestclasses.BaseTestSingleUI;
import org.junit.jupiter.api.Test;

public class TestOne extends BaseTestSingleUI {

    @Test
    public void test() {
        webDriver.get("https://www.selenium.dev/selenium/web/web-form.html");
        softAssertions.assertThat("ss").isEqualTo("ss");
    }
}
