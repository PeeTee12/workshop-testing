<?php
namespace IW\Workshop;
use PHPUnit\Framework\TestCase;
use DateTime;

class DateFormatterTest extends TestCase {
  public function testGetNight() {
    $dateFormatter = new DateFormatter();

    $result = $dateFormatter->getPartOfDay();

    $dateTime = new DateTime();
    $currentHour = $dateTime->format('G');

    $this->assertStringMatchesFormat("%s", $result);

    if ($currentHour >= 0 && $currentHour < 6) {
      $this->assertEquals('Night', $result);
    }

    else if ($currentHour >= 6 && $currentHour < 12) {
      $this->assertEquals('Morning', $result);
    }

    else if ($currentHour >= 12 && $currentHour < 18) {
      $this->assertEquals('Afternoon', $result);
    }

    else {
      $this->assertEquals('Evening', $result);
    }

  }
}