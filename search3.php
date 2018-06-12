<?php 
	include 'header.php';
?>
<select onChange="window.location.href=this.value">
	<option value="search3.php">Escape with Int</option>
    <option value="search.php">Vulnarable</option>
    <option value="search2.php">Escape String</option>
    <option value="search4.php">Escape with int conv</option>
	<option value="s_search.php">Secured</option>
</select>
<form action="search3.php" method="POST">
	<input type="text" name="search" placeholder="search trainers..">
	<button  type="submit">Find</button>
</form>

<h1> Search Page </h1>
<h3> Escape string is being used for INT here and it's injectable (ENTER INT VALUE ONLY)</h3>
<div class="shopping-container">

	<table border="3" cellspacing="0" cellpadding="10">
        <tbody>
           <tr>
              <th>Title</th>
              <th>Description</th>
              <th>Quantity</th>
           </tr>

<?php
	if(isset($_POST['search'])){

		$search= mysqli_real_escape_string($conn,$_POST['search']);
		if(empty($search)){
            echo "Please fill in the search bar";

            exit();
        }
		$sql ="SELECT * FROM shopping WHERE quantity =$search";
		print "<p> $sql </p>";
		print "<hr>";
		$result = mysqli_query($conn, $sql);
		$queryResult = mysqli_num_rows($result);
		
		echo "There are ".$queryResult." results! ";
		
		if($queryResult > 0){
			while($row = mysqli_fetch_assoc($result)){
				echo "<tr><td>".$row["title"]."</td>";
                echo "<td>".$row["description"]."</td>";
                echo "<td>".$row["quantity"]."</td>";
			}
		}
		
	}
?>
		</tbody>
    </table>
</div>
<div>
    <p>@Computer Security Project <a  target="_blank" href="http://www.eecs.qmul.ac.uk/"> www.eecs.qmul.ac.uk </a></p>
</div>