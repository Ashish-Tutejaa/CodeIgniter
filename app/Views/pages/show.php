<div class="editor">
    <label for="id">ID: </label>
    <input id='called' type="text" name="id">
    <br/>
    <label for="name">Station Name: </label>
    <input id='named' type="text" name="name">
    <br/>
    <label for="energy">New Energy Value: </label>
    <input id='powerLvl' type="text" name="energy">
    <button onClick="req()">Update!</button>
    <h3 id="message"></h3>
</div>

<table>
<?php
foreach($all as $item)
    {
    echo "<tr>";
    echo "<td>".$item['ID']."</td>";
    echo "<td>".$item['ST_NAME']."</td>";
    echo "<td>".$item['ENERGY']."</td>";
    echo "<tr/>";
    }
    ?>
</table>
<h1>TOTAL SUM IS: 
<?php echo $sum ?>
</h1>