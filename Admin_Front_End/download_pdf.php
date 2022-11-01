<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'vendor/autoload.php';
include("../Back_End/db_conn.php");
include("../Back_End/function.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();

if($_SERVER['REQUEST_METHOD'] == "POST"){    
    if(!empty($_POST['serviceID'])){
        
        $service_id = $_POST['serviceID'];

        $service_data = check_service_ID($conn, $service_id);
        $chair_data = check_chair($conn);
        $babychair_data = check_babychair($conn);
        $table_data = check_table($conn);
        $cup_data = check_cup($conn);
        $cutlery_data = check_cutlery($conn);
        $FND_data = check_FND($service_data['FND_name'], $conn);
        $deco_data = check_deco($service_data['deco_name'], $conn);
        $fun_data = check_fun($service_data['fun_name'], $conn);
        
        $chairPrice = $chair_data['item_price'] * $service_data['no_chair'];
        $babychairPrice = $babychair_data['item_price'] * $service_data['no_babychair'];
        $tablePrice = $table_data['item_price'] * $service_data['no_table'];
        $cupPrice = $cup_data['item_price'] * $service_data['no_cup'];
        $cutleryPrice = $cutlery_data['item_price'] * $service_data['no_cutlery'];
        $FNDPrice = $FND_data['pack_price'] * $service_data['no_FND'];
        $decoPrice = $deco_data['deco_price'] * $service_data['site_size'];
        $funPrice = $fun_data['fun_price'];
        $totalPrice = $chairPrice + $babychairPrice + $tablePrice + $cupPrice + $cutleryPrice + $FNDPrice + $decoPrice + $funPrice;

        $data = '';
        
        $data .= '<style> p{font-size: 14px; font-family: "times new roman";}'
                . 'table, tr{border: 1px solid;} tableItem{width: 100%} </style>';
        
        $data .= '<p>Quotation</p>
            <div class="container">
                        <table class="table tableItem">
                            <tr class="body">
                                <td>
                                    <table class="table">
                                        <tr class="body" align="left">
                                            <td style="min-width: 150px;">
                                                <p>Service ID:</p>
                                            </td>
                                            <td>
                                                <p>' . $service_id . '</p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Site Name:</p>
                                            </td>
                                            <td>
                                                <p>'. $service_data['site_name'] .'</p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Address:</p>
                                            </td>
                                            <td>
                                                <p>'. $service_data['site_address'] .'</p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Site Size:</p>
                                            </td>
                                            <td>
                                                <p>'. $service_data['site_size'] .' SQ FT </p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Type of Service:</p>
                                            </td>
                                            <td>
                                                <p>'. $service_data['service_type'] .'</p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Description of Event:</p>
                                            </td>
                                            <td>
                                                <p>'. $service_data['service_desc'] .'</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table class="table">
                                        <tr class="body" align="left">
                                            <td style="min-width: 180px;">
                                                <p>User Name:</p>
                                            </td>
                                            <td>
                                                <p>' . $service_data['username'] . '</p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Contact:</p>
                                            </td>
                                            <td>
                                                <p>' . $service_data['contact'] . '</p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Email:</p>
                                            </td>
                                            <td>
                                                <p>' . $service_data['email'] . '</p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Date of Event:</p>
                                            </td>
                                            <td>
                                                <p>' . $service_data['event_date'] . '</p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Duration of Event:</p>
                                            </td>
                                            <td>
                                                <p>' . $service_data['event_time'] . '</p>
                                            </td>
                                        </tr>
                                        <tr class="body" align="left">
                                            <td>
                                                <p>Number of Participants:</p>
                                            </td>
                                            <td>
                                                <p>' . $service_data['no_ppl'] . '</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="body" align="center">
                            <td colspan="2">
                                <table class="table">
                                    <tr class="body" align="left">
                                        <td style="min-width: 400px;">
                                            <p>Description</p>
                                        </td>
                                        <td align="right" style="min-width: 130px;">
                                            <p>Quantity</p>
                                        </td>
                                        <td align="right" style="min-width: 130px;">
                                            <p>Price (RM)</p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>Chairs</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $service_data['no_chair'] .'</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $chairPrice .'</p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>Baby Chairs</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $service_data['no_babychair'] .'</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $babychairPrice .'</p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>Tables</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $service_data['no_table'] .'</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $tablePrice .'</p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>Cups</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $service_data['no_cup'] .'</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $cupPrice .'</p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>Cutlery Sets</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $service_data['no_cutlery'] .'</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $cutleryPrice .'</p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>Food & Beverage Pack:</p>
                                        </td>
                                        <td align="right">
                                            <p></p>
                                        </td>
                                        <td align="right">
                                            <p></p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>'. $FND_data['pack_name'] .'</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $service_data['no_FND'] .'</p>
                                        </td>
                                        <td align="right">
                                            <p>'. $FNDPrice .'</p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>Decoration Pack:</p>
                                        </td>
                                        <td align="right">
                                            <p></p>
                                        </td>
                                        <td align="right">
                                            <p></p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>'. $deco_data['deco_name'] .'</p>
                                        </td>
                                        <td align="right">
                                            <p></p>
                                        </td>
                                        <td align="right">
                                            <p>'. $decoPrice .'</p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>Entertainment Pack:</p>
                                        </td>
                                        <td align="right">
                                            <p></p>
                                        </td>
                                        <td align="right">
                                            <p></p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>'. $fun_data['fun_name'] .'</p>
                                        </td>
                                        <td align="right">
                                            <p></p>
                                        </td>
                                        <td align="right">
                                            <p>'. $funPrice .'</p>
                                        </td>
                                    </tr>
                                    <tr class="body" align="left">
                                        <td>
                                            <p>Total Price</p>
                                        </td>
                                        <td align="right">
                                            <p></p>
                                        </td>
                                        <td align="right">
                                            <p>'. $totalPrice .'</p>
                                        </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                        </table>
                    </div>';
        
        $dompdf->loadHtml($data);
        
        $dompdf->setPaper('A4', 'portrait');
        
        $dompdf->render();
        
        $dompdf->stream('quotation.pdf');
        
    }
}