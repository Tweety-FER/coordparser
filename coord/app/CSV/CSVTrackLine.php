<?php

namespace Coord\CSV;

class CSVTrackLine {
  protected $latitude;

  protected $longitude;

  /**
  * A special code that signified line breaks.
  * 0 if no break in track line, 1 if there is one
  */
  protected $code;

  protected $elevation;

  protected $speed;

  protected $track;

  protected $accuracy;

  protected $datetime;

  public function __construct(
    $latitude, $longitude, $code, $elevation,
    $speed, $track, $accuracy, $epoch) {
      $this->latitude = (float) $latitude;
      $this->longitude = (float) $longitude;
      $this->code = (int) $code;
      $this->elevation = (float) $elevation;
      $this->speed = (float) $speed;
      $this->track = (float) $track;
      $this->accuracy = (float) $accuracy;

      //Kill the miliseconds
      $ts = (string) round($epoch / 1000);
      $this->datetime = new \DateTime("@$ts");
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

  public function getElevation() {
    return $this->elevation;
  }

  public function getSpeed() {
    return $this->speed;
  }

  public function getTrack() {
    return $this->track;
  }

  public function getAccuracy() {
    return $this->accuracy;
  }

  public function getDatetime() {
    return $this->datetime;
  }

}
