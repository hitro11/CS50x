<div style="overflow-x:auto;">
    <table id="table" style= "width:100%">
        <tr>
            <th>Stock</th>
            <th>Symbol</th>
            <th>Price</th>
            <th>Shares</th>
        </tr>
                 
        <?php
        foreach ($info as $info)
        {
            print("<tr>");
            print("<td>" . $info["name"] . "</td>");
            print("<td>" . $info["symbol"] . "</td>");
            print("<td>" . $info["price"] . "</td>");
            print("<td>" . $info["shares"] . "</td>");
            print("</tr>");
        }
        ?>
    </table>
</div>