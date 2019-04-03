<?php
include('header.php');


$autoID = $_GET['autoID'];

?>

<p>Ennen vuokrauksen vahvistamista, täytäthän asiakastietosi! </p>
<form class="form form-group" action="talletaasiakas.php" method="post">
            <label for="enimi">Etunimi:</label><br>
                <input type="text" name="enimi" required><br>
            <label for="snimi">Sukunimi:</label><br>
                <input type="text" name="snimi"  required><br>
             <label for="katuosoite">Katuosoite:</label><br>
                <input type="text" name="katuosoite" required><br>
            <label for="postitmpk">Postitoimipaikka:</label><br>
                <input type="text" name="postitmpk"  required><br>
            <label for="postinro">Postinumero:</label><br>
                <input type="number" name="postinro" required><br>
             <label for="puhnro">Puhelinnumero:</label><br>
                <input type="text" name="puhnro"  required><br>
            <label for="email">Email:</label><br>
                <input type="email" name="email" ><br>
                <input type="hidden" name="autoID" value="<?php echo $autoID?>" ><br>
        <button type="submit" class="btn btn-success">Tallenna tiedot</button>
</form>

<?php
include('footer.php');
?>

