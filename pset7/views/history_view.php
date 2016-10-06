<form action="history.php" method="post">
    <fieldset>
        <div class= "results">
            <table id="table" style="width:100%">
                <tr>
                    <th>ID</th>
                    <th>Timestamp</th>
                    <th>Action</th>
                    <th>Stock</th>
                    <th>Shares</th>
                    <th>Price</th>
                </tr>
                  
              <?php 
                foreach ($info as $i)
                {
                    print("<tr>");
                      print("<td>" . $i["id"] . "</td>");
                      print("<td>" . $i['timestamp'] . "</td>");
                      print("<td>" . $i['action'] . "</td>");
                      print("<td>" . $i['stock'] . "</td>");
                      print("<td>" . $i["shares"] . "</td>");
                      print("<td>" . $i['price'] . "</td>");
                    print("</tr>");
                }
              ?>
            </table> 
         </div>                          
    </fieldset>
</form>