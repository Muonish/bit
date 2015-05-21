<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>hello html</title>		
	
		<script type = "text/javascript" src = "js/sorttable.js"></script>
	
		<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
		<script type = "text/javascript" src = "js/map.js"></script>
		
		
		<style type="text/css">
			
			body { 
				margin: 0; 
				padding: 0; 
				font: 12pt sans-serif;  
			}
			p {
				margin: 0px;
				padding: 10px;
				display: block;
			}
			#menu {
				height: 50px;
				padding: 0px;
				color: #fff;
				width: 100%;
			}
			#menu_item {
				line-height: 50px;
				text-align: center;
				height: 100%;
				float: left;
				background: #1C1C1C;
				width: 20%;
			}
			#content{
				//height: 100%;
				color: #fff;
				width: 100%;
				overflow: hidden;
			}
			#left_column{
				float: left;
				//height: 100%;
			
				background: #EEEEE0;
				color: #000;
				width: 50%;
			}
			#right_column {
				float: left;
				//height: 100%;
				background: #F0F8FF;
				color: #000;
				width: 50%;
			}
			#footer {
				//position: fixed;
				//left: 0px;
				//bottom: 0px;
				line-height: 50px;
				text-align: center;
				background: #2F4F4F;
				color: #fff;
				width: 100%;
			}
			
			
			#mapSurface {
				width: 100%;
				height: 300px;
			}
			
			#galery {
				width: 100%;
				height: 70%;
				border: 0px;
			}
			
			#sort_table {
				width: 100%;
				height: 30%;
			}
			
			table.sortable {
				border:0; 
				padding:0; 
				margin:0;
				width:100%;
				overflow: scroll;
			}
			table.sortable td {
				padding:4px; 
				width:33%;background: #F0F8FF;
			}
			table.sortable thead th {
				width: 33%;
				padding:4px;
				background:#D5F0FF; 
				text-align:left;
			}
			
			.tabs {
				//position: relative;
				margin: 0 auto;
				//width: 800px;
				width: 100%;
				//height: 100%;
			}
			.tabs label {
				color: #555;
				cursor: pointer;
				display: block;
				float: left;
				width: 150px;
				height: 45px;
				line-height: 45px;
				position: relative;
				top: 2px;
				text-align: center;
			}

			.tabs input {
				position: absolute;
				left: -9999px;
			}

			#tab_1:checked  ~ #tab_l1,
			#tab_2:checked  ~ #tab_l2,
			#tab_3:checked  ~ #tab_l3,
			#tab_4:checked  ~ #tab_l4 {
				background: #fff;
				border-color: #fff;
				top: 1;
				z-index: 3;
			}

			.tabs_cont {
				background: #fff;
				position: relative;
				z-index: 2;
				//height: 230px;
				//height: 100%;
			}
			.tabs_cont > div {
				position: absolute;
				left: -9999px;
				top: 0;
				opacity: 0;
				-moz-transition: opacity .5s ease-in-out;
				-webkit-transition: opacity .5s ease-in-out;
				transition: opacity .5s ease-in-out;
			}
			#tab_1:checked ~ .tabs_cont #tab_c1,
			#tab_2:checked ~ .tabs_cont #tab_c2,
			#tab_3:checked ~ .tabs_cont #tab_c3,
			#tab_4:checked ~ .tabs_cont #tab_c4 {
				position: static;
				left: 0;
				opacity: 1;
			}
			
			input_form{
				position: static;
				left: 0;
			}
			
			
			///////////////////////////////navigation bar by Jan Kadera/////////////////////////////////
			@import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);
			* {
			  -moz-box-sizing: border-box;
			  -webkit-box-sizing: border-box;
			  box-sizing: border-box;
			}

			html {
			  width: 100%;
			  height: 100%;
			}

			body {
			  width: 100%;
			  height: 100%;
			  display: box;
			  box-align: center;
			  box-pack: center;
			  transform: translate3d(0, 0, 0);
			}
			
			#li_panel {
				//margin: 0;
				//padding: 0;
				//height: 41;
			  height: 2.5em;
			  width: 4em;
			  vertical-align: middle;
			  line-height: 2.5em;
			  border-bottom: 1px solid #060606;
			  position: relative;
			  display: block;
			}

			.clearfix {
			  zoom: 1;
			}
			.clearfix:before, .clearfix:after {
			  content: "\0020";
			  display: block;
			  height: 0;
			  overflow: hidden;
			}
			.clearfix:after {
			  clear: both;
			}

			ul {
			  position: relative;
			  //-moz-transform: rotate(-35deg) skew(20deg, 5deg);
			  //-ms-transform: rotate(-35deg) skew(20deg, 5deg);
			  //-webkit-transform: rotate(-35deg) skew(20deg, 5deg);
			  //transform: rotate(-35deg) skew(20deg, 5deg);
			}

			.list-item {
			  background: #000000;
			  color: #575757;
			  text-align: center;
			  height: 2.5em;
			  width: 4em;
			  vertical-align: middle;
			  line-height: 2.5em;
			  border-bottom: 1px solid #060606;
			  position: relative;
			  display: block;
			  text-decoration: none;
			  -moz-box-shadow: -2em 1.5em 0 #e1e1e1;
			  -webkit-box-shadow: -2em 1.5em 0 #e1e1e1;
			  box-shadow: -2em 1.5em 0 #e1e1e1;
			  -moz-transition: all 0.25s linear;
			  -o-transition: all 0.25s linear;
			  -webkit-transition: all 0.25s linear;
			  transition: all 0.25s linear;
			}
			.list-item:hover {
			  background: #528B8B;
			  color: #fffcfb;
			  -moz-transform: translate(0.9em, -0.9em);
			  -ms-transform: translate(0.9em, -0.9em);
			  -webkit-transform: translate(0.9em, -0.9em);
			  transform: translate(0.9em, -0.9em);
			  -moz-transition: all 0.25s linear;
			  -o-transition: all 0.25s linear;
			  -webkit-transition: all 0.25s linear;
			  transition: all 0.25s linear;
			  -moz-box-shadow: -2em 2em 0 #e1e1e1;
			  -webkit-box-shadow: -2em 2em 0 #e1e1e1;
			  box-shadow: -2em 2em 0 #e1e1e1;
			}
			.list-item:hover:before, .list-item:hover:after {
			  -moz-transition: all 0.25s linear;
			  -o-transition: all 0.25s linear;
			  -webkit-transition: all 0.25s linear;
			  transition: all 0.25s linear;
			}
			.list-item:hover:before {
			  background: #2F4F4F;
			  width: 1em;
			  top: 0.5em;
			  left: -1em;
			}
			.list-item:hover:after {
			  background: #2F4F4F;
			  width: 1em;
			  bottom: -2.5em;
			  left: 1em;
			  height: 4em;
			}
			.list-item:before, .list-item:after {
			  -moz-transition: all 0.25s linear;
			  -o-transition: all 0.25s linear;
			  -webkit-transition: all 0.25s linear;
			  transition: all 0.25s linear;
			}
			.list-item:after {
			  content: "";
			  position: absolute;
			  height: 4em;
			  background: #181818;
			  width: 0.5em;
			  bottom: -2.25em;
			  left: 1.5em;
			  -moz-transform: rotate(90deg) skew(0deg, 45deg);
			  -ms-transform: rotate(90deg) skew(0deg, 45deg);
			  -webkit-transform: rotate(90deg) skew(0deg, 45deg);
			  transform: rotate(90deg) skew(0deg, 45deg);
			}
			.list-item:before {
			  content: "";
			  position: absolute;
			  height: 2.5em;
			  background: #121212;
			  width: 0.5em;
			  top: 0.25em;
			  left: -0.5em;
			  -moz-transform: skewY(-45deg);
			  -ms-transform: skewY(-45deg);
			  -webkit-transform: skewY(-45deg);
			  transform: skewY(-45deg);
			}
			////////////////////////////////////////////////////////////////////////////////////////

	  </style>
	</head>
	
	
	<body>
		<div id="menu">
			<div id="menu_item">Painting</div>
			<div id="menu_item">Architecture</div>
			<div id="menu_item">Sculpture</div>
			<div id="menu_item">Design</div>
			<div id="menu_item">Music</div>
		</div>
		<div id="content">
			<div id="left_column">
				<div style="margin: 20px">
				
					<form style="text-align: center; " method="POST" action="index.php">
						povarenok.ru<input style="border-radius: 5px; margin: 7px" name="url_pov" type="text"/>
						<input style="border-radius: 5px" name="ok_pov" type="submit" value="PARSE">
					</form>
					<form style="text-align: center; " method="POST" action="index.php">
						eda.ru<input style="border-radius: 5px; margin: 7px" name="url_eda" type="text"/>
						<input style="border-radius: 5px" name="ok_eda" type="submit" value="PARSE">
					</form>

					<?php
						include('parse_recipie.php');

						if (isset($_POST['ok_pov'])){
							$html = initUrl('url_pov');
							echo '<h2>' . parsePovarenokTitle($html) . '</h2>';
							echo '<div style="background: #FFF; padding: 15px; border-radius: 20px">';
							echo parsePovarenokIngredients($html) . '<br>';
							echo parsePovarenokSteps($html);
							echo '</div>';
							close($html);
						}	
						if (isset($_POST['ok_eda'])){
							$html = initUrl('url_eda');
							echo '<h2>' . parseEdaTitle($html) . '</h2>';
							echo '<div style="background: #FFF; padding: 15px; border-radius: 20px">';
							echo '<table><tr><td style="width: 200px">';
							echo '<img style="width: 300px; padding: 10px"; src="' . parseEdaImage($html) . '"/>'; 
							echo '</td>';
							echo '<td style="padding: 10px">';
							echo parseEdaIngredients($html);
							echo '</td></tr></table><br>';
							echo parseEdaSteps($html);
							echo '</div>';
							close($html);
						}	
					?>		
				</div>
					<ul style="float: left; margin: 11px;">
					  <li id="li_panel">
						<a class='list-item' href=''>
						  <i class='icon-'>Hello</i>
						</a>
					  </li>
					  <li id="li_panel">
						<a class='list-item' href=''>
						  <i class='icon-th-large'>Nya</i>
						</a>
					  </li>
					  <li id="li_panel">
						<a class='list-item' href=''>
						  <i class='icon-bar-chart'>Cute</i>
						</a>
					  </li>
					  <li id="li_panel">
						<a class='list-item' href=''>
						  <i class='icon-tasks'>Like</i>
						</a>
					  </li>
					  <li id="li_panel">
						<a class='list-item' href=''>
						  <i class='icon-bell'>Watch</i>
						</a>
					  </li>
					  <li id="li_panel">
						<a class='list-item' href=''>
						  <i class='icon-archive'>Think</i>
						</a>
					  </li>
					  <li id="li_panel">
						<a class='list-item' href=''>
						  <i class='icon-comment'>Do</i>
						</a>
					  </li>
					  <li id="li_panel">
						<a class='list-item' href=''>
						  <i class='icon-sitemap'>Box</i>
						</a>
					  </li>
					  <li id="li_panel">
						<a class='list-item' href=''>
						  <i class='icon-thumbs-up'>Send</i>
						</a>
					  </li>
					  <li id="li_panel">
						<a class='list-item' href=''>
						  <i class='icon-tumblr'>X</i>
						</a>
					  </li>
					</ul>
					
					
				<p>	Art is a diverse range of human activities and the products of those activities, usually involving imaginative or technical skill. In their most general form these activities include the production of works of art, the criticism of art, the study of the history of art, and the aesthetic dissemination of art. This article focuses primarily on the visual arts, which includes the creation of images or objects in fields including painting, sculpture, printmaking, photography, and other visual media. Architecture is often included as one of the visual arts; however, like the decorative arts, it involves the creation of objects where the practical considerations of use are essential—in a way that they usually are not in a painting, for example. Music, theatre, film, dance, and other performing arts, as well as literature and other media such as interactive media, are included in a broader definition of art or the arts. Until the 17th century, art referred to any skill or mastery and was not differentiated from crafts or sciences. In modern usage after the 17th century, where aesthetic considerations are paramount, the fine arts are separated and distinguished from acquired skills in general, such as the decorative or applied arts.

