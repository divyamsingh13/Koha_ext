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
					Phones:(0121)27662841 to 2762851 Fax: 2761844,2761845<br>
				</div>
			</div>
		</div>

		<div class="grid2">
			<div class="icardtxt">IDENTITY CARD</div>
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
				<span class="values sname">
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
			<div class="barcode"><img src="getbarcode.php?text=<?php echo $s->cardnumber; ?>" alt="Can't Create Barcode"> </div>
			<div class="dirsign">
				Director
			</div>	
		</div>
			
	</div>


	<div class="card cright">
		<div class="address">	
		<br>
			<b><span class="a bld">Blood Group :</span></b><?php echo $s->blood; ?><br>
			<b><span class="a add">Address :</span></b><?php echo $s->address." ".$s->city." ".$s->zipcode ?>
		</div>
		<br><br>
		<div class="rules">
				<center><b><u>Rules</b></u></center><br>
				1.This card is non-transferable.<br>
				2.Students must carry this card in the institute and should produce the same on demand.<br>
				3.The loss of this card should be immediately repoted to the authorities.<br>
		</div>
	</div>
</div>
