<div class="container-fluid">
	<div class="icons-example clearfix mb-5 row">
	<?php
	 
	$sql = "SELECT TOP 10 Name, prestigeLevel, Level, HeroLevel, Reputation FROM Character WHERE Name <> 'Royce' and Name <> 'Delox' and Name <> 'RhukIsBack' and Name <> 'Delynith' and Name <> 'Zatch' and Name <> 'RoyceMasPoder' and Name <> 'Zatch' and Name <> 'ZatchYT' and Name <> 'ZatchYT' and Name <> 'lZatch' and Name <> 'Liam' and Name <> 'Joyer' and Name <> 'Arisu' and Name <> 'Koen' ORDER BY PrestigeLevel DESC, Level DESC, HeroLevel DESC;";

	$sqlfame = "SELECT TOP 10 Name, Reputation FROM Character WHERE Name <> 'Royce' and Name <> 'Delox' and Name <> 'RhukIsBack' and Name <> 'Delynith' and Name <> 'Zatch' and Name <> 'RoyceMasPoder' and Name <> 'Zatch' and Name <> 'ZatchYT' and Name <> 'ZatchYT' and Name <> 'lZatch' and Name <> 'Liam' and Name <> 'Joyer' and Name <> 'Arisu' and Name <> 'Koen' ORDER BY Reputation DESC;";

	$stmt = sqlsrv_query( $conn, $sql );
	if( $stmt === false) {
	    die( print_r( sqlsrv_errors(), true) );
	}

	$stmtfame = sqlsrv_query( $conn, $sqlfame );
	if( $stmtfame === false) {
	    die( print_r( sqlsrv_errors(), true) );
	}

	$sql1 = "SELECT TOP 10 Name, FamilyLevel, FamilyExperience FROM Family WHERE Name <> 'Kairos' ORDER BY FamilyLevel DESC, FamilyExperience DESC;";
	$stmt1 = sqlsrv_query( $conn, $sql1 );
	if( $stmt1 === false) {
	    die( print_r( sqlsrv_errors(), true) );
	}


	?>
		<div class="icons-example-wrapper material-icons col-4 p-3">
				
				<table class="table table-striped rank col-12">
					<thead class="table-dark ">			
					    <tr>
					      <th class="bg-danger text-white"scope="col"><strong>#</strong></th>
					      <th class="bg-danger text-white"scope="col"><strong>Name</strong></th>
					      <th class="bg-danger text-white"scope="col"><strong>Nivel Prestigio</strong></th>
					      <th class="bg-danger text-white"scope="col"><strong>Hero Level</strong></th>
					      <th class="bg-danger text-white"scope="col"><strong>Level</strong></th>
					    </tr>
					</thead>
					<tbody>	
	<?php
					$id = 1;
					while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
						$name = $row['Name'];
						$prestigeLevel = $row['prestigeLevel'];
						$Level = $row['Level'];
	   					$HeroLevel = $row['HeroLevel'];
					    echo "<tr class='width-reduce'><th scope='row' class='text-dark'><h6>$id</h6></th><td><h6>$name</h6></td><td><h6>$prestigeLevel</h6></td><td><h6>$HeroLevel</h6></td><td><h6>$Level</h6></td></tr>";
					    $id = $id + 1;
	}
	?>
					</tbody>
				</table>
			</div>		
		<div class="icons-example-wrapper material-icons col-4 p-3">
				
				<table class="table table-striped rank col-12">
					<thead class="table-dark ">			
					    <tr>
					      <th class="bg-danger text-white"scope="col"><strong>#</strong></th>
					      <th class="bg-danger text-white"scope="col"><strong>Name</strong></th>
					      <th class="bg-danger text-white"scope="col"><strong>Fame</strong></th>
					    </tr>
					</thead>
					<tbody>	
	<?php
					$id = 1;
					while( $row = sqlsrv_fetch_array( $stmtfame, SQLSRV_FETCH_ASSOC) ) {
						$name = $row['Name'];
						$prestigeLevel = $row['prestigeLevel'];
						$Level = $row['Level'];
	   					$HeroLevel = $row['HeroLevel'];
	   					$Reputation = $row['Reputation'];
					    echo "<tr class='width-reduce'><th scope='row' class='text-dark'><h6>$id</h6></th><td><h6>$name</h6></td><td><h6>$Reputation</h6></td></tr>";
					    $id = $id + 1;
	}
	?>
					</tbody>
				</table>
			</div>		
		<div class="icons-example-wrapper material-icons col-4 p-3">
				
				<table class="table table-striped rank col-12">
					<thead class="table-dark ">			
					    <tr>
					      <th class="bg-danger text-white"scope="col"><strong>#</strong></th>
					      <th class="bg-danger text-white"scope="col"><strong>Name</strong></th>
					      <th class="bg-danger text-white"scope="col"><strong>Nivel</strong></th>
					      <th class="bg-danger text-white"scope="col"><strong>Experiencia</strong></th>
					    </tr>
					</thead>
					<tbody>	
	<?php
					$id = 1;
					while( $row1 = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC) ) {
						$name1 = $row1['Name'];
						$FamilyLevel = $row1['FamilyLevel'];
						$FamilyExperience = $row1['FamilyExperience'];
					    echo "<tr class='width-reduce'><th scope='row' class='text-dark'><h6>$id</h6></th><td><h6>$name1</h6></td><td><h6>$FamilyLevel</h6></td><td><h6>$FamilyExperience</h6></td></tr>";
					    $id = $id + 1;
	}
	?>
					</tbody>
				</table>
			</div>		
	</div>
</div>


  
