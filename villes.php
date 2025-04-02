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
if (isset($_GET['name']) && !empty($_GET['name']) ){
$name = ($_GET['name']);
$detailpays =  getPaysName($name);
if ($detailpays) {
    $villes = getVillesParPays($detailpays->Name);
}
}
?>
<div class="container">
    <?php if (isset($detailpays)): ?>
        <h1>Villes les plus peuplées de <?php echo htmlspecialchars($detailpays->Name); ?></h1>

        <?php if (!empty($villes)): ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Ville</th>
                        <th>Population</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($villes as $ville): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($ville->name); ?></td>
                            <td><?php echo number_format($ville->population); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucune ville trouvée pour ce pays.</p>
        <?php endif; ?>
    <?php else: ?>
        <p>Pays non trouvé.</p>
    <?php endif; ?>
</div>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>