<?php
/***********************************
 * home.php 
 * @author  dixie
 ***********************************
*/			
function adminHome($contacts)  
{
    head();
    nav();
?>
  <section id="admin-home">
    <div class="container">
      <br><br><br>
      <div class="col-md-6 col-md-offset-0">
      <?php echo "<h3>"
                    .getUserSession('userFirstName')." "
                    .getUserSession('userLastName')."'s Inbox"
                    ." -- ".count($contacts)." unread messages
                  </h3>
                  <h4>(last Login: "
                    .getUserSession('userLastLogin').
                ")</h4>";
      ?>
      </div>
      <div class="col-md-6 text-right">
        <h4>
          <form method="post" action="/admin/index.php">
            <div class="form-group">
              <input type="hidden" name="func" value="findcontacts">
              <input type="text" name="search_key">
              <button type="submit" name="submit" class="btn btn-lg btn-link" required="required">Search</button>
            </div>
          </form>
        </h4>
      </div>
      <hr>
    </div>
<?php
      
    inbox($contacts);
    foot();
}


function userHome()  
{
    head();
    nav();
?>
  <section id="admin-home">
    <div class="container">
      <br><br><br>
      <div class="col-md-6 col-md-offset-0">
      <?php echo "<h3>"
                    .getUserSession('userFirstName')." "
                    .getUserSession('userLastName')."'s Inbox"
                    ." -- ".count($contacts)." unread messages
                  </h3>
                  <h4>(last Login: "
                    .getUserSession('userLastLogin').
                ")</h4>";
      ?>
      </div>
      <div class="col-md-6 text-right">
        <h4>
          <form method="post" action="#">
            <div class="form-group">
              <input type="hidden" name="func" value="findcontacts">
              <input type="text" name="search_key">
              <button type="submit" name="submit" class="btn btn-lg btn-link" required="required">Search</button>
            </div>
          </form>
        </h4>
      </div>
      <hr>
    </div>
          <div class="container">
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="col-md-2">Received</th>
            <th scope="col-md-2">From</th>
            <th scope="col-md-3">Subject</th>
            <th scope="col-md-5">Message</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($contacts as $contact){
        $out = strlen($contact->contactMessage) > 60 ? substr($contact->contactMessage,0,60)."..." : $contact->contactMessage; ?>
          <tr>
            <td><?php echo toHumanDate($contact->contactCreated); ?></td>
            <td><?php echo "<a href=\"/admin/index.php?func=view_contact&id=".$contact->contactId."\">".$contact->contactName."</a>"; ?></td>
            <td><?php echo "<a href=\"/admin/index.php?func=view_contact&id=".$contact->contactId."\">".$contact->contactSubject."</a>"; ?></td>
            <td><?php echo "<a href=\"/admin/index.php?func=view_contact&id=".$contact->contactId."\">".$out."</a>"; ?></td>
          </tr>
        <?php }?>
        </tbody>
      </table>
    </div>
  </section>

<?php
      
    foot();
}

?>
