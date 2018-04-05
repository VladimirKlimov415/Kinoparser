<?php  ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" >Выборка:</a>
    </div>
    <ul class="nav navbar-nav navbar-center">
       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Год выхода
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?year=2016">2016</a></li>
          <li><a href="index.php?year=2015">2015</a></li>
          <li><a href="index.php?year=2014">2014</a></li>
          <li><a href="index.php?year=2013">2013</a></li>
          <li><a href="index.php?year=2012">2012</a></li>
          <li><a href="index.php?year=2011">2011</a></li>
          <li><a href="index.php?year=2010">2010</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Рейтинг
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?rating=8">От 8 до 10</a></li>
          <li><a href="index.php?rating=7">От 7 до 8</a></li>
          <li><a href="index.php?rating=6">От 6 до 7</a></li>
         </ul>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Жанр
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?genre='фантастика'">Фантастика</a></li>
          <li><a href="index.php?genre='боевик'">Боевик</a></li>
          <li><a href="index.php?genre='триллер'">Триллер</a></li>
          <li><a href="index.php?genre='приключения'">Приключения</a></li>
          <li><a href="index.php?genre='мультфильм'">Мультфильм</a></li>
          <li><a href="index.php?genre='комедия'">Комедия</a></li>
         </ul>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Страна производства
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?country='США'">США</a></li>
          <li><a href="index.php?country='Россия'">Россия</a></li>
          <li><a href="index.php?country='Великобритания'">Великобритания</a></li>
          <li><a href="index.php?country='Япония'">Япония</a></li>
          
         </ul>
      </li>
      <li><a href="index.php?reset='true'">Сброс</a></li>

    </ul>
  </div>
</nav>