<?php

namespace MyProject\Tests;

use Sauce\Sausage\WebDriverTestCase;

class s2_edit_interval_change_min_max extends WebDriverTestCase {
    public static $browsers = array(
        // run FF15 on Windows 8 on Sauce
        array(
            'browserName' => 'firefox',
            'desiredCapabilities' => array(
                'version' => '15',
                'platform' => 'Linux',
            )
        ),
        // run Chrome on Linux on Sauce
        /*array(
            'browserName' => 'chrome',
            'desiredCapabilities' => array(
                'platform' => 'Linux',
            )
        ),*/
    );
  /**
   * Recorded steps.
   */
  public function testSteps() {
    $test = $this; // Workaround for anonymous function scopes in PHP < v5.4.
    $session = $this->prepareSession(); // Make the session available.
    // store
    $test->site_name = "http://wwwdev3.ondeficar.com";
    // store
    $test->user_login = "selenium@cloudbeds.com";
    // store
    $test->user_pass = "testTime!";
    // get
    $this->url($test->site_name . "/auth/login");
    // setElementText
    $element = $this->byId("email");
    $element->click();
    $element->clear();
    $element->value($test->user_login);
    // setElementText
    $element = $this->byId("password");
    $element->click();
    $element->clear();
    $element->value($test->user_pass);
    // clickElement
    $this->byXPath("//div[@class='form-actions']//button[normalize-space(.)='Login']")->click();
    // waitForCurrentUrl
    $this->waitUntil(function() use ($test) {
      try {
        $test->assertEquals($test->site_name . "/connect/366#/dashboard", $test->url());
      } catch(\Exception $e) {
        return null;
      }
      return true;
    },50000);
    // store
    $test->hash = "roomRates";
    // clickElement
    $this->byName("arates")->click();
    // clickElement
    $this->byLinkText("Best Available Rate")->click();
    // waitForElementAttribute
    $this->waitUntil(function() use ($test) {
      try {
        $test->assertEquals($test->hash, $test->byId("layout")->attribute("data-current_view"));
      } catch(\Exception $e) {
        return null;
      }
      return true;
    },50000);
    // assertElementAttribute
    $test->assertEquals($test->hash, $test->byId("layout")->attribute("data-current_view"));
    // clickElement
    $this->byCssSelector("a[href=\"#tab_0\"]")->click();
    // clickElement
    $this->byXPath("//div[@id='tab_0']/form/div[6]/div/div[2]/table/tbody/tr[4]/td[7]/a[1]/i")->click();
    // assertElementPresent
    try {
      $boolean = ($test->byCssSelector("#tab_0 .new_interval_form:not(.hide)") instanceof \PHPUnit_Extensions_Selenium2TestCase_Element);
    } catch (\Exception $e) {
      $boolean = false;
    }
    $test->assertTrue($boolean);
    // storeElementValue
    $test->min_los = $test->byName("min_los")->value();
    // storeElementValue
    $test->max_los = $test->byName("max_los")->value();
    // store
    $test->min_los_new = "-1";
    // store
    $test->max_los_new = "-1";
    // print
    print $test->min_los_new;
    // print
    print $test->max_los_new;
    // setElementText
    $element = $this->byName("min_los");
    $element->click();
    $element->clear();
    $element->value($test->min_los_new);
    // setElementText
    $element = $this->byName("max_los");
    $element->click();
    $element->clear();
    $element->value($test->max_los_new);
    // assertElementValue
    $test->assertEquals("1", $test->byName("min_los")->value());
    // assertElementValue
    $test->assertEquals("1", $test->byName("max_los")->value());
    // store
    $test->max_los_new = "3";
    // store
    $test->min_los_new = "20";
    // setElementText
    $element = $this->byName("max_los");
    $element->click();
    $element->clear();
    $element->value($test->max_los_new);
    // setElementText
    $element = $this->byName("min_los");
    $element->click();
    $element->clear();
    $element->value($test->min_los_new);
    // clickElement
    $this->byName("max_los")->click();
    // assertElementValue
    $test->assertEquals("0", $test->byName("max_los")->value());
    // store
    $test->min_los_new = "1";
    // setElementText
    $element = $this->byName("min_los");
    $element->click();
    $element->clear();
    $element->value($test->min_los_new);
    // setElementText
    $element = $this->byName("max_los");
    $element->click();
    $element->clear();
    $element->value($test->max_los_new);
    // assertElementValue
    $test->assertEquals($test->min_los_new, $test->byName("min_los")->value());
    // assertElementValue
    $test->assertEquals($test->max_los_new, $test->byName("max_los")->value());
    // clickElement
    $this->byCssSelector("#tab_0  .save_add_interval")->click();
    // assertText
    $test->assertEquals($test->min_los_new, $test->byCssSelector("#tab_0 .intervals-table tr:not(.clonable):not(.empty)  td.interval_min_los")->text());
    // assertText
    $test->assertEquals($test->max_los_new, $test->byCssSelector("#tab_0 .intervals-table tr:not(.clonable):not(.empty)  td.interval_max_los")->text());
    // clickElement
    $this->byXPath("//div[@class='pull-line-right']//a[.=' Save']")->click();
    // waitForElementAttribute
    $this->waitUntil(function() use ($test) {
      try {
        $test->assertEquals("saved", $test->byCssSelector(".savingMsg")->attribute("data-qe-id"));
      } catch(\Exception $e) {
        return null;
      }
      return true;
    },50000);
    // refresh
    $this->refresh();
    // print
    print $test->min_los_new;
    // print
    print $test->max_los_new;
    // assertText
    $test->assertEquals($test->min_los_new, $test->byCssSelector("#tab_0 .intervals-table tr:not(.clonable):not(.empty)  td.interval_min_los")->text());
    // assertText
    $test->assertEquals($test->max_los_new, $test->byCssSelector("#tab_0 .intervals-table tr:not(.clonable):not(.empty)  td.interval_max_los")->text());
    // clickElement
    $this->byXPath("//div[@id='tab_0']/form/div[6]/div/div[2]/table/tbody/tr[4]/td[7]/a[1]/i")->click();
    // print
    print $test->min_los;
    // print
    print $test->max_los;
    // setElementText
    $element = $this->byName("min_los");
    $element->click();
    $element->clear();
    $element->value($test->min_los);
    // setElementText
    $element = $this->byName("max_los");
    $element->click();
    $element->clear();
    $element->value($test->max_los);
    // clickElement
    $this->byCssSelector("#tab_0  .save_add_interval")->click();
    // clickElement
    $this->byXPath("//div[@class='pull-line-right']//a[.=' Save']")->click();
    // waitForElementAttribute
    $this->waitUntil(function() use ($test) {
      try {
        $test->assertEquals("saved", $test->byCssSelector(".savingMsg")->attribute("data-qe-id"));
      } catch(\Exception $e) {
        return null;
      }
      return true;
    },50000);
    // clickElement
    $this->byName("asettings")->click();
    // clickElement
    $this->byCssSelector("a.logout_link")->click();
    // waitForElementPresent
    $this->waitUntil(function() use ($test) {
      try {
        $boolean = ($test->byCssSelector("div.login") instanceof \PHPUnit_Extensions_Selenium2TestCase_Element);
      } catch (\Exception $e) {
        $boolean = false;
      }
      return $boolean === true ?: null;
    },50000);
  }
}
