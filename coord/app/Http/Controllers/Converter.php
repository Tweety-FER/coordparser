<?php

namespace Coord\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Coord\Http\Controllers\Controller;
use Coord\CSV\CSVTrackParser;
use Coord\CSV\CSVTrackLine;
use Coord\TPL\TPLTrack;

class Converter extends Controller {

  public function index() {
    return view('index');
  }

  public function convert(Request $request) {
    if($request->hasFile('csvfile')) {
      $csv = file_get_contents($request->file('csvfile')->getRealPath());
    } else {
      dd($request->all());
      $csv = $request->input('csv');
    }

    $trackLines = CSVTrackParser::parse($csv);
    $track = new TPLTrack();

    foreach($trackLines as $line) {
      $track->addCSVLine($line);
    }

    return response((string) $track, 200)
            ->header('Content-Type', 'application/csv; filename=ceTrack.tlp')
            ->header('Content-Disposition', 'attachment')
            ->header('Pragma', 'no-cache');
  }
}
