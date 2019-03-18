<?php
/***********************************
 * viewaddaccount.php 
 * @author  dixie
 ***********************************
*/			
function viewEditAccount($account)  
{
    head();
    nav();
?>
  <section id="admin-home">
    <div class="container">
      <br><br><br>
      <div class="col-md-6 col-md-offset-0">
        <h4>
          Edit Client 
        </h4>
      </div>
      <div class="col-md-6 text-right">
          <h4>Created <?php echo toHumanDate($account->accountCreated); ?></h4>
      </div>
      <br>
      <hr>
    </div>
    <div class="container ">
      <div class="center">
        <div class="  col-md-6 col-md-offset-0">
          <form method="post" action="/admin/users.php">
          <table class="table">
            <tbody>
              <tr>
                <td>Client Name (20 character max):</td>
                <td><input type="text" name="short_name" value="<?php echo $account->accountShortName; ?>" > </td>
              </tr>
              <tr>
                <td>Company Name:</td>
                <td><input type="text" name="company" value="<?php echo $account->accountCompany; ?>" > </td>
              </tr>
              <tr>
                <td>Company Address:</td>
                <td><input type="text" name="address" value="<?php echo $account->accountAddress; ?> "> </td>
              </tr>
              <tr>
                <td>City:</td>
                <td><input type="text" name="city" value="<?php echo $account->accountCity; ?> "></td>
              </tr>
              <tr>
              <tr>
                <td>State:</td>
                <td><input type="text" name="state" value="<?php echo $account->accountState; ?> "></td>
              </tr>
              <tr>
              <tr>
                <td>Zip:</td>
                <td><input type="text" name="zip" value="<?php echo $account->accountZip; ?> "></td>
              </tr>
              <tr>
                <td>Phone:</td>
                <td><input type="text" name="phone" value="<?php echo $account->accountPhone; ?> "></td>
              </tr>
              <tr>
              <tr>
                <td>Fax:</td>
                <td><input type="text" name="fax" value="<?php echo $account->accountFax; ?> "></td>
              </tr>
              <tr>
              <tr>
                <td>Email:</td>
                <td><input type="text" name="email" value="<?php echo $account->accountEmail; ?> "></td>
              </tr>
              <tr>
              <tr>
                <td>Contact Name:</td>
                <td><input type="text" name="contact" value="<?php echo $account->accountContactName; ?> "></td>
              </tr>
              <tr>
                <td>Created:</td>
                <td><?php echo $account->accountCreated; ?></td>
              </tr>
              <tr>
                 <td>Last Modified:</td>
                <td><?php echo $account->accountModified; ?></td>
              </tr>
              <tr>
                <td>Client Status:</td>
                <td><?php echo $account->accountStatus;
                          if($account->accountStatus=="SUS" || $account->accountStatus=="RESET" || $account->accountStatus=="NEW" )
                              echo "</td><td><a  href=\"/admin/users.php?func=delete_account&id=".$account->accountId.
                                   "\">DELETE ACCOUNT</a>"; ?>
               </td>
              </tr>
              <tr>
                <td>
                  <input  type="hidden" name="func"       value="add_account">
                  <input  type="hidden" name="id"         value=<?php echo $account->accountId; ?> >
                  <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Update Client</button>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </tbody>
          </table>
          </form>
        </div>
      </div>
    </div>
  </section>
<?php

    foot();
}
?>
