<?php
include("dbc.php");
session_start();

if (!isset($_COOKIE["UserID"]) && !isset($_COOKIE["UKey"])) {
  header('Location: login.php');
} else {
  $UserID = $_COOKIE["UserID"];
  $UKey = $_COOKIE["UKey"];
  $q = mysqli_query($dbc, "SELECT `UKey` FROM `users` WHERE `ID` = $UserID");
  $q = mysqli_fetch_assoc($q);
  if ($q){
    if ($q["UKey"] === $UKey) {
    } else {
      header('Location: login.php');
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tesco Portal Dashboard - Shift Swap</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="H.M. Media">
    <link rel="stylesheet" href="Assets/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/CSS/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:900|Roboto">
    <link rel="stylesheet" href="Assets/CSS/style.css">
    <!--if lt IE 9
    script(src='https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js')
    
    -->
  </head>
  <body>
    <nav> 
      <div class="row"> 
        <div class="col-md-10 row">
          <div class="col-sm-3"><img src="Assets/Images/Logo.jpg" alt="Shift Swap Logo"></div>
          <div class="col-sm-9">
            <h3>Tesco Shift Swap Portal</h3>
          </div>
        </div>
        <div class="col-md-2 logout">
          <h5>Logout</h5>
        </div>
      </div>
    </nav>
    <main class="row">
      <div class="col-xl-6 row">
        <div class="col-md-6 Available">
          <div class="con">
            <h4>Shifts that suit you</h4>
            <div class="con">
              <div class="shifts scrollbar">
                <div class="shift">
                  <p>Checkouts</p>
                  <p>Fri 10th Sept 2018</p>
                  <p>1:00pm - 9:00pm</p>
                </div>
                <div class="shift">
                  <p>Checkouts</p>
                  <p>Fri 10th Sept 2018</p>
                  <p>1:00pm - 9:00pm</p>
                </div>
                <div class="shift">
                  <p>Checkouts</p>
                  <p>Fri 10th Sept 2018</p>
                  <p>1:00pm - 9:00pm</p>
                </div>
                <div class="shift">
                  <p>Checkouts</p>
                  <p>Fri 10th Sept 2018</p>
                  <p>1:00pm - 9:00pm</p>
                </div>
                <div class="shift">
                  <p>Checkouts</p>
                  <p>Fri 10th Sept 2018</p>
                  <p>1:00pm - 9:00pm</p>
                </div><br><br><br><br>
                <div class="footer">
                  <div class="centreBTN">
                    <button>Load More</button>
                  </div><a>Manage Preferences</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 YourShifts">
          <div class="con">
            <h4>Your Shifts</h4>
            <div class="con">
              <div class="shifts scrollbar">
                <div class="shift">
                  <p>Checkouts</p>
                  <p>11th Sept 2018 | 1:00pm - 9:00pm</p><br>
                  <p>Unfilled</p>
                </div>
                <div class="shift Waiting">
                  <p>Checkouts</p>
                  <p>11th Sept 2018 | 1:00pm - 9:00pm</p>
                  <p>Filled by Christopher Hill</p>
                  <p>Awaiting Approval </p>
                </div>
                <div class="shift Approved">
                  <p>Checkouts</p>
                  <p>11th Sept 2018 | 1:00pm - 9:00pm</p>
                  <p>Filled by Christopher Hill</p>
                  <p>Approved by Mark C on 09/09/18</p>
                </div>
                <div class="shift Waiting">
                  <p>Checkouts</p>
                  <p>11th Sept 2018 | 1:00pm - 9:00pm</p>
                  <p>Filled by Christopher Hill</p>
                  <p>Awaiting Approval </p>
                </div>
                <div class="shift">
                  <p>Checkouts</p>
                  <p>11th Sept 2018 | 1:00pm - 9:00pm</p><br>
                  <p>Unfilled</p>
                </div><br>
                <button>Manage Shifts</button><br>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 row">
        <div class="col-md-3">
          <h4>Calendar</h4>
          <div class="Filter scrollbar">
            <table>
              <tr> 
                <td> 
                  <h6>Filter</h6>
                </td>
              </tr>
              <tr class="Checkouts">
                <td>
                  <p>Checkouts</p>
                </td>
                <td> 
                  <input type="checkbox">
                </td>
              </tr>
              <tr class="StockControl">
                <td>
                  <p>Stock Control</p>
                </td>
                <td> 
                  <input type="checkbox">
                </td>
              </tr>
              <tr class="DotComPicker">
                <td>
                  <p>Dot Com Picker</p>
                </td>
                <td> 
                  <input type="checkbox">
                </td>
              </tr>
              <tr class="Grocery">
                <td>
                  <p>Grocery</p>
                </td>
                <td> 
                  <input type="checkbox">
                </td>
              </tr>
              <tr class="BWS">
                <td>
                  <p>BWS</p>
                </td>
                <td> 
                  <input type="checkbox">
                </td>
              </tr>
              <tr class="Produce">
                <td>
                  <p>Produce</p>
                </td>
                <td> 
                  <input type="checkbox">
                </td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-md-9 Cal"><br>
          <h5>Sept</h5>
          <table> 
            <tr> 
              <th>Mo</th>
              <th>Tu</th>
              <th>We</th>
              <th>Th</th>
              <th>Fr</th>
              <th>Sa</th>
              <th>Su</th>
            </tr>
            <tr> 
              <td> 
                <div class="con empty"></div>
              </td>
              <td> 
                <div class="con empty"></div>
              </td>
              <td> 
                <div class="con empty"></div>
              </td>
              <td> 
                <div class="con empty"></div>
              </td>
              <td> 
                <div class="con empty"></div>
              </td>
              <td>
                <div class="con past">
                  <p>1</p>
                </div>
              </td>
              <td>
                <div class="con past">
                  <p>2</p>
                </div>
              </td>
            </tr>
            <tr> 
              <td>
                <div class="con past">
                  <p>3</p>
                </div>
              </td>
              <td>
                <div class="con past">
                  <p>4</p>
                </div>
              </td>
              <td>
                <div class="con past">
                  <p>5</p>
                </div>
              </td>
              <td>
                <div class="con past">
                  <p>6</p>
                </div>
              </td>
              <td>
                <div class="con past">
                  <p>7</p>
                </div>
              </td>
              <td>
                <div class="con past">
                  <p>8</p>
                </div>
              </td>
              <td>
                <div class="con past">
                  <p>9</p>
                </div>
              </td>
            </tr>
            <tr> 
              <td>
                <div class="con past">
                  <p>10</p>
                </div>
              </td>
              <td>
                <div class="con past">
                  <p>11</p>
                </div>
              </td>
              <td>
                <div class="con past">
                  <p>12</p>
                </div>
              </td>
              <td>
                <div class="con past">
                  <p>13</p>
                </div>
              </td>
              <td>
                <div class="con past">
                  <p>14</p>
                </div>
              </td>
              <td>
                <div class="con past">
                  <p>15</p>
                </div>
              </td>
              <td>
                <div class="con past">
                  <p>16</p>
                </div>
              </td>
            </tr>
            <tr> 
              <td>
                <div class="con past">
                  <p>17</p>
                </div>
              </td>
              <td>
                <div class="con past">
                  <p>18</p>
                </div>
              </td>
              <td>
                <div class="con date">
                  <p>19</p>
                </div>
              </td>
              <td>
                <div class="con">
                  <p>20</p>
                </div>
              </td>
              <td>
                <div class="con item">
                  <p>21</p>
                </div>
              </td>
              <td>
                <div class="con">
                  <p>22</p>
                </div>
              </td>
              <td>
                <div class="con">
                  <p>23</p>
                </div>
              </td>
            </tr>
            <tr> 
              <td>
                <div class="con item">
                  <p>24</p>
                </div>
              </td>
              <td>
                <div class="con">
                  <p>25</p>
                </div>
              </td>
              <td>
                <div class="con">
                  <p>26</p>
                </div>
              </td>
              <td>
                <div class="con">
                  <p>27</p>
                </div>
              </td>
              <td>
                <div class="con">
                  <p>28</p>
                </div>
              </td>
              <td>
                <div class="con item">
                  <p>29</p>
                </div>
              </td>
              <td>
                <div class="con">
                  <p>30</p>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </main><br>
    <footer>
      <script src="Assets/JS/jquery-3.3.1.min.js"></script>
      <script src="Assets/JS/bootstrap.min.js"></script>
      <script src="Assets/JS/js-dist.js"></script>
    </footer>
  </body>
</html>