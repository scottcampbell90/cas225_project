<!-- footer.php Revision 2 11-12-12 5:30 pm -->

<!-- Requirements:
a) Please do not remove any of my comments in this code. I need them for grading.
b) Type code for only one step at a time, then run it in your browser to test it before moving to the next step. 
Some of the code will not display any output, but you still need to test it to be sure there are no error messages. 
Trouble-shooting is very difficult if many steps are entered at once. Do not ask me for help with your code if you are 
not testing one step at a time!
-->

<!-- ==========================================================================================================
PLEASE DO NOT ATTEMPT TO WORK THROUGH THIS FILE WITHOUT FOLLOWING MY INSTRUCTIONS IN ASSIGNMENT 7, PART 2.
I HAVE A SPECIFIC SERIES OF STEPS I WOULD LIKE YOU TO FOLLOW.
========================================================================================================== -->

<?php

// HEADER

// 1. Update the Header information below (all 3 lines).
// This is the only thing you need to do in this file this week.

/*
File Name: XXXXX.XXX
Date: XX/XX/XX
Programmer: XXX XXX
*/

if(isset($connection)) {
mysql_close($connection);
echo "<p>5. Database connection closed!</p>";
}
else {
echo "<br />5. No database connection to close.";
}

?>

</body>

</html>

