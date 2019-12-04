<?php
include"../header.php";
include"../nav.php";
require_once("../product/functions.php");
require_once("../category/functions.php");
$aru = new aru();
$stock = new stock();
?>

<div class="content-wrapper">

	<?php breadcrumb(); ?>
	
	<section class="content pd-btm">
        <?php
        $list_storages = 0;
        $list_storages = get_select_query("select * from storage_list where st_type = 'storage'");
        if($list_storages){
            foreach ($list_storages as $list_storage) {
                $st_id = $list_storage["st_id"];
                ?>
                <div class="box box-info">

                    <div class="box-header">
                        <h3 class="box-title"><?php echo per_number($list_storage["st_name"]); ?></h3>
                    </div>

                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>محصول</th>
                                    <th>دانه بندی</th>
                                    <th>موجودی</th>
                                </tr>	
                            </thead>
                            <tbody>
                                <?php
                                $list_products = 0;
                                $list_products = get_select_query("select * from product inner join category");
                                if($list_products){
                                    $i = 1;
                                    foreach($list_products as $list_product) {
                                        $p_id = $list_product["p_id"];
                                        $cat_id = $list_product["cat_id"];
                                        $p_stock = $stock->get_stock_report($st_id, $p_id, $cat_id);
										if($p_stock != 0){
										?>
                                        <tr>
                                            <td><?php echo per_number($i); ?></td>
                                            <td><?php echo per_number(get_product_name($list_product['p_id'])); ?></td>
                                            <td><?php echo per_number(get_category_name($list_product['cat_id'])); ?></td>
                                            <td><?php echo per_number(number_format($p_stock)); ?></td>
                                        </tr>
                                        <?php
                                        $i++;
										}
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ردیف</th>
                                    <th>محصول</th>
                                    <th>دانه بندی</th>
                                    <th>موجودی</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
                <?php
            }
        } else {
            ?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">انباری موجود نیست!</h3>
                </div>
            </div>
            <?php
        }
        ?>
	</section>

</div>

<?php
include"../left-nav.php";
include"../footer.php";
?>