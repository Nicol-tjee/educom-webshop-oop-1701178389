<?php
require_once "BasicDoc.php";

abstract class ItemDoc extends BasicDoc {
    protected function showItem($page, $items) 
    {       
        $counter = 0;
        $topNumber = 1;
        if (!is_array($items) || !isset($items[0])) {
            $items = array($items);
        }
        foreach ($items as $row) {
            $commaPrice = number_format($row -> price, 2, ',', '.');
            $itemClass = ($counter % 2 == 0) ? 'evenItem' : 'oddItem';
            echo    '<a class="item" href="index.php?page=details&id=' . $row -> id . '">' . PHP_EOL;           
            echo    '<div class="' . $itemClass . '">' . PHP_EOL;
            switch($page)
            {
                case "shop": 
                    echo '' . $row -> id . '<br><br>' . PHP_EOL;
                    echo '<img src="Images/' . $row -> filename . '" width="100" height="100" alt="Afbeelding"><br>' . PHP_EOL; 
                    break;
                case "top5":
                    echo '<h2>' . $topNumber . '</h2>' . PHP_EOL;
                    echo '<img src="Images/' . $row -> filename . '" width="100" height="100" alt="Afbeelding"><br>' . PHP_EOL;
                    break;
                case "details":
                    echo '<img src="Images/' . $row -> filename . '" width="300" height="300" alt="Afbeelding"><br>' . PHP_EOL;
                    break;
            }
            echo    '<h3>' . $row -> name . '</h3>';
            echo    '<div class="avgStars " data-item-id ="' . $row -> id . '"></div><br>';
            switch($page)
            {
                case "details":
                    echo '' . $row -> description . '<br><br>' . PHP_EOL;
                    break;
                default:
                    break;
            }
            echo    ' € ' . $commaPrice . '<br>';
            echo    '<br>' . PHP_EOL; 
            $counter++;
            $topNumber++;
            if ($this -> model -> allowedToBuy) {
                echo '  <form action="index.php" method="post">
                <input type="hidden" name="page" value="' . $page . '">
                <input type="hidden" name="id" value="' . $row -> id . '">
                <input type="hidden" name="action" value="storeItemInSession">
                <input class="cartButton "type="submit" value="Voeg toe aan winkelwagentje"><br>
                </form>';
                echo    '<br><div class="myStars " data-item-id ="' . $row -> id . '"></div>';
                }
                echo    '</div>';
                echo    '</a>';
        }
    }
}

?>
