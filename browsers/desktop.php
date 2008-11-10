<?php
function desktop_theme_external_link($url) {
  return "<a href='$url'>$url</a>";
}
function desktop_theme_status_form($text = '') {
  if (user_is_authenticated()) {
    return '<form method="POST" action="update" onsubmit="return confirmShortTweet();">
  <textarea id="status" name="status" rows="3" style="width:100%; max-width: 400px;">'.$text.'</textarea>
  <div><input type="submit" value="Update" /> <span id="remaining">140</span></div>
</form>
<script type="text/javascript">
function updateCount() {
  document.getElementById("remaining").innerHTML = 140 - document.getElementById("status").value.length;
  setTimeout(updateCount, 200);
}
function confirmShortTweet() {
  var len = document.getElementById("status").value.length;
  if (len < 30) return confirm("That\'s a short tweet.\nContinue?");
  return true;
}
updateCount();
</script>';
  }
}

function desktop_theme_search_form($query) {
  $query = stripslashes(htmlentities($query));
  return "<form action='search' method='GET'><input name='query' value=\"$query\" style='width:100%; max-width: 300px' /><input type='submit' value='Search' /></form>";
}
?>