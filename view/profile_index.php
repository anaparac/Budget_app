<?php
  $flag ="profile";
require_once __SITE_PATH . '/view/_header.php'; ?>


  <script>
    var fl = <?php if ( isset($smessage)) echo json_encode($_SESSION['flag']); else echo "2";?>;
    var mess = <?php if ( isset($smessage)) echo json_encode($smessage); else echo "undefined";?>;

    if(fl.toString() === '0')
        $.notify(mess, "error");

    else if(fl.toString() === '1')
        $.notify(mess, "success");

    $(document).ready(function(){
      var tip = 0;
      $('#check_box').on("click",function(){
      //treba ga prebaciti na profileController/changeCheckbox
        $.ajax(
          {
            url: window.location.pathname+"?rt=profile/changeCheckbox",
            data:
            {
              tip : tip
            },
            //dataType: "json",
            error: function( xhr, status )
            {
              if( status !== null )
                  console.log( "Greška prilikom Ajax poziva: " + status );
            },
            success: function( data )
            {
                console.log("success");
            }
        });
      });
    });

  </script>

<div class="omotac">
  <table class="table">
    <tr>
      <th> Username </th>
      <td>  <?php echo $user->username; ?> </td>
      <td> <button class = "IconButton" type="button" name="new_pass" data-toggle="modal" data-target="#changeUsername" > <i class="far fa-edit"></i></button>  </td>
    </tr>
    <tr>
      <th> Email </th>
      <td> <?php echo $user->email; ?> </td>
      <td> <button class = "IconButton" type="button" name="new_email" data-toggle="modal" data-target="#changeEmail" > <i class="far fa-edit"></i></button> </td>
    </tr>
    <tr>
      <th> Password  </th>
      <td> ******** </td>
      <td> <button class = "IconButton" type="button" name="new_pass" data-toggle="modal" data-target="#changePassword" > <i class="far fa-edit"></i></button> </td>
    </tr>
    <tr>
      <th> Daily limit </th>
      <td>  <?php echo $user->daily_limit; ?> </td>
      <td> <button class = "IconButton" type="button" name="new_daily" data-toggle="modal" data-target="#changeDaily" > <i class="far fa-edit"></i></button> </td>
    </tr>
    <tr>
      <th> Weekly limit </th>
      <td>  <?php echo $user->weekly_limit; ?> </td>
      <td> <button class = "IconButton" type="button" name="new_weekly" data-toggle="modal" data-target="#changeWeekly" > <i class="far fa-edit"></i></button> </td>
    </tr>
    <tr>
      <th> Monthly limit </th>
      <td>  <?php echo $user->monthly_limit; ?> </td>
      <td> <button class = "IconButton" type="button" name="new_monthly" data-toggle="modal" data-target="#changeMonthly" > <i class="far fa-edit"></i></button> </td>
    </tr>
    <tr>
      <th> Notifications  </th>
      <td> I want to get notifications on my email address. </td>
      <?php if( $user->send_mail == 1)
      echo '<td>  <input type="checkbox" id="check_box"  checked>  </td>';
      else echo '<td>  <input type="checkbox"  id="check_box" >  </td>';
      ?>
    </tr>
    <tr>
      <th> Delete account  </th>
      <td> I want to delete my user account.. </td>
      <td> <button class = "IconButton" type="button"  data-toggle="modal" data-target="#accountDelete" > <i class="far fa-edit"></i></button> </td>
    </tr>
  </table>
</div>

<!--- Modal for new username --->
<div class="modal" id="changeUsername" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Write your new username </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo __SITE_URL; ?>/index.php?rt=profile/changeUsername">
          <div class="form-group">
            <label for="new_email"> New username : </label>
            <input type="text" class="form-control" name="new_username">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bgreen">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--- Modal for new email address --->
<div class="modal" id="changeEmail" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Write your new email </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo __SITE_URL; ?>/index.php?rt=profile/changeEmail">
          <div class="form-group">
            <label for="new_email"> New email : </label>
            <input type="text" class="form-control" placeholder="user@example.com" name="new_email">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bgreen">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--- Modal for changing password --->
<div class="modal" id="changePassword" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Write your new password </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo __SITE_URL; ?>/index.php?rt=profile/changePassword">
          <div class="form-group">
            <label for="new_pass"> New password : </label>
            <input type="password" class="form-control" placeholder="********" name="new_pass">
           </div>
        <div class="form-group">
            <label for="new_pass_repeat"> Type your new password again: </label>
            <input type="password" class="form-control" placeholder="********" name="new_pass_repeat">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bgreen">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!--- Modal for new daily limit --->
<div class="modal" id="changeDaily" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Write your new daily limit </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo __SITE_URL; ?>/index.php?rt=profile/changeDaily">
          <div class="form-group">
            <label for="new_daily"> New daily limit : </label>
            <input type="text" class="form-control" placeholder="$" name="new_daily">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bgreen">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!--- Modal for new weekly limit --->
<div class="modal" id="changeWeekly" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Write your new weekly limit </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo __SITE_URL; ?>/index.php?rt=profile/changeWeekly">
          <div class="form-group">
            <label for="new_weekly"> New weekly limit : </label>
            <input type="text" class="form-control" placeholder="$" name="new_weekly">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bgreen">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!--- Modal for new monthly limit --->
<div class="modal" id="changeMonthly" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Write your new monthly limit </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo __SITE_URL; ?>/index.php?rt=profile/changeMonthly">
          <div class="form-group">
            <label for="new_monthly"> New monthly limit : </label>
            <input type="text" class="form-control" placeholder="$" name="new_monthly">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn bgreen">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--- Modal for delete account --->
<div class="modal" id="accountDelete" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Are you sure you want to delete your account? </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer"><form method="post" action="<?php echo __SITE_URL; ?>/index.php?rt=profile/accountDelete">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn bgreen">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php
  $_SESSION['page'] ="Profile";
  $_SESSION['lang'] = 'ENG';
  require_once __SITE_PATH . '/view/_footer.php';
?>
