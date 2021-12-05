<?php 
 $connect=new PDO("mysql:host=127.0.0.1;port=3306;dbname=bd_emploi","root","");
  // require('date.php');


$limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 50;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    // $result = $conn->query("SELECT * FROM customers LIMIT $start, $limit");
    // $customers = $result->fetch_all(MYSQLI_ASSOC);
 $req = "SELECT * FROM membre M inner join recruteur R on R.idMembre=M.idMembre where M.idMembre in (SELECT idMembre from recruteur) LIMIT $start, $limit";
        $rep=$connect->prepare($req); //this instruction preparered the requete
        $rep->execute();//execute la requete
        $row = $rep->fetchALL();




    $result1 = $connect->query("SELECT count(R.idMembre) AS id FROM membre M inner join recruteur R on R.idMembre=M.idMembre where M.idMembre in (SELECT idMembre from recruteur)");
    $custCount = $result1->fetchALL();
    $total = $custCount[0]['id'];
    $pages = ceil( $total / $limit );

    $Previous = $page - 1;
    $Next = $page + 1;
        
?>
<!-- ***************************************************************************************************** -->


<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.css">
    <script src="jquery-3.6.0.min.js"></script>
</head>
<body>
     <?php
        include("Header_Admin.php");
    ?>
    <div class="container well">
        <div class="row">
            <div class="col-md-10">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                    <li>
                      <a href="RecuperationDesRecruteurs.php?page=<?= $Previous; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo; Previous</span>
                      </a>
                    </li>
                    <?php for($i = 1; $i<= $pages; $i++) : ?>
                        <li><a href="RecuperationDesRecruteurs.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                    <?php endfor; ?>
                    <li>
                      <a href="RecuperationDesRecruteurs.php?page=<?= $Next; ?>" aria-label="Next">
                        <span aria-hidden="true">Next &raquo;</span>
                      </a>
                    </li>
                  </ul>
                </nav>
            </div>
            <div class="text-center" style="margin-top: 20px; " class="col-md-2">
                <form method="post" action="RecuperationDesRecruteurs.php">
                        <select name="limit-records" id="limit-records">
                            <option disabled="disabled" selected="selected">---Limit Records---</option>
                            <?php foreach([5,10,100,500,1000,5000] as $limit): ?>
                                <option <?php if( isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </form>
                </div>
        </div>
        <div style="height: 600px; overflow-y: auto;">
            <table id="" class="table table-striped table-bordered">
                <thead>
                    <tr>
                          <th scope="col">Nom Entreprise</th>
                          <th scope="col">Adresse</th>
                          <th scope="col">Email</th>
                          <th scope="col">Telephone</th>
                          <th scope="col">Ville</th>
                          <th scope="col">Site Web</th>
                          <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($row as $row) :  ?>
                        <tr>
                        <td><h6><?php echo $row["nom"]; ?></h6></td>
                        <td><h6><?php echo $row["adresse"]; ?></h6></td>
                        <td><h6><?php echo $row["email"]; ?></h6></td>
                        <td><h6><?php echo $row["tel"]; ?></h6></td>
                        <td><h6><?php echo $row["ville"]; ?></h6></td>
                        <td><h6 ><?php echo $row["SiteWeb"]; ?></h6></td>
                        <td>
                            <form method="" action="">
                                <input type="hidden" name="idR" value="<?php echo $row["idMembre"]; ?>">
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            
        </div>
<script src="jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#limit-records").change(function(){
            $('form').submit();
        })
    })
</script>
</body>
</html>