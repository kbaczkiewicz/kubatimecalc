<?php
$hours = 0;
$minutes = 0;
if ($_POST['times']) {
    foreach ($_POST['times'] as $times) {
      if (isset($times['hours'])) {
        $hours += (int)$times['hours'];
      }
      if (isset($times['minutes'])) {
        $minutes += (int)$times['minutes'];
      }
    }
    $date = (new DateTime(sprintf('now + %d hours %d minutes', $hours, $minutes)))->format('Y-m-d H:i:s');
} else {
    $date = (new DateTime('now'))->format('Y-m-d H:i:s');

}
?>
<html>
<head>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
</head>
<body>

<h1>Data: <?php if (isset($date)) { echo $date; } ?></h1>
<form method="post">
    <label>Godziny</label>
    <input type="text" name="times[][hours]" />
    <label>Minuty</label>
    <input type="text" name="times[][minutes]" />
    <button type="button" id="addHours">Dodaj</button>
    <input type="submit" value="Licz">
</form>
<script>
    $('#addHours').on('click', function() {
        $html = '<br /><label>Godziny</label>\n' +
            '    <input type="text" name="times[][hours]" />\n' +
            '    <label>Minuty</label>\n' +
            '    <input type="text" name="times[][minutes]" />\n';
        $('form').append($html);
    })
</script>
</body>
</html>
