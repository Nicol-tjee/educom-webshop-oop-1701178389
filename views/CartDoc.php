<?php
require_once "ItemDoc.php";

class CartDoc extends ItemDoc {
    protected function showHeader()
    {
        echo 'Winkelwagen';
    }
    protected function showContent()
    {   
        if(!empty($this -> model -> cart)) 
        {
            $counter = 0;
            $total = 0;

            foreach ($this -> model -> cart as $itemId => $quantity) {
                $commaPrice = number_format($this -> model -> items[$itemId] -> price, 2, ',', '.');
                $subtotal = $this -> model -> items[$itemId] -> price * $quantity;
                $commaSubtotal = number_format($subtotal, 2, ',', '.');
                $shopItemClass = ($counter % 2 == 0) ? 'evenItem' : 'oddItem';
                echo    '<a class="shopItemCart" href="index.php?page=details&id=' . $this -> model -> items[$itemId]-> id . '">
                        <div id="cartItems" class="' .$shopItemClass . '">
                        <table>
                        <td id="itemImg"><img src="Images/' . $this -> model -> items[$itemId] -> filename . '" width="50" height="50" alt="Afbeelding"></td> 
                        <td id="itemName"><h3>' . $this -> model -> items[$itemId] -> name . '</h3></td>
                        <td id="itemQuan">' . $quantity . ' stuk(s)</td>
                        <td id="price">€ ' . $commaPrice . ' per stuk</td>
                        <td id="subtotal"><em>subtotaal € ' . $commaSubtotal . '</em></td>
                        <br><br>
                        </table>
                        </div></a>';
                    $total += $subtotal;
                    $counter ++;
            }
            $commaTotal = number_format($total, 2, ',', '.');
            echo    '<div class="total">
                        <p>
                            <h3>Totaal: € ' . $commaTotal . '</h3>
                            <form action="index.php" method="post">
                            <input type="hidden" name="page" value="cart">
                            <input type="hidden" name="action" value="createOrder">
                            <input class="cartButton "type="submit" value="Afrekenen">
                            </form>
                        </p>                
                    </div>';
        } else {
            echo    '<div>
                        <p>
                            <h3>Uw winkelwagen is leeg. Kijk snel in de spellenwinkel!</h3>
                        </p>
                    </div>';
        }
    }
}

?> 