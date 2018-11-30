
<h3 class="text-center">New Ticket</h3><br />
<div class="row">
  <div class="col-md-8">
      <form action="entry.php?new_ticket=false&save_ticket=true" method="post" class="was-validated">

        <?php
        if ($_SESSION['log_error']['release'] == 3) {
          echo '<p class="p-1 mb-1 bg-success text-white text-center">TICKET ARE SEND</p>';
        }
        if ($_SESSION['log_error']['name'] == false) {
          echo '<p class="p-1 mb-1 bg-danger text-white">Character Name error</p>';
        }

        ?>
        <input required="" class="form-control" name="name" <?php echo "placeholder='".$_SESSION['character_0']['Name']." ".$_SESSION['character_1']['Name']." ".$_SESSION['character_2']['Name']."'"; ?> /><br />
        <?php
        if ($_SESSION['log_error']['email'] == false) {
          echo '<p class="p-1 mb-1 bg-danger text-white">Character Email error</p>';
        }
        unset($_SESSION['log_error']);

        ?>
        <input required="" class="form-control" name="email" placeholder="E-mail..." /><br />
        <input required="" class="form-control" name="subjet" placeholder="Subject..." /><br />
        <label for="subjet">Support files optcional</label>
        <input type="file" class="form-control" name="file" placeholder="Subject..." /><br />
        <div class="form-group">
          <label for="sel1">Select Theme:</label>
          <select required name="theme" class="form-control" id="sel1">
            <option value="1">Report hacks or Stole of Accounts</option>
            <option value="2">Report Bugs or glitch of a system</option>
            <option value="3">give a suggestion</option>
            <option value="4">Apply to be part of the STAFF GS or GM</option>
            <option value="5">Others</option>
          </select>
        </div>
        <textarea required class="form-control" name="text" placeholder="How can we help you?" style="height:150px;"></textarea><br />
        <input class="btn btn-primary" type="submit" value="Send" /><br /><br />
      </form>
  </div>
  <div class="col-md-4">
    <b>Customer service:</b> <br />
    Web: <a href="https://gamekairos.org">GAMEKAIROS.ORG</a> <br />
    E-mail: <a href="mailto:admin@gamekairos.org">admin@gamekairos.org</a><br />
    <br/><br/>
  </div>
</div>