Art may be characterized in terms of mimesis (its representation of reality), expression, communication of emotion, or other qualities. During the Romantic period, art came to be seen as "a special faculty of the human mind to be classified with religion and science". Though the definition of what constitutes art is disputed and has changed over time, general descriptions mention an idea of imaginative or technical skill stemming from human agency and creation.

The nature of art, and related concepts such as creativity and interpretation, are explored in a branch of philosophy known as aesthetics.
				</p>	
			</div>
			<div id="right_column">
			
			
			<div>
				<section class="tabs">
					<input id="tab_1" type="radio" name="tab" checked="checked" />
					<input id="tab_2" type="radio" name="tab" />
					<input id="tab_3" type="radio" name="tab" />
					<input id="tab_4" type="radio" name="tab" />
					
					<label for="tab_1" id="tab_l1">Galery</label>
					<label for="tab_2" id="tab_l2">Lists</label>
					<label for="tab_3" id="tab_l3">Form</label>
					<label for="tab_4" id="tab_l4">Text</label>
					<div style="clear:both"></div>

					<div class="tabs_cont">
						<div id="tab_c1"><iframe id="galery" src="galery/index.html"></iframe></div>
						<div id="tab_c2">
							<table><tr>
							<td>
								<ul>
									<li>one</li>
									<li>two</li>
									<li>three</li>
								</ul>
								</td>
								<td>
								<ol>
									<li>four</li>
									<li>five</li>
									<li>six</li>
								</ol>
								</td>
								
							</tr></table>
							
						</div>
						<div id="tab_c3">
						<table>
							<tr>
							<form action="handler.php">
								<td>
								<fieldset>
									<legend>Contact info</legend>
									<p>Name:
									<br/>
										<input style="position: static; left: 0;" type="text" name="username" size="15" maxlength="30"/>
									</p>
									<p>Tel:
									<br/>
										<input style="position: static; left: 0;" type="text" name="username" size="15" maxlength="30"/>
									</p>
								</fieldset>
								<br/>
								<p>Please select a style:
									<br/>
									<input style="position: static; left: 0;" type="radio" name="style" value="abstract" checked="checked"/>Abstract
									<input style="position: static; left: 0;" type="radio" name="style" value="surreal"/>Surreal
									<input style="position: static; left: 0;" type="radio" name="style" value="expressionism"/>Expressionism
								</p>
								<p>Select place:
									<br/>
									<input style="position: static; left: 0;" type="checkbox" name="place" value="child" checked="checked"/>Child
									<input style="position: static; left: 0;" type="checkbox" name="place" value="living"/>Living room
									<input style="position: static; left: 0;" type="checkbox" name="place" value="dining"/>Dining room
								</p>
								<p>Select size:
									<br/>
									<select style="position: static; left: 0;" name="size">
										<option value="small">Small</option>
										<option value="medium">Medium</option>
										<option value="large">Large</option>
									</select>
								</p>
								</td>
								<td>
								<p>Multiple choice (you can choose <br/> multiple options by holding down <b>Ctrl</b>):
									<br/>
									<select style="position: static; left: 0;" name="mult" size="5" multiple="multiple">
										<option value="pony">Pony</option>
										<option value="cat">Cat</option>
										<option value="sandwich">Sandwich</option>
										<option value="table">Table</option>
										<option value="car">Car</option>
									</select>
								</p>
								<p>Comments: 
								<br/>
									<textarea name="comments" cols="40" rows="8">Enter your comments...
									</textarea>
								</td>

							 </form>
							 </tr>
							</table>
							<input style="position: static; right: 0; padding: 5px; margin: 15px" type="submit" name="submit" value="Submit"/>
						</div>
						<div id="tab_c4" style="padding: 10px">
							<i>Text</i><br>
							<mark>Text</mark><br>
							<strike>Text</strike><br>
							<strong>Text</strong><br>
							<u>Text</u><br>
							<basefont>Text</basefont><br>
							<big>Text</big><br>
							<cite>Text</cite><br>
							<h3 align="right">Text</h3><br>
							<h5 title="azaza">Text</h5><br>
							<b>Text</b><br>
							Te<sub>xt</sub><br>
							Te<sup>xt</sup><br>
							<font color="#000fff">Text</font><br>
							<h6>Text</h6><br>
							<kbd>Text</kbd><br>
							<ruby>Text</ruby><br>
							<s>Text</s><br>
							<span>Text</span><br>
						</div>
					</div>
				</section>
			</div>
			<div id="sort_table">
				<table class="sortable">
					<thead>
						<tr>
							<th>Artist</th>
							<th>Exhibitions</th>
							<th>Style</th>
						</tr>
					</thead>
					<tbody>
						<tr><td>Ruben Ireland</td> <td>16</td><td>Print</td></tr>
						<tr><td>Matthieu Bourel</td> <td>3</td><td>Collage</td></tr>
						<tr><td>Samantha Keely Smith</td> <td>11</td><td>Landscape</td></tr>
						<tr><td>Mehmet Dere</td> <td>34</td><td>Abstract</td></tr>
						<tr><td>Zweifellos Mondbetont</td> <td>13</td><td>Abstract</td></tr>
						<tr><td>Jim Kazanjian</td> <td>37</td><td>Surreal</td></tr>
						<tr><td>Ellsworth Kelly</td> <td>16</td><td>Expressionism</td></tr>
					</tbody>
				</table>
			
			</div>

			</div>
		</div>
		<div id="footer">
			by Muonish ~^.^
		</div>
	</body>
</html>