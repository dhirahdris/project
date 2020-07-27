<script>
function goBack() {
    window.history.back();
}
</script>

<table border="0" width="100%" cellpadding="0" cellspacing="0">
  <tr>
  <td><input class="button" width="10%" type="submit" value="Go Back"onclick="goBack()"></td>
    <td><a href="admin.php"><img class="logo" src="logo2018.png" alt="Logo"></a></td>
    <td width="7%" align="center"><a href="main.php" class="menu">home</a></td>
    <td width="7%" align="center"><a href="insert.php" class="menu">insert</a></td>
    <td width="7%" align="center"><a href="action.php" class="menu">action</a></td>
    <td width="7%" align="center"><a href="logout.php" class="menu" onClick="return confirm('Are You Sure?')">Logout</a></td>
  </tr>
</table>