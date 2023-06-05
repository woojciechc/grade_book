<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand m-3" href="/">Grade Book</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <?php
      $session = session();
      $roleId = $session->get('roleId');
      if($roleId==3){
        echo "<a class=\"nav-link\" href=\"/student/subjects\">Przedmioty</a>";
      }
      if($roleId==2){
        echo "<a class=\"nav-link\" href=\"/teacher/classes\">Moje klasy</a>";
      }
      if($roleId==1){
        echo "<a class=\"nav-link\" href=\"/admin/dashboard\">Użytkownicy</a>";
        echo "</li>";
        echo "<li class=\"nav-item active\">";
        echo "<a class=\"nav-link\" href=\"/admin/classes\">Klasy</a>";
      }
        ?>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0 m-3">
      <?php
      echo $session->get('user_email')
        ?>
        <a class="m-3" href="/logout">Wyloguj</a>
    </div>
  </div>
</nav>