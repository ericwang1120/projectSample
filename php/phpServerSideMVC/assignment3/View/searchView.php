<?php
/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 */
require_once("topMenu.php")
?>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/productSearch.js"></script>
    <div class="panel panel-primary" style="height:700px">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-1 text-right">Search:</div>
                <div class="col-md-2"><input type="text" class="form-control" placeholder="Enter product name"></div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>SKU</th>
                <th>Name</th>
                <th>Category</th>
                <th>Cost</th>
                <th>Stock Qty</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data as $product) {
                echo "<tr>";
                echo "<td>" . $product->getProductSKU() . "</td>";
                echo "<td>" . $product->getProductName() . "</td>";
                echo "<td>" . $product->getProductCategory() . "</td>";
                echo "<td>" . $product->getProductCost() . "</td>";
                echo "<td>" . $product->getProductStockQuality() . "</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
<?php
require_once("footer.php");
