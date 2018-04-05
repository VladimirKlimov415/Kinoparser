<?php session_start(); 
if(isset($_GET["reset"])){

    session_unset(); 

    session_destroy(); 
  }
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'movies';
//print_r($_GET["reset"]); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <title>Парсинг кино</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<style type="text/css">
  .jumbotron{
    margin-bottom: 0px;
    background-color: grey;
    color: #ffffff;
  }
  .navbar{
    border-radius: 0px;
  }

  img {
    margin-top: 30px;
  }

  footer {
    background-color: #555;
    color: white;
    padding: 15px;
    }

  .rating {
    background-color: #555;
    max-width: 60px;
    color: white;
    margin:20px auto;
    margin-top: 65px;
    font-size: 20px;
    padding: 5px;
    line-height: 20px
  }

  .criteria{
    margin:10px auto;
    font-size: 24pt;
  }

</style>

<div class="jumbotron text-center">
  <h1>Кино</h1>
  <p>Выбери себе фильм</p>
  <p>Популярные фильмы за последнее время</p>
</div>
  
<?php include("navbar.php"); 

$criteria="";
if (isset($_GET["year"])){
$_SESSION["year"] = $_GET["year"];
}
if (isset($_GET["rating"])){
$_SESSION["rating"] = $_GET["rating"];
}
if (isset($_GET["genre"])){
$_SESSION["genre"] = $_GET["genre"];
}
if (isset($_GET["country"])){
$_SESSION["country"] = $_GET["country"];
}

?>
  
 <?php 

    $mysqli = new mysqli($host,$user,$pass,$db);
    $mysqli->query("SET NAMES utf8");
    
//1234
    if ((isset($_SESSION["year"])) and (isset($_SESSION["rating"])) and (isset($_SESSION["genre"])) and (isset($_SESSION["country"])))  {
      $year = $_SESSION['year'];
      $rating = $_SESSION['rating'];
      $genre =$_SESSION['genre'];
      $genre = trim($genre,'\'');
      $country =$_SESSION['country'];

      $sql = "SELECT DISTINCT * FROM movies WHERE (rating>=$rating AND rating <=($rating+1)) and year=$year and genres LIKE '%$genre%' and country=$country ORDER BY rand() LIMIT 10";
      }  

//123
    elseif ((isset($_SESSION["year"])) and (isset($_SESSION["rating"])) and (isset($_SESSION["genre"])) ) {
      $year = $_SESSION['year'];
      $rating = $_SESSION['rating'];
      $genre =$_SESSION['genre'];
      $genre = trim($genre,'\'');

      $sql = "SELECT DISTINCT * FROM movies WHERE (rating>=$rating AND rating <=($rating+1)) and year=$year and genres LIKE '%$genre%'ORDER BY rand() LIMIT 10";
      }

//124

    elseif ((isset($_SESSION["year"])) and (isset($_SESSION["rating"])) and (isset($_SESSION["country"])) ) {
      $year = $_SESSION['year'];
      $rating = $_SESSION['rating'];
      $country =$_SESSION['country'];

      $sql = "SELECT DISTINCT * FROM movies WHERE (rating>=$rating AND rating <=($rating+1)) and year=$year and country=$country ORDER BY rand() LIMIT 10";
      }

//134
      elseif ((isset($_SESSION["year"])) and (isset($_SESSION["country"])) and (isset($_SESSION["genre"])) ) {
      $year = $_SESSION['year'];
      $country =$_SESSION['country'];
      $genre =$_SESSION['genre'];
      $genre = trim($genre,'\'');

      $sql = "SELECT DISTINCT * FROM movies WHERE country=$country and year=$year and genres LIKE '%$genre%'ORDER BY rand() LIMIT 10";
      }

//234
      elseif ((isset($_SESSION["rating"])) and (isset($_SESSION["country"])) and (isset($_SESSION["genre"])) ) {

      $country =$_SESSION['country'];
      $rating = $_SESSION['rating'];
      $genre =$_SESSION['genre'];
      $genre = trim($genre,'\'');

      $sql = "SELECT DISTINCT * FROM movies WHERE (rating>=$rating AND rating <=($rating+1)) and country=$country and genres LIKE '%$genre%'ORDER BY rand() LIMIT 10";
      }
//12
      elseif ((isset($_SESSION["year"])) and (isset($_SESSION["rating"]))) {
        $year = $_SESSION['year'];
        $rating = $_SESSION['rating'];
        $sql = "SELECT DISTINCT * FROM movies WHERE (rating>=$rating AND rating <=($rating+1)) and year=$year ORDER BY rand() LIMIT 10";
      }
//13
      elseif ((isset($_SESSION["year"]))  and (isset($_SESSION["genre"])))  {
      $year = $_SESSION['year'];
      
      $genre =$_SESSION['genre'];
      $genre = trim($genre,'\'');
      

      $sql = "SELECT DISTINCT * FROM movies WHERE  year=$year and genres LIKE '%$genre%'  ORDER BY rand() LIMIT 10";
      }
