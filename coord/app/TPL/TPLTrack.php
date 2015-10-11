<?php

namespace Coord\TPL;

use Coord\CSV\CSVTrackLine;

class TPLTrack {

  protected $lines;

  protected $color;

  public function __construct($color = 255) {
    $this->lines = [];
    $this->color = $color;
  }

  public function addLine(TPLTrackLine $line) {
    $this->lines[] = $line;
  }

  public function addCSVLine(CSVTrackLine $csvLine) {
    $this->addLine(TPLTrackLine::fromCSVLine($csvLine));
  }

  public function __toString() {
    $str = "OziExplorer Track Point File Version 2.0\n"
         . "WGS 84\n"
         . "Altitude is in Feet\n"
         . "Reserved 3\n"
         . "0,2,$this->color,OziCE Track Log File,1\n"
         . "0\n";

    foreach($this->lines as $line) {
      $str .= ((string) $line) . "\n";
    }

    return $str;
  }
}
