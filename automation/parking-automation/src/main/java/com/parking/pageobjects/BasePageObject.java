package com.parking.pageobjects;

import com.parking.drivermanager.WebDriverManager;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriverException;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.PageFactory;
import org.openqa.selenium.support.pagefactory.AjaxElementLocatorFactory;
import org.openqa.selenium.support.ui.ExpectedConditions;

import java.util.List;

public abstract class BasePageObject {

    private WebDriverManager webDriverManager;

    public BasePageObject(WebDriverManager webDriverManager) {
        AjaxElementLocatorFactory ajaxElementLocatorFactory = new AjaxElementLocatorFactory(webDriverManager.getWebDriver(), 10);
        PageFactory.initElements(ajaxElementLocatorFactory, this);
        this.webDriverManager = webDriverManager;
    }

    protected void click(WebElement webElement) {
        webDriverManager.getWebDriverWait().until(ExpectedConditions.elementToBeClickable(webElement));
        webElement.click();
    }

    protected String getText(WebElement webElement) {
        waitVisibilityOf(webElement);
        return webElement.getText().trim();
    }

    protected void waitVisibilityOf(WebElement webElement) {
        webDriverManager.getWebDriverWait().until(ExpectedConditions.visibilityOf(webElement));
    }

    protected boolean isPresent(By by) {
        try {
            return webDriverManager.getWebDriverWait().until(ExpectedConditions.presenceOfElementLocated(by)).isDisplayed();
        } catch (WebDriverException e) {
            return false;
        }
    }

    protected List<WebElement> getElementsBy(By by) {
        return webDriverManager.getWebDriver().findElements(by);
    }
}
