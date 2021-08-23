<!DOCTYPE html>
<html>

<head>

    <!-- Local style sheet relative to this file -->
    <link rel="stylesheet" href="style.css">
    
    <!-- Embedded style sheet -->
    <style>
        *{
            padding : 10px;
        }
        form 
        {
            text-align: center;
        }

        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>
</head>

<body>
    <div class="container " id="content">
    <form action="" method = "POST">
        <select name="League" id="League">
            <option value="EPL ">EPL</option>
            <option value="LaLega">La Lega</option>
        </select>


        <select name="Team" id="Team">
            <option value="1">Real Madrid</option>
            <option value="2">Barcelona</option>
            <option value="3">Atlético Madrid</option>
            <option value="4">Sevilla</option>
            <option value="5">Villarreal</option>
            <option value="6">	Real Sociedad</option>
            <option value="7">Granada</option>
            <option value="8">Getafe</option>
            <option value="9">Valencia</option>
            <option value="10">Osasuna</option>
        </select>

        <select name="Season" id="Season">
            <option value="2019to2020"> Season 2019 to 2020</option>
            <option value="2020to2021">Season 2020 to 2021</option>
        </select>
        <input type="submit" name="submit" vlaue="Submit">    </form>
    </div>
</body>
</html>


<?php
    error_reporting(0);

    if(isset($_POST['submit']))
    {
        $League = $_POST['League'];
        $Team = $_POST['Team'];
        $Season = $_POST['Season'];
        // echo $League ;
        // echo $Team;
        // echo $Season;
    }

    if($League=="LaLega")
    {
        if($Season=="2019to2020")
        {
        // echo $League ;
        // echo $Team;
        // echo $Season;

        //
        $url ="https://en.wikipedia.org/wiki/2019%E2%80%9320_La_Liga?fbclid=IwAR2E0CcC-0QWhNyrkztyfA7b3YZzseBMnfDlozIvKpa7QffayNQMeotz7To";
        $html = file_get_contents($url);
        $dom = new domDocument;
        @$dom->loadHTML($html);
        $tables = $dom->getElementsByTagName('table');
        $table = $tables[4]->nodeValue;        
        $rows = $tables->item(4)->getElementsByTagName('tr');
        
        foreach ($rows as $row)
        { 
            
            $cols = $row->getElementsByTagName('td');
            $c = $cols->item(0)->nodeValue;
            // Team Name
            $colsth = $row->getElementsByTagName('th');
            $t = $colsth->item(0)->nodeValue;
            
            //  match number 
            $colsmatch = $row->getElementsByTagName('td');
            $match = $colsmatch->item(1)->nodeValue;
            
            // match Win 
            $ColsWin = $row->getElementsByTagName('td');
            $win = $ColsWin->item(2)->nodeValue;

            //match draw 
            $Colsdraw = $row->getElementsByTagName('td');
            $draw = $Colsdraw->item(3)->nodeValue;

            // Match Lost 
            $Colsdlost = $row->getElementsByTagName('td');
            $lost = $Colsdlost->item(4)->nodeValue;

            // Match Points 
            $Colsdpoints = $row->getElementsByTagName('td');
            $points = $Colsdpoints->item(8)->nodeValue;

            // Win Percentage 
            $winpercentage = $win/38 ;
            $winpercentage2 = number_format($winpercentage, 2, '.', '') *100;


           



            

            if($Team == $c)
            { ?>
                <table>
                        <tr>
                            <th>Team Name </th>
                            <th>Total Match </th>
                            <th>Win Match </th>
                            <th>Draw Match</th>
                            <th>Lost Match</th>
                            <th>Win Percentage </th>
                            <th>PTS</th>
                        </tr>
                        <tr>
                            <td><?php echo $t ; ?></td>
                            <td><?php echo $match ; ?></td>
                            <td><?php echo $win; ?></td>
                            <td><?php echo $draw ; ?></td>
                            <td><?php echo $lost ; ?></td>
                            <td><?php echo $winpercentage2. "%" ; ?></td>
                            <td><?php echo $points ; ?></td>
                        </tr>
                </table> 
                <?php
            }
            else 
            {
                
            }
        }
        }
    }
    
    // La lega 2021
    if($League=="LaLega")
    {
        if($Season=="2020to2021")
        {
        // echo $League ;
        // echo $Team;
        // echo $Season;

        //
        $url ="https://en.wikipedia.org/wiki/2020%E2%80%9321_La_Liga";
        $html = file_get_contents($url);
        $dom = new domDocument;
        @$dom->loadHTML($html);
        $tables = $dom->getElementsByTagName('table');
        $table = $tables[4]->nodeValue;        
        $rows = $tables->item(4)->getElementsByTagName('tr');
        
        foreach ($rows as $row)
        { 
            
            $cols = $row->getElementsByTagName('td');
            $c = $cols->item(0)->nodeValue;
            // Team Name
            $colsth = $row->getElementsByTagName('th');
            $t = $colsth->item(0)->nodeValue;
            
            //  match number 
            $colsmatch = $row->getElementsByTagName('td');
            $match = $colsmatch->item(1)->nodeValue;
            
            // match Win 
            $ColsWin = $row->getElementsByTagName('td');
            $win = $ColsWin->item(2)->nodeValue;

            //match draw 
            $Colsdraw = $row->getElementsByTagName('td');
            $draw = $Colsdraw->item(3)->nodeValue;

            // Match Lost 
            $Colsdlost = $row->getElementsByTagName('td');
            $lost = $Colsdlost->item(4)->nodeValue;

            // Match Points 
            $Colsdpoints = $row->getElementsByTagName('td');
            $points = $Colsdpoints->item(8)->nodeValue;

            // Win Percentage 
            $winpercentage = $win/38 ;
            $winpercentage2 = number_format($winpercentage, 2, '.', '') *100;


            if($Team == $c)
            { ?>
                <table>
                        <tr>
                            <th>Team Name </th>
                            <th>Total Match </th>
                            <th>Win Match </th>
                            <th>Draw Match</th>
                            <th>Lost Match</th>
                            <th>Win Percentage </th>
                            <th>PTS</th>
                        </tr>
                        <tr>
                            <td><?php echo $t ; ?></td>
                            <td><?php echo $match ; ?></td>
                            <td><?php echo $win; ?></td>
                            <td><?php echo $draw ; ?></td>
                            <td><?php echo $lost ; ?></td>
                            <td><?php echo $winpercentage2. "%" ; ?></td>
                            <td><?php echo $points ; ?></td>
                        </tr>
                </table> 
                <?php
            }
            else 
            {
                
            }
        }
        }
    }
    //
?>