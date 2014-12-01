<?php

include_once "includes/html_top.php";

// guestbook_delete_action.php Revision 7 11-20-13 11:45am

/* Requirements:
a) Please do not remove any of my comments in this code. I need them for grading.
b) Type code for only one step at a time, then run it in your browser to test it before moving to the next step. 
Some of the code will not display any output, but you still need to test it to be sure there are no error messages. 
Trouble-shooting is very difficult if many steps are entered at once. Do not ask me for help with your code if you are 
not testing one step at a time!
*/

/* ==========================================================================================================
PLEASE DO NOT ATTEMPT TO WORK THROUGH THIS FILE WITHOUT FOLLOWING MY INSTRUCTIONS IN ASSIGNMENT 8, PART 2.
I HAVE A SPECIFIC SERIES OF STEPS I WOULD LIKE YOU TO FOLLOW.
========================================================================================================== */

// 1. Enter the code to start a session below. This should be one line of code.

session_start();

// 2. Enter the code to insert the login_check.php file here. Use include_once and DO NOT put a folder name in front.

include_once("login_check.php");

// HEADER

// 3. Update the Header information below (all 3 lines).

/*
File Name: guestbook_delete_action.php
Date: 11/29/14
Programmer: Scott Campbell
*/

// ==========================================================
// VARIABLES
 
include_once "includes/php_header.php";

// 4. Change $programmer_name to your name.

$programmer_name = "Scott Campbell";
$heading = "Guest Book Delete Action Page";

// ==========================================================
// ARRAYS

// -- CREATE ARRAY OF FORM FIELD NAMES SO WE CAN LOOP THROUGH THEM
//    This is an associative array, meaning that each of the variables in the array is given a name.

$form_fields=array();

$form_fields["id"]="select";

// ==========================================================
// FUNCTIONS

include_once "includes/cas225_functions.php";

// ======================================= <!-- ======================================= -->
// HTML HEADER 

include_once "includes/html_header.php";

// ======================================
// HEADING

echo "<h1>" . $heading . "</h1>";

// ====================================== 
// CODE FOR THIS PAGE

// -- CHECK EACH FIELD FOR MISSING DATA AND SANITIZE

// Check if data submitted (remove comment tags on 3 lines below if you want to see the array)
// 3. When you run this page, you should see the username you selected and the text you entered in
//    the box in this format:
//        Array ( [id] => 6 [Submit] => Submit )
//    Put comment tags // in front of the 2 lines below when you have the rest of the page working.

// print_r($_POST);
// echo "<br><br>";

if(!isset($_POST["confirm_delete"])) {  // Run only if coming from the current page

    foreach ($form_fields as $key => $value) { // Loop through form fields. Key is the name of the field, value is type of field

         check_submitted($key, $value, $missing_count);

         sanitize($key, $value, $_POST[$key]); // ESPECIALLY IMPORTANT NOW THAT WE ARE INSERTING INTO A DATABASE
     
    }
	
    // exit if missing data in any but checkboxes
	
    if($missing_count > 0) {
         echo "<br />Please <a href='guestbook_delete.php'>Go Back</a> and fill in the missing data.<br /><br /></div></body></html>";
         exit;
    }
	
    // ASSIGN DATA TO VARIABLES FOR EASIER HANDLING
    $id = $_POST['id'];
	
    // CONNECT TO DATABASE (Steps 1 and 2)

    include_once "includes/connection.php";

    // SQL STATEMENT: Find record that is about to be deleted
	
    $sql="SELECT *"
    . " FROM guestbook"
    . " WHERE guestbook.ID=$id;";
		
    // Display SQL for learning and trouble-shooting
		
    echo "<br>3. SQL: " . $sql . "<br>";
	
    // RUN QUERY
	
    $result=mysql_query($sql); 
	
	// TEST IF QUERY WORKED
	if (!$result) {
		die("<p style='color:red;'>ERROR: Database query failed: " . mysql_error() . "</p>");
	}
	else {
		 echo "<p style='color:green;'>4. Query succeeded!</p>";

	}
	
    // GET DATA FOR RECORD THEY SELECTED
    // Assign array elements to variables for easier handling
    while ($row=mysql_fetch_array($result)) { 
	
	     $id = $row["id"]; // I did this one for you. You can pattern the next two after this one.
	
	     $username = $row["username"];
	
	     $comment = $row["comment"];

    } 
	
     // WARN THE USER 
     
     // Temporary code to prevent errors while coding this page (comment this out // when your page works):
     // $x = "---";

     echo "<p style='color:red;'>You are about to delete the following data:</p>";

   //  echo "ID: " .  $x  . "<br />";
   //  echo "Username: " .  $x  . "<br />";
   //  echo "Comment: " .  $x  . "<br />";
   
    echo "ID: " .  $id  . "<br />";
    echo "Username: " .  $username  . "<br />";
    echo "Comment: " .  $comment . "<br />";

     echo "<form method='post' action='guestbook_delete_action.php'>"; // Submitting to this same page again
     echo "<br />Are you SURE you want to delete this record (Y/N)? ";
     
          // Display select box with 2 options
     echo "<select name='confirm_delete'>";
     echo "<option value='N'>N</option>";
     echo "<option value='Y'>Y</option>";
     echo "</select>";
     
     echo "<input type='hidden' name='id' value='$id'>"; // Send id back to page when we submit it

     echo "<input type='submit' value='Submit'>";

     echo "</form>";
     echo "<br />";

     echo "<a href='guestbook_delete.php'>Return to Delete Form</a>";

     exit;

} // END IF BLOCK $_POST["id"] (started in step 4)

// AT THIS POINT, YOUR CODE SHOULD RUN UP TO THE POINT OF ANSWERING "Y" OR "N". Answer that question with "Y" and submit the page. It should
// submit back to the same page, and you should see this displayed:
//     Array ( [confirm_delete] => Y [id] => 6 )
// If you don't see that information, go back and fix the code above before you continue.

// PROCESS DELETE IF "Y" CHOSEN (only runs after this page has been submitted back to itself)

if ($_POST["confirm_delete"] == "Y") {
	
	// CONNECT TO DATABASE (Steps 1 and 2)
	
	include_once "includes/connection.php";
	
	// ASSIGN SUBMITTED ID TO A VARIABLE FOR EASIER HANDLING
	
	$id = $_POST["id"];
	
	// SQL STATEMENT
	
     $sql="DELETE"
     . " FROM guestbook"
     . " WHERE guestbook.id=$id"
     . " LIMIT 1;"; 
     
     		
	// Display SQL for learning and trouble-shooting
		
	echo "<br>3. SQL: " . $sql . "<br>";
	
		// RUN QUERY
	
	$result=mysql_query($sql); 
	
	// TEST IF QUERY WORKED
	if (!$result) {
		die("<p style='color:red;'>ERROR: Database query failed: " . mysql_error() . "</p>");
	}
	else {
		 echo "<p style='color:green;'>4. Query succeeded! The record was deleted.</p>";
		 
			 // link to view guestbook page
		 echo "<p><a href='guestbook_view.php'>View guestbook</a></p>";
	}
	
} // END IF BLOCK $_POST["confirm_delete"]...
	
     
else { // If they got this far, they submitted this page and chose "N" -- they do *not* want to delete.

	echo "<p style='color:red;'>Action canceled.</p>";
	
	echo "<p><a href='guestbook_delete.php'>Return to Delete Form</a></p>";

}

// ===================================================== 
// FOOTER -->

include_once "includes/footer.php";

?>