//14
      elseif ((isset($_SESSION["year"]))  and (isset($_SESSION["country"])))  {
      $year = $_SESSION['year'];
      $country =$_SESSION['country'];

      $sql = "SELECT DISTINCT * FROM movies WHERE  year=$year and country=$country ORDER BY rand() LIMIT 10";
      }
//23 
      elseif (isset($_SESSION["rating"]) and (isset($_SESSION["genre"])))   {
     
      $rating = $_SESSION['rating'];
      $genre =$_SESSION['genre'];
      $genre = trim($genre,'\'');

      $sql = "SELECT DISTINCT * FROM movies WHERE (rating>=$rating AND rating <=($rating+1))  and genres LIKE '%$genre%'  ORDER BY rand() LIMIT 10";
      }

//34 
      elseif  (isset($_SESSION["genre"]) and (isset($_SESSION["country"])))  {
     
      $genre =$_SESSION['genre'];
      $genre = trim($genre,'\'');
      $country =$_SESSION['country'];

      $sql = "SELECT DISTINCT * FROM movies WHERE  genres LIKE '%$genre%' and country=$country ORDER BY rand() LIMIT 10";
      }  

//24 
      elseif((isset($_SESSION["rating"]))  and (isset($_SESSION["country"])))  {
      
      $rating = $_SESSION['rating'];
      $country =$_SESSION['country'];

      $sql = "SELECT DISTINCT * FROM movies WHERE (rating>=$rating AND rating <=($rating+1)) and country=$country ORDER BY rand() LIMIT 10";
      }

//1
    elseif (isset($_SESSION["year"])) {
        
      $year = $_SESSION['year'];
      $sql = "SELECT DISTINCT * FROM movies WHERE year=$year ORDER BY rand() LIMIT 10";
      }

//2
    elseif (isset($_SESSION["rating"])) {
       $rating = $_SESSION['rating'];
       $sql = "SELECT DISTINCT * FROM movies WHERE (rating>=$rating AND rating <=($rating+1)) ORDER BY rand() LIMIT 10";
     } 
//3 
    elseif (isset($_SESSION['genre'])) {
      $genre =$_SESSION['genre'];
      $genre = trim($genre,'\'');

      $sql = "SELECT DISTINCT * FROM movies WHERE  genres LIKE '%$genre%'  ORDER BY rand() LIMIT 10";

       }

//4 
    elseif (isset($_SESSION['country'])) {
      $country =$_SESSION['country'];
      $sql = "SELECT DISTINCT * FROM movies WHERE country=$country ORDER BY rand() LIMIT 10";

       }   
    
    else{
      $sql = "SELECT DISTINCT * FROM movies  ORDER BY rand() LIMIT 10";
    }
    $result = $mysqli->query($sql) or die($mysqli->error);
?>

<div class="container text-center">
      <div class="criteria">
        <p>Выбранные критерии:<br>
            
            Год выхода - <?php if (isset($_SESSION['year'])) {echo $_SESSION["year"];} ?><br>
            Рейтинг - <?php 
                if (isset($_SESSION['rating']) and $_SESSION['rating']==6 ){
                  echo "От 6 до 7";
                }
                elseif (isset($_SESSION['rating']) and $_SESSION['rating']==7) {
                  echo "От 7 до 8";
                }
                elseif (isset($_SESSION['rating']) and $_SESSION['rating']==8) {
                  echo "От 8 до 10";
                }

                 ?><br>
            Жанр - <?php if (isset($_SESSION['genre'])) {echo trim($_SESSION["genre"],'\'');} ?><br>
            Страна - <?php if (isset($_SESSION['country'])) {echo trim($_SESSION["country"],'\'');} ?><br>
           
        </p>

      </div>

<?php while ($movie = $result->fetch_assoc()): ?> 



    <div class="row ">
      <div class="col-sm-2 text-center">
        <div class="panel panel-default">
        <img width="70"  height="110" src= '<?=$movie['images']?>'>
        <p class="rating"><?= $movie['rating']?></p>
      </div>
      </div>
      <div class="col-sm-10">
        <div class="panel panel-default">
          <div class="panel-heading">
        <h3><?= $movie['title'].'   ('.$movie['year'].')'?></h3>
          </div>
        <div class="panel-body">
        <p><?=$movie['runtime'] ?></p>
        <p><?='Режиссер: '.$movie['director'] ?></p>
        <p><?='В главной роли: '.$movie['actor'] ?></p>
        <p><?='Жанр: '.$movie['genres'] ?></p>
        <p><?='Страна производства: '.$movie['country'] ?></p>
         </div>
        </div>
      </div>
    </div>
 

<?php endwhile; 
?>


</div>
<footer class="container-fluid">
  <p>&copy Владимир Климов, 2017</p>
  <p>Данные с сайта kinopoisk.ru</p>

</footer>
 
</body>
</html>
