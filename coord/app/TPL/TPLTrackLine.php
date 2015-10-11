<?php
namespace Coord\TPL;

use Coord\CSV\CSVTrackLine;

class TPLTrackLine {

  protected $latitude;

  protected $logitude;

  /**
  * A special code that signified line breaks.
  * 0 if no break in track line, 1 if there is one
  */
  protected $code;

  protected $altitude;

  protected $datetime;

  public function __construct(
    $latitude, $longitude, $code, $altitude, $datetime) {
    $this->latitude = (float) $latitude;
    $this->longitude = (float) $longitude;
    $this->code = (int) $code;
    $this->altitude = (float) $altitude;
    $this->datetime = $datetime;
  }

  public function getLatitude() {
    return $this->latitude;
  }

  public function getLongitude() {
    return $this->longitude;
  }

  public function getCode() {
    return $this->code;
  }

  public function getAltitude() {
    return $this->altitude;
  }

  public function getDatetime() {
    return $this->datetime;
  }

  public function __toString() {
    $diff = ($this->datetime->getTimestamp() -
            \DateTime::createFromFormat('Y-m-d', '1899-12-30')->getTimestamp()) /
            (60 * 60 * 24); //Get difference in days
    $date = $this->datetime->format('dmy');
    $time = $this->datetime->format('his');
    return "$this->latitude,$this->longitude,$this->code,$this->altitude,$diff,$date,$time";
  }

  public static function fromCSVLine(CSVTrackLine $line) {
    return new TPLTrackLine(
      $line->getLongitude(),
      $line->getLatitude(),
      $line->getCode(),
      $line->getElevation(),
      $line->getDatetime()
    );
  }
}
