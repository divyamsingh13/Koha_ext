<div class="icard">
	<div class="card cleft">	
		<div class="grid1">	
			<img src="logo.png" class="akglogo">
			<div class="akghead"><b>AJAY KUMAR GARG ENGINEERING COLLEGE</b></div>
			<div class="akginfo">
				<div class="akgi" >
					27th km Stone, Delhi-Hapur Bypass Road, Ghaziabad-201009
				</div>
				<div class="akgi">
					Phones:(0120)-2762841 to 2762851 Fax: (0120)-2761844<br>
				</div>
			</div>
		</div>

		<div class="grid2">
			<div class="getpasstext">HOSTEL GATE PASS</div>
			<div class="patimage">
				<img src="getimage.php?id=<?php echo $s->cardnumber; ?>" class="pngimage" alt="Image Not in DataBase">
			</div>
			<div class="hinge attr">
				<span class="attributes a1">Name</span><br>
				<span class="attributes a2">Student No.</span><br>
				<span class="attributes a3">Course/Branch</span><br>
				<span class="attributes a4">Batch</span>
			</div>
			<div class="hinge colons">
				<span >:</span><br>
				<span >:</span><br>
				<span >:</span><br>
				<span >:</span>
			</div>
			<div class="hinge val1">
				<span style="position: absolute;height: 20px;overflow: hidden;display: block;" class="values sname">
				<?php echo $s->name; ?>
				</span>
				<br>
				<span class="values sno">
				<?php echo $s->cardnumber; ?>
				</span>
				<br>
				<span class="values sbranch">
				<?php echo $s->branch; ?>
				</span>
				<br>
				<span class="values sbatch">
				<?php echo $s->batch;?>
				</span>
			</div>	
		</div>

		<div class="grid3">
			<div class="deanhostel" style="position:relative;top: 10px;left: 290px;font-weight: 600;">
				Dean Hostel
			</div>	
		</div>
			
	</div>


	<div class="card cright">
		<div class="address">	
		<br>
			<b><span class="a bld">Guardian Ph. No. : </span><?php echo $s->mob2; ?></b><br>
		</div>
		<br><br>
		<div class="rules">
				<b>Contacts :<br>
				 Wardens : <?php include "phone.php"; echo $p1.', '.$p2.' ,'.$p3 ;?> <br>
				 Chief Warden : 9999275330
				</b>
		</div>
	</div>
</div>
