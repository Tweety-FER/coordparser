<?php

namespace Coord\CSV;

class CSVTrackParser {
  public static function parse($string) {
    $trackLines = [];
    $lines = preg_split("/\r\n|\n|\r/", $string);

    if(count($lines) > 0) {
      array_shift($lines); //Remove the header line
    }

    foreach($lines as $line) {
      $tline = trim($line);
      $fields = preg_split('/\s+/', $tline);

      if(count($fields) !== 9) {
        break;
      }

      $trackLines[] = new CSVTrackLine(
        $fields[1],
        $fields[2],
        $fields[3],
        $fields[4],
        $fields[5],
        $fields[6],
        $fields[7],
        $fields[8]
      );
    }

    return $trackLines;
  }
}
