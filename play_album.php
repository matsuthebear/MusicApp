<?php
  
  include('header.php');
  include('database/db.php');
  include('check.php');
?>
<main>
<?php 
  $id = $_GET['id'];
  $query ="SELECT * FROM song as s,album as a
      WHERE a.id = s.album and a.id = '$id' ORDER BY s.position ";
  $result = mysqli_query($connection,$query);
  $row = mysqli_fetch_array($result);

  
  echo('<div class="row">
  		<div class="col l6 m6 s12">
        <ul class="collection">
        <li>
        <img class="" style=" height:auto; width:100%" src=" ');
  		echo($row['image']);
        echo('" data-caption="');
        echo('Album ' . $row['name'] . ' made by ' . $row['band'] . ' in ' . $row['year']);
 		echo('"></li>');
  $query ="SELECT * FROM song as s,album as a
  WHERE a.id = s.album and a.id = '$id' and s.position = 1";
  $result = mysqli_query($connection,$query);
  $row = mysqli_fetch_array($result);
  echo('<li><audio id="audio" preload="none" tabindex="0" controls=""
        type="audio/mpeg"> <source type="audio/mp3" src="');
  echo($row['file']);
  echo('"></audio></li></ul></div>');   
  echo('<div class="col l6 m6 s12"><ul class="collection" id="playlist">');
  
  $query ="SELECT * FROM song as s,album as a
  WHERE a.id = s.album and a.id = '$id'";
  $result = mysqli_query($connection,$query);
  while($row = mysqli_fetch_array($result)){
    echo('<li class="collection-item avatar">');
      echo('<a href="');
      echo($row['file']);
      echo('"><i class="material-icons circle red">play_arrow</i></a><span class="title">');
      echo($row['title']);  
      echo('</a></span> </li>');
  }
  echo('</ul></ul></div></div>');
  ?>
</main>
<script>
init();
var audio;
var playlist;
var tracks;
var current;
function init(){
  var current = 0;
  var audio = $('#audio');
  var playlist = $('#playlist');
  var tracks = playlist.find('li a');
  var len = tracks.length;

  audio[0].volume = 0.50;
  audio[0].play();
  playlist.find('a').click(function(e){
    e.preventDefault();
    link = $(this);
    current = link.parent().index();
    run(link,audio[0]);

  });
  audio[0].addEventListener('ended', function(e){
    current++;
    if (current == len){
      current = 0;
      link = playlist.find('a')[0];
    }else{
      link = playlist.find('a')[current];
    }
    run($(link),audio[0]);
  });

}

function run(link,player){
  player.src = link.attr('href');
  par = link.parent();
    par.addClass('active').siblings().removeClass('active');
    player.load();
    player.play();
}
</script>

<?php
	
	include "footer.php";

?>