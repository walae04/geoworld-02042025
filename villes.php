<?php
/**
 * Home Page
 *
 * PHP version 7
 *
 * @category  Page
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

?>
<?php  require_once 'header.php'; ?>
<?php
require_once 'inc/manager-db.php';
if (isset($_GET['id']) && !empty($_GET['id']) ){
    $id = ($_GET['id']);
    $villes = getVilles($id);
    $pays = getDetail($id);
}
?>
<link rel="stylesheet" href="css/style.css">
<div class="container">
        <h1>Les Villes de <?php echo htmlspecialchars($pays->Name); ?></h1>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Population</th>
                <th>District</th>                
            </tr>
        </thead>
        <tbody>
                    <?php foreach ($villes as $ville): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($ville->Name); ?></td>
                            <td><?php echo number_format($ville->Population); ?></td>
                            <td><?php echo htmlspecialchars($ville->District); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
      

</div>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>