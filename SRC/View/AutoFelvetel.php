<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Regisztráció</title>
</head>
<body>
  <div>
    <form action="" method="POST">
    <!-- <select>     Select     Lenyíló lista létrehozására szolgáló páros címke.
        <option>bmw </optiona>
        <option>bmw </optiona>
        <option>bmw </optiona>
    </select> 
        <label for="">Márka
            <input type="text" ></input> 
        </label>
        <select> Kategóriák

        <label for="">Márka</label>
            <option>Sedan </optiona>
            <option>Combi </optiona>
            <option>Cabrio </optiona>
            <option>4X4 </optiona>
        </select>
        <label for="">Suly
            <input type="text"></input>
        </label>
-->
    <?php // adatok felvétele egy php segitségével az adatokat több tömből generálja ki  
      include("AutoFelvevoBackend.php");
      kiiro();
  
  ?>


      <button type="submit" name="submit">Regisztál</button>
    </form>
  </div>
  <?php 
  include("../Controller/AutoFelvevoController.php");//cser;ljem ki
  init($_POST);
?>
</body>
</html>



<!--
    mit vegyek fel az adatbázisba:
    Táblák száma:2
        Auto tipus:
            Márka
            Fajta


        Auto :
            Rendszám
            Alvázszám
-->