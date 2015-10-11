<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Track Converter</title>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.4/semantic.min.css"
          media="screen"
          charset="utf-8">
  </head>
  <body>
    <div class="ui container">
      <h1>Convert your tracks</h1>

      <div class="ui divider"></div>

      <form class="ui form" action="/convert" method="post" enctype="multipart/form-data">
        <div class="ui info message">
          <div class="header">
            Input your CSV
          </div>
          Paste your CSV, tab-separated, here, then press the submit button to
          trigger the conversion process. Alternatively, you can choose to upload
          a .csv file for processing.
        </div>

        <div class="ui field">
          <label>CSV</label>
          <textarea name="csv" rows="20"></textarea>
        </div>

        <div class="ui field">
          <input type="file" name="csvfile" id="csvfile">
      </div>

        <button type="submit" class="ui blue submit button block">Submit</button>
      </form>
    </div>
  </body>
</html>
