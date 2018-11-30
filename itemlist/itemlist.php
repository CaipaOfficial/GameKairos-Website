<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
    if ($_POST['LENGUAJE'] == "EN" ) {
      $sql = "SELECT * FROM kairos_web.dbo.itemlist_EN ";
      echo("<html class='no-js' lang='en'>");
    }else
    if ($_POST['LENGUAJE'] == "ES") {
      require ('translate/_ES.php');
      echo("<html class='no-js' lang='es'>");
    }

    if($_POST['LENGUAJE'] == "" or $_POST['LENGUAJE'] == ""){
      $sql = "SELECT * FROM kairos_web.dbo.itemlist_ES ";
      echo("<html class='no-js' lang='en'>");
    }

     ?>

    <meta charset="utf-8">
    <?php require ('../index-view/head-modular.php'); ?>
  </head>

  <script language="javascript">
    function doSearch()
    {
      var tableReg = document.getElementById('datos');
      var searchText = document.getElementById('searchTerm').value.toLowerCase();
      var cellsOfRow="";
      var found=false;
      var compareWith="";
      // Recorremos todas las filas con contenido de la tabla
      for (var i = 1; i < tableReg.rows.length; i++)
      {
        cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        found = false;
        // Recorremos todas las celdas
        for (var j = 0; j < cellsOfRow.length && !found; j++)
        {
          compareWith = cellsOfRow[j].innerHTML.toLowerCase();
          // Buscamos el texto en el contenido de la celda
          if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
          {
            found = true;
          }
        }
        if(found)
        {
          tableReg.rows[i].style.display = '';
        } else {
          // si no ha encontrado ninguna coincidencia, esconde la
          // fila de la tabla
          tableReg.rows[i].style.display = 'none';
        }
      }
    }
  </script>
  <body>
    <div class="p-4" style="z-index: 4;top: 0;width: 25%;">
      <form class="form-inline" method="POST" action="itemlist.php" style="position:relative;">
        <select class="custom-select mb-2 mr-sm-2 mb-sm-0 bg-secondary text-white" id="inlineFormCustomSelect" name="LENGUAJE" style="z-index: 2;">
          <option selected>ESP/ENG</option>
          <option value="EN">English/Ingles</option>
          <option value="ES">Spanish/Español</option>
        </select>
        <button type="submit" class="btn btn-default bg-dark text-white btn-sm">Submit</button>
      </form>
    </div>
    <div class="">
      <div class="container p-5">
        <form class="pb-5">
          <input id="searchTerm" class="form-control border border-primary" placeholder="Item name" type="text" onkeyup="doSearch()" />
        </form>

        <table class="table table-dark" id="datos">
          <tr>
            <th>Icono</th>
            <th>Nombre</th>
            <th>ID</th>
          </tr>
          <?php
          require ('../db/connect_codes.php');
          $stmt = sqlsrv_query( $conn, $sql);
          if( $stmt === false) {
              print_r(sqlsrv_errors());
              return print_r( sqlsrv_errors(), true);
          }

          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
            echo '
              <tr>
                <td><img height="45px" width="45px" class="" src="static/'.$row['iconId'].'.png" alt="holas"></td>
                <td>'.$row['Name'].'</td>
                <td>'.$row['id'].'</td>
              </tr>
            ';
          }
           ?>
        </table>
      </div>
    </div>
  </body>
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
    (adsbygoogle = window.adsbygoogle || []).push({
      google_ad_client: "ca-pub-9027741837304821",
      enable_page_level_ads: true
    });
  </script>
</html>
