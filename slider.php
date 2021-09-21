
    <div class="slider">
		<!-- fade css -->
		<?php
			include("./myPage/php/connect.php");
                $r = $conn -> query("SELECT * FROM reklama WHERE image != '' ORDER BY id DESC");
                if (mysqli_num_rows($r)) {
                    $row = mysqli_fetch_array($r);
                    $count = 0;
                    do {
                        $count++;
                        echo '
                            <div class="myslide fade">
								<img src="'.$row["image"].'" style="width: 100%; max-height: 60%;">
							</div>   
                        ';
                    } while ($row = mysqli_fetch_array($r));
                }
				echo'<div class="dotsbox" style="text-align:center">';
				for ($i = 1; $i <= mysqli_num_rows($r); $i++) {
					echo'
							<span class="dot" onclick="currentSlide('.$i.')"></span>						
					';
				}
				echo'</div>';
        ?>

		
		<!-- <div class="myslide fade">
			<img src="./images/img2.jpg" style="width: 100%; max-height: 60%;">
		</div>
		
		<div class="myslide fade">

			<img src="./images/img3.jpg" style="width: 100%; max-height: 60%;">
		</div>
		
		<div class="myslide fade">

			<img src="./images/img4.jpg" style="width: 100%; max-height: 60%;">
		</div>
		
		<div class="myslide fade">
			<img src="./images/img5.jpg" style="width: 100%; max-height: 60%;">
		</div> -->
		<!-- /fade css -->
		
		<!-- onclick js -->

		<!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  		<a class="next" onclick="plusSlides(1)">&#10095;</a> -->
		
		<!-- /onclick js -->
	</div>
	
<script src="./js/jsfile.js"></script>

