<?php 
	include 'header.php';
?>
<select onChange="window.location.href=this.value">
	<option value="s_search.php">Secured</option>
    <option value="search.php">Vulnarable</option>
    <option value="search2.php">Escape String</option>
	<option value="search3.php">Escape with Int</option>
    <option value="search4.php">Escape with int conv</option>
</select>
<form action="s_search.php" method="POST">
	<input type="text" name="search" placeholder="search trainers..">
	<button  type="submit">Find</button>
</form>

<h1> Search Page </h1>
<h3> MySQL Escape String + Prepared Statement (Fully Loaded) </h3>
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
		//real_escape_string puts extra protectionn
		  $search= mysqli_real_escape_string($conn,"%{$_POST['search']}%");
		
		// by inserting ? we are seperating user input from query both won't know same information
		$stmt =$conn->prepare("SELECT * FROM shopping WHERE title LIKE ?");
		//The bind_param() method is where you attach variables to the dummy values in the prepare template.
		// s means just a piece of data
		$stmt->bind_param("s",$title);
		
		//tells which param inside the bind_param
		$title = $search; 
		// execute the stmt
		$stmt->execute();
		
		$result = $stmt->get_result();
		//getting as number of rows
		$rowNum = $result->num_rows;
		
		echo "There are ".$rowNum." results! ";
		
		if($rowNum> 0) {
				while($row = $result->fetch_assoc()){
				echo "<tr><td>".$row["title"]."</td>";
                echo "<td>".$row["description"]."</td>";
                echo "<td>".$row["quantity"]."</td>";
			}
		}
		$stmt->close();		
	}
?>
		</tbody>
    </table>
</div>
<div>
    <p>@Computer Security Project <a  target="_blank" href="http://www.eecs.qmul.ac.uk/"> www.eecs.qmul.ac.uk </a></p>
</div>