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
<?php  
require_once 'header.php'; 
require_once 'inc/manager-db.php';
    $esperance= getEsperance();
?>
<link rel="stylesheet" href="css/style.css">
<main role="main" class="flex-shrink-0">

  <div class="container">
    <h1> L'espérance de vie humaine pour chaque pays </h1>
    <div>
     <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>Nom</th>
            <th>LifeExpectancy</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($esperance as $pays): ?>
            <tr>         
              <td> <?php echo $pays->Name ?></td>
              <td> <?php echo $pays->LifeExpectancy?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
     </table>
    </div>
  </div>
</main>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>