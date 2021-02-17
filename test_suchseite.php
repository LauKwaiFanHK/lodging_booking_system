<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suchseite</title>
     <link rel="stylesheet" type="text/css" href="Suchseite.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
</head>

<body>
			<div class="container mt-5 header">
				<div class="row">
					<div class="col-sm">
						<h2><b>Plattfrom fur Unterkunfte</b></h2>
					</div>
					<div class="col-sm">
						<div class="container right">
							<div class="row">
								<div class="col-sm text-right currency">€</div>
								<div class="col-sm text-right">
									<span class="round-icon">?</span>
								</div>
								<div class="col-sm text-right">
									<?php 
									if(stripos($_SERVER['HTTP_COOKIE'],$_COOKIE['PHPSESSID']) !== false){?>
										<div class="login">
											<div class="dropdown d-none">
												<a href='/profile.php'>Profile</a>
												<a href='/history.php'>History</a>
												<a href='/logout.php'>Logout</a>
											</div>
										</div>
									<?} else {?>
										<a href="/signUpForm1.php" class='signup'>Login</a>
									<?}?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
   
          <div class="container non-outline mt-5">
          <form action="test_showResults.php"  method="post">
              <div class="row justify-content-center">
              
               <?php
        
      
					$connection = mysqli_connect('localhost','lauk','13579','lauk');
					$result = mysqli_query($connection, "SELECT DISTINCT Stadt FROM `building`");
					mysqli_close($connection);
					
			  ?>
               <div class="col-2 my-auto">
					<select name="city" class="form-control">
						<?php while($cities = mysqli_fetch_row($result)){
							foreach($cities as $key => $city) {?>
						
							<option <?=($key == 0) ? 'selected' : ''?> value="<?=$city?>"><?=$city?></option>
						<?php }
						}?>
					</select>
               </div>
               <div class="col-2 my-auto">
                   <input type="date" class="form-control" name="checkin">
               </div>
               <div class="col-2 my-auto">
                   <input type="date" class="form-control" name="checkout" >
               </div>
               <div class="col-2 my-auto">
                   <input type="number" class="form-control" name="numberOfGuests" placeholder="Guests">
               </div>
               
              
                <div class="col-2 my-auto text-center custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="Sehenswurdigkeiten" value="yes" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Sehenswurdigkeiten anzeigen</label>
                 </div>
              
                <div class="col-2 my-auto mx-auto">
                   <input type="submit" value="Suchen">
               </div>
               
              </div>
           </form>
           </div>
           
       
   
   
  
   
    
</body>

</html